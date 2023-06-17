<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Routine.php**********************************
 * @product name    : Educlouds
 * @type            : Class
 * @class name      : Routine
 * @description     : Manage academic class routine time schedule.  
 * @author          : makemaya Team 	
 * @url             : https://educlouds.app/      
 * @support         : aniltomar95@gmail.com	
 * @copyright       : makemaya Team	 	
 * ********************************************************** */

class Routine extends MY_Controller {

    public $data = array();
    
    
    function __construct() {
        parent::__construct();    
        $this->load->model('Routine_Model', 'routine', true);            
        
    }

    
    /*****************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : Load "Class routine" user interface                 
     *                    with section wise routine    
     * @param           : $class_id integer value
     * @return          : null 
     * ********************************************************** */
    public function index($class_id = null) {
        
        check_permission(VIEW);
        
        
        if(logged_in_role_id() == STUDENT){
            $class_id = $this->session->userdata('class_id');
            $section_id = $this->session->userdata('section_id');
        }
        
        
        if(isset($class_id) && !is_numeric($class_id)){
            error($this->lang->line('unexpected_error'));
            redirect('academic/routine/index');
        }
        
        $this->data['class_id'] = $class_id;
         
        
        // for super admin 
        $school_id = '';        
        if($_POST){
            
            $school_id  = $this->input->post('school_id');
            $this->data['filter_school_id'] = $school_id;
            $class_id   = $this->input->post('class_id');;
            $this->data['filter_class_id']  = $class_id;            
            $this->data['school'] = $this->routine->get_school_by_id($school_id);
        }else{
           $class = $this->routine->get_single('classes', array('id' => $class_id));  
           $school_id = @$class->school_id;
           $this->data['filter_school_id'] = $school_id;
        }
        
        
        $this->data['sections'] = $this->routine->get_section_list($class_id, $school_id); 
        $this->data['single_class'] = $this->routine->get_single('classes', array('id' => $class_id));      
        
        $condition = array();
        
        $condition['status'] = 1;  
        
        if($this->session->userdata('role_id') != SUPER_ADMIN){ 
                        
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->routine->get_list('classes', $condition, '','', '', 'id', 'ASC');
            $this->data['teachers'] = $this->routine->get_list('teachers', $condition, '','', '', 'id', 'ASC');
            $this->data['class_list'] = $this->routine->get_list('classes', $condition, '','', '', 'id', 'ASC');
            $school_id = $condition['school_id'];
        }
        
        if($school_id){
            $condition['school_id'] = $school_id; 
            $this->data['class_list'] = $this->routine->get_list('classes', $condition, '','', '', 'id', 'ASC');
        }
        
        $this->data['school'] = $this->routine->get_school_by_id($school_id);
        
        
        $this->data['schools'] = $this->schools;
        
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_routine'). ' | ' . SMS);
         if($this->session->userdata('role_id') == TEACHER){ 
           
           
            $this->layout->view('routine/teacher', $this->data); 
        }elseif($this->session->userdata('role_id') == STUDENT){ 
           
           
            $this->layout->view('routine/student', $this->data); 
        }else{
            $this->layout->view('routine/index', $this->data);             
        }      
    }




