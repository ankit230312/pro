<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Bulk.php**********************************
 * @product name    : Global School Management System Pro
 * @type            : Class
 * @class name      : Bulk
 * @description     : Manage bulk students imformation of the school.  
 * @author          : makemaya Team 	
 * @url             : https://educlouds.app/      
 * @support         : aniltomar95@gmail.com	
 * @copyright       : makemaya Team	 	
 * ********************************************************** */

class Bulk extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();      
        
        $this->load->model('Student_Model', 'student', true);          
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add Bulk Student" user interface                 
    *                    and process to store "Bulk Student" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

        check_permission(ADD);

        if ($_POST) {     
            
            if(!check_saas_status($this->input->post('school_id'), 'student')){
                error($this->lang->line('upgrade_your_plan'));
                redirect('student/bulk/add');
              }


            $status = $this->_get_posted_student_data();
            if ($status) {                   

                create_log('Has been added Bulk Student');
                success($this->lang->line('insert_success'));
                redirect('student/index/'.$this->input->post('class_id'));
            } else {
                error($this->lang->line('insert_failed'));
                redirect('student/bulk/add');
            }            
        } 
        
                    
        if($this->session->userdata('role_id') != SUPER_ADMIN){   
             $school_id = $this->session->userdata('school_id');
            $this->data['academic_years'] = $this->student->get_list('academic_years', array('status' => 1, 'school_id'=>$school_id), '', '', '', 'id', 'ASC'); 
            $this->data['classes'] = $this->student->get_list('classes', array('status' => 1, 'school_id'=>$school_id), '', '', '', 'id', 'ASC');
        }else{ 
            $this->data['classes'] = array();   
        }
        
        $this->layout->title($this->lang->line('bulk_admission') . ' | ' . SMS);
        $this->layout->view('bulk', $this->data);
    }

   

    /*****************Function _get_posted_student_data**********************************
    * @type            : Function
    * @function name   : _get_posted_student_data
    * @description     : Prepare "Student" user input data to save into database                  
    *                       
    * @param           : null
    * @return          : $data array(); value 
    * ********************************************************** */
    private function _get_posted_student_data() {

        $this->_upload_file();

        $destination = 'assets/csv/bulk_uploaded_student.csv';
        if (($handle = fopen($destination, "r")) !== FALSE) {

            $count = 1;            
            $school_id  = $this->input->post('school_id');           
            $academic_year_id = $this->input->post('academic_year_id');
            if(!$academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('student/bulk/add');
            }
            
           
            while (($arr = fgetcsv($handle)) !== false) {

                if ($count == 1) { $count++;  continue; }

                // need atleast some mandatory data
                //0 = name, 1 = admission_no, 19 = roll_no,*class= , Section

 
                if ($arr[0] != '' && $arr[3] != '' && $arr[9] != '' && $arr[10] != '') {

                   
                   
                    $user = array();
                    $data = array();
                    $enroll = array();
                    $guardian_user = array();
                    $guardian = array();
                    


                    $guardianrole_id = '';
                    $guardiansid = 'guardian'.$school_id;
                    $rolesguardian  = $this->db->get_where('roles', ['slug'=> $guardiansid, 'school_id'=>$school_id])->row();  


                    if($rolesguardian){
                        $guardianrole_id = $rolesguardian->id;
                    }



                    // now creating guardian user
                    $guardian_user['role_id']  = $guardianrole_id;
                    $guardian_user['name']     =  isset($arr[39]) ? $arr[39] : 'Guardian';
                    $guardian_user['phone']    =  isset($arr[40]) ? $arr[40] : '';
                    $guardian_user['email']    =  isset($arr[41]) ? $arr[41] : '';
                    $guardian_user['username'] =  $this->student->get_custom_id('users', 'GUD');
                    $guardian_user['password'] =  get_random_tring(6);
                    
                   
                    $guardian['user_id'] = $this->student->create_custom_user($guardian_user);  
                    
                    // now we have to create guardian
                    $guardian['name']    = isset($arr[39]) ? $arr[39] : 'Guardian';
                    $guardian['phone']   = isset($arr[40]) ? $arr[40] : '123456789';
                    $guardian['email']   = isset($arr[41]) ? $arr[41] : '';
                    $guardian['profession']   = isset($arr[42]) ? $arr[42] : '';
                    $guardian['religion']   = isset($arr[43]) ? $arr[43] : '';
                    $guardian['national_id'] = isset($arr[44]) ? $arr[44] : '';
                    $guardian['present_address']   = isset($arr[45]) ? $arr[45] : '';
                    $guardian['permanent_address']   = isset($arr[46]) ? $arr[46] : '';
                    $guardian['other_info']   = isset($arr[47]) ? $arr[47] : '';
                    $guardian['created_at'] = date('Y-m-d H:i:s');
                    $guardian['created_by'] = logged_in_user_id();
                    $guardian['modified_at'] = date('Y-m-d H:i:s');
                    $guardian['modified_by'] = logged_in_user_id();
                    $guardian['school_id'] = $school_id;
                    $guardian['status'] = 1; 
                    
                    $data['guardian_id'] = $this->student->insert('guardians', $guardian);
                    
                     // now we have to create student user
                    $role_id = '';
                    $teachersid = 'student'.$school_id;
                    $roles  = $this->db->get_where('roles', ['slug'=> $teachersid, 'school_id'=>$school_id])->row();  


                    if($roles){
                        $role_id = $roles->id;
                    }

                    $user['role_id'] = $role_id;                    
                    $user['name'] = isset($arr[0]) ? $arr[0] : 'Student';
                    $user['phone'] = isset($arr[8]) ? $arr[8] : '';    
                    $user['email'] = isset($arr[9]) ? $arr[9] : '';
                    $user['username'] =  $this->student->get_custom_id('users', 'STD');
                    $user['password'] =  get_random_tring(6); 
                    
                    $data['user_id'] = $this->student->create_custom_user($user);   
                    
                    $data['school_id'] = $school_id;
                    $data['name'] = isset($arr[0]) ? $arr[0] : 'Student';
                    $data['admission_no'] = isset($arr[3]) ? $arr[3] : '';
                    $data['admission_date'] = isset($arr[4]) ? date('Y-m-d', strtotime($arr[4])) : date('Y-m-d');
                    if ($arr[5] !='') {
                        $data['dob'] = date('Y-m-d', strtotime($arr[5]));
                    } else {
                        $data['dob'] = date('Y-m-d');
                    }
                    
                    
                    $data['gender'] = isset($arr[6]) ? $arr[6] : 'male';                                     
                    $data['blood_group'] = isset($arr[11]) ? $arr[11] : 'a_positive';
                    $data['religion'] = isset($arr[12]) ? $arr[12] : '';
                    $data['caste'] = isset($arr[13]) ? $arr[13] : '';
                    $data['phone'] = isset($arr[14]) ? $arr[14] : '123456789';    
                    $data['email'] = isset($arr[15]) ? $arr[15] : '';                    
                    $data['national_id'] = isset($arr[16]) ? $arr[16] : '';
                    $data['type_id'] = isset($arr[11]) ? $arr[11] : 0;
                    $data['group'] = isset($arr[12]) ? $arr[12] : 'arts';
                    $data['registration_no'] = isset($arr[20]) ? $arr[20] : 0;  
                    $data['discount_id'] = isset($arr[21]) ? $arr[21] : 0;
                    $data['second_language'] = isset($arr[22]) ? $arr[22] : '';
                    $data['present_address'] = isset($arr[23]) ? $arr[23] : '';
                    $data['permanent_address'] = isset($arr[24]) ? $arr[24] : '';
                    $data['health_condition'] = isset($arr[25]) ? $arr[25] : '';                    
                    $data['previous_school'] = isset($arr[26]) ? $arr[26] : '';
                    $data['previous_class'] = isset($arr[27]) ? $arr[27] : '';                    
                    $data['other_info'] = isset($arr[28]) ? $arr[28] : '';
                    
                    
                    $data['father_name'] = isset($arr[29]) ? $arr[29] : '';
                    $data['father_phone'] = isset($arr[30]) ? $arr[30] : '';
                    $data['father_education'] = isset($arr[31]) ? $arr[31] : '';
                    $data['father_profession'] = isset($arr[32]) ? $arr[32] : '';
                    $data['father_designation'] = isset($arr[33]) ? $arr[33] : '';
                    $data['mother_name'] = isset($arr[34]) ? $arr[34] : '';
                    $data['mother_phone'] = isset($arr[35]) ? $arr[35] : '';
                    $data['mother_education'] = isset($arr[36]) ? $arr[36] : '';
                    $data['mother_profession'] = isset($arr[37]) ? $arr[37] : '';
                    $data['mother_designation'] = isset($arr[38]) ? $arr[38] : '';                    
                    $data['relation_with'] = isset($arr[48]) ? $arr[48] : '';
               
                    $data['age'] = $data['dob'] ? floor((time() - strtotime($data['dob'])) / 31556926) : 0;
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['created_by'] = logged_in_user_id();
                    $data['modified_at'] = date('Y-m-d H:i:s');
                    $data['modified_by'] = logged_in_user_id();
                    $data['status'] = 1;
                    $data['status_type'] = 'regular';

                    $data['is_library_member'] = 0;
                    $data['is_hostel_member'] = 0;
                    $data['is_transport_member'] = 0;
                    
                     // now need to create student
                    $enroll['student_id'] = $this->student->insert('students', $data);

                   
                    $enroll['roll_no'] = isset($arr[19]) ? $arr[19] : '';

                    $classesexist = $this->db->get_where('classes',['school_id'=>$school_id, 'name' =>trim($arr[9])])->row();
                    if ($classesexist) {
                        $enroll['class'] = $classesexist->id;
                    } else {

                        $dataclasses['school_id']  = $school_id;
                        $dataclasses['name']  = trim($arr[9]);
                        $dataclasses['status']  = '1';
                        $classes_ids = $this->student->insert('classes', $dataclasses);
                        $enroll['class'] = $classes_ids;
                    }


                    $sectionsexist = $this->db->get_where('sections',['school_id'=>$school_id, 'class_id'=> $enroll['class'],  'name' =>trim($arr[10])])->row();
                    if ($sectionsexist) {
                        $enroll['section'] = $sectionsexist->id;
                    } else {

                        $datasections['school_id']  = $school_id;
                        $datasections['name']  = trim($arr[10]);
                        $datasections['class_id']  = $enroll['class'];
                        $datasections['status']  = '1';
                        $sections_ids = $this->student->insert('sections', $datasections);
                        $enroll['section'] = $sections_ids;
                    }
                    
                    
                   

                    // now need to create enroll
                    $this->_insert_enrollment($enroll);
                                    
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

        $file = $_FILES['bulk_student']['name'];

        if ($file != "") {

            $destination = 'assets/csv/bulk_uploaded_student.csv';          
            //$ext = strtolower(end(explode('.', $file)));
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            if ($ext == 'csv') {                 
                move_uploaded_file($_FILES['bulk_student']['tmp_name'], $destination);  
            }
        } else {
            error($this->lang->line('insert_failed'));
            redirect('student/bulk/add');
        }       
    }

    
    /*****************Function _insert_enrollment**********************************
    * @type            : Function
    * @function name   : _insert_enrollment
    * @description     : save student info to enrollment while create a new student                  
    * @param           : $insert_id integer value
    * @return          : null 
    * ********************************************************** */
    private function _insert_enrollment($enroll) {
        
        $data = array();
        $data['student_id'] = $enroll['student_id'];
        $data['school_id']   = $this->input->post('school_id');
        $data['class_id']   = $enroll['class'];
        $data['section_id'] = $enroll['section'];  
        $data['academic_year_id'] = $this->input->post('academic_year_id');        
        $data['roll_no'] = $enroll['roll_no'];
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
        $data['status'] = 1;
        $this->student->insert('enrollments', $data);
        // echo $this->db->last_query();
        // die;
    }
}