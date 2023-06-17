<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Mark.php**********************************
 * @product name    : Educlouds
 * @type            : Class
 * @class name      : Mark
 * @description     : Manage exam mark for student whose are attend in the exam.  
 * @author          : makemaya Team 	
 * @url             : https://educlouds.app/      
 * @support         : aniltomar95@gmail.com	
 * @copyright       : makemaya Team	 	
 * ********************************************************** */

class Mark extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Mark_Model', 'mark', true);   
        
        // need to check school subscription status
        if($this->session->userdata('role_id') != SUPER_ADMIN){                 
            if(!check_saas_status($this->session->userdata('school_id'), 'is_enable_exam_mark')){                        
              redirect('dashboard/index');
            }
        }
    }

    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Exam Mark List" user interface                 
    *                    with filter option  
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function index() {

        check_permission(VIEW);

        if ($_POST) {

            $school_id = $this->input->post('school_id');
            $exam_id = $this->input->post('exam_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $subject_id = $this->input->post('subject_id');

            $school = $this->mark->get_school_by_id($school_id);
            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('exam/mark/index');
            }
            
            $this->data['students'] = $this->mark->get_student_list($school_id, $exam_id, $class_id, $section_id, $subject_id, $school->academic_year_id);
            $this->data['students_online'] = $this->mark->get_exam_result_list($school_id, $exam_id, $class_id, $section_id, $subject_id, $school->academic_year_id);
            // echo $this->db->last_query();
            // print_r($students_online);

            
            $condition = array(
                'school_id' => $school_id,
                'exam_id' => $exam_id,
                'class_id' => $class_id,
                'academic_year_id' => $school->academic_year_id,
                'subject_id' => $subject_id
            );
            
            if($section_id){
                $condition['section_id'] = $section_id;
            }

            $data = $condition;
            
            if (!empty($this->data['students'])) {

                foreach ($this->data['students'] as $obj) {

                    $condition['student_id'] = $obj->student_id;
                    $mark = $this->mark->get_single('marks', $condition);

                    if (empty($mark)) {
                        
                        $data['section_id'] = $obj->section_id;
                        $data['student_id'] = $obj->student_id;
                        $data['status'] = 1;
                        $data['created_at'] = date('Y-m-d H:i:s');
                        $data['created_by'] = logged_in_user_id();
                        $this->mark->insert('marks', $data);
                    }
                }
            }

            $this->data['grades'] = $this->mark->get_list('grades', array('status' => 1, 'school_id'=>$school_id), '', '', '', 'id', 'ASC');
            
            $this->data['school_id'] = $school_id;
            $this->data['exam_id'] = $exam_id;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;
            $this->data['subject_id'] = $subject_id;
            $this->data['academic_year_id'] = $school->academic_year_id;
                        
            $class = $this->mark->get_single('classes', array('id'=>$class_id));
            create_log('Has been process exam mark for class: '. $class->name);
            
        }
        
        
        $condition = array();
        $condition['status'] = 1;  
        
        if($this->session->userdata('role_id') != SUPER_ADMIN){
            $school = $this->mark->get_school_by_id($this->session->userdata('school_id'));
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->mark->get_list('classes', $condition, '','', '', 'id', 'ASC');
            $condition['academic_year_id'] = $school->academic_year_id;
            $this->data['exams'] = $this->mark->get_list('exams', $condition, '', '', '', 'id', 'ASC');
        }  

        // echo "<pre>";
        // print_r($this->data);
        // die;

        $this->layout->title($this->lang->line('manage_mark') . ' | ' . SMS);
        $this->layout->view('mark/index', $this->data);
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Process to store "Exam Mark" into database                
    *                     
    * @param           : null
    * @return          : null 
     * ********************************************************** */
    public function add() {

        check_permission(ADD);

        if ($_POST) {


            $school_id = $this->input->post('school_id');
            $exam_id = $this->input->post('exam_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $subject_id = $this->input->post('subject_id');


            $exam_main = $this->input->post('exam_main');
            $online_exam_main = $this->input->post('online_exam_main');

            $school = $this->mark->get_school_by_id($school_id);
            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('exam/mark/index');
            }


            // $exam_online_exams  =   $this->mark->get_exam_and_taken_detail($school_id, $exam_id, $class_id, $section_id, $subject_id, $school->academic_year_id);


            // print_r($exam_online_exams->exam_id);
            
            
            $condition = array(
                'school_id' => $school_id,
                'exam_id' => $exam_id,
                'class_id' => $class_id,
                'academic_year_id' => $school->academic_year_id,
                'subject_id' => $subject_id
            );
            
            if($section_id){
                $condition['section_id'] = $section_id;
            }            

            $data = $condition;

           

            if (!empty($_POST['students'])) {

                if ($exam_main == '1') {
                

                    foreach ($_POST['students'] as $key => $value) {

                        $condition['student_id'] = $value;
                        $condition['exam_id'] = $exam_id;
                        $data['written_mark'] = $_POST['written_mark'][$value];
                        $data['written_obtain'] = $_POST['written_obtain'][$value];
                        
                        $data['tutorial_mark'] = $_POST['tutorial_mark'][$value];
                        $data['tutorial_obtain'] = $_POST['tutorial_obtain'][$value];
                        
                        $data['practical_mark'] = $_POST['practical_mark'][$value];
                        $data['practical_obtain'] = $_POST['practical_obtain'][$value];
                        
                        $data['viva_mark'] = $_POST['viva_mark'][$value];
                        $data['viva_obtain'] = $_POST['viva_obtain'][$value];
                        
                        $data['exam_total_mark'] = $_POST['exam_total_mark'][$value];
                        $data['obtain_total_mark'] = $_POST['obtain_total_mark'][$value];
                        
                        $data['grade_id'] = $_POST['grade_id'][$value];                    
                        $data['remark'] = $_POST['remark'][$value];
                        
                        $data['status'] = 1;
                        $data['created_at'] = date('Y-m-d H:i:s');
                        $data['created_by'] = logged_in_user_id();
                        $this->mark->update('marks', $data, $condition);

                    }
                }


                if ($online_exam_main == '1') {
                
                    // print_r($_POST['students']);

                    // die;
                    foreach ($_POST['students'] as $key => $value) {

                        $condition1['id'] = $value;

                        $data1['written_mark'] = $_POST['written_mark'][$value];
                        $data1['written_obtain'] = $_POST['written_obtain'][$value];
                        
                        $data1['tutorial_mark'] = $_POST['tutorial_mark'][$value];
                        $data1['tutorial_obtain'] = $_POST['tutorial_obtain'][$value];
                        
                        $data1['practical_mark'] = $_POST['practical_mark'][$value];
                        $data1['practical_obtain'] = $_POST['practical_obtain'][$value];
                        
                        $data1['viva_mark'] = $_POST['viva_mark'][$value];
                        $data1['viva_obtain'] = $_POST['viva_obtain'][$value];

                        
                        $data1['total_mark'] = $_POST['exam_total_mark'][$value];
                        $data1['total_obtain_mark'] = $_POST['obtain_total_mark'][$value];
                        
                        $data1['grade_id'] = $_POST['grade_id'][$value];                    
                        $data1['remark'] = $_POST['remark'][$value];
                        
                        $data1['status'] = 1;
                        $data1['created_at'] = date('Y-m-d H:i:s');
                        $data1['created_by'] = logged_in_user_id();
                        $this->mark->update('exam_taken_exams', $data1, $condition1);
                      
                    }
                }
            }
            
            $class = $this->mark->get_single('classes', array('id'=>$class_id));
            create_log('Has been process exam mark and save for class: '. $class->name);
            
            // success($this->lang->line('insert_success'));
            // redirect('exam/mark/index');
        }

        $this->layout->title($this->lang->line('add')  . ' | ' . SMS);
        $this->layout->view('mark/index', $this->data);
    }

}