        public function change_teacher_subject_rooms()
        {
            $data[$_POST['type']] = $_POST['vals'];
            $update_id = $_POST['update_id'];
            $updated = $this->routine->update('routines',  $data,  array('id' => $update_id));

            if($updated){
                echo TRUE;
            }
            

        }

    
     /*****************Function add**********************************
     * @type            : Function
     * @function name   : add
     * @description     : Load "Add new Class Routine" user interface                 
     *                    and store "Class Routine" into database 
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function add() {
        check_permission(ADD);  
        
        // if($this->session->userdata('role_id') != SUPER_ADMIN){  
        //     $routinesschool =  $this->db->get_where('routines', ['school_id'=> $this->session->userdata('school_id')])->row();
        //     if($routinesschool){
        //         error('Data Already Exist');
        //         redirect('academic/routine/index/');
        //     }
        // }

        if ($_POST) {   

            // $routinesschool =  $this->db->get_where('routines', ['school_id'=> $_POST['school_id']])->row();
            // if($routinesschool){
            //     error('Data Already Exist');
            //     redirect('academic/routine/index/');
            // }           

            $this->_prepare_routine_validation();
            if ($this->form_validation->run() === TRUE) {
             $data = $this->_get_posted_routine_data();
                
                $school = $this->routine->get_school_by_id($_POST['school_id']);
                $classes = $this->routine->get_class_by_school_id($_POST['school_id']);
                $insert_id = 1;
                if(count($_POST['period']) > 0){
                    foreach ($_POST['period'] as $key => $value) {
                        $types = get_week_days(); 
                        foreach($types as $keydays=>$valuedays){
                            foreach($classes as $keyclass=>$valueclass){
                                $sections = $this->routine->get_section_by_class_id($_POST['school_id'], $valueclass->id);
                                foreach ($sections as $keysection => $valuesection) {                                    
                                    $data1['school_id'] = $_POST['school_id'];                    
                                    $data1['name_duration'] = $_POST['name_duration'];                    
                                    $data1['academic_year_id'] = $school->academic_year_id;                    
                                    $data1['day'] = $keydays;                    
                                    $data1['class_id'] = $valueclass->id;                    
                                    $data1['section_id'] = $valuesection->id;                    
                                    $data1['period'] = $value;                    
                                    $data1['start_time'] = $_POST['start_time'][$key];                    
                                    $data1['end_time'] = $_POST['end_time'][$key];                    
                                    $data1['status'] = 1;
                                    $data1['modified_at'] = date('Y-m-d H:i:s');
                                    $data1['modified_by'] = logged_in_user_id();  
                                    $data1['created_at'] = date('Y-m-d H:i:s');
                                    $data1['created_by'] = logged_in_user_id();
                                    $insert_id = $this->routine->insert('routines', $data1);
                                    // echo $this->db->last_query();
                                    // die;
                                }
                            }
                        }

                    }
                }
                // die;

                if ($insert_id) {
                    
                    $class = $this->routine->get_single('classes', array('id' => $data['class_id'], 'school_id'=>$data['school_id']));
                    create_log('Has been created a routine for class : '. $class->name);
                    
                    success($this->lang->line('insert_success'));
                    redirect('academic/routine/index/'.$data['class_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('academic/routine/add');
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }
        
        $school_id = '';
        $class_id = $this->uri->segment(4);
        if(!$class_id){
          $class_id = $this->input->post('class_id');
          $school_id = $this->input->post('school_id');
        }
        
        $this->data['class_id'] = $class_id;
        $this->data['sections'] = $this->routine->get_section_list($class_id); 
        $this->data['single_class'] = $this->routine->get_single('classes', array('id' => $class_id)); 
                
        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->routine->get_list('classes', $condition, '','', '', 'id', 'ASC');
            $this->data['teachers'] = $this->routine->get_list('teachers', $condition, '','', '', 'id', 'ASC');
            $this->data['class_list'] = $this->routine->get_list('classes', $condition, '','', '', 'id', 'ASC');
            $school_id = $condition['school_id'];
        }
        
        $this->data['school'] = $this->routine->get_school_by_id($school_id);
        
        $this->data['schools'] = $this->schools;
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add'). ' | ' . SMS);
        $this->layout->view('routine/index', $this->data);
    }

     /*****************Function edit**********************************
     * @type            : Function
     * @function name   : edit
     * @description     : Load Update "Class Routine" user interface                 
     *                    with populated "class routine" value 
     *                    and update "Class routine" database    
     * @param           : $id integer value
     * @return          : null 
     * ********************************************************** */
    public function edit($id = null) {       
       
        check_permission(EDIT);
        
        // if(!is_numeric($id)){
        //     error($this->lang->line('unexpected_error'));
        //     redirect('academic/routine/index');     
        // }


           // print_r($_POST);
        
        if ($_POST) {
            $this->_prepare_routine_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_routine_data();


                $school = $this->routine->get_school_by_id($_POST['school_id']);
                $classes = $this->routine->get_class_by_school_id($_POST['school_id']);
              
                    if(isset($_POST['period']) && count($_POST['period']) > 0){
                        foreach ($_POST['period'] as $key => $value) {
                           
                                       
                        $data1['start_time'] = $_POST['start_time'][$key];                    
                        $data1['end_time'] = $_POST['end_time'][$key];      
                        
                        $updated = $this->routine->update('routines', $data1, array('period' => $value, 'school_id'=>$_POST['school_id']));  
                        echo $this->db->last_query();                                 
    
    
                        }
                    }
                                
              

             
                $updated = '1';

                if ($updated) {
                    
                    $class = $this->routine->get_single('classes', array('id' => $data['class_id'], 'school_id'=>$data['school_id']));
                    create_log('Has been updated a routine for class : '. $class->name);
                    
                    success($this->lang->line('update_success'));
                    redirect('academic/routine/index/'.$data['class_id']);                   
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('academic/routine/edit/' . $this->input->post('id'));
                }
            } else {
                error($this->lang->line('update_failed'));
                $this->data['routine'] = $this->routine->get_single('routines', array('id' => $this->input->post('id')));
            }
        }
        
