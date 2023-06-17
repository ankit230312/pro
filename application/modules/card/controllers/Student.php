<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Student.php**********************************
 * @product name    : Educlouds
 * @type            : Class
 * @class name      : Generate
 * @description     : Manage all type of system student listing.  
 * @author          : makemaya Team 	
 * @url             : https://educlouds.app/      
 * @support         : aniltomar95@gmail.com	
 * @copyright       : makemaya Team	 	
 * ********************************************************** */

class Student extends MY_Controller {

    public $data = array();
      
   public function __construct() {
        parent::__construct();
                
        $this->load->model('Student_Model', 'student', true);                
    }

  

   

    /*****************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : Load user filtering interface                 
     *                      
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function index(){
        
        
        check_permission(VIEW);
        
        $this->data['students'] = '';
        
        if ($this->session->userdata('role_id') == STUDENT) {
            $this->data['class_id'] = $this->session->userdata('class_id');
            $this->data['section_id'] = $this->session->userdata('section_id');
            $this->data['student_id'] = $this->session->userdata('profile_id');
        }
        
         if ($_POST) {
             
            $school_id = $this->input->post('school_id'); 
            $class_id = $this->input->post('class_id'); 
            $section_id = $this->input->post('section_id'); 
            $student_id = $this->input->post('student_id');            
            $this->data['school'] = $this->student->get_school_by_id($school_id);
            
            $this->data['cards'] = $this->student->get_student_list($school_id, $class_id, $section_id, $student_id, $this->data['school']->academic_year_id);
            $this->data['setting'] = $this->student->get_single('id_card_settings', array('school_id'=>$school_id));
            $this->data['school_id'] = $school_id;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;
            $this->data['student_id'] = $student_id;         
            
         }
         
        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id'); 
            if ($this->session->userdata('role_id') == STUDENT) {
                $condition['id'] = $this->session->userdata('class_id');             
            }            
            $this->data['classes'] = $this->student->get_list('classes', $condition, '','', '', 'id', 'ASC');
        }
        
        $this->layout->title($this->lang->line('generate_student_id_card') .' | ' . SMS);
        $this->layout->view('student/index', $this->data);         
    } 
}
