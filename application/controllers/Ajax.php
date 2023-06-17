<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Ajax extends My_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('Ajax_Model', 'ajax', true);
    }


      public function get_user_by_role() {

        $role_id = $this->input->post('role_id');
        $school_id = $this->input->post('school_id');
        $class_id = $this->input->post('class_id');
        $user_id = $this->input->post('user_id');
        $message = $this->input->post('message');

        $school = $this->ajax->get_school_by_id($school_id);
         
        $users = array();
        
       
       
        if ($role_id == SUPER_ADMIN) {
            $users = $this->ajax->get_list('system_admin', array('status' => 1), '', '', '', 'id', 'ASC');
        } else {

            $users1 =  $this->db->select('E.*')
            ->from('teachers AS E')
            ->join('users AS U', 'U.id = E.user_id', 'left')
            ->where('U.role_id', $role_id)
            ->where('E.school_id', $school_id)
            ->get()->result();
    
            $users2 =  $this->db->select('E.*')
            ->from('guardians AS E')
            ->join('users AS U', 'U.id = E.user_id', 'left')
            ->where('U.role_id', $role_id)
            ->where('E.school_id', $school_id)
            ->get()->result();


            $users3 =  $this->db->select('E.*')
            ->from('students AS E')
            ->join('users AS U', 'U.id = E.user_id', 'left')
            ->where('U.role_id', $role_id)
            ->where('E.school_id', $school_id)
            ->get()->result();


            $users4 =  $this->db->select('E.*')
            ->from('employees AS E')
            ->join('users AS U', 'U.id = E.user_id', 'left')
            ->where('U.role_id', $role_id)
            ->where('E.school_id', $school_id)
            ->get()->result();


            

            if($users1){
                $users = $users1;
            }elseif($users2){
                $users = $users2;
            }elseif($users3){
                if ($class_id) {
                    $users = $this->ajax->get_student_list($class_id, $school_id, $school->academic_year_id);
                } else {
                    $users = $users3;
                }
            }elseif($users4){
                $users = $users4;
            }
        }


        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        if (!$message && !empty($users)) {
            $str .= '<option value="0">' . $this->lang->line('all') . '</option>';
        }

        $select = 'selected="selected"';
        if (!empty($users)) {
            foreach ($users as $obj) {
                
                //if(logged_in_user_id() == $obj->user_id){continue;}
                
                $selected = $user_id == $obj->user_id ? $select : '';
                $str .= '<option  value="' . $obj->user_id . '" ' . $selected . '>' . $obj->name . '(' . $obj->user_id . ')</option>';
            }
        }

        echo $str;
    }


    // 

    // public function get_exam_list_id(){
    //      if(!empty($this->input->post('mycheck')))
    //     {
    //    foreach ( $this->input->post('exam_list') as $obj)
    //        {
    //            $exam_list[]= $obj; 
    //        }
    //     }
    //     $returnvalue = $this->ajax->exam_list_id($exam_list);
    // }
   


    // 


    public function get_exam_list()
    {

        $online_exam_list = [];
        $exams_list = [];
        $school_id = $this->input->post('school_id');
        $exam_mode_id = $this->input->post('exam_mode_id');
        $exam_type_id = $this->input->post('exam_type_id');
        $exam_sub_type_id = $this->input->post('exam_sub_type_id');


       $selectedexamlistonline = $this->input->post('exam_list_online');
       $selectedexamlist = $this->input->post('exam_list');

       $school = $this->ajax->get_school_by_id($school_id);
       $examsarry = array('school_id'=> $school_id, 'status' => 1, 'academic_year_id' => $school->academic_year_id);
        
       if ($exam_type_id != '') {
             $examsarry['exam_type_id'] = $exam_type_id;
        }

       if ($exam_sub_type_id != '' && $exam_type_id != '') {
            $examsarry['exam_sub_type_id'] = $exam_sub_type_id;
        }

        
        
        // if($exam_mode_id == 0){
        //     $online_exam_list = $this->db->get_where('exam_online_exams', $examsarry)->result();     
            
        // }elseif($exam_mode_id == 1){
        //     $exams_list = $this->db->get_where('exams', $examsarry)->result();
        // }else{
        //     $online_exam_list = $this->db->get_where('exam_online_exams', $examsarry)->result();
        //     $exams_list = $this->db->get_where('exams', $examsarry)->result();
        // }

        $exams_list = $this->db->get_where('exams', $examsarry)->result();




        // if (count($online_exam_list) > 0) {
        //    foreach ($online_exam_list as $key => $value) {
        //     $select = '';
        //         if($selectedexamlistonline !='' && $selectedexamlistonline != 'null'){
        //             $arrselected = json_decode($selectedexamlistonline);
        //             if (in_array($value->id, $arrselected)) {
        //                 $select = 'checked="checked"';
        //             }                        
        //         }                
        //     echo '<input type="checkbox" class="exam_list_online" '.$select.' name="exam_list_online[]" value="'.$value->id.'" id="exam_list_online">'.$value->title.'';
        //     }
        // }

      
        if (count($exams_list) > 0) {
            foreach ($exams_list as $key => $value) {
                $select = '';
                if($selectedexamlist !='' && $selectedexamlist != 'null'){
                    $arrselecteds = json_decode($selectedexamlist);   
                            
                    if (in_array($value->id, $arrselecteds) && is_array($arrselecteds)) {
                        $select = 'checked="checked"';
                    }                        
                }
                 echo '<input type="checkbox" class="exam_list" '.$select.' name="exam_list[]" value="'.$value->id.'"  id="exam_list">'.$value->title.'';
            }
         }





       
            
        

    }

  
    // public function get_user_by_role() {

    //     $role_id = $this->input->post('role_id');
    //     $school_id = $this->input->post('school_id');
    //     $class_id = $this->input->post('class_id');
    //     $user_id = $this->input->post('user_id');
    //     $message = $this->input->post('message');

    //     $school = $this->ajax->get_school_by_id($school_id);
         
    //     $users = array();

    //     if ($role_id == SUPER_ADMIN) {
    //         $users = $this->ajax->get_list('system_admin', array('status' => 1), '', '', '', 'id', 'ASC');
    //     }elseif ($role_id == TEACHER) {
    //         $users = $this->ajax->get_list('teachers', array('status' => 1,'school_id'=>$school_id), '', '', '', 'id', 'ASC');
    //     } elseif ($role_id == GUARDIAN) {
    //         $users = $this->ajax->get_list('guardians', array('status' => 1,'school_id'=>$school_id), '', '', '', 'id', 'ASC');
    //     } elseif ($role_id == STUDENT) {
            
    //         if ($class_id) {
    //             $users = $this->ajax->get_student_list($class_id, $school_id, $school->academic_year_id);
    //         } else {
    //             $users = $this->ajax->get_list('students', array('status' => 1,'school_id'=>$school_id), '', '', '', 'id', 'ASC');
    //         }
            
    //     } else {

    //         $this->db->select('E.*');
    //         $this->db->from('employees AS E');
    //         $this->db->join('users AS U', 'U.id = E.user_id', 'left');
    //         $this->db->where('U.role_id', $role_id);
    //         $this->db->where('E.school_id', $school_id);
    //         $users = $this->db->get()->result();            
    //     }

    //     $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
    //     if (!$message && !empty($users)) {
    //         $str .= '<option value="0">' . $this->lang->line('all') . '</option>';
    //     }

    //     $select = 'selected="selected"';
    //     if (!empty($users)) {
    //         foreach ($users as $obj) {
                
    //             //if(logged_in_user_id() == $obj->user_id){continue;}
                
    //             $selected = $user_id == $obj->user_id ? $select : '';
    //             $str .= '<option value="' . $obj->user_id . '" ' . $selected . '>' . $obj->name . '(' . $obj->id . ')</option>';
    //         }
    //     }

    //     echo $str;
    // }

    /*     * **************Function get_tag_by_role**********************************
     * @type            : Function
     * @function name   : get_tag_by_role
     * @description     : this function used to manage user role tag list for user interface   
     * @param           : null 
     * @return          : $str string value with user role tag list 
     * ********************************************************** */

    public function get_tag_by_role() {

        $role_id = $this->input->post('role_id');
        $tags = get_template_tags($role_id);
        $str = '';
        foreach ($tags as $value) {
            $str .= $value.' ';
        }

        echo $str;
    }

    /**     * *************Function update_user_status**********************************
     * @type            : Function
     * @function name   : update_user_status
     * @description     : this function used to update user status   
     * @param           : null 
     * @return          : boolean true/false 
     * ********************************************************** */
    public function update_capture_camera() {

        $id = $this->input->post('id');
        $type = $this->input->post('type');
        $this->db->where('id', $id);
        $this->db->update('exam_online_exams', ['capture'=> $type]);
        echo "1";
    }


    public function update_user_status() {

        $user_id = $this->input->post('user_id');
        $status = $this->input->post('status');
        if ($this->ajax->update('users', array('status' => $status), array('id' => $user_id))) {
            echo TRUE;
        } else {
            echo FALSE;
        }
    }

    /**     * *************Function get_student_by_class**********************************
     * @type            : Function
     * @function name   : get_student_by_class
     * @description     : this function used to populate student list by class 
      for user interface
     * @param           : null 
     * @return          : $str string  value with student list
     * ********************************************************** */
    public function get_student_by_class() {

        $school_id = $this->input->post('school_id');
        $class_id = $this->input->post('class_id');
        $student_id = $this->input->post('student_id');
        $is_bulk = $this->input->post('is_bulk');
         
        $school = $this->ajax->get_school_by_id($school_id);
        $students = $this->ajax->get_student_list($class_id, $school_id, $school->academic_year_id);

        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        if($is_bulk){
             $str .= '<option value="all">' . $this->lang->line('all') . '</option>';
        }
        
        $select = 'selected="selected"';
        if (!empty($students)) {
            foreach ($students as $obj) {
                $selected = $student_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . ' [' . $obj->roll_no . ']</option>';
            }
        }

        echo $str;
    }

    
    
    /**     * *************Function get_section_by_class**********************************
     * @type            : Function
     * @function name   : get_section_by_class
     * @description     : this function used to populate section list by class 
      for user interface
     * @param           : null 
     * @return          : $str string  value with section list
     * ********************************************************** */
      public function get_section_by_class() {

        $school_id = $this->input->post('school_id');
        $class_id = $this->input->post('class_id');
        $section_id = $this->input->post('section_id');

        if($this->session->userdata('role_id') == STUDENT){
            $sections = $this->ajax->get_list('sections', array('status' => 1,'id'=>$this->session->userdata('section_id'), 'school_id'=>$school_id, 'class_id' => $class_id), '', '', '', 'id', 'ASC');
        }else{
            $sections = $this->ajax->get_list('sections', array('status' => 1, 'school_id'=> $school_id, 'class_id' => $class_id), '', '', '', 'id', 'ASC');

        }

        
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';    
        $guardian_section_data = get_guardian_access_data('section');
        
        $select = 'selected="selected"';
        if (!empty($sections)) {
            foreach ($sections as $obj) {
                
               if ($this->session->userdata('role_id') == GUARDIAN && !in_array($obj->id, $guardian_section_data)) { continue; } 
            //    elseif ($this->session->userdata('role_id') == TEACHER && $obj->teacher_id != $this->session->userdata('profile_id')) { continue; } 
               
                $selected = $section_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';
            }
        }

        echo $str;
    }


    public function clickreadnotification()
    {
    //    print_r($this->session->userdata('profile_id'));

       $to_user_id = $this->session->userdata('profile_id');       
       $this->ajax->update('notifications', array('is_read'=> 1), array('to_user_id'=>$to_user_id)); 
    }

    public function clickreadnotificationguardian()
    {
    //    print_r($this->session->userdata('profile_id'));


       $to_user_id = $this->session->userdata('profile_id');    
       $stdata = $this->db->get_where('students',['guardian_id'=> $to_user_id])->row();
   
       $this->ajax->update('notifications', array('is_read_guardian' => 1), array('to_user_id'=> $stdata->id)); 
    }

    /*     * **************Function get_student_by_section**********************************
     * @type            : Function
     * @function name   : get_student_by_section
     * @description     : this function used to populate student list by section 
      for user interface
     * @param           : null 
     * @return          : $str string  value with student list
     * ********************************************************** */

    public function get_student_by_section() {

        $student_id = $this->input->post('student_id');
        $section_id = $this->input->post('section_id');
        $school_id = $this->input->post('school_id');
        $is_all = $this->input->post('is_all');


        $students = $this->ajax->get_student_list_by_section($school_id, $section_id, 'regular');
        
        if($is_all){
            $str = '<option value="0">' . $this->lang->line('all_student') . '</option>';    
        }else{
            $str = '<option value="">--' . $this->lang->line('select') . '--</option>';            
        }
        
        $select = 'selected="selected"';
        if (!empty($students)) {
            foreach ($students as $obj) {
                $selected = $student_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . ' [' . $obj->roll_no . ']</option>';
            }
        }

        echo $str;
    }

    public function get_student_by_section_compose() {

        $student_id = $this->input->post('student_id');
        $section_id = $this->input->post('section_id');
        $school_id = $this->input->post('school_id');
        $is_all = $this->input->post('is_all');



      


        $students = $this->ajax->get_student_list_by_section($school_id, $section_id, 'regular');

        
        if($is_all){
            $str = '<option value="0">' . $this->lang->line('all_student') . '</option>';    
        }else{
            $str = '<option value="">--' . $this->lang->line('select') . '--</option>';            
        }
        
        $select = 'selected="selected"';
        if (!empty($students)) {
            foreach ($students as $obj) {
                $selected = $student_id == $obj->user_id ? $select : '';
                $str .= '<option value="' . $obj->user_id . '" ' . $selected . '>' . $obj->name . ' (' . $obj->user_id . ')</option>';
            }
        }

        echo $str;
    }



    public function get_exam_type_by_school() {

        $school_id = $this->input->post('school_id');
        $exam_type_id = $this->input->post('exam_type_id');
        $school = $this->ajax->get_school_by_id($school_id);     
        
        
        $exams = $this->db->get_where('exam_types',['school_id'=>$school_id, 'academic_year_id' =>$school->academic_year_id])->result();
               
        $str = '<option value="">Select Exam Type</option>';
        $select = 'selected="selected"';
        if (!empty($exams)) {
            foreach ($exams as $obj) {
                $selected = $exam_type_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->title . '</option>';
            }
        }
        echo $str;
    }




    public function get_exam_sub_type_by_exam() {

        $school_id = $this->input->post('school_id');
        $exam_type_id = $this->input->post('exam_type_id');
        $exam_sub_type_id = $this->input->post('exam_sub_type_id');
        $school = $this->ajax->get_school_by_id($school_id);     
        
        
        $exams = $this->db->get_where('exam_sub_types', ['exam_type_id'=>$exam_type_id, 'school_id'=>$school_id, 'academic_year_id' =>$school->academic_year_id])->result();
               
        $str = '<option value="">Select Sub Exam Type</option>';
        $select = 'selected="selected"';
        if (!empty($exams)) {
            foreach ($exams as $obj) {
                $selected = $exam_sub_type_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->title . '</option>';
            }
        }
        echo $str;
        
    }

    

    /***************Function get_subject_by_class**********************************
     * @type            : Function
     * @function name   : get_subject_by_class
     * @description     : this function used to populate subject list by class 
     * @param           : null 
     * @return          : $str string  value with subject list
     * ********************************************************** */


    public function get_subject_by_class() {

        $school_id = $this->input->post('school_id');
        $class_id = $this->input->post('class_id');
        $subject_id = $this->input->post('subject_id');
       
        if($this->session->userdata('role_id') == TEACHER){
            $subjects = $this->ajax->get_list('subjects', array('status' => 1, 'class_id' => $class_id, 'school_id'=>$school_id,  'teacher_id'=>$this->session->userdata('profile_id')), '', '', '', 'id', 'ASC');
        }else{
            $subjects = $this->ajax->get_list('subjects', array('status' => 1, 'class_id' => $class_id, 'school_id'=>$school_id), '', '', '', 'id', 'ASC');
        }
       
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
       
        $select = 'selected="selected"';
        if(!empty($subjects)) {
            foreach ($subjects as $obj) {
                $selected = $subject_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';
            }
        }

        echo $str;
    }

    /**     * *************Function get_assignment_by_subject**********************************
     * @type            : Function
     * @function name   : get_assignment_by_subject
     * @description     : this function used to populate assignment list by subject 
      for user interface
     * @param           : null 
     * @return          : $str string  value with assignment list
     * ********************************************************** */
    public function get_assignment_by_subject() {

        $subject_id = $this->input->post('subject_id');
        echo $assignment_id = $this->input->post('assignment_id');

        $assignments = $this->ajax->get_list('assignments', array('status' => 1, 'subject_id' => $subject_id, 'academic_year_id' => $this->academic_year_id), '', '', '', 'id', 'ASC');
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($assignments)) {
            foreach ($assignments as $obj) {
                $selected = $assignment_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->title . '</option>';
            }
        }

        echo $str;
    }

    /**     * *************Function get_guardian_by_id**********************************
     * @type            : Function
     * @function name   : get_guardian_by_id
     * @description     : this function used to populate guardian information/value by id 
      for user interface
     * @param           : null 
     * @return          : $guardina json  value
     * ********************************************************** */
    public function get_guardian_by_id() {

        header('Content-Type: application/json');
        $guardian_id = $this->input->post('guardian_id');

        $guardian = $this->ajax->get_single('guardians', array('id' => $guardian_id));
        echo json_encode($guardian);
        die();
    }

    /**     * *************Function get_room_by_hostel**********************************
     * @type            : Function
     * @function name   : get_room_by_hostel
     * @description     : this function used to populate room list by hostel  
      for user interface
     * @param           : null 
     * @return          : $str string value with room list 
     * ********************************************************** */
    public function get_room_by_hostel() {

        $hostel_id = $this->input->post('hostel_id');

        $hostels = $this->ajax->get_list('rooms', array('status' => 1, 'hostel_id' => $hostel_id), '', '', '', 'id', 'ASC');
        $str = '<option value="">--.' . $this->lang->line('select_room_no') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($hostels)) {
            foreach ($hostels as $obj) {
                $selected = $subject_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->room_no . ' [' . $this->lang->line($obj->room_type) . '] [ ' . $obj->cost . ' ]</option>';
            }
        }

        echo $str;
    }
    
    
    /*****************Function get_user_list_by_type**********************************
     * @type            : Function
     * @function name   : get_user_list_by_type
     * @description     : Load "Employee or Teacher Listing" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_user_list_by_type() {
        
         $school_id  = $this->input->post('school_id');
         $payment_to  = $this->input->post('payment_to');
         $user_id  = $this->input->post('user_id');
         
         $users = $this->ajax->get_user_list($school_id, $payment_to );
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($users)) {
            foreach ($users as $obj) {   
                $selected = $user_id == $obj->user_id ? $select : '';
                $str .= '<option value="' . $obj->user_id . '" ' . $selected . '>' . $obj->name .' [ '. $obj->designation . ' ]</option>';
            }
        }

        echo $str;
    }
    
  
    /*--------------START -------------------------*/
    
    /*****************Function get_designation_by_school**********************************
     * @type            : Function
     * @function name   : get_designation_by_school
     * @description     : Load "Designation Listing" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_designation_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $designation_id  = $this->input->post('designation_id');
         
        $designations = $this->ajax->get_list('designations', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($designations)) {
            foreach ($designations as $obj) {   
                
                $selected = $designation_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name .' </option>';
                
            }
        }

        echo $str;
    }
    
    
    /*****************Function get_salary_grade_by_school**********************************
     * @type            : Function
     * @function name   : get_salary_grade_by_school
     * @description     : Load "Salary grade Listing" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_salary_grade_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $salary_grade_id  = $this->input->post('salary_grade_id');
         
        $salary_grades = $this->ajax->get_list('salary_grades', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($salary_grades)) {
            foreach ($salary_grades as $obj) {   
                
                $selected = $salary_grade_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->grade_name .' </option>';
                
            }
        }

        echo $str;
    }
    
    
    /*****************Function get_teacher_by_school**********************************
     * @type            : Function
     * @function name   : get_teacher_by_school
     * @description     : Load "Teacher Listing" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_teacher_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $teacher_id  = $this->input->post('teacher_id');
         $is_all  = $this->input->post('is_all');
         
        $teachers = $this->ajax->get_list('teachers', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
        if($is_all){
            $str = '<option value="0">' . $this->lang->line('all_teacher') . '</option>';    
        }else{
            $str = '<option value="">--' . $this->lang->line('select') . '--</option>';            
        }
        
        $select = 'selected="selected"';
        if (!empty($teachers)) {
            foreach ($teachers as $obj) {   
                
                $selected = $teacher_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';
                
            }
        }

        echo $str;
    }
    
    public function get_roles_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $role_id  = $this->input->post('role_id');
         $is_all  = $this->input->post('is_all');
         
        $roles = $this->ajax->get_list('roles', array('status'=> 1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
        if($is_all){
            $str = '<option value="0">' . $this->lang->line('all_teacher') . '</option>';    
        }else{
            $str = '<option value="">--' . $this->lang->line('select') . '--</option>';            
        }
        
        $select = 'selected="selected"';
        if (!empty($roles)) {
            foreach ($roles as $obj) {   
                
                $selected = $role_id == $obj->id ? $select : '';
                $str .= '<option data-type="'.strtolower($obj->name).'" value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';
                
            }
        }

        echo $str;
    }


    public function get_single_role_id_by_type() {
        
         $school_id  = $this->input->post('school_id');
         $type  = $this->input->post('type');
         
        $roles = $this->db->get_where('roles', array('status'=> 1, 'slug'=>$type.$school_id))->row(); 
        if ($roles) {
            echo $roles->id;
        }else{
            echo "3";
        }
    }

    
    public function get_group_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $group_id  = $this->input->post('group_id');
         $is_all  = $this->input->post('is_all');
         
        $groups = $this->ajax->get_list('groups', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
        if($is_all){
            $str = '<option value="0">' . $this->lang->line('all_group') . '</option>';    
        }else{
            $str = '<option value="">--' . $this->lang->line('select') . '--</option>';            
        }
        
        $select = 'selected="selected"';
        if (!empty($groups)) {
            foreach ($groups as $obj) {   
                
                $selected = $group_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';
                
            }
        }

        echo $str;
    }
    
    public function get_level_by_group() {
        
         $group_id  = $this->input->post('group_id');
         $level_id  = $this->input->post('level_id');
         $is_all  = $this->input->post('is_all');
         
        $levels = $this->ajax->get_list('levels', array('status'=>1, 'group_id'=> $group_id), '','', '', 'id', 'ASC'); 
         
        if($is_all){
            $str = '<option value="0">' . $this->lang->line('all_level') . '</option>';    
        }else{
            $str = '<option value="">--' . $this->lang->line('select') . '--</option>';            
        }
        
        $select = 'selected="selected"';
        if (!empty($levels)) {
            foreach ($levels as $obj) {   
                
                $selected = $level_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';
                
            }
        }

        echo $str;
    }
    
    /*****************Function get_employee_by_school**********************************
     * @type            : Function
     * @function name   : get_employee_by_school
     * @description     : Load "Employee Listing" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_employee_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $employee_id  = $this->input->post('employee_id');
         $is_all  = $this->input->post('is_all');
         
        $employees = $this->ajax->get_list('employees', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
         if($is_all){
            $str = '<option value="0">' . $this->lang->line('all_employee') . '</option>';    
        }else{
            $str = '<option value="">--' . $this->lang->line('select') . '--</option>';            
        }
        
        $select = 'selected="selected"';
        if (!empty($employees)) {
            foreach ($employees as $obj) {   
                
                $selected = $employee_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name .'</option>';
                
            }
        }

        echo $str;
    }
    
    
    /*****************Function get_guardian_by_school**********************************
     * @type            : Function
     * @function name   : get_guardian_by_school
     * @description     : Load "Guardian Listing" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_guardian_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $guardian_id  = $this->input->post('guardian_id');
         
        $guardinas = $this->ajax->get_list('guardians', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($guardinas)) {
            foreach ($guardinas as $obj) {   
                
                $selected = $guardian_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';
                
            }
        }

        echo $str;
    }
    
    
    /*****************Function get_discount_by_school**********************************
     * @type            : Function
     * @function name   : get_discount_by_school
     * @description     : Load "Discount Listing" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_discount_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $discount_id  = $this->input->post('discount_id');
         
        $discounts = $this->ajax->get_list('discounts', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($discounts)) {
            foreach ($discounts as $obj) {   
                
                $selected = $discount_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->title . '</option>';
                
            }
        }

        echo $str;
    }
    
    
    
    /*****************Function get_student_type_by_school**********************************
     * @type            : Function
     * @function name   : get_student_type_by_school
     * @description     : Load "Student type Listing" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_student_type_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $type_id  = $this->input->post('type_id');
         
        $types = $this->ajax->get_list('student_types', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($types)) {
            foreach ($types as $obj) {   
                
                $selected = $type_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->type . '</option>';
                
            }
        }

        echo $str;
    }
    
    
    /*****************Function get_class_by_school**********************************
     * @type            : Function
     * @function name   : get_class_by_school
     * @description     : Load "Class Listing" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_class_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $class_id  = $this->input->post('class_id');

         if ($this->session->userdata('role_id') == STUDENT) {
            $classes = $this->ajax->get_list('classes', array('status'=>1, 'id'=>$this->session->userdata('class_id'), 'school_id'=>$school_id), '','', '', 'id', 'ASC');  
        }else{
            $classes = $this->ajax->get_list('classes', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
        }
         
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($classes)) {
            foreach ($classes as $obj) {                  
                $selected = $class_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';
                
            }
        }

        echo $str;
    }
    
    public function get_route_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $class_id  = $this->input->post('class_id');

         if ($this->session->userdata('role_id') == STUDENT) {
            $classes = $this->ajax->get_list('classes', array('status'=>1, 'id'=>$this->session->userdata('class_id'), 'school_id'=>$school_id), '','', '', 'id', 'ASC');
            
            
            $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
            $select = 'selected="selected"';
            if (!empty($classes)) {
                foreach ($classes as $obj) {                  
                    $selected = $class_id == $obj->id ? $select : '';
                    $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';
                    
                }
            }
    
            echo $str;


        }else{
            $classes = $this->ajax->get_list('routes', array('status'=>1, 'school_id'=> $school_id), '','', '', 'id', 'ASC'); 


            $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
            $select = 'selected="selected"';
            if (!empty($classes)) {
                foreach ($classes as $obj) {                  
                    $selected = $class_id == $obj->id ? $select : '';
                    $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->title . '</option>';
                    
                }
            }
    
            echo $str;
        }
         
         
       
    }
    
    
  
    
    /*****************Function get_exam_by_school**********************************
     * @type            : Function
     * @function name   : get_exam_by_school
     * @description     : Load "Exam Listing" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_exam_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $exam_id  = $this->input->post('exam_id');
         
        $exams = $this->ajax->get_list('exams', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($exams)) {
            foreach ($exams as $obj) {   
                
                $selected = $exam_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->title . '</option>';
                
            }
        }

        echo $str;
    }



    public function get_exam_by_school_for_both() {
        
        $school_id  = $this->input->post('school_id');
        $exam_id  = explode('_',$this->input->post('exam_id'));

        $main_exam_id = '';
        $main_onlineexam_id = '';

        if ($exam_id[0] == 'exam') {
            $main_exam_id = $exam_id[1];
        }else{
            $main_onlineexam_id = $exam_id[1];
        }
        


       $exams = $this->ajax->get_list('exams', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
       $exam_online_exams = $this->ajax->get_list('exam_online_exams', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
        
       $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
       $select = 'selected="selected"';
       if (!empty($exams) || !empty($exam_online_exams)) {
           foreach ($exams as $obj) { 
               $selected = $main_exam_id == $obj->id ? $select : '';
               $str .= '<option value="exam_' . $obj->id . '" ' . $selected . '>' . $obj->title . '</option>';
               
           }
           foreach ($exam_online_exams as $obj) { 
               $selected = $main_onlineexam_id == $obj->id ? $select : '';
               $str .= '<option value="online_' . $obj->id . '" ' . $selected . '>' . $obj->title . '</option>';
               
           }
       }

       echo $str;
   }
   
   
    
    
    
    
    /*****************Function get_certificate_type_by_school**********************************
     * @type            : Function
     * @function name   : get_certificate_type_by_school
     * @description     : Load "Certificate Type Listing" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_certificate_type_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $certificate_id  = $this->input->post('certificate_id');
         
        $certificates = $this->ajax->get_list('certificates', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($certificates)) {
            foreach ($certificates as $obj) {   
                
                $selected = $certificate_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->name . '</option>';
                
            }
        }

        echo $str;
    }
    
    /*****************Function get_gallery_by_school**********************************
     * @type            : Function
     * @function name   : get_gallery_by_school
     * @description     : Load "Gallery Listing" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_gallery_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $gallery_id  = $this->input->post('gallery_id');
         
        $galleries = $this->ajax->get_list('galleries', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($galleries)) {
            foreach ($galleries as $obj) {   
                
                $selected = $gallery_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->title . '</option>';
                
            }
        }

        echo $str;
    }
    
    /*****************Function get_leave_type_by_school**********************************
     * @type            : Function
     * @function name   : get_leave_type_by_school
     * @description     : Load "Leave type Listing" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_leave_type_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $role_id  = $this->input->post('role_id');
         $type_id  = $this->input->post('type_id');
         
        $types = $this->ajax->get_list('leave_types', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($types)) {
            foreach ($types as $obj) {   
                
                $selected = $type_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->type . '</option>';
                
            }
        }

        echo $str;
    }
    
    /*****************Function get_visitor_purpose_by_school**********************************
     * @type            : Function
     * @function name   : get_visitor_purpose_by_school
     * @description     : Load "Visitor purpose Listing" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_visitor_purpose_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $purpose_id  = $this->input->post('purpose_id');
         
        $purposes = $this->ajax->get_list('visitor_purposes', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($purposes)) {
            foreach ($purposes as $obj) {   
                
                $selected = $purpose_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->purpose . '</option>';
                
            }
        }

        echo $str;
    }
    
    
    /*****************Function get_complain_type_by_school**********************************
     * @type            : Function
     * @function name   : get_complain_type_by_school
     * @description     : Load "Complain type Listing" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_complain_type_by_school() {
        
         $school_id  = $this->input->post('school_id');
         $type_id  = $this->input->post('type_id');
         
        $types = $this->ajax->get_list('complain_types', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($types)) {
            foreach ($types as $obj) {   
                
                $selected = $type_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->type . '</option>';
                
            }
        }

        echo $str;
    }
    
    
    /*****************Function get_user_single_payment**********************************
     * @type            : Function
     * @function name   : get_user_single_payment
     * @description     : validate the paymeny to user already paid for selected month               
     *                    
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_user_single_payment() {
        
         $payment_to  = $this->input->post('payment_to');
         $user_id  = $this->input->post('user_id');
         $salary_month  = $this->input->post('salary_month');
         
         $exist = $this->ajax->get_single('salary_payments',array('user_id'=>$user_id, 'salary_month'=>$salary_month, 'payment_to'=>$payment_to ));
         
         if($exist){
             echo 1;
         }else{
             echo 2;
         }         
    }
    
    /*****************Function get_school_info_by_id**********************************
     * @type            : Function
     * @function name   : get_school_info_by_id
     * @description     : validate the paymeny to user already paid for selected month               
     *                    
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_school_info_by_id() {
        
         $school_id  = $this->input->post('school_id');
         
         $school = $this->ajax->get_single('schools',array('id'=>$school_id));         
         echo $school->final_result_type;        
    }
    
    /*****************Function get_sms_gateways**********************************
     * @type            : Function
     * @function name   : get_sms_gateways
     * @description     : Load "SMS Settings" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_sms_gateways() {
        
        $school_id  = $this->input->post('school_id');
         
        $gateways = get_sms_gateways($school_id);
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        if (!empty($gateways)) {
            foreach ($gateways as $key=>$value) {   
                
                $str .= '<option value="' . $key . '" >' . $value . '</option>';
                
            }
        }

        echo $str;
    }
    
    
    

    
    
    /*****************Function get_academic_year_by_school**********************************
     * @type            : Function
     * @function name   : get_academic_year_by_school
     * @description     : Load "SMS Settings" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_academic_year_by_school() {
        
        $school_id  = $this->input->post('school_id');
        $academic_year_id  = $this->input->post('academic_year_id');
         
        $academic_years = $this->ajax->get_list('academic_years', array('school_id'=>$school_id,'status' => 1), '','', '', 'id', 'ASC');
         
        $str = '<option value="">--' . $this->lang->line('session_year') . '--</option>';
        $select = 'selected="selected"';
        $running = ''; 
        if (!empty($academic_years)) {
            foreach($academic_years as $obj ){   
                $running = $obj->is_running ? ' ['.$this->lang->line('running_year').']' : '';
                $selected = $academic_year_id == $obj->id ? $select : '';                
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->session_year . $running .'</option>';
            }
        }

        echo $str;
    }
    
    
        
    /** * *************Function get_email_template_by_role**********************************
     * @type            : Function
     * @function name   : get_email_template_by_role
     * @description     : this function used to populate template by role  
      for user interface
     * @param           : null 
     * @return          : $str string value with room list 
     * ********************************************************** */
    public function get_email_template_by_role() {

        $role_id = $this->input->post('role_id');
        $school_id = $this->input->post('school_id');

        $templates = $this->ajax->get_list('email_templates', array('status' => 1, 'role_id' => $role_id,'school_id'=>$school_id), '', '', '', 'id', 'ASC');
        $str = '<option value="">-- ' . $this->lang->line('template') . ' --</option>';
        if (!empty($templates)) {
            foreach ($templates as $obj) {
                $str .= '<option itemid="'.$obj->id.'" value="' . $obj->id . '">' . $obj->title . '</option>';
            }
        }

        echo $str;
    }
    
        
    /** * *************Function get_email_template_by_id**********************************
     * @type            : Function
     * @function name   : get_email_template_by_id
     * @description     : this function used to populate template by role  
      for user interface
     * @param           : null 
     * @return          : $str string value with room list 
     * ********************************************************** */
    public function get_email_template_by_id() {

        $template_id = $this->input->post('template_id');
        $school_id = $this->input->post('school_id');

        $template = $this->ajax->get_single('email_templates', array('status' => 1, 'id' => $template_id,'school_id'=>$school_id), '', '', '', 'id', 'ASC');
        if (!empty($template)) {
           echo $template->template;
        }else{
            echo FALSE;
        }
    }
   
    
        
    /** * *************Function get_sms_template_by_role**********************************
     * @type            : Function
     * @function name   : get_sms_template_by_role
     * @description     : this function used to populate template by role  
      for user interface
     * @param           : null 
     * @return          : $str string value with room list 
     * ********************************************************** */
    public function get_sms_template_by_role() {

        $role_id = $this->input->post('role_id');
        $school_id = $this->input->post('school_id');

        $templates = $this->ajax->get_list('sms_templates', array('status' => 1, 'role_id' => $role_id,'school_id'=>$school_id), '', '', '', 'id', 'ASC');
        $str = '<option value="">-- ' . $this->lang->line('template') . ' --</option>';
        if (!empty($templates)) {
            foreach ($templates as $obj) {
                $str .= '<option itemid="'.$obj->id.'" value="' . $obj->template . '">' . $obj->title . '</option>';
            }
        }

        echo $str;
    }
    
    
    
        
    /** * *************Function get_current_session_by_school**********************************
     * @type            : Function
     * @function name   : get_current_session_by_school
     * @description     : this function used to populate template by role  
      for user interface
     * @param           : null 
     * @return          : $str string value with room list 
     * ********************************************************** */
    public function get_current_session_by_school() {

        $current_session_id = $this->input->post('current_session_id');
        $school_id = $this->input->post('school_id');
        
        $school = $this->ajax->get_school_by_id($school_id);
        
        $curr_session = $this->ajax->get_list('academic_years', array('id' => $school->academic_year_id, 'school_id'=>$school_id));
        $str = '<option value="">-- ' . $this->lang->line('select') . ' --</option>';
         $select = 'selected="selected"';
         
        if (!empty($curr_session)) {
            foreach ($curr_session as $obj) {
                $selected = $current_session_id == $obj->id ? $select : '';  
                $str .= '<option value="'.$obj->id.'" '.$selected.'>' . $obj->session_year . '</option>';
            }
        }

        echo $str;
    }
    
    
        
    /** * *************Function get_next_session_by_school**********************************
     * @type            : Function
     * @function name   : get_next_session_by_school
     * @description     : this function used to populate template by role  
      for user interface
     * @param           : null 
     * @return          : $str string value with room list 
     * ********************************************************** */
    public function get_next_session_by_school() {

        $academic_year_id = $this->input->post('academic_year_id');
        $school_id = $this->input->post('school_id');
        $school = $this->ajax->get_school_by_id($school_id);
        
        $next_session = $this->ajax->get_list('academic_years', array('id !=' => $school->academic_year_id, 'school_id'=>$school_id));
        $str = '<option value="">-- ' . $this->lang->line('select') . ' --</option>';
        $select = 'selected="selected"';        
        
        if (!empty($next_session)) {
            foreach ($next_session as $obj) {
                
                $selected = $academic_year_id == $obj->id ? $select : ''; 
                $str .= '<option value="'.$obj->id.'" ' . $selected . '>' . $obj->session_year . '</option>';
            }
        }

        echo $str;
    }
    
    
        
    
     /*****************Function get_lesson_by_subject**********************************
     * @type            : Function
     * @function name   : get_lesson_by_subject
     * @description     : Load "Lesson by subject" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_lesson_by_subject() {
        
         $school_id = $this->input->post('school_id');
         $subject_id  = $this->input->post('subject_id');
         $lesson_detail_id  = $this->input->post('lesson_detail_id');
         
        $school = $this->ajax->get_school_by_id($school_id); 
        $lessons = $this->ajax->get_lesson_by_subject($subject_id, @$school->academic_year_id); 
        
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($lessons)) {
            foreach ($lessons as $obj) {   
                
                $selected = $lesson_detail_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->title . '</option>';
                
            }
        }

        echo $str;
    }
   
    /*****************Function update_status_type**********************************
     * @type            : Function
     * @function name   : update_status_type
     * @description     : update_status_type               
     *                    
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function update_student_status_type() {
        
         $student_id = $this->input->post('student_id');
         $status     = $this->input->post('status');
         
         echo $this->ajax->update('students', array('modified_at'=>date('Y-m-d H:i:s'), 'status_type'=>$status), array('id'=>$student_id));         
    }

}
