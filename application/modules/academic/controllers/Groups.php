<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Groups extends MY_Controller {

    public $data = array();
    
    
    function __construct() {
        parent::__construct();
        $this->load->model('Groups_Model', 'groups', true);
       
    }

    
    /*****************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : load "group listing" in user interface
     *                       
     * @param           : null 
     * @return          : null 
     * ********************************************************** */
    public function index($school_id = null) {
        $this->output->delete_cache();
       
        check_permission(VIEW);
       
        $this->data['groups'] = $this->groups->get_group_list($school_id);  
     
        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');        
            $this->data['teachers'] = $this->groups->get_list('teachers', $condition, '','', '', 'id', 'ASC');
        }   
        
        $this->data['filter_school_id'] = $school_id;
        $this->data['schools'] = $this->schools;
       
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_group'). ' | ' . SMS);
        
        $this->layout->view('group/index', $this->data);            
       
    }

     /*****************Function add**********************************
     * @type            : Function
     * @function name   : add
     * @description     : load "add new group" user interface and 
                          process to save "new group" into database
     *                       
     * @param           : null 
     * @return          : null 
     * ********************************************************** */
    public function add() {
        
        check_permission(ADD);
        
        if ($_POST) {
          
            $this->_prepare_group_validation();
           
            if ($this->form_validation->run() === TRUE) {
              
                $data = $this->_get_posted_group_data();

                $insert_id = $this->groups->insert('groups', $data);
                if ($insert_id) {
                    
                    create_log('Has been created a group :'.$data['name']);
                    
                    success($this->lang->line('insert_success'));
                    $this->__create_default_section($insert_id);
                    redirect('academic/groups/index/'.$data['school_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('academic/groups/add');
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }

        $this->data['groups'] = $this->groups->get_group_list();      
        
        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');        
            $this->data['teachers'] = $this->groups->get_list('teachers', $condition, '','', '', 'id', 'ASC');
        }        
        $this->data['schools'] = $this->schools;
        
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add'). ' | ' . SMS );
        $this->layout->view('group/index', $this->data);
    }

     /*****************Function edit**********************************
     * @type            : Function
     * @function name   : edit
     * @description     : load "update group" user interface and
                          process to update "group" into database 
     *                       
     * @param           : $id integetr value 
     * @return          : null 
     * ********************************************************** */
    public function edit($id = null) {       
       
        check_permission(EDIT);
        
        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
           redirect('academic/groups/index');  
        }
        
        if ($_POST) {
          
            $this->_prepare_group_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_group_data();
                $updated = $this->groups->update('groups', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    
                    create_log('Has been updated a group :'.$data['name']);
                    
                    success($this->lang->line('update_success'));
                    redirect('academic/groups/index/'.$data['school_id']);                   
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('academic/groups/edit/' . $this->input->post('id'));
                }
            } else {
                 error($this->lang->line('update_failed'));
                $this->data['group'] = $this->groups->get_single('groups', array('id' => $this->input->post('id')));
            }
        }
        
        if ($id) {
            $this->data['group'] = $this->groups->get_single('groups', array('id' => $id));

            if (!$this->data['group']) {
                 redirect('academic/groups/index');
            }
        }

        $this->data['groups'] = $this->groups->get_group_list($this->data['group']->school_id);   
        
        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');        
            $this->data['teachers'] = $this->groups->get_list('teachers', $condition, '','', '', 'id', 'ASC');
        } 
        
        $this->data['school_id'] = $this->data['group']->school_id;
        $this->data['filter_school_id'] = $this->data['group']->school_id;
        $this->data['schools'] = $this->schools;
        
        $this->data['edit'] = TRUE;       
        $this->layout->title($this->lang->line('edit').' | ' . SMS );
        $this->layout->view('group/index', $this->data);
    }

    /*****************Function _prepare_group_validation**********************************
     * @type            : Function
     * @function name   : _prepare_group_validation
     * @description     : Process "group" user input data validation
     *                       
     * @param           : null 
     * @return          : null 
     * ********************************************************** */
    private function _prepare_group_validation() {
       
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div group="error-message" style="color: red;">', '</div>');
        
        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');   
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|callback_name');
        
    }
    
    /*****************Function name**********************************
     * @type            : Function
     * @function name   : name
     * @description     : unique check for "group name"
     *                       
     * @param           : null 
     * @return          : boolean true/flase 
     * ********************************************************** */
    public function name()
   {             
   
      if($this->input->post('id') == '')
      {   
          $name = $this->groups->duplicate_check($this->input->post('school_id'), $this->input->post('name')); 
          
          if($name){
                $this->form_validation->set_message('name', $this->lang->line('already_exist'));         
                return FALSE;
          } else {
              return TRUE;
          }          
      }else if($this->input->post('id') != ''){   
         $name = $this->groups->duplicate_check($this->input->post('school_id'), $this->input->post('name'), $this->input->post('id')); 
          if($name){
                $this->form_validation->set_message('name', $this->lang->line('already_exist'));         
                return FALSE;
          } else {
              return TRUE;
          }
      }   
   }


     /*****************Function _get_posted_group_data**********************************
     * @type            : Function
     * @function name   : _get_posted_group_data
     * @description     : Prepare "group" user input data to save into database 
     *                       
     * @param           : null 
     * @return          : $data array() value 
     * ********************************************************** */
    private function _get_posted_group_data() {

        $items = array();
        $items[] = 'school_id';
        $items[] = 'name';
        $items[] = 'note';
        $data = elements($items, $_POST);        
        
        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
                       
        }

        return $data;
    }

    
     /*****************Function delete**********************************
     * @type            : Function
     * @function name   : delete
     * @description     : delete "group" data from database
     *                       
     * @param           : $id integer value
     * @return          : null 
     * ********************************************************** */
    public function delete($id = null) {
        
        check_permission(DELETE);
        
        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('academic/groups/index');    
        }
        
        $group = $this->groups->get_single('groups', array('id' => $id));
        
        if ($this->groups->delete('groups', array('id' => $id))) {

            create_log('Has been deleted a group : '. $group->name);            
            success($this->lang->line('delete_success'));
            
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('academic/groups/index/'.$group->school_id);
    }
    
    /*****************Function __create_default_section**********************************
     * @type            : Function
     * @function name   : __create_default_section
     * @description     : create default section while create a new group
     *                       
     * @param           : $insert_id integer value
     * @return          : null 
     * ********************************************************** */
    private function __create_default_section($insert_id){
        
       
        $data = array();
        $data['school_id']  = $this->input->post('school_id');
        $data['group_id']    = $insert_id;
        // $data['teacher_id']  = $this->input->post('teacher_id');
        $data['name']       = 'A';
        $data['note']       = 'Default Section';
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
        $data['status']     = 1; 
        $this->groups->insert('sections', $data);
    }

}
