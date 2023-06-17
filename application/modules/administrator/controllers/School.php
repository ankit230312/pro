<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************School.php**********************************
 * @product name    : Educlouds
 * @type            : Class
 * @class name      : School
 * @description     : Manage academic school.  
 * @author          : makemaya Team 	
 * @url             : https://educlouds.app/      
 * @support         : aniltomar95@gmail.com	
 * @copyright       : makemaya Team	 	
 * ********************************************************** */

class School extends MY_Controller {

    public $data = array();
    
    
    function __construct() {
        parent::__construct();
        $this->load->model('School_Model', 'school', true);
        $this->load->model('Role_Model', 'role', true);  

        if($this->session->userdata('role_id') != SUPER_ADMIN){ 
            error($this->lang->line('permission_denied'));
             redirect('dashboard/index');
        } 
        
        $this->data['fields'] = $this->school->get_table_fields('languages'); 
        // $this->data['themes'] = $this->school->get_list('themes', array(), '','', '', 'id', 'ASC');
        $this->data['subscriptions'] = $this->school->get_subscription_list_only(); 
        // $this->data['subscriptions'] = $this->school->get_subscription_list(); 
        $this->data['schools'] = $this->school->get_school_list();

        // echo "<pre>";
        // print_r($this->data['subscriptions']);
    }

    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Academic School List" user interface                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function index() {
        
