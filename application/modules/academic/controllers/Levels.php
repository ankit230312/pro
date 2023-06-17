<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Levels extends MY_Controller {

    public $data = array();
    
    
    function __construct() {
        parent::__construct();
        $this->load->model('Levels_Model', 'levels', true);
       
    }

    
    /*****************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : load "level listing" in user interface
     *                       
     * @param           : null 
     * @return          : null 
     * ********************************************************** */
    public function index($school_id = null) {
        $this->output->delete_cache();
       
        check_permission(VIEW);
       
        $this->data['levels'] = $this->levels->get_level_list($school_id);  
     
        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');        
            $this->data['groups'] = $this->levels->get_list('groups', $condition, '','', '', 'id', 'ASC');
        }   
        
        $this->data['filter_school_id'] = $school_id;
        $this->data['schools'] = $this->schools;
       
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_level'). ' | ' . SMS);
        
        $this->layout->view('level/index', $this->data);            
       
    }

     /*****************Function add**********************************
     * @type            : Function
     * @function name   : add
     * @description     : load "add new level" user interface and 
                          process to save "new level" into database
     *                       
     * @param           : null 
     * @return          : null 
     * ********************************************************** */
    public function add() {
        
        check_permission(ADD);
        
        if ($_POST) {
          
            $this->_prepare_level_validation();
           
            if ($this->form_validation->run() === TRUE) {
              
                $data = $this->_get_posted_level_data();

                $insert_id = $this->levels->insert('levels', $data);
                if ($insert_id) {
                    
                    create_log('Has been created a level :'.$data['name']);
                    
                    success($this->lang->line('insert_success'));
                    $this->__create_default_section($insert_id);
                    redirect('academic/levels/index/'.$data['school_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('academic/levels/add');
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }

        $this->data['levels'] = $this->levels->get_level_list();      
        
        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');        
            $this->data['groups'] = $this->levels->get_list('groups', $condition, '','', '', 'id', 'ASC');
        }        
        $this->data['schools'] = $this->schools;
        
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add'). ' | ' . SMS );
        $this->layout->view('level/index', $this->data);
    }

     /*****************Function edit**********************************
     * @type            : Function
     * @function name   : edit
     * @description     : load "update level" user interface and
                          process to update "level" into database 
     *                       
     * @param           : $id integetr value 
     * @return          : null 
     * ********************************************************** */
    public function edit($id = null) {       
       
        check_permission(EDIT);
        
        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
           redirect('academic/levels/index');  
        }
        
        if ($_POST) {
          
            $this->_prepare_level_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_level_data();
                $updated = $this->levels->update('levels', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    
                    create_log('Has been updated a level :'.$data['name']);
                    
                    success($this->lang->line('update_success'));
                    redirect('academic/levels/index/'.$data['school_id']);                   
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('academic/levels/edit/' . $this->input->post('id'));
                }
            } else {
                 error($this->lang->line('update_failed'));
                $this->data['level'] = $this->levels->get_single('levels', array('id' => $this->input->post('id')));
            }
        }
        
        if ($id) {
            $this->data['level'] = $this->levels->get_single('levels', array('id' => $id));

            if (!$this->data['level']) {
                 redirect('academic/levels/index');
            }
        }

        $this->data['levels'] = $this->levels->get_level_list($this->data['level']->school_id);   
        
        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');        
            $this->data['groups'] = $this->levels->get_list('groups', $condition, '','', '', 'id', 'ASC');
        } 
        
        $this->data['school_id'] = $this->data['level']->school_id;
        $this->data['filter_school_id'] = $this->data['level']->school_id;
        $this->data['schools'] = $this->schools;
        
        $this->data['edit'] = TRUE;       
        $this->layout->title($this->lang->line('edit').' | ' . SMS );
        $this->layout->view('level/index', $this->data);
    }

    /*****************Function _prepare_level_validation**********************************
     * @type            : Function
     * @function name   : _prepare_level_validation
     * @description     : Process "level" user input data validation
     *                       
     * @param           : null 
     * @return          : null 
     * ********************************************************** */
    private function _prepare_level_validation() {
       
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div level="error-message" style="color: red;">', '</div>');
        
        $this->form_validation->set_rules('group_id', $this->lang->line('group'), 'trim|required');   
        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');   
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|callback_name');
        
    }
    
    /*****************Function name**********************************
     * @type            : Function
     * @function name   : name
     * @description     : unique check for "level name"
     *                       
     * @param           : null 
     * @return          : boolean true/flase 
     * ********************************************************** */
    public function name()
   {             
   
      if($this->input->post('id') == '')
      {   
          $name = $this->levels->duplicate_check($this->input->post('school_id'), $this->input->post('name')); 
          
          if($name){
                $this->form_validation->set_message('name', $this->lang->line('already_exist'));         
                return FALSE;
          } else {
              return TRUE;
          }          
      }else if($this->input->post('id') != ''){   
         $name = $this->levels->duplicate_check($this->input->post('school_id'), $this->input->post('name'), $this->input->post('id')); 
          if($name){
                $this->form_validation->set_message('name', $this->lang->line('already_exist'));         
                return FALSE;
          } else {
              return TRUE;
          }
      }   
   }


     /*****************Function _get_posted_level_data**********************************
     * @type            : Function
     * @function name   : _get_posted_level_data
     * @description     : Prepare "level" user input data to save into database 
     *                       
     * @param           : null 
     * @return          : $data array() value 
     * ********************************************************** */
    private function _get_posted_level_data() {

        $items = array();
        $items[] = 'school_id';
        $items[] = 'group_id';
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
     * @description     : delete "level" data from database
     *                       
     * @param           : $id integer value
     * @return          : null 
     * ********************************************************** */
    public function delete($id = null) {
        
        check_permission(DELETE);
        
        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('academic/levels/index');    
        }
        
        $level = $this->levels->get_single('levels', array('id' => $id));
        
        if ($this->levels->delete('levels', array('id' => $id))) {

            create_log('Has been deleted a level : '. $level->name);            
            success($this->lang->line('delete_success'));
            
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('academic/levels/index/'.$level->school_id);
    }
    
    /*****************Function __create_default_section**********************************
     * @type            : Function
     * @function name   : __create_default_section
     * @description     : create default section while create a new level
     *                       
     * @param           : $insert_id integer value
     * @return          : null 
     * ********************************************************** */

     
    private function __create_default_section($insert_id){        
       
        $data = array();
        $data['school_id']  = $this->input->post('school_id');
        $data['level_id']    = $insert_id;
        $data['group_id']  = $this->input->post('group_id');
        $data['name']       = 'A';
        $data['note']       = 'Default Section';
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
        $data['status']     = 1; 
        $this->levels->insert('sections', $data);
    }

}
