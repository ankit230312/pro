<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resultcard_Model extends MY_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_final_result($school_id, $academic_year_id, $class_id, $section_id, $student_id)
    {
        $this->db->select('FR.*, G.name AS grade');
        $this->db->from('final_results AS FR');
        $this->db->join('grades AS G', 'G.id = FR.grade_id', 'left');
        $this->db->where('FR.academic_year_id', $academic_year_id);
        $this->db->where('FR.school_id', $school_id);
        $this->db->where('FR.class_id', $class_id);
        $this->db->where('FR.section_id', $section_id);
        $this->db->where('FR.student_id', $student_id);
        return $this->db->get()->row();
        //echo $this->db->last_query();   
    }




    public function get_student_list($school_id = null, $class_id = null, $section_id = null, $academic_year_id = null)
    {

        $this->db->select('S.*, D.amount, D.title AS discount, G.name AS guardian, E.roll_no, E.section_id, E.class_id, U.username, U.role_id,  C.name AS class_name, SE.name AS section');
        $this->db->from('enrollments AS E');
        $this->db->join('students AS S', 'S.id = E.student_id', 'left');
        $this->db->join('guardians AS G', 'G.id = S.guardian_id', 'left');
        $this->db->join('users AS U', 'U.id = S.user_id', 'left');
        $this->db->join('classes AS C', 'C.id = E.class_id', 'left');
        $this->db->join('sections AS SE', 'SE.id = E.section_id', 'left');
        $this->db->join('discounts AS D', 'D.id = S.discount_id', 'left');
        $this->db->where('S.school_id', $school_id);
        $this->db->where('E.class_id', $class_id);
        $this->db->where('E.academic_year_id', $academic_year_id);

        if ($section_id) {
            $this->db->where('E.section_id', $section_id);
        }

        if ($this->session->userdata('role_id') == GUARDIAN) {
            $this->db->where('S.guardian_id', $this->session->userdata('profile_id'));
        }

        if ($this->session->userdata('role_id') == STUDENT) {
            $this->db->where('S.id', $this->session->userdata('profile_id'));
        }

        $this->db->where('S.status_type', 'regular');
        $this->db->order_by('E.roll_no', 'ASC');

        return $this->db->get()->result();
    }

    public function get_result_col()
    {
        $this->db->select("*");
        $col = $this->db->get("result_card_column1");
        return $col;
    }
    public function get_schools()
    {
        $this->db->select("*");
        $school_data = $this->db->get("schools");
        return $school_data;
    }

    public function insert_col()
    {

        $data = array("result_col_name" => $this->input->post('ins_col'));
        $this->db->insert('result_card_column1', $data);
    }
    public function insert_col_update($id)
    {
        $ids = explode(",", $id);
        count($ids);
        $data = array("status" => 1);
        foreach ($ids as $ii) {


            $this->db->where("id", $ii);
            $this->db->update("result_card_column1", $data);
        }
    }



    public function reportcard_format_edit($id)
    {
        // echo "ID = ". $id;
        // echo "<br>";
        $this->db->select("*");
        $this->db->where("id", $id);
        $col_edit = $this->db->get("result_card_column1");
        //    print_r($col_edit->result());
        return $col_edit->row_array();
    }

    public function result_card_format_update($id)
    {
        // echo "ID = ". $id;
        // echo "<br>";
        $data = array("result_col_name" => $this->input->post('ins_col_up'));
        $this->db->where('id', $id);
        $this->db->update('result_card_column1', $data);
    }
    public function result_card_format_delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('result_card_column1');
    }
    public function school_result_col()
    {
        $this->db->select("*");
        // $this->db->where("school_id ",78);
        $col_school_selected = $this->db->get("result_card_column1");
        // print_r($col_school->result());
        return $col_school_selected;
    }
    public function dataset()
    {
        $this->db->select("*");
        $data_marks =  $this->db->get("marks");
        return $data_marks;
        //print_r($data_marks);
    }
}