        check_permission(VIEW);        
        
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_school'). ' | ' . SMS);
        $this->layout->view('school/index', $this->data);            
       
    }

    
    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new Academic School" user interface                 
    *                    and store "Academic School" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

        check_permission(ADD);
        
        if ($_POST) {
            $this->_prepare_school_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_school_data();  
                
                $subs = $this->db->get_where('saas_subscriptions', ['subscription_plan_id'=>$_POST['subscription_id']])->row();
                
                if ($subs) {
                    $subscription_id = $subs->id;
                }else{

                    $dataSub['subscription_id'] = $_POST['subscription_id'];
                    $insert_subs_id = $this->school->insert('saas_subscriptions', $dataSub);
                    $subscription_id = $insert_subs_id;
                }
                $data['subscription_id']  = $subscription_id;
                $insert_id = $this->school->insert('schools', $data);



                  // Predifined data groups

                    $schoolgroups  = ['School'];  
                    foreach ($schoolgroups as $key => $valuegroups) {
                        $datagroups['name'] = $valuegroups;
                        $datagroups['note'] = $valuegroups;
                        $datagroups['teacher_id'] = '0'; 
                        $datagroups['school_id'] = $insert_id; 
                        $datagroups['status'] = '1'; 
                        $datagroups['created_by'] = logged_in_user_id(); 
                        $datagroups['created_at']   = date('Y-m-d H:i:s');
                        $groupsinsert_id = $this->role->insert('groups', $datagroups);


                         // Predifined data levels
                        $schoollevels  = ['Pre-Primary', 'Primary', 'Middle', 'Secondary', 'Higher Secondary'];
                        $schoolclasses[0]  = ['Play','Nursery', 'LKG', 'UKG'];  
                        $schoolclasses[1]  = ['1','2','3','4','5'];  
                        $schoolclasses[2]  = ['6','7','8',];  
                        $schoolclasses[3]  = ['9','10'];  
                        $schoolclasses[4]  = ['11','12'];  
  
                        foreach ($schoollevels as $keylevels => $valuelevels) {
                            $datalevels['name'] = $valuelevels;
                            $datalevels['note'] = $valuelevels;
                            $datalevels['group_id'] = $groupsinsert_id; 
                            $datalevels['school_id'] = $insert_id; 
                            $datalevels['status'] = '1'; 
                            $datalevels['created_by'] = logged_in_user_id(); 
                            $datalevels['created_at']   = date('Y-m-d H:i:s');
                            $levelsinsert_id = $this->role->insert('levels', $datalevels);
                            
                            // Predifined data classes                            
                            // foreach ($schoolclasses[$keylevels] as $keyclasses => $valueclasses) {
                            //     $dataclasses['name'] = $valueclasses;
                            //     $dataclasses['note'] = $valueclasses;
                            //     $dataclasses['teacher_id'] = '0'; 
                            //     if ($keylevels != 0) {
                            //     $dataclasses['numeric_name'] = $valueclasses; 
                            //     }else{
                            //     $dataclasses['numeric_name'] = 0; 
                            //     }
                            //     $dataclasses['group_id'] = $groupsinsert_id; 
                            //     $dataclasses['level_id'] = $levelsinsert_id; 
                            //     $dataclasses['school_id'] = $insert_id; 
                            //     $dataclasses['status'] = '1'; 
                            //     $dataclasses['created_by'] = logged_in_user_id(); 
                            //     $dataclasses['created_at']   = date('Y-m-d H:i:s');
                            //     $classesinsert_id = $this->role->insert('classes', $dataclasses);

                                // $schoolsections = ['A', 'B', 'C', 'D'];
                                // Predifined data sections   
                                // foreach ($schoolsections as $keysections => $valuesections) {
                                //     $datasections['name'] = $valuesections;
                                //     $datasections['class_id'] = $classesinsert_id; 
                                //     $datasections['school_id'] = $insert_id; 
                                //     $datasections['status'] = '1'; 
                                //     $datasections['created_by'] = logged_in_user_id(); 
                                //     $datasections['created_at']   = date('Y-m-d H:i:s');
                                //     $sectionsinsert_id = $this->role->insert('sections', $datasections);      
                                    
                                // }                               
                            // }
                        }
                    }

                    // Predifined data leave type

                  
  
  
                  

                //roles insert Admin
                $dataroles['name'] = 'Admin';
                $dataroles['slug'] = 'admin'.$insert_id;
                $dataroles['note'] = 'Admin';
                $dataroles['school_id'] = $insert_id;           
                $dataroles['is_default'] = '1'; 
                $dataroles['is_super_admin'] = '0'; 
                $dataroles['status'] = '1'; 
                $dataroles['created_by'] = logged_in_user_id(); 
                $dataroles['created_at']   = date('Y-m-d H:i:s');
                $roleinsert_id = $this->role->insert('roles', $dataroles);
              
                // privileges insert Admin

                $allprivileges = $this->db->get_where('privileges',['role_id'=> 2])->result_array();

                foreach ($allprivileges as $key => $value) {
                    $dataprivileges['role_id'] = $roleinsert_id;
                    $dataprivileges['operation_id'] = $value['operation_id'];
                    $dataprivileges['is_add'] = $value['is_add'];
                    $dataprivileges['is_edit'] = $value['is_edit'];
                    $dataprivileges['is_view'] = $value['is_view'];
                    $dataprivileges['is_delete'] = $value['is_delete'];
                    $dataprivileges['status'] = $value['status'];                    
                    $dataprivileges['created_by'] = '315'; 
                    $dataprivileges['created_at']   = date('Y-m-d H:i:s');
                    $this->role->insert('privileges', $dataprivileges);
                }


                 //roles insert student
                 $dataroles['name'] = 'Student';
                 $dataroles['slug'] = 'student'.$insert_id;
                 $dataroles['note'] = 'student';
                 $dataroles['school_id'] = $insert_id;           
                 $dataroles['is_default'] = '1'; 
                 $dataroles['is_super_admin'] = '0'; 
                 $dataroles['status'] = '1'; 
                 $dataroles['created_by'] = logged_in_user_id(); 
                 $dataroles['created_at']   = date('Y-m-d H:i:s');
                 $roleinsert_id = $this->role->insert('roles', $dataroles);
               
                 // privileges insert student
 
                 $allprivileges = $this->db->get_where('privileges',['role_id'=> 4])->result_array();
 
                 foreach ($allprivileges as $key => $value) {
                     $dataprivileges['role_id'] = $roleinsert_id;
                     $dataprivileges['operation_id'] = $value['operation_id'];
                     $dataprivileges['is_add'] = $value['is_add'];
                     $dataprivileges['is_edit'] = $value['is_edit'];
                     $dataprivileges['is_view'] = $value['is_view'];
                     $dataprivileges['is_delete'] = $value['is_delete'];
                     $dataprivileges['status'] = $value['status'];                    
                     $dataprivileges['created_by'] = '315'; 
                     $dataprivileges['created_at']   = date('Y-m-d H:i:s');
                     $this->role->insert('privileges', $dataprivileges);
                 }




                  //roles insert guardian
                  $dataroles['name'] = 'guardian';
                  $dataroles['slug'] = 'guardian'.$insert_id;
                  $dataroles['note'] = 'guardian';
                  $dataroles['school_id'] = $insert_id;           
                  $dataroles['is_default'] = '1'; 
                  $dataroles['is_super_admin'] = '0'; 
                  $dataroles['status'] = '1'; 
                  $dataroles['created_by'] = logged_in_user_id(); 
                  $dataroles['created_at']   = date('Y-m-d H:i:s');
                  $roleinsert_id = $this->role->insert('roles', $dataroles);
                
                  // privileges insert guardian
  
                  $allprivileges = $this->db->get_where('privileges',['role_id'=> 3])->result_array();
  
                  foreach ($allprivileges as $key => $value) {
                      $dataprivileges['role_id'] = $roleinsert_id;
                      $dataprivileges['operation_id'] = $value['operation_id'];
                      $dataprivileges['is_add'] = $value['is_add'];
                      $dataprivileges['is_edit'] = $value['is_edit'];
                      $dataprivileges['is_view'] = $value['is_view'];
                      $dataprivileges['is_delete'] = $value['is_delete'];
                      $dataprivileges['status'] = $value['status'];                    
                      $dataprivileges['created_by'] = '315'; 
                      $dataprivileges['created_at']   = date('Y-m-d H:i:s');
                      $this->role->insert('privileges', $dataprivileges);
                  }
 


                   //roles insert teacher
                   $dataroles['name'] = 'Teacher';
                   $dataroles['slug'] = 'teacher'.$insert_id;
                   $dataroles['note'] = 'teacher';
                   $dataroles['school_id'] = $insert_id;           
                   $dataroles['is_default'] = '1'; 
                   $dataroles['is_super_admin'] = '0'; 
                   $dataroles['status'] = '1'; 
                   $dataroles['created_by'] = logged_in_user_id(); 
                   $dataroles['created_at']   = date('Y-m-d H:i:s');
                   $teacherroleinsert_id = $this->role->insert('roles', $dataroles);
                 
                   // privileges insert teacher
   
                   $allprivileges = $this->db->get_where('privileges',['role_id'=> 5])->result_array();
   
                   foreach ($allprivileges as $key => $value) {
                       $dataprivileges['role_id'] = $teacherroleinsert_id;
                       $dataprivileges['operation_id'] = $value['operation_id'];
                       $dataprivileges['is_add'] = $value['is_add'];
                       $dataprivileges['is_edit'] = $value['is_edit'];
                       $dataprivileges['is_view'] = $value['is_view'];
                       $dataprivileges['is_delete'] = $value['is_delete'];
                       $dataprivileges['status'] = $value['status'];                    
                       $dataprivileges['created_by'] = '315'; 
                       $dataprivileges['created_at']   = date('Y-m-d H:i:s');
                       $teacherroles = $this->role->insert('privileges', $dataprivileges);
                   }

                $this->update_config();
                
                $rolees = $this->role->get_single('roles', array('id' => $roleinsert_id));
                create_log('Has been setting permission for the role : '.$rolees->name);


                //    predefined data leave type
                $schoolleave_types = ['Sick Leave','Paid leave','Unpaid Leave','National Holiday','Casual Leave','Others']; 
                foreach ($schoolleave_types as $keyleave_types => $valueleave_types) {
                    $dataleave_types['type'] = $valueleave_types;
                    $dataleave_types['role_id'] = $teacherroleinsert_id; 
                    $dataleave_types['school_id'] = $insert_id; 
                    $dataleave_types['status'] = '1'; 
                    $dataleave_types['total_leave'] = '20'; 
                    $dataleave_types['created_by'] = logged_in_user_id(); 
                    $dataleave_types['created_at']   = date('Y-m-d H:i:s');
                    $leave_typesinsert_id = $this->role->insert('leave_types', $dataleave_types);
                }     
                     

                //  predefined data leave type
                $schoolvisitor_purposes = ['Admission','Inquiry','Parcel','Delivery','Pick-Up','Fee Payment','Sales','Appointment']; 
                foreach ($schoolvisitor_purposes as $keyvisitor_purposes => $valuevisitor_purposes) {
                    $datavisitor_purposes['purpose'] = $valuevisitor_purposes;
                    $datavisitor_purposes['school_id'] = $insert_id; 
                    $datavisitor_purposes['status'] = '1'; 
                    $datavisitor_purposes['created_by'] = logged_in_user_id(); 
                    $datavisitor_purposes['created_at']   = date('Y-m-d H:i:s');
                    $visitor_purposesinsert_id = $this->role->insert('visitor_purposes', $datavisitor_purposes);
                }          
              


                if ($insert_id) {
                    
                    create_log('Has been created a school : '.$data['school_name']);  
                    
                    success($this->lang->line('insert_success'));
                    redirect('administrator/school/index');
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('administrator/school/add');
                }
            } else {
                error($this->lang->line('insert_failed'));
                $this->data['post'] = $_POST;
            }
        }

        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' | ' . SMS);
        $this->layout->view('school/index', $this->data);
    }

    
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "Academic School" user interface                 
    *                    with populated "Academic School" value 
    *                    and update "Academic School" database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function edit($id = null) {   
        
        check_permission(EDIT);
       
        if ($_POST) {
            $this->_prepare_school_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_school_data();

                $subs = $this->db->get_where('saas_subscriptions', ['subscription_plan_id'=>$_POST['subscription_id']])->row();
                
                if ($subs) {
                    $subscription_id = $subs->id;
                }else{
                    $dataSub['subscription_id'] = $_POST['subscription_id'];
                    $insert_subs_id = $this->school->insert('saas_subscriptions', $dataSub);
                    $subscription_id = $insert_subs_id;
                }
                $data['subscription_id']  = $subscription_id;


                $updated = $this->school->update('schools', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    
                    create_log('Has been updated a school : '.$data['school_name']);
                    success($this->lang->line('update_success'));
                    redirect('administrator/school/index');    
                    
                } else {
                    
                    error($this->lang->line('update_failed'));
                    redirect('administrator/school/edit/' . $this->input->post('id'));
                    
                }
            } else {
                 error($this->lang->line('update_failed'));
                 $this->data['school'] = $this->school->get_single('schools', array('id' => $this->input->post('id')));
            }
        } else {
            if ($id) {
                $this->data['school'] = $this->school->get_single('schools', array('id' => $id));
 
                if (!$this->data['school']) {
                     redirect('administrator/school/index');
                }
            }
        }

        $this->data['edit'] = TRUE;       
        $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
        $this->layout->view('school/index', $this->data);
    }
    
       
    /*****************Function get_single_school**********************************
     * @type            : Function
     * @function name   : get_single_school
     * @description     : "Load single school information" from database                  
     *                    to the user interface   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function get_single_school(){
        
       $school_id = $this->input->post('school_id');       
       $this->data['school'] = $this->school->get_single_school($school_id);
       echo $this->load->view('school/get-single-school', $this->data);
    }

    
    /*****************Function _prepare_school_validation**********************************
    * @type            : Function
    * @function name   : _prepare_school_validation
    * @description     : Process "Academic School" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _prepare_school_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
      
        $this->form_validation->set_rules('school_name', $this->lang->line('school_name'), 'trim|required|callback_school_name');
        $this->form_validation->set_rules('school_url', $this->lang->line('school_url'), 'trim|required');
        $this->form_validation->set_rules('address', $this->lang->line('address'), 'trim|required');
        $this->form_validation->set_rules('phone', $this->lang->line('phone'), 'trim|required');
        $this->form_validation->set_rules('email', $this->lang->line('email'), 'trim|required');
        $this->form_validation->set_rules('currency', $this->lang->line('currency'), 'trim');
        $this->form_validation->set_rules('currency_symbol', $this->lang->line('currency_symbol'), 'trim|required');
        $this->form_validation->set_rules('language', $this->lang->line('language'), 'trim|required');
        $this->form_validation->set_rules('theme_name', $this->lang->line('theme'), 'trim|required');
        $this->form_validation->set_rules('logo', $this->lang->line('admin_logo'), 'trim|callback_logo'); 
        $this->form_validation->set_rules('frontend_logo', $this->lang->line('frontend_logo'), 'trim|callback_frontend_logo'); 
    }

            
    /*****************Function session_school**********************************
    * @type            : Function
    * @function name   : session_school
    * @description     : Unique check for "academic school" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function school_name() {
        if ($this->input->post('id') == '') {
            $school = $this->school->duplicate_check($this->input->post('school_name'));
            if ($school) {
                $this->form_validation->set_message('school_name', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $school = $this->school->duplicate_check($this->input->post('school_name'), $this->input->post('id'));
            if ($school) {
                $this->form_validation->set_message('school_name', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }
    
    
    /*****************Function logo**********************************
    * @type            : Function
    * @function name   : logo
    * @description     : validate school admin logo                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */
    public function logo() {
        if ($_FILES['logo']['name']) {
            
            list($width, $height) = getimagesize($_FILES['logo']['tmp_name']);
            // if((!empty($width)) && $width > 100 || $height > 110){
            //     $this->form_validation->set_message('logo', $this->lang->line('please_check_image_dimension'));
            //     return FALSE;
            // }
            
            $name = $_FILES['logo']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('logo', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
    
    /*****************Function frontend_logo**********************************
    * @type            : Function
    * @function name   : frontend_logo
    * @description     : validate school  frontend_logo                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */
    public function frontend_logo() {
        if ($_FILES['frontend_logo']['name']) {
            
            
            list($width, $height) = getimagesize($_FILES['frontend_logo']['tmp_name']);
            // if((!empty($width)) && $width > 150 || $height > 90){
            //     $this->form_validation->set_message('frontend_logo', $this->lang->line('please_check_image_dimension'));
            //     return FALSE;
            // }
            
            
            $name = $_FILES['frontend_logo']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);           
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('frontend_logo', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }
    
    
    
    /*****************Function _get_posted_school_data**********************************
     * @type            : Function
     * @function name   : _get_posted_school_data
     * @description     : Prepare "Academic School" user input data to save into database                  
     *                       
     * @param           : null
     * @return          : $data array(); value 
     * ********************************************************** */
    private function _get_posted_school_data() {

        $items = array();
        
        $items[] = 'school_url';
        $items[] = 'school_code';
        $items[] = 'school_name';
        $items[] = 'address';
        $items[] = 'phone';
        $items[] = 'email';
        $items[] = 'currency';
        $items[] = 'currency_symbol';
        $items[] = 'school_fax';     
        $items[] = 'zoom_api_key'; 
        $items[] = 'zoom_secret'; 
        $items[] = 'enable_frontend';
        $items[] = 'final_result_type';
        $items[] = 'registration_date';
        $items[] = 'footer';
        $items[] = 'google_map';
        $items[] = 'theme_name';
        $items[] = 'language';
        $items[] = 'enable_online_admission';
        $items[] = 'enable_rtl';
        $items[] = 'facebook_url';
        $items[] = 'twitter_url';
        $items[] = 'linkedin_url';
        $items[] = 'youtube_url';
        $items[] = 'instagram_url';
        $items[] = 'pinterest_url';
        
        $data = elements($items, $_POST); 
        
        if ($this->input->post('id')) {
            $data['status'] = $this->input->post('status');
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            
            $data['about_text'] = 'Lorem ipsum dolor sit amet, consecte- tur adipisicing elit, 
            We create Premium WordPress themes & plugins for more than three years. ';
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
        }
        
        if ($_FILES['logo']['name']) {
            $data['logo'] = $this->_upload_logo();
        }
        if ($_FILES['frontend_logo']['name']) {
            $data['frontend_logo'] = $this->_upload_frontend_logo();
        }

        return $data;
    }
    
    
            
    /*****************Function _upload_logo**********************************
    * @type            : Function
    * @function name   : _upload_logo
    * @description     : Process to upload institute logo in the server                  
    *                     and return logo name   
    * @param           : null
    * @return          : $logo string value 
    * ********************************************************** */
    private function _upload_logo() {

        $prevoius_logo = @$_POST['logo_prev'];
        $logo_name = $_FILES['logo']['name'];
        $logo_type = $_FILES['logo']['type'];
        $logo = '';


        if ($logo_name != "") {
            if ($logo_type == 'image/jpeg' || $logo_type == 'image/pjpeg' ||
                    $logo_type == 'image/jpg' || $logo_type == 'image/png' ||
                    $logo_type == 'image/x-png' || $logo_type == 'image/gif') {

                $destination = 'assets/uploads/logo/';

                $file_type = explode(".", $logo_name);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $logo_path = time().'-school-admin-logo.' . $extension;

                copy($_FILES['logo']['tmp_name'], $destination . $logo_path);

                if ($prevoius_logo != "") {
                    // need to unlink previous image
                    if (file_exists($destination . $prevoius_logo)) {
                        @unlink($destination . $prevoius_logo);
                    }
                }

                $logo = $logo_path;
            }
        } else {
            $logo = $prevoius_logo;
        }

        return $logo;
    }
            
    /*****************Function _upload_frontend_logo**********************************
    * @type            : Function
    * @function name   : _upload_frontend_logo
    * @description     : Process to upload school front end logo in the server                  
    *                     and return logo name   
    * @param           : null
    * @return          : $logo string value 
    * ********************************************************** */
    private function _upload_frontend_logo() {

        $prevoius_logo = @$_POST['frontend_logo_prev'];
        $logo_name = $_FILES['frontend_logo']['name'];
        $logo_type = $_FILES['frontend_logo']['type'];
        $logo = '';


        if ($logo_name != "") {
            if ($logo_type == 'image/jpeg' || $logo_type == 'image/pjpeg' ||
                    $logo_type == 'image/jpg' || $logo_type == 'image/png' ||
                    $logo_type == 'image/x-png' || $logo_type == 'image/gif') {

                $destination = 'assets/uploads/logo/';

                $file_type = explode(".", $logo_name);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $logo_path = time().'-school-front-logo.' . $extension;

                copy($_FILES['frontend_logo']['tmp_name'], $destination . $logo_path);

                if ($prevoius_logo != "") {
                    // need to unlink previous image
                    if (file_exists($destination . $prevoius_logo)) {
                        @unlink($destination . $prevoius_logo);
                    }
                }

                $logo = $logo_path;
            }
        } else {
            $logo = $prevoius_logo;
        }

        return $logo;
    }

    
    /* @type            : Function
     * @function name   : update_subscription_status
     * @description     : update_subscription_status               
     *                    
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function update_subscription_status() {
        
         $school_id = $this->input->post('school_id');
         $subscription_id     = $this->input->post('subscription_id');
         
         $exist = $this->school->get_single('schools', array('subscription_id'=>$subscription_id));
         echo $this->school->update('schools', array('modified_at'=>date('Y-m-d H:i:s'), 'subscription_id'=>$subscription_id), array('id'=>$school_id));         

       
        // if(empty($exist)){
        //    echo $this->school->update('schools', array('modified_at'=>date('Y-m-d H:i:s'), 'subscription_id'=>$subscription_id), array('id'=>$school_id));         
        // }else{
        //    echo FALSE;
        // }
    }
    
    
    /*****************Function delete**********************************
   * @type            : Function
   * @function name   : delete
   * @description     : delete "Academic School" from database                  
   *                       
   * @param           : $id integer value
   * @return          : null 
   * ********************************************************** */
    public function delete($id = null) {        
        
        check_permission(DELETE);        
        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('administrator/school/index');              
        }
        
        // need to find all child data from database 
        $skips = array('global_setting', 'gmsms_sessions', 'languages', 'modules', 'operations', 'privileges', 'purchase',
                        'schools', 'system_admin', 'themes',
                       'saas_faqs', 'saas_plans', 'saas_settings', 'saas_sliders', 'saas_subscriptions'
            );
        $tables = $this->db->list_tables();
        
         foreach ($tables as $table) {
             
            if(in_array($table, $skips)){continue;}             
            
           // $child_exist =$this->school->get_list($table, array('school_id'=>$id), '','', '', 'id', 'ASC');
            $child_exist =$this->school->delete($table, array('school_id'=>$id));
            /*if(!empty($child_exist)){
                 error($this->lang->line('pls_remove_child_data'));
                 redirect('administrator/school/index');
            }*/
        }    
     
        
        $school = $this->school->get_single('schools', array('id' => $id));
        
        if ($this->school->delete('schools', array('id' => $id))) {

             // delete syllabus file
            $destination = 'assets/uploads/logo/';
            if (file_exists( $destination.$school->frontend_logo)) {
                @unlink($destination.$school->frontend_logo);
            }
            if (file_exists( $destination.$school->logo)) {
                @unlink($destination.$school->logo);
            }
            
            create_log('Has been deleted a school : '.$school->school_name);  
            success($this->lang->line('delete_success'));
            
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('administrator/school/index');
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////


    public function result_school_card_format()
    {
        $this->load->model('School_Model');

        $data["fetch_dd"] =  $this->School_Model->get_school_result_col();
       
        $this->layout->view('school/get_school_for_new_column', $data);
    }

    public function school_result_col()
    {
        $this->load->model('School_Model');

        $data["fetch_dd_selected"] =  $this->School_Model->school_result_col();
       
        $this->layout->view('school/result_check');
    }

    // public function school_reportcard_format_edit()
    // {
    //     $this->load->model('School_Model');
      
    //     $data["school_col_edit"] =  $this->School_Model->school_reportcard_format_edit1();
    //     echo "<pre>";
    //     print_r($data["school_col_edit"]->result());
    //     echo "</pre>";

    //     // $this->layout->title($this->lang->line('result_card_format') . ' | ' . SMS);
    //     $this->layout->view('school/get_school_for_new_column', $data);
    // }
}
