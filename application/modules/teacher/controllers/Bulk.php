<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Bulk.php**********************************
 * @product name    : Global School Management System Pro
 * @type            : Class
 * @class name      : Bulk
 * @description     : Manage bulk teachers imformation of the school.  
 * @author          : makemaya Team 	
 * @url             : https://educlouds.app/      
 * @support         : aniltomar95@gmail.com	
 * @copyright       : makemaya Team	 	
 * ********************************************************** */

class Bulk extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();      
       
        $this->load->model('Teacher_Model', 'teacher', true);    
         
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add Bulk teacher" user interface                 
    *                    and process to store "Bulk teacher" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {
       
        check_permission(ADD);
      
        


        if ($_POST) {            


            if(!check_saas_status($this->input->post('school_id'), 'teacher')){
                error($this->lang->line('upgrade_your_plan'));
                redirect('teacher/bulk/add');
            }


            $status = $this->_get_posted_teacher_data();
            if ($status) {                   

                create_log('Has been added Bulk teacher');
                success($this->lang->line('insert_success'));
                redirect('teacher/index/'.$this->input->post('class_id'));
            } else {
                error($this->lang->line('insert_failed'));
                redirect('teacher/bulk/add');
            }            
        } 
        
                    
        if($this->session->userdata('role_id') != SUPER_ADMIN){   
             $school_id = $this->session->userdata('school_id');
            $this->data['academic_years'] = $this->teacher->get_list('academic_years', array('status' => 1, 'school_id'=>$school_id), '', '', '', 'id', 'ASC'); 
            $this->data['classes'] = $this->teacher->get_list('classes', array('status' => 1, 'school_id'=>$school_id), '', '', '', 'id', 'ASC');
        }else{ 
            $this->data['classes'] = array();   
        }
        
        $this->layout->title($this->lang->line('bulk_admission') . ' | ' . SMS);
        $this->layout->view('bulk', $this->data);
    }

   

    /*****************Function _get_posted_teacher_data**********************************
    * @type            : Function
    * @function name   : _get_posted_teacher_data
    * @description     : Prepare "teacher" user input data to save into database                  
    *                       
    * @param           : null
    * @return          : $data array(); value 
    * ********************************************************** */
    private function _get_posted_teacher_data() {

        $this->_upload_file();

        $destination = 'assets/csv/bulk_uploaded_teacher.csv';
        if (($handle = fopen($destination, "r")) !== FALSE) {

            $count = 1;            
            $school_id  = $this->input->post('school_id');           
            $academic_year_id = $this->input->post('academic_year_id');
            if(!$academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('teacher/bulk/add');
            }
            
           
            while (($arr = fgetcsv($handle)) !== false) {
                if ($count == 1) { $count++;  continue; }

                // need atleast some mandatory data
                //0 = name, 1 = admission_no, 13 = roll_no
                if ($arr[0] != '') {

                   
                   
                    $user = array();
                    $data = array();
                    $enroll = array();
                    $guardian_user = array();
                    $guardian = array();
                    
                    // // now creating guardian user
                    // $guardian_user['role_id']  = GUARDIAN;
                    // $guardian_user['name']     =  isset($arr[33]) ? $arr[33] : 'Guardian';
                    // $guardian_user['phone']    =  isset($arr[34]) ? $arr[34] : '';
                    // $guardian_user['email']    =  isset($arr[35]) ? $arr[35] : '';
                    // $guardian_user['username'] =  $this->teacher->get_custom_id('users', 'GUD');
                    // $guardian_user['password'] =  get_random_tring(6);
                     
                    $department_id = '';
                    if ($arr[3] !='') {                       
                       $departments =  $this->db->get_where('departments', ['school_id'=> $school_id, 'title'=> $arr[3]])->row();                      
                       if ($departments) {
                            $department_id = $departments->id;
                       }else{
                            $datadepartments['school_id'] = $school_id;
                            $datadepartments['title'] = $arr[3];
                            $datadepartments['status'] = '1';
                            $datadepartments['created_at'] = date('Y-m-d H:i:s');
                            $datadepartments['created_by'] = logged_in_user_id();
                            $datadepartments['modified_at'] = date('Y-m-d H:i:s');
                            $datadepartments['modified_by'] = logged_in_user_id();
                            $department_id =$this->teacher->insert('departments',  $datadepartments);
                       }
                    }


                       $salary_grade_id = '';                                        
                       $salary_grades =  $this->db->get_where('salary_grades', ['school_id'=> $school_id, 'grade_name'=> 'High'])->row();                      
                       if ($salary_grades) {
                            $salary_grade_id = $salary_grades->id;
                       }else{
                            $datasalary_grades['school_id'] = $school_id;
                            $datasalary_grades['grade_name'] = 'High';
                            $datasalary_grades['basic_salary'] = '20000';
                            $datasalary_grades['hourly_rate'] = '700';
                            $datasalary_grades['gross_salary'] = '20000';
                            $datasalary_grades['net_salary'] = '20000';
                            $datasalary_grades['status'] = '1';
                            $datasalary_grades['created_at'] = date('Y-m-d H:i:s');
                            $datasalary_grades['created_by'] = logged_in_user_id();
                            $datasalary_grades['modified_at'] = date('Y-m-d H:i:s');
                            $datasalary_grades['modified_by'] = logged_in_user_id();
                            $salary_grade_id =$this->teacher->insert('salary_grades',  $datasalary_grades);
                       }
                    

                  
                    $role_id = '';
                    $teachersid = 'teacher'.$school_id;
                    $roles  = $this->db->get_where('roles', ['slug'=> $teachersid, 'school_id'=>$school_id])->row();  

                   
                    if($roles){
                        $role_id = $roles->id;
                    }

                   
                    // if($roles){
                    //     $role_id = $roles->id;
                    // }else{
                    //     $dataRoles['is_super_admin'] = '0';
                    //     $dataRoles['is_default'] = '0';
                    //     $dataRoles['school_id'] = $school_id;
                    //     $dataRoles['name'] = 'Teacher';
                    //     $dataRoles['slug'] = 'teacher'.$school_id.rand('1111','9999');
                    //     // $this->db->insert('roles',  $dataRoles);
                    //     $role_id =$this->teacher->insert('roles',  $dataRoles);
                    //     // $roleinsert_id =  $this->db->insert_id();                      
                    //     // $role_id = $roleinsert_id;
                    // }

                     
                    if($arr[1]){
                        $dataTeacher['username'] =    $arr[1];
                            }else{
                                $dataTeacher['username'] =   'teacher'.$school_id.rand(1234,9999999);
                            }; 

                    if($arr[2]){
                        $dataTeacher['password'] =    md5($arr[2]);
                        $dataTeacher['temp_password'] =    base64_encode($arr[2]);
                            }else{
                        $dataTeacher['password'] =   md5(1234);
                        $dataTeacher['temp_password'] =   base64_encode(1234);
                    }; 


                   
                   
                    
                    $dataTeacher['role_id'] = $role_id;
                    $dataTeacher['school_id'] = $school_id;
                    $dataTeacher['created_at'] = date('Y-m-d H:i:s');
                    $dataTeacher['created_by'] = logged_in_user_id();
                    $dataTeacher['modified_at'] = date('Y-m-d H:i:s');
                    $dataTeacher['modified_by'] = logged_in_user_id();
                    $user_id =$this->teacher->insert('users',  $dataTeacher);
                    // echo $user_id =  $this->teacher->insert_id();






                    $data['school_id'] = $school_id;
                    // $data['academic_year_id'] = $academic_year_id;
                    $data['name'] = isset($arr[0]) ? $arr[0] : 'teacher';
                               
                   
                    $data['department_id']   = $department_id;
                    $data['dob'] = isset($arr[4]) ? date('Y-m-d', strtotime($arr[4])) : date('Y-m-d');
                    $data['gender'] = isset($arr[5]) ? $arr[5] : 'male';                                     
                    $data['blood_group'] = isset($arr[6]) ? $arr[6] : 'a_positive';
                    $data['religion']   = isset($arr[7]) ? $arr[7] : '';
                    $data['phone']   = isset($arr[8]) ? $arr[8] : '123456789';
                    $data['email']   = isset($arr[9]) ? $arr[9] : '';
                    $data['national_id'] = isset($arr[10]) ? $arr[10] : '';
                    $data['joining_date'] = isset($arr[11]) ? date('Y-m-d', strtotime($arr[11])) : date('Y-m-d');
                    $data['present_address']   = isset($arr[12]) ? $arr[12] : '';
                    $data['permanent_address']   = isset($arr[13]) ? $arr[13] : '';
                    $data['other_info']   = isset($arr[14]) ? $arr[14] : '';
                    $data['user_id'] = $user_id;

                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['created_by'] = logged_in_user_id();
                    $data['modified_at'] = date('Y-m-d H:i:s');
                    $data['modified_by'] = logged_in_user_id();
                    $data['salary_type'] = 'monthly';     
                    $data['salary_grade_id'] = $salary_grade_id;     
                    $data['status'] = 1;     

                    $this->teacher->insert('teachers', $data);                  

                   
                    
                                    
                }
            }
        }

        return TRUE;
    }
    
    
    
    /***************** Function _upload_file **********************************
    * @type            : Function
    * @function name   : _upload_file
    * @description     : upload bulk studebt csv file                  
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _upload_file() {

        $file = $_FILES['bulk_teacher']['name'];

        if ($file != "") {

            $destination = 'assets/csv/bulk_uploaded_teacher.csv';          
            //$ext = strtolower(end(explode('.', $file)));
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            if ($ext == 'csv') {                 
                move_uploaded_file($_FILES['bulk_teacher']['tmp_name'], $destination);  
            }
        } else {
            error($this->lang->line('insert_failed'));
            redirect('teacher/bulk/add');
        }       
    }

    
    /*****************Function _insert_enrollment**********************************
    * @type            : Function
    * @function name   : _insert_enrollment
    * @description     : save teacher info to enrollment while create a new teacher                  
    * @param           : $insert_id integer value
    * @return          : null 
    * ********************************************************** */
    private function _insert_enrollment($enroll) {
        
        $data = array();
        $data['teacher_id'] = $enroll['teacher_id'];
        $data['school_id']   = $this->input->post('school_id');
        $data['class_id']   = $this->input->post('class_id');
        $data['section_id'] = $this->input->post('section_id');  
        $data['academic_year_id'] = $this->input->post('academic_year_id');        
        $data['roll_no'] = $enroll['roll_no'];
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
        $data['status'] = 1;
        $this->teacher->insert('enrollments', $data);
    }
}