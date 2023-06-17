<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Onlineexam_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
     
        
    public function get_online_exam_list($school_id = null, $class_id = null, $subject_id = null, $academic_year_id = null){
                
               
        $this->db->select('OE.*,  SC.school_name, C.name AS class_name, SE.name AS section, S.name AS subject, AY.session_year, EI.instruction, EI.title AS ins_title');
        $this->db->from('exam_online_exams AS OE');
        $this->db->join('classes AS C', 'C.id = OE.class_id', 'left');
        $this->db->join('sections AS SE', 'SE.id = OE.section_id', 'left');
        $this->db->join('subjects AS S', 'S.id = OE.subject_id', 'left');
        $this->db->join('academic_years AS AY', 'AY.id = OE.academic_year_id', 'left');
        $this->db->join('exam_instructions AS EI', 'EI.id = OE.instruction_id', 'left');
        $this->db->join('schools AS SC', 'SC.id = OE.school_id', 'left');
                
        if($school_id){
            $this->db->where('OE.school_id', $school_id); 
        } 
        
        if($class_id){
             $this->db->where('OE.class_id', $class_id);
        } 
        
        if($subject_id){
             $this->db->where('OE.subject_id', $subject_id);
        } 
        
        if($academic_year_id){
            $this->db->where('OE.academic_year_id', $academic_year_id);
        }
	       
        return $this->db->get()->result();     
    }  
    
    public function get_single_online_exam($id){
        
        $this->db->select('OE.*,  SC.school_name, C.name AS class_name, SE.name AS section, S.name AS subject, AY.session_year, EI.instruction, EI.title AS ins_title');
        $this->db->from('exam_online_exams AS OE');
        $this->db->join('classes AS C', 'C.id = OE.class_id', 'left');
        $this->db->join('sections AS SE', 'SE.id = OE.section_id', 'left');
        $this->db->join('subjects AS S', 'S.id = OE.subject_id', 'left');
        $this->db->join('academic_years AS AY', 'AY.id = OE.academic_year_id', 'left');
        $this->db->join('exam_instructions AS EI', 'EI.id = OE.instruction_id', 'left');
        $this->db->join('schools AS SC', 'SC.id = OE.school_id', 'left');
        
        $this->db->where('OE.id', $id);
        return $this->db->get()->row();     
    } 



    
    public function get_user_list($school_id, $class_id, $section_id, $academic_year_id){
        
        $this->db->select('E.student_id, S.email, S.phone, S.name, S.guardian_id, U.username, U.role_id, U.id,  C.name AS class_name, G.name AS g_name, G.email AS g_email, G.phone AS g_phone');
        $this->db->from('enrollments AS E');
        $this->db->join('students AS S', 'S.id = E.student_id', 'left');
        $this->db->join('users AS U', 'U.id = S.user_id', 'left');
        $this->db->join('classes AS C', 'C.id = E.class_id', 'left');
        $this->db->join('guardians AS G', 'G.id = S.guardian_id', 'left');
        $this->db->where('E.academic_year_id', $academic_year_id);
        $this->db->where('E.class_id', $class_id);
        $this->db->where('E.section_id', $section_id);
        $this->db->where('E.school_id', $school_id);
        
        return $this->db->get()->result();
    }


    public function get_student_list_for_invigilate($school_id= null, $academic_year_id= null, $class_id= null, $subject_id= null, $exam_id= null){
        
        $school = $this->get_school_by_id($school_id);
        
        $this->db->select('E.roll_no, ST.name, C.name as class_name, S.name as class_name, S.name as subject_name, ST.id, ST.user_id');
        $this->db->from('enrollments AS E');        
        $this->db->join('students AS ST', 'ST.id = E.student_id', 'left');
        $this->db->join('classes AS C', 'C.id = E.class_id', 'left');
        $this->db->join('subjects AS S', 'S.school_id = E.school_id', 'left');
        $this->db->join('exam_online_exams AS ONE', 'ONE.school_id = E.school_id', 'left');

        
        if(!empty($school)){
             $this->db->where('E.academic_year_id', $school->academic_year_id); 
             $this->db->where('E.school_id', $school_id); 
             $this->db->where('ONE.id', $exam_id); 
             $this->db->where('S.id', $subject_id); 
        } 
        
        // $this->db->where('E.section_id', $section_id);        
        
        return $this->db->get()->result();        
    }
    
    
    public function get_question_list($school_id = null, $class_id = null, $subject_id = null){
        
        $this->db->select('EQ.*,  SC.school_name');
        $this->db->from('exam_questions AS EQ');        
        $this->db->join('schools AS SC', 'SC.id = EQ.school_id', 'left');
                
        if($school_id){
            $this->db->where('EQ.school_id', $school_id); 
        } 
        
        if($class_id){
             $this->db->where('EQ.class_id', $class_id);
        } 
        
        if($subject_id){
             $this->db->where('EQ.subject_id', $subject_id);
        } 
              
        return $this->db->get()->result();     
    }
                
    function duplicate_check($title, $school_id, $class_id, $subject_id, $id = null ){           
           
        if($id){
            $this->db->where_not_in('id', $id);
        }
        $this->db->where('title', $title);
        $this->db->where('school_id', $school_id);
        $this->db->where('class_id', $class_id);
        $this->db->where('subject_id', $subject_id);
        return $this->db->get('exam_online_exams')->num_rows();            
    }
    
    
    
}