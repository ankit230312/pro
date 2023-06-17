<?php

defined('BASEPATH') or exit('No direct script access allowed');

/* * *****************Marksheet.php**********************************
 * @product name    : Educlouds
 * @type            : Class
 * @class name      : Marksheet
 * @description     : Manage exam resultcard sheet.  
 * @author          : makemaya Team 	
 * @url             : https://educlouds.app/      
 * @support         : aniltomar95@gmail.com	
 * @copyright       : makemaya Team	 	
 * ********************************************************** */

class Resultcard extends MY_Controller
{

    public $data = array();

    function __construct()
    {
        parent::__construct();

        $this->load->model('Resultcard_Model', 'resultcard', true);

        // need to check school subscription status
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {
            if (!check_saas_status($this->session->userdata('school_id'), 'is_enable_exam_mark')) {
                redirect('dashboard/index');
            }
        }
    }


    /*****************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : Load "result card" user interface                 
     *                    with data filter option
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function index()
    {

        check_permission(VIEW);

        if ($_POST) {

            // echo "<pre>";
            // print_r($_POST);

            if ($this->session->userdata('role_id') == STUDENT) {

                $student = get_user_by_role($this->session->userdata('role_id'), $this->session->userdata('id'));

                $school_id = $student->school_id;
                $class_id = $student->class_id;
                $section_id = $student->section_id;
                $student_id = $student->id;
            } else {

                $school_id = $this->input->post('school_id');
                $class_id = $this->input->post('class_id');
                $section_id = $this->input->post('section_id');
                $student_id = $this->input->post('student_id');
                $exam_type_id = $this->input->post('exam_type_id');
                $exam_sub_type_id = $this->input->post('exam_sub_type_id');
                $exam_mode_id = $this->input->post('exam_mode_id');
                $exam_list = $this->input->post('exam_list');
                $exam_list_online = $this->input->post('exam_list_online');

                $std = $this->resultcard->get_single('students', array('id' => $student_id));
                $student = get_user_by_role(STUDENT, $std->user_id);
            }

            $school = $this->resultcard->get_school_by_id($school_id);
            $academic_year_id = $this->input->post('academic_year_id');
            $condition =  array('school_id' => $school_id, 'status' => 1, 'academic_year_id' => $academic_year_id);

            if ($exam_type_id) {

                $condition['exam_type_id'] = $exam_type_id;
            }
            if ($exam_sub_type_id) {
                $condition['exam_sub_type_id'] = $exam_sub_type_id;
            }

            // $this->db->where_in('id', $exam_list);
            // $this->data['online_exams'] = $this->resultcard->get_list('exam_online_exams', $condition, '', '', '', 'id', 'ASC');



            $this->db->where_in('id', $exam_list);
            $this->data['exams'] = $this->resultcard->get_list('exams', $condition, '', '', '', 'id', 'ASC');


            // if($_POST['exam_mode_id'] == 1){
            //     $this->db->where_in('id', $exam_list);
            //     $this->data['exams'] = $this->resultcard->get_list('exams', $condition, '', '', '', 'id', 'ASC');
            // }

            // if($_POST['exam_mode_id'] == 0){
            //     $this->db->where_in('id', $exam_list);
            //     $this->data['online_exams'] = $this->resultcard->get_list('exam_online_exams', $condition, '', '', '', 'id', 'ASC');

            // }

            // if($_POST['exam_mode_id'] == 2){
            //     $this->db->where_in('id', $exam_list);
            //     $this->data['online_exams'] = $this->resultcard->get_list('exam_online_exams', $condition, '', '', '', 'id', 'ASC');

            //     $this->db->where_in('id', $exam_list);
            //     $this->data['exams'] = $this->resultcard->get_list('exams', $condition, '', '', '', 'id', 'ASC');

            // }

            $this->data['school'] = $school;
            $this->data['school_id'] = $school_id;
            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['student'] = $student;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;
            $this->data['student_id'] = $student_id;
            $this->data['exam_type_id'] = $exam_type_id;
            $this->data['exam_sub_type_id'] = $exam_sub_type_id;
            $this->data['exam_mode_id'] = $exam_mode_id;
            $this->data['exam_list'] = $exam_list;
            $this->data['exam_list_online'] = $exam_list_online;

            // $this->data['final_result'] = $this->resultcard->get_final_result($school_id, $academic_year_id, $class_id, $section_id, $student_id);
            $this->data['final_result'] = get_exam_result_multi_exams($school_id, $exam_list, $student_id, $academic_year_id, $class_id, $section_id = null);

            // echo "<pre>";
            // print_r($this->data['final_result']);

            // if($_POST['exam_mode_id'] == 1){
            //     $this->db->where_in('id', $exam_list);
            //     $this->data['exams_list'] = $this->db->get_where('exams', array('school_id'=>$school_id, 'status' => 1, 'academic_year_id' => $academic_year_id));
            // }


            // if($_POST['exam_mode_id'] == 0){
            //     $this->db->where_in('id', $exam_list_online);
            //     $this->data['online_exam_list'] = $this->db->get_where('exam_schedules', array('school_id'=>$school_id, 'status' => 1, 'academic_year_id' => $academic_year_id))->result();

            // }



            // if($_POST['exam_mode_id'] == 2){
            //     $this->db->where_in('id', $exam_list_online);
            //     $this->data['online_exam_list'] = $this->db->get_where('exam_schedules', array('school_id'=>$school_id, 'status' => 1, 'academic_year_id' => $academic_year_id))->result();

            //     $this->db->where_in('id', $exam_list);
            //     $this->data['exams_list'] = $this->db->get_where('exams', array('school_id'=>$school_id, 'status' => 1, 'academic_year_id' => $academic_year_id));           

            // }

            $this->db->where_in('exam_id', $exam_list);
            $this->data['online_exam_list'] = $this->db->get_where('exam_schedules', array('school_id' => $school_id, 'status' => 1, 'academic_year_id' => $academic_year_id))->result();

            $this->db->where_in('id', $exam_list);
            $this->data['exams_list'] = $this->db->get_where('exams', array('school_id' => $school_id, 'status' => 1, 'academic_year_id' => $academic_year_id));
        }


        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {

            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->resultcard->get_list('classes', $condition, '', '', '', 'id', 'ASC');
            $this->data['academic_years'] = $this->resultcard->get_list('academic_years', $condition, '', '', '', 'id', 'ASC');
        }

        // echo "<pre>";
        // print_r($this->data);

        // die;


        $this->layout->title($this->lang->line('manage_result_card') . ' | ' . SMS);
        $this->layout->view('result_card/index', $this->data);
    }


    public function cbse_result()
    {


        check_permission(VIEW);

        if ($_POST) {

            // echo "<pre>";
            // print_r($_POST);

            if ($this->session->userdata('role_id') == STUDENT) {

                $student = get_user_by_role($this->session->userdata('role_id'), $this->session->userdata('id'));

                $school_id = $student->school_id;
                $class_id = $student->class_id;
                $section_id = $student->section_id;
                $student_id = $student->id;
            } else {

                $school_id = $this->input->post('school_id');
                $class_id = $this->input->post('class_id');
                $section_id = $this->input->post('section_id');
                $student_id = $this->input->post('student_id');
                $exam_type_id = $this->input->post('exam_type_id');
                $exam_sub_type_id = $this->input->post('exam_sub_type_id');
                $exam_mode_id = $this->input->post('exam_mode_id');
                $exam_list = $this->input->post('exam_list');
                $exam_list_online = $this->input->post('exam_list_online');

                $std = $this->resultcard->get_single('students', array('id' => $student_id));
                $student = get_user_by_role(STUDENT, $std->user_id);
            }

            $school = $this->resultcard->get_school_by_id($school_id);
            $academic_year_id = $this->input->post('academic_year_id');
            $condition =  array('school_id' => $school_id, 'status' => 1, 'academic_year_id' => $academic_year_id);

            if ($exam_type_id) {

                $condition['exam_type_id'] = $exam_type_id;
            }
            if ($exam_sub_type_id) {
                $condition['exam_sub_type_id'] = $exam_sub_type_id;
            }

            // $this->db->where_in('id', $exam_list);
            // $this->data['online_exams'] = $this->resultcard->get_list('exam_online_exams', $condition, '', '', '', 'id', 'ASC');



            $this->db->where_in('id', $exam_list);
            $this->data['exams'] = $this->resultcard->get_list('exams', $condition, '', '', '', 'id', 'ASC');


            // if($_POST['exam_mode_id'] == 1){
            //     $this->db->where_in('id', $exam_list);
            //     $this->data['exams'] = $this->resultcard->get_list('exams', $condition, '', '', '', 'id', 'ASC');
            // }

            // if($_POST['exam_mode_id'] == 0){
            //     $this->db->where_in('id', $exam_list);
            //     $this->data['online_exams'] = $this->resultcard->get_list('exam_online_exams', $condition, '', '', '', 'id', 'ASC');

            // }

            // if($_POST['exam_mode_id'] == 2){
            //     $this->db->where_in('id', $exam_list);
            //     $this->data['online_exams'] = $this->resultcard->get_list('exam_online_exams', $condition, '', '', '', 'id', 'ASC');

            //     $this->db->where_in('id', $exam_list);
            //     $this->data['exams'] = $this->resultcard->get_list('exams', $condition, '', '', '', 'id', 'ASC');

            // }

            $this->data['school'] = $school;
            $this->data['school_id'] = $school_id;
            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['student'] = $student;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;
            $this->data['student_id'] = $student_id;
            $this->data['exam_type_id'] = $exam_type_id;
            $this->data['exam_sub_type_id'] = $exam_sub_type_id;
            $this->data['exam_mode_id'] = $exam_mode_id;
            $this->data['exam_list'] = $exam_list;
            $this->data['exam_list_online'] = $exam_list_online;

            // $this->data['final_result'] = $this->resultcard->get_final_result($school_id, $academic_year_id, $class_id, $section_id, $student_id);
            $this->data['final_result'] = get_exam_result_multi_exams($school_id, $exam_list, $student_id, $academic_year_id, $class_id, $section_id = null);

            // echo "<pre>";
            // print_r($this->data['final_result']);

            // if($_POST['exam_mode_id'] == 1){
            //     $this->db->where_in('id', $exam_list);
            //     $this->data['exams_list'] = $this->db->get_where('exams', array('school_id'=>$school_id, 'status' => 1, 'academic_year_id' => $academic_year_id));
            // }


            // if($_POST['exam_mode_id'] == 0){
            //     $this->db->where_in('id', $exam_list_online);
            //     $this->data['online_exam_list'] = $this->db->get_where('exam_schedules', array('school_id'=>$school_id, 'status' => 1, 'academic_year_id' => $academic_year_id))->result();

            // }



            // if($_POST['exam_mode_id'] == 2){
            //     $this->db->where_in('id', $exam_list_online);
            //     $this->data['online_exam_list'] = $this->db->get_where('exam_schedules', array('school_id'=>$school_id, 'status' => 1, 'academic_year_id' => $academic_year_id))->result();

            //     $this->db->where_in('id', $exam_list);
            //     $this->data['exams_list'] = $this->db->get_where('exams', array('school_id'=>$school_id, 'status' => 1, 'academic_year_id' => $academic_year_id));           

            // }

            $this->db->where_in('exam_id', $exam_list);
            $this->data['online_exam_list'] = $this->db->get_where('exam_schedules', array('school_id' => $school_id, 'status' => 1, 'academic_year_id' => $academic_year_id))->result();

            $this->db->where_in('id', $exam_list);
            $this->data['exams_list'] = $this->db->get_where('exams', array('school_id' => $school_id, 'status' => 1, 'academic_year_id' => $academic_year_id));
        }


        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {

            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->resultcard->get_list('classes', $condition, '', '', '', 'id', 'ASC');
            $this->data['academic_years'] = $this->resultcard->get_list('academic_years', $condition, '', '', '', 'id', 'ASC');
        }

        // echo "<pre>";
        // print_r($this->data);

        // die;


        $this->layout->title($this->lang->line('manage_cbse_result_card') . ' | ' . SMS);
        $this->layout->view('result_card/cbse_result', $this->data);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function result_card_format()
    {
        $this->load->model('Resultcard_Model');

        $data["fetch"] =  $this->Resultcard_Model->get_result_col();
        $this->layout->title($this->lang->line('result_card_format') . ' | ' . SMS);
        $this->layout->view('result_card/result_card_format', $data);
    }
    public function result_card_col_ins1()
    {
        $this->load->model('Resultcard_Model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ins_col', 'Username', 'required|trim');
        if ($this->form_validation->run() == TRUE) {
            echo "sucess";
        } else {
            // $this->load->view('result_card/result_card_col_ins');
        }


        $this->Resultcard_Model->insert_col();


        $this->layout->title($this->lang->line('result_card_format') . ' | ' . SMS);
        $this->layout->view('result_card/result_card_col_ins');
    }
    public function insert_col_update()
    {
       
        $this->load->model('Resultcard_Model');
        $ids = implode( ",",$this->input->post("id"));       

        $up =    $this->Resultcard_Model->insert_col_update($ids);
        echo json_encode($up);

       
    }


    public function result_card_format_edit()
    {
        $this->load->model('Resultcard_Model');
        // echo "uri=". $this->uri->segment("4");
        // echo "<br>";
        $data["edit_col"] =  $this->Resultcard_Model->reportcard_format_edit($this->uri->segment("4"));
        // print_r( $data);

        $this->layout->title($this->lang->line('result_card_format') . ' | ' . SMS);
        $this->layout->view('result_card/reportcard_format_edit', $data);
    }

    public function result_card_format_update()
    {
        $this->load->model('Resultcard_Model');
        $this->Resultcard_Model->result_card_format_update($this->uri->segment("4"));

        redirect('exam/resultcard/result_card_format');

        // site_url("exam/resultcard/result_card_format");
    }

    public function result_card_format_delete()
    {
        $this->load->model('Resultcard_Model');
        $this->Resultcard_Model->result_card_format_delete($this->uri->segment("4"));
        redirect('exam/resultcard/result_card_format');
    }

    public function school_result_col()
    {
        $this->load->model('Resultcard_Model');

        $data["fetch_dd_selected"] =  $this->Resultcard_Model->school_result_col();

        $this->layout->view('result_card/result_check', $data);
    }


    public function reportCard_new_for()
    {


        check_permission(VIEW);

        if ($_POST) {

            // echo "<pre>";
            // print_r($_POST);

            if ($this->session->userdata('role_id') == STUDENT) {

                $student = get_user_by_role($this->session->userdata('role_id'), $this->session->userdata('id'));

                $school_id = $student->school_id;
                // echo $school_id;
                $class_id = $student->class_id;
                $section_id = $student->section_id;
                $student_id = $student->id;
            } else {

                $school_id = $this->input->post('school_id');

                $class_id = $this->input->post('class_id');
                $section_id = $this->input->post('section_id');
                $student_id = $this->input->post('student_id');
                $exam_type_id = $this->input->post('exam_type_id');
                $exam_sub_type_id = $this->input->post('exam_sub_type_id');
                $exam_mode_id = $this->input->post('exam_mode_id');
                $exam_list = $this->input->post('exam_list');
                $exam_list_online = $this->input->post('exam_list_online');

                $std = $this->resultcard->get_single('students', array('id' => $student_id));
                $student = get_user_by_role(STUDENT, $std->user_id);
            }

            $school = $this->resultcard->get_school_by_id($school_id);
            $academic_year_id = $this->input->post('academic_year_id');
            $condition =  array('school_id' => $school_id, 'status' => 1, 'academic_year_id' => $academic_year_id);

            if ($exam_type_id) {

                $condition['exam_type_id'] = $exam_type_id;
            }
            if ($exam_sub_type_id) {
                $condition['exam_sub_type_id'] = $exam_sub_type_id;
            }

            // $this->db->where_in('id', $exam_list);
            // $this->data['online_exams'] = $this->resultcard->get_list('exam_online_exams', $condition, '', '', '', 'id', 'ASC');



            $this->db->where_in('id', $exam_list);
            $this->data['exams'] = $this->resultcard->get_list('exams', $condition, '', '', '', 'id', 'ASC');


            // if($_POST['exam_mode_id'] == 1){
            //     $this->db->where_in('id', $exam_list);
            //     $this->data['exams'] = $this->resultcard->get_list('exams', $condition, '', '', '', 'id', 'ASC');
            // }

            // if($_POST['exam_mode_id'] == 0){
            //     $this->db->where_in('id', $exam_list);
            //     $this->data['online_exams'] = $this->resultcard->get_list('exam_online_exams', $condition, '', '', '', 'id', 'ASC');

            // }

            // if($_POST['exam_mode_id'] == 2){
            //     $this->db->where_in('id', $exam_list);
            //     $this->data['online_exams'] = $this->resultcard->get_list('exam_online_exams', $condition, '', '', '', 'id', 'ASC');

            //     $this->db->where_in('id', $exam_list);
            //     $this->data['exams'] = $this->resultcard->get_list('exams', $condition, '', '', '', 'id', 'ASC');

            // }

            $this->data['school'] = $school;
            $this->data['school_id'] = $school_id;
            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['student'] = $student;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;
            $this->data['student_id'] = $student_id;
            $this->data['exam_type_id'] = $exam_type_id;
            $this->data['exam_sub_type_id'] = $exam_sub_type_id;
            $this->data['exam_mode_id'] = $exam_mode_id;
            $this->data['exam_list'] = $exam_list;
            $this->data['exam_list_online'] = $exam_list_online;

            // $this->data['final_result'] = $this->resultcard->get_final_result($school_id, $academic_year_id, $class_id, $section_id, $student_id);
            $this->data['final_result'] = get_exam_result_multi_exams($school_id, $exam_list, $student_id, $academic_year_id, $class_id, $section_id = null);

            // echo "<pre>";
            // print_r($this->data['final_result']);

            // if($_POST['exam_mode_id'] == 1){
            //     $this->db->where_in('id', $exam_list);
            //     $this->data['exams_list'] = $this->db->get_where('exams', array('school_id'=>$school_id, 'status' => 1, 'academic_year_id' => $academic_year_id));
            // }


            // if($_POST['exam_mode_id'] == 0){
            //     $this->db->where_in('id', $exam_list_online);
            //     $this->data['online_exam_list'] = $this->db->get_where('exam_schedules', array('school_id'=>$school_id, 'status' => 1, 'academic_year_id' => $academic_year_id))->result();

            // }



            // if($_POST['exam_mode_id'] == 2){
            //     $this->db->where_in('id', $exam_list_online);
            //     $this->data['online_exam_list'] = $this->db->get_where('exam_schedules', array('school_id'=>$school_id, 'status' => 1, 'academic_year_id' => $academic_year_id))->result();

            //     $this->db->where_in('id', $exam_list);
            //     $this->data['exams_list'] = $this->db->get_where('exams', array('school_id'=>$school_id, 'status' => 1, 'academic_year_id' => $academic_year_id));           

            // }

            $this->db->where_in('exam_id', $exam_list);
            $this->data['online_exam_list'] = $this->db->get_where('exam_schedules', array('school_id' => $school_id, 'status' => 1, 'academic_year_id' => $academic_year_id))->result();

            $this->db->where_in('id', $exam_list);
            $this->data['exams_list'] = $this->db->get_where('exams', array('school_id' => $school_id, 'status' => 1, 'academic_year_id' => $academic_year_id));
        }


        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {

            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->resultcard->get_list('classes', $condition, '', '', '', 'id', 'ASC');
            $this->data['academic_years'] = $this->resultcard->get_list('academic_years', $condition, '', '', '', 'id', 'ASC');
        }

        // echo "<pre>";
        // print_r($this->data);

        // die;


        $this->layout->title($this->lang->line('manage_cbse_result_card') . ' | ' . SMS);
        $this->layout->view('result_card/reportCard_new_for', $this->data);
    }



    public function all()
    {

        check_permission(VIEW);

        if ($_POST) {


            $school_id = $this->input->post('school_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');

            if ($this->session->userdata('role_id') == STUDENT) {
                $class_id = $this->session->userdata('class_id');
                $section_id = $this->session->userdata('section_id');
            }

            $school = $this->resultcard->get_school_by_id($school_id);
            $academic_year_id = $this->input->post('academic_year_id');

            $students = $this->resultcard->get_student_list($school_id, $class_id, $section_id, $academic_year_id);
            $this->data['exams']    = $this->resultcard->get_list('exams', array('school_id' => $school_id, 'status' => 1, 'academic_year_id' => $academic_year_id), '', '', '', 'id', 'ASC');

            $this->data['school'] = $school;
            $this->data['school_id'] = $school_id;
            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['students'] = $students;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;
        }


        $condition = array();
        $condition['status'] = 1;
        if ($this->session->userdata('role_id') != SUPER_ADMIN) {

            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->resultcard->get_list('classes', $condition, '', '', '', 'id', 'ASC');
            $this->data['academic_years'] = $this->resultcard->get_list('academic_years', $condition, '', '', '', 'id', 'ASC');
        }

        $this->layout->title($this->lang->line('manage_all_result_card') . ' | ' . SMS);
        $this->layout->view('result_card/all', $this->data);
    }

    // public function get_exam_list_id($exam_list)
    // {
    //    $query = $this->db->select('*')
    //                 ->from('exam')                   
    //                 ->get();

    //    if($query->num_rows()>0)
    //    {
    //     // echo $this->db->last_query()."<br>";
    //     return $this->db->get()->result(); // return an array of objects
    //    }
    //    else
    //    {
    //     return null;
    //    } 
    // }
}
