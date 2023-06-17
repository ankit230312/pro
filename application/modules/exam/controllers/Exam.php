<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Exam.php**********************************
 * @product name    : Educlouds
 * @type            : Class
 * @class name      : Exam
 * @description     : Manage exam term.  
 * @author          : makemaya Team 	
 * @url             : https://educlouds.app/      
 * @support         : aniltomar95@gmail.com	
 * @copyright       : makemaya Team	 	
 * ********************************************************** */

class Exam extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Exam_Model', 'exam', true);     
    }

    
        
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Exam term List" user interface                
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */


    public function index($school_id = null) {

        check_permission(VIEW);
        
            
        $school = $this->exam->get_school_by_id($school_id);
        
        $this->data['exams'] = $this->exam->get_exam_list($school_id, @$school->academic_year_id);
        
        $this->data['filter_school_id'] = $school_id;        
        $this->data['schools'] = $this->schools;
        
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_exam_term') . ' | ' . SMS);
        $this->layout->view('exam/index', $this->data);
    }


    public function examsubtypelist($school_id = null) {

        check_permission(VIEW);
        
            
        $school = $this->exam->get_school_by_id($school_id);
        
        $this->data['exams'] = $this->exam->get_examsubtype_list($school_id, @$school->academic_year_id);
        
        $this->data['filter_school_id'] = $school_id;        
        $this->data['schools'] = $this->schools;
        
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_exam_term') . ' | ' . SMS);
        $this->layout->view('examsubtype/index', $this->data);
    }



    public function sectionlist($school_id = null) {
        
        check_permission(VIEW);    
        $school = $this->exam->get_school_by_id($school_id);        
        $this->data['sections'] = $this->exam->get_section_list($school_id, @$school->academic_year_id);        
        $this->data['filter_school_id'] = $school_id;        
        $this->data['schools'] = $this->schools;
        
        $this->data['list'] = TRUE;
        $this->layout->title('Section list | ' . SMS);
        $this->layout->view('section/index', $this->data);
    }



    public function examtypelist($school_id = null) {

        check_permission(VIEW);
        
            
        $school = $this->exam->get_school_by_id($school_id);
        
        $this->data['exams'] = $this->exam->get_examtype_list($school_id, @$school->academic_year_id);
        
        $this->data['filter_school_id'] = $school_id;        
        $this->data['schools'] = $this->schools;
        
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_exam_term') . ' | ' . SMS);
        $this->layout->view('examtype/index', $this->data);
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new Eaxm term" user interface                 
    *                    and process to store "Exam term" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */


    public function add() {

        check_permission(ADD);

        if ($_POST) {
            $this->_prepare_exam_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_exam_data();

                $insert_id = $this->exam->insert('exams', $data);
                if ($insert_id) {
                    
                    create_log('Has been created an Exam : '.$data['title']);  
                    
                    success($this->lang->line('insert_success'));
                    redirect('exam/index/'.$data['school_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('exam/add');
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }

        $this->data['exams'] = $this->exam->get_exam_list();
        $this->data['schools'] = $this->schools;
        
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' | ' . SMS);
        $this->layout->view('exam/index', $this->data);
    }


    public function examsubtypeadd() {

        check_permission(ADD);

        if ($_POST) {
            $this->_prepare_examsubtype_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_examsubtype_data();

                $insert_id = $this->exam->insert('exam_sub_types', $data);

                if ($insert_id) {
                    
                    create_log('Has been created an Exam Sub Type : '.$data['title']);  
                    
                    success($this->lang->line('insert_success'));
                    redirect('exam/examsubtypelist/'.$data['school_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('exam/examsubtypeadd');
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }

        $this->data['exams'] = $this->exam->get_examsubtype_list();

        $this->data['schools'] = $this->schools;
        
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' | ' . SMS);
        $this->layout->view('examsubtype/index', $this->data);

    }


    public function examtypeadd() {

        check_permission(ADD);

        if ($_POST) {
            $this->_prepare_examtype_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_examtype_data();

                $insert_id = $this->exam->insert('exam_types', $data);

                if ($insert_id) {
                    
                    create_log('Has been created an Exam Type : '.$data['title']);  
                    
                    success($this->lang->line('insert_success'));
                    redirect('exam/examtypelist/'.$data['school_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('exam/examtypeadd');
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }

        $this->data['exams'] = $this->exam->get_examtype_list();

        $this->data['schools'] = $this->schools;
        
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' | ' . SMS);
        $this->layout->view('examtype/index', $this->data);

    }


    
    public function sectionadd() {

        check_permission(ADD);

        if ($_POST) {
            $this->_prepare_section_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_section_data();

                $insert_id = $this->exam->insert('exam_sections', $data);

                if ($insert_id) {
                    
                    create_log('Has been created an Section : '.$data['title']);  
                    
                    success($this->lang->line('insert_success'));
                    redirect('exam/sectionlist/'.$data['school_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('exam/sectionadd');
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }

        $this->data['exams'] = $this->exam->get_section_list();

        $this->data['schools'] = $this->schools;
        
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' | ' . SMS);
        $this->layout->view('section/index', $this->data);

    }

    
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "Exam term" user interface                 
    *                    with populate "Exam term" value 
    *                    and process to update "exam term" into database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function edit($id = null) {

        check_permission(EDIT);

        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('exam/index');
        }
        
        if ($_POST) {
            $this->_prepare_exam_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_exam_data();
                $updated = $this->exam->update('exams', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    
                    create_log('Has been udated an Exam : '.$data['title']);
                    
                    success($this->lang->line('update_success'));
                    redirect('exam/index/'.$data['school_id']);
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('exam/edit/' . $this->input->post('id'));
                }
            } else {
                error($this->lang->line('update_failed'));               
                $this->data['exam'] = $this->exam->get_single('exams', array('id' => $this->input->post('id')));
            }
        }

        if ($id) {
            $this->data['exam'] = $this->exam->get_single('exams', array('id' => $id));

            if (!$this->data['exam']) {
                redirect('exam/index');
            }
        }

        $this->data['exams'] = $this->exam->get_exam_list($this->data['exam']->school_id, $this->data['exam']->academic_year_id);
        $this->data['school_id'] = $this->data['exam']->school_id;
        $this->data['filter_school_id'] = $this->data['exam']->school_id;
        $this->data['schools'] = $this->schools;
        $this->data['exam_sub_type_id'] = $this->data['exam']->exam_sub_type_id;
        $this->data['exam_type_id'] = $this->data['exam']->exam_type_id;
        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
        $this->layout->view('exam/index', $this->data);
    }



    public function subtypeedit($id = null) {

        check_permission(EDIT);

        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('exam/examsubtypelist');
        }
        
        if ($_POST) {
            $this->_prepare_examsubtype_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_examsubtype_data();
                $updated = $this->exam->update('exam_sub_types', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    
                    create_log('Has been udated an Exam Sub type : '.$data['title']);
                    
                    success($this->lang->line('update_success'));
                    redirect('exam/examsubtypelist/'.$data['school_id']);
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('exam/subtypeedit/' . $this->input->post('id'));
                }
            } else {
                error($this->lang->line('update_failed'));               
                $this->data['exam'] = $this->exam->get_single('exam_sub_types', array('id' => $this->input->post('id')));
            }
        }

        if ($id) {
            $this->data['exam'] = $this->exam->get_single('exam_sub_types', array('id' => $id));

            if (!$this->data['exam']) {
                redirect('exam/examsubtypelist');
            }
        }

        $this->data['exams'] = $this->exam->get_examsubtype_list($this->data['exam']->school_id, $this->data['exam']->academic_year_id);
        $this->data['school_id'] = $this->data['exam']->school_id;
        $this->data['exam_type_id'] = $this->data['exam']->exam_type_id;
        $this->data['filter_school_id'] = $this->data['exam']->school_id;
        $this->data['schools'] = $this->schools;
        
        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
        $this->layout->view('examsubtype/index', $this->data);

    }



    public function typeedit($id = null) {

        check_permission(EDIT);

        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('exam/examtypelist');
        }
        
        if ($_POST) {
            $this->_prepare_examtype_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_examtype_data();
                $updated = $this->exam->update('exam_types', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    
                    create_log('Has been udated an Exam type : '.$data['title']);
                    
                    success($this->lang->line('update_success'));
                    redirect('exam/examtypelist/'.$data['school_id']);
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('exam/typeedit/' . $this->input->post('id'));
                }
            } else {
                error($this->lang->line('update_failed'));               
                $this->data['exam'] = $this->exam->get_single('exam_types', array('id' => $this->input->post('id')));
            }
        }
    }


    public function sectionedit($id = null) {
        check_permission(EDIT);
        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('exam/sectionlist');
        }        
        if ($_POST) {
            $this->_prepare_section_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_section_data();
                $updated = $this->exam->update('exam_sections', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    
                    create_log('Has been udated an section : '.$data['title']);
                    
                    success($this->lang->line('update_success'));
                    redirect('exam/sectionlist/'.$data['school_id']);
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('exam/sectionedit/' . $this->input->post('id'));
                }
            } else {
                error($this->lang->line('update_failed'));               
                $this->data['section'] = $this->exam->get_single('exam_sections', array('id' => $this->input->post('id')));
            }
        }


        

        if ($id) {
            $this->data['section'] = $this->exam->get_single('exam_sections', array('id' => $id));

            if (!$this->data['section']) {
                redirect('exam/sectionlist');
            }
        }

        $this->data['sections'] = $this->exam->get_section_list($this->data['section']->school_id, $this->data['section']->academic_year_id);
        $this->data['school_id'] = $this->data['section']->school_id;
        $this->data['exam_type_id'] = $this->data['section']->exam_type_id;
        $this->data['filter_school_id'] = $this->data['section']->school_id;
        $this->data['schools'] = $this->schools;
        
        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
        $this->layout->view('section/index', $this->data);

    }

    
    /*****************Function view**********************************
    * @type            : Function
    * @function name   : view
    * @description     : Load user interface with specific exam term data                 
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function view($id = null) {

        check_permission(VIEW);
        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('exam/index');
        }
        
        $this->data['exams'] = $this->exam->get_exam_list();
        $this->data['exam'] = $this->exam->get_single_exam($id);
        $this->data['detail'] = TRUE;
        $this->layout->title($this->lang->line('view') . ' ' . $this->lang->line('exam_term') . ' | ' . SMS);
        $this->layout->view('exam/index', $this->data);
    }





    
    /*****************Function _prepare_exam_validation**********************************
    * @type            : Function
    * @function name   : _prepare_exam_validation
    * @description     : Process "exam term" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _prepare_exam_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

        $this->form_validation->set_rules('exam_type_id', 'Exam Type', 'trim|required');
        $this->form_validation->set_rules('exam_sub_type_id', 'Exam Sub Type', 'trim|required');
        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');
        $this->form_validation->set_rules('title', $this->lang->line('exam_title'), 'trim|required|callback_title');
        $this->form_validation->set_rules('start_date', $this->lang->line('start_date'), 'trim|required');
        $this->form_validation->set_rules('note', $this->lang->line('note'), 'trim');
    }


    private function _prepare_examsubtype_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');
        $this->form_validation->set_rules('title', $this->lang->line('exam_title'), 'trim|required|callback_title');
        $this->form_validation->set_rules('title', 'Exam Sub Type', 'trim|required');
        $this->form_validation->set_rules('note', $this->lang->line('note'), 'trim');
    }


    private function _prepare_examtype_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');
        $this->form_validation->set_rules('title', 'Exam Type', 'trim|required');
        $this->form_validation->set_rules('note', $this->lang->line('note'), 'trim');
    }

    private function _prepare_section_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');
        $this->form_validation->set_rules('title', 'Section', 'trim|required');
        $this->form_validation->set_rules('note', $this->lang->line('note'), 'trim');
    }

    
    /*****************Function title**********************************
    * @type            : Function
    * @function name   : title
    * @description     : Unique check for "Exam term title" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function title() {
        
        $school_id = $this->input->post('school_id');
        $school = $this->exam->get_school_by_id($school_id); 
        
        if ($this->input->post('id') == '') {
            $exam = $this->exam->duplicate_check($school_id, $school->academic_year_id, $this->input->post('title'));
            if ($exam) {
                $this->form_validation->set_message('title', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $exam = $this->exam->duplicate_check($school_id, $school->academic_year_id, $this->input->post('title'), $this->input->post('id'));
            if ($exam) {
                $this->form_validation->set_message('title', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    
    /*****************Function _get_posted_exam_data**********************************
    * @type            : Function
    * @function name   : _get_posted_exam_data
    * @description     : Prepare "Exam term" user input data to save into database                  
    *                       
    * @param           : null
    * @return          : $data array(); value 
    * ********************************************************** */
    private function _get_posted_exam_data() {

        $items = array();
        $items[] = 'school_id';
        $items[] = 'title';
        $items[] = 'note';
        $items[] = 'exam_type_id';
        $items[] = 'exam_sub_type_id';

        $data = elements($items, $_POST);

        $data['start_date'] = date('Y-m-d', strtotime($this->input->post('start_date')));

        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            
            $school = $this->exam->get_school_by_id($data['school_id']);
            
            
            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('exam/index');
            }
        
            $data['academic_year_id'] = $school->academic_year_id;
            
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
        }

        return $data;
    }

    private function _get_posted_examsubtype_data() {

        $items = array();
        $items[] = 'school_id';
        $items[] = 'title';
        $items[] = 'exam_type_id';
        $items[] = 'note';
        $data = elements($items, $_POST);


        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            
            $school = $this->exam->get_school_by_id($data['school_id']);
            
            
            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('exam/index');
            }
        
            $data['academic_year_id'] = $school->academic_year_id;
            
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
        }

        return $data;
    }


    private function _get_posted_examtype_data() {

        $items = array();
        $items[] = 'school_id';
        $items[] = 'title';
        $items[] = 'note';
        $data = elements($items, $_POST);


        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            
            $school = $this->exam->get_school_by_id($data['school_id']);
            
            
            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('exam/index');
            }
        
            $data['academic_year_id'] = $school->academic_year_id;
            
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
        }

        return $data;
    }




    private function _get_posted_section_data() {

        $items = array();
        $items[] = 'school_id';
        $items[] = 'title';
        $items[] = 'note';
        $data = elements($items, $_POST);


        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();

        } else {
            
            $school = $this->exam->get_school_by_id($data['school_id']);
            
            
            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('exam/index');
            }
        
            $data['academic_year_id'] = $school->academic_year_id;
            
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
        }

        return $data;
    }

    
    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "Exam Term" from database                  
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function delete($id = null) {

        check_permission(DELETE);

         if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('exam/index');
        }
        
        $exam = $this->exam->get_single('exams', array('id' => $id));
        
        if ($this->exam->delete('exams', array('id' => $id))) {            
            
            create_log('Has been deleted an Exam : '.$exam->title); 
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('exam/index');
    }



    public function subtypedelete($id = null) {

        check_permission(DELETE);

         if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('exam/examsubtypelist');
        }
        
        $exam = $this->exam->get_single('exam_sub_types', array('id' => $id));
        
        if ($this->exam->delete('exam_sub_types', array('id' => $id))) {            
            
            create_log('Has been deleted an Exam sub type: '.$exam->title); 
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('exam/examsubtypelist');
    }


    public function typedelete($id = null) {

        check_permission(DELETE);

         if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('exam/examtypelist');
        }
        
        $exam = $this->exam->get_single('exam_types', array('id' => $id));
        
        if ($this->exam->delete('exam_types', array('id' => $id))) {            
            
            create_log('Has been deleted an Exam type: '.$exam->title); 
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('exam/examtypelist');
    }

}
