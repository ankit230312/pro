<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class School_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_subscription_list() {

        $this->db->select('SP.*, S.school_name, P.plan_name, P.plan_price');
        $this->db->from('saas_subscriptions AS SP');
        $this->db->join('schools AS S', 'S.subscription_id = SP.id', 'left');
        $this->db->join('saas_plans AS P', 'P.id = SP.subscription_plan_id', 'left');
        $this->db->order_by('SP.id', 'ASC');
        return $this->db->get()->result();
        
    }

    
    public function get_subscription_list_only() {

        $this->db->select('*');
        $this->db->from('saas_plans');
        $this->db->order_by('id', 'ASC');
        return $this->db->get()->result();
        
    }

    /////////////////////////////////////////////////////////////////////

    public function get_school_result_col(){
        $this->db->select("*");
        $this->db->where("school_id ",78);
       $col_school= $this->db->get("result_card_column1");
        // print_r($col_school->result());
        return $col_school;
    }
    public function school_result_col(){
        $this->db->select("*");
        // $this->db->where("school_id ",78);
       $col_school_selected= $this->db->get("result_card_column1");
        // print_r($col_school->result());
        return $col_school_selected;
    }

    // public function school_reportcard_format_edit1(){
    //     // echo "ID = ". $id;
    //     // echo "<br>";
    //     $this->db->select("*");
    //     $this->db->where("school_id ",78);
    //    $school_col_edit= $this->db->get("result_card_column1");
    //     // print_r($school_col_edit->result());
    //     return $school_col_edit;
    // }

    /////////////////////////////////////////////////////////////////////////
    
    public function get_school_list() {

        $this->db->select('S.*, SS.subscription_status');
        $this->db->from('schools AS S');
        $this->db->join('saas_subscriptions AS SS', 'SS.id = S.subscription_id', 'left');
        $this->db->order_by('S.id', 'ASC');
        return $this->db->get()->result();
        
    }
    
    public function get_single_school($school_id) {

        $this->db->select('S.*, SS.subscription_status, SP.plan_name');
        $this->db->from('schools AS S');
        $this->db->join('saas_subscriptions AS SS', 'SS.id = S.subscription_id', 'left');
        $this->db->join('saas_plans AS SP', 'SP.id = SS.subscription_plan_id', 'left');
        $this->db->where('S.id', $school_id);
        return $this->db->get()->row();
        
    }
    
    function duplicate_check($school_name, $id = null ){           
           
        if($id){
            $this->db->where_not_in('id', $id);
        }
        $this->db->where('school_name', $school_name);
        return $this->db->get('schools')->num_rows();            
    }
}
