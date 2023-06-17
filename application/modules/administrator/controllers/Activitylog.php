<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Activitylog.php**********************************
 * @product name    : Global School Management System Pro
 * @type            : Class
 * @class name      : Activitylog
 * @description     : Manage activity log.  
 * @author          : makemaya Team 	
 * @url             : https://educlouds.app/      
 * @support         : aniltomar95@gmail.com	
 * @copyright       : makemaya Team	 	
 * ********************************************************** */

class Activitylog extends MY_Controller {

   public function __construct() {
        parent::__construct();
                
        $this->load->model('Administrator_Model', 'administrator', true);
        $this->data['roles'] = $this->administrator->get_list('roles', array('status' => 1, 'is_super_admin'=> 0), '','', '', 'id', 'ASC');
        if($this->session->userdata('school_id') != '0'){
            $this->data['roles'] = $this->administrator->get_list('roles', array('status' => 1, 'is_super_admin'=> 0, 'school_id' => $this->session->userdata('school_id')), '','', '', 'id', 'ASC');

        }    
    }

    public $data = array();

   

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
        
        $this->data['users'] = '';
        $role_id = '';
        $class_id = '';
        $user_id = '';
        $school_id = '';
        
       
         if ($_POST) {
             
            $role_id  = $this->input->post('role_id');
            $class_id = $this->input->post('class_id');
            $user_id  = $this->input->post('user_id');             
            $school_id  = $this->input->post('school_id');             
         }
        
        $this->data['role_id'] = $role_id;
        $this->data['class_id'] = $class_id;
        $this->data['user_id'] = $user_id;
        $this->data['school_id'] = $school_id;
      
        if($this->session->userdata('role_id') == STUDENT){ 
           $this->data['activity_logs'] = $this->administrator->get_activity_log($this->session->userdata('school_id'), $this->session->userdata('role_id'), $class_id, $this->session->userdata('id'));
        }elseif($this->session->userdata('role_id') == TEACHER){ 
            if ($role_id == TEACHER) {
                $this->data['activity_logs'] = $this->administrator->get_activity_log($this->session->userdata('school_id'), $this->session->userdata('role_id'), $class_id, $user_id);

            }else{
                $this->data['activity_logs'] = $this->administrator->get_activity_log($this->session->userdata('school_id'), $role_id, $class_id, $user_id);

            }
        }elseif($this->session->userdata('role_id') == GUARDIAN){ 
            $this->data['activity_logs'] = $this->administrator->get_activity_log($this->session->userdata('school_id'), $this->session->userdata('role_id'), $class_id, $user_id);
        }elseif($this->session->userdata('role_id') == ADMIN){ 
         
            $this->data['activity_logs'] = $this->administrator->get_activity_log($this->session->userdata('school_id'), $role_id, $class_id, $user_id);

        }elseif($this->session->userdata('role_id') == SUPER_ADMIN){ 
            $this->data['activity_logs'] = $this->administrator->get_activity_log($school_id, $role_id, $class_id, $user_id);
        }else{
            $this->data['activity_logs'] = $this->administrator->get_activity_log($this->session->userdata('school_id'), $role_id, $class_id, $user_id);

        }

       
        
        $this->layout->title($this->lang->line('manage_activity_log'). ' | ' . SMS);
        $this->layout->view('log/index', $this->data); 
    }
    
    
     
    /*****************Function delete**********************************
     * @type            : Function
     * @function name   : delete
     * @description     : delete "Activity log" from database                  
     *                       
     * @param           : $id integer value
     * @return          : null 
     * ********************************************************** */
    public function delete($id = null) {
        
        check_permission(DELETE);
        
        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
            redirect('administrator/activitylog/index');   
        } 
        
        if ($this->administrator->delete('activity_logs', array('id' => $id))) {
            
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
       redirect('administrator/activitylog/index'); 
    }

    
    /*****************Function multidelete**********************************
     * @type            : Function
     * @function name   : multidelete
     * @description     : multidelete "Activity log" from database                  
     *                       
     * @param           : 
     * @return          : null 
     * ********************************************************** */
    public function multidelete() {
        
        check_permission(DELETE);    
        
        if($this->input->post('log')){
            foreach($this->input->post('log') as $key=>$value){
                
                $this->administrator->delete('activity_logs', array('id' => $key));
            }
            
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('administrator/activitylog/index'); 
    }

}
