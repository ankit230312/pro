<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Holiday_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_holiday_list($school_id = null){
        
        $this->db->select('H.*, S.school_name');
        $this->db->from('holidays AS H');
        $this->db->join('schools AS S', 'S.id = H.school_id', 'left');
        
        if($this->session->userdata('role_id') != SUPER_ADMIN){
            $this->db->where('H.school_id', $this->session->userdata('school_id'));
        }
        if($this->session->userdata('role_id') == SUPER_ADMIN && $school_id){
            $this->db->where('H.school_id', $school_id);
        }
        $this->db->where('S.status', 1);
        $this->db->order_by('H.id', 'DESC');
        
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
    
    public function get_single_holiday($holiday_id){
        
        $this->db->select('H.*, S.school_name');
        $this->db->from('holidays AS H');
        $this->db->join('schools AS S', 'S.id = H.school_id', 'left');
        $this->db->where('H.id', $holiday_id);
        return $this->db->get()->row();
        
    }
     function duplicate_check($school_id, $title, $date_from, $id = null ){           
           
        if($id){
            $this->db->where_not_in('id', $id);
        }
        $this->db->where('school_id', $school_id);
        $this->db->where('title', $title);
        $this->db->where('date_from', date('Y-m-d', strtotime($date_from)));
        return $this->db->get('holidays')->num_rows();            
    }

}
