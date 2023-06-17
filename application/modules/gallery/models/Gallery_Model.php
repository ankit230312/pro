<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }  
    
    public function get_gallery_list($school_id = null){
        
        $this->db->select('G.*, S.school_name');
        $this->db->from('galleries AS G');
        $this->db->join('schools AS S', 'S.id = G.school_id', 'left');
        
        if($this->session->userdata('role_id') != SUPER_ADMIN){
            $this->db->where('G.school_id', $this->session->userdata('school_id'));
        }
        if($this->session->userdata('role_id') == SUPER_ADMIN && $school_id){
            $this->db->where('G.school_id', $school_id);
        }   
        $this->db->where('S.status', 1);
        $this->db->order_by('G.id', 'DESC');
        
        return $this->db->get()->result();
        
    }



    public function get_user_list($school_id, $academic_year_id){
        
        $this->db->select('E.student_id, S.email, S.phone, S.name, S.guardian_id, U.username, U.role_id, U.id,  C.name AS class_name, G.name AS g_name, G.email AS g_email, G.phone AS g_phone');
        $this->db->from('enrollments AS E');
        $this->db->join('students AS S', 'S.id = E.student_id', 'left');
        $this->db->join('users AS U', 'U.id = S.user_id', 'left');
        $this->db->join('classes AS C', 'C.id = E.class_id', 'left');
        $this->db->join('guardians AS G', 'G.id = S.guardian_id', 'left');
        $this->db->where('E.academic_year_id', $academic_year_id);
        $this->db->where('E.school_id', $school_id);
        
        return $this->db->get()->result();
    }


    
     function duplicate_check($title, $id = null ){           
           
        if($id){
            $this->db->where_not_in('id', $id);
        }
        $this->db->where('title', $title);      
        return $this->db->get('galleries')->num_rows();            
    }

}