        if ($id) {
            $this->data['routine'] = $this->db->get_where('routines', array('school_id' => $id))->result();

            if (!$this->data['routine']) {
                 redirect('academic/routine/index');
            }
        }
        
       
        $mainschool_id = $id;
        $school_id = $id;
        $class_id = $this->uri->segment(4);
        if(!$class_id){
          $class_id = $this->input->post('class_id');
          $school_id = $this->input->post('school_id');
        }
        
        $this->data['mainschool_id'] = $mainschool_id;
        $this->data['school_id'] = $school_id;
        $this->data['class_id'] = $class_id;
        $this->data['sections'] = $this->routine->get_section_list($class_id); 
        $this->data['single_class'] = $this->routine->get_single('classes', array('id' => $class_id)); 
                
        $condition = array();
        $condition['status'] = 1;  
              
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->routine->get_list('classes', $condition, '','', '', 'id', 'ASC');
            $this->data['teachers'] = $this->routine->get_list('teachers', $condition, '','', '', 'id', 'ASC');
            $this->data['class_list'] = $this->routine->get_list('classes', $condition, '','', '', 'id', 'ASC');
            $school_id = $condition['school_id'];
        }
        
        
        $this->data['school'] = $this->routine->get_school_by_id($school_id);
        
        $this->data['schools'] = $this->schools;
       
        
        $this->data['edit'] = TRUE;       
        $this->layout->title($this->lang->line('edit'). ' | ' . SMS);
        $this->layout->view('routine/index', $this->data);
    }

    
    /*****************Function _prepare_routine_validation**********************************
     * @type            : Function
     * @function name   : _prepare_routine_validation
     * @description     : Process "Class Routine" user input data validation                 
     *                       
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    private function _prepare_routine_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
        
        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');   
        // $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim|required');   
        // $this->form_validation->set_rules('section_id', $this->lang->line('section'), 'trim|required');   
        // $this->form_validation->set_rules('subject_id', $this->lang->line('subject'), 'trim|required|callback_subject_id');   
        // $this->form_validation->set_rules('teacher_id', $this->lang->line('teacher'), 'trim|required|callback_teacher_id');   
        // $this->form_validation->set_rules('day', $this->lang->line('day'), 'trim|required');   
        // $this->form_validation->set_rules('period', 'Period', 'trim|required');   
        // $this->form_validation->set_rules('start_time', $this->lang->line('start_time'), 'trim|required');   
        // $this->form_validation->set_rules('end_time', $this->lang->line('end_time'), 'trim|required');   
        // $this->form_validation->set_rules('room_no', $this->lang->line('room_no'), 'trim|required|callback_room_no');
    }
    
    
    /*****************Function subject_id**********************************
     * @type            : Function
     * @function name   : subject_id
     * @description     : Unique check for "Subject" data/value                  
     *                       
     * @param           : null
     * @return          : boolean true/false 
     * ********************************************************** */ 
   public function subject_id()
   {             
      if($this->input->post('id') == '')
      {   
          $condition = array(
              'school_id'=> $this->input->post('school_id'),
              'section_id'=> $this->input->post('section_id'),
              'subject_id'=> $this->input->post('subject_id'),
              'day'=> $this->input->post('day')
          );
          $routine = $this->routine->duplicate_routine($condition);          
          if($routine){
                $this->form_validation->set_message('subject_id', $this->lang->line('already_exist'));         
                return FALSE;
          } else {
              return TRUE;
          }          
      }else if($this->input->post('id') != ''){  
          
          $condition = array(
              'school_id'=> $this->input->post('school_id'),
              'section_id'=> $this->input->post('section_id'),
              'subject_id'=> $this->input->post('subject_id'),
              'day'=> $this->input->post('day')
          );
          $routine = $this->routine->duplicate_routine($condition, $this->input->post('id'));
          
          if($routine){
                $this->form_validation->set_message('subject_id', $this->lang->line('already_exist'));         
                return FALSE;
          } else {
              return TRUE;
          }
      }     
   }
   
   
     /*****************Function teacher_id**********************************
     * @type            : Function
     * @function name   : teacher_id
     * @description     : Unique check for "teacher" data/value                  
     *                       
     * @param           : null
     * @return          : boolean true/false 
     * ********************************************************** */ 
   public function teacher_id()
   {             
      if($this->input->post('id') == '')
      {   
          $condition = array(
              'school_id'=> $this->input->post('school_id'),
              'teacher_id'=> $this->input->post('teacher_id'),
              'day'=> $this->input->post('day'),
              'start_time'=> $this->input->post('start_time'),
          );
          $routine = $this->routine->duplicate_routine($condition); 
          if($routine){
                $this->form_validation->set_message('teacher_id', $this->lang->line('already_exist'));         
                return FALSE;
          } else {
              return TRUE;
          }          
      }else if($this->input->post('id') != ''){  
          
          $condition = array(
              'school_id'=> $this->input->post('school_id'),
              'teacher_id'=> $this->input->post('teacher_id'),
              'day'=> $this->input->post('day'),
              'start_time'=> $this->input->post('start_time')             
          );
          $routine = $this->routine->duplicate_routine($condition, $this->input->post('id'));
          
          if($routine){
                $this->form_validation->set_message('teacher_id', $this->lang->line('already_exist'));         
                return FALSE;
          } else {
              return TRUE;
          }
      }     
   }
   
   
    /*****************Function room_no**********************************
     * @type            : Function
     * @function name   : room_no
     * @description     : Unique check for "room_no" data/value                  
     *                       
     * @param           : null
     * @return          : boolean true/false 
     * ********************************************************** */ 
   public function room_no()
   {             
      if($this->input->post('id') == '')
      {   
          $condition = array(
              'school_id'=> $this->input->post('school_id'),
              'room_no'=> $this->input->post('room_no'),
              'day'=> $this->input->post('day'),
              'start_time'=> $this->input->post('start_time'),
          );
          $routine = $this->routine->duplicate_routine($condition); 
          if($routine){
                $this->form_validation->set_message('room_no', $this->lang->line('this_room_already_allocated'));         
                return FALSE;
          } else {
              return TRUE;
          }          
      }else if($this->input->post('id') != ''){  
          
          $condition = array(
              'school_id'=> $this->input->post('school_id'),
              'room_no'=> $this->input->post('room_no'),
              'day'=> $this->input->post('day'),
              'start_time'=> $this->input->post('start_time')            
          );
          $routine = $this->routine->duplicate_routine($condition, $this->input->post('id'));
          
          if($routine){
                $this->form_validation->set_message('room_no', $this->lang->line('this_room_already_allocated'));         
                return FALSE;
          } else {
              return TRUE;
          }
      }     
   }
   
   
     /*****************Function _get_posted_routine_data**********************************
     * @type            : Function
     * @function name   : _get_posted_routine_data
     * @description     : Prepare "Class Routine" user input data to save into database                  
     *                       
     * @param           : null
     * @return          : $data array(); value 
     * ********************************************************** */ 
    private function _get_posted_routine_data() {

        $items = array();
        $items[] = 'school_id';
        // $items[] = 'class_id';
        // $items[] = 'section_id';
        // $items[] = 'subject_id';
        // $items[] = 'teacher_id';
        // $items[] = 'day';
        $items[] = 'start_time';
        $items[] = 'end_time';
        // $items[] = 'room_no';
        
        $data = elements($items, $_POST);        
        
        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            
            $school = $this->routine->get_school_by_id($data['school_id']);        
            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('academic/routine/index'); 
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
     * @description     : delete "Class Routine" from database                  
     *                       
     * @param           : $id, $class_id integer value
     * @return          : null 
     * ********************************************************** */
    public function delete_period($period = null, $school_id = null) {
        
        // check_permission(DELETE);
        
        // if(!is_numeric($id)){
        //     error($this->lang->line('unexpected_error'));
        //     redirect('academic/routine/index');  
        // }
        
        $routine = $this->routine->get_single('routines', array('period' => $period, 'school_id' => $school_id));
        
        if ($this->routine->delete('routines', array('period' => $period, 'school_id' => $school_id))) { 
            
            // $class = $this->routine->get_single('classes', array('id' => $routine->class_id, 'school_id'=>$routine->school_id));
            // create_log('Has been delete a routine for class : '. $class->name);
            
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('academic/routine/index'); 
    }  



    public function delete($id = null) {
        
        check_permission(DELETE);
        
        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
            redirect('academic/routine/index');  
        }
        
        $routine = $this->routine->get_single('routines', array('id' => $id));
        
        if ($this->routine->delete('routines', array('id' => $id))) { 
            
            $class = $this->routine->get_single('classes', array('id' => $routine->class_id, 'school_id'=>$routine->school_id));
            create_log('Has been delete a routine for class : '. $class->name);
            
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('academic/routine/index/'.$routine->class_id);
    }  

}
