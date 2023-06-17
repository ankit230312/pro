<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth_Model
 *
 * @author Nafeesa
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Role_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
               
    function duplicate_check($name, $id = null ){           
           
        if($id){
            $this->db->where_not_in('id', $id);
        }

        if($this->session->userdata('role_id') != SUPER_ADMIN){             
            $this->db->where('school_id', $this->session->userdata('school_id'));
        }else{
            $this->db->where('school_id', '0');
        }
        $this->db->where('name', $name);
        return $this->db->get('roles')->num_rows();            
    }
}
