<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************generateticket.php**********************************
 * @product name    : Educlouds
 * @type            : Class
 * @class name      : generateticket
 * @description     : Manage school generateticket for guardian, student, teacher and employee.
 * @author          : makemaya Team
 * @url             : https://educlouds.app/
 * @support         : aniltomar95@gmail.com
 * @copyright       : makemaya Team
 * ********************************************************** */

class generateticket extends MY_Controller {

    public $data = array();

    function __construct() {

        parent::__construct();
        $this->load->model('generateticket_Model', 'generateticket', true);
        $this->data['roles'] = $this->generateticket->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');
        if($this->session->userdata('school_id') != '0'){
            $this->data['roles'] = $this->generateticket->get_list('roles', array('status' => 1, 'school_id' => $this->session->userdata('school_id')), '','', '', 'id', 'ASC');

        }
    }


    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "generateticket List" user interface
    *
    * @param           : null
    * @return          : null
    * ********************************************************** */
    public function index($school_id = null, $id = null) {

        if ($this->session->userdata('role_id') != SUPER_ADMIN) { 
           
            $this->data['generatetickets'] = $this->generateticket->get_generateticket_list();
        }else{
            $this->data['generatetickets'] = $this->generateticket->get_generateticket_list();
        }

        // print_r($this->data['generatetickets']);
        $this->data['filter_school_id'] = $school_id;
        $this->data['schools'] = $this->schools;

        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_generateticket') . ' | ' . SMS);
        $this->layout->view('generateticket/index', $this->data);
    }


    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new generateticket" user interface
    *                    and process to store "generateticket" into database
    * @param           : null
    * @return          : null
    * ********************************************************** */
    public function add() {

       if ($this->session->userdata('role_id') != SUPER_ADMIN) { 
            if ($_POST) {
                $this->_prepare_generateticket_validation();
                if ($this->form_validation->run() === TRUE) {
                    $data = $this->_get_posted_generateticket_data();

                    $insert_id = $this->generateticket->insert('generatetickets', $data);
                    if ($insert_id) {

                        create_log('Has been creted an generateticket : '.$data['title']);

                        success($this->lang->line('insert_success'));
                        redirect('generateticket/generateticket/index/'.$data['school_id']);
                    } else {
                        error($this->lang->line('insert_failed'));
                        redirect('generateticket/add');
                    }
                } else {
                    error($this->lang->line('insert_failed'));
                    $this->data['post'] = $_POST;
                }
            }
            $this->data['generatetickets'] = $this->generateticket->get_generateticket_list();
            $this->data['schools'] = $this->schools;

            $this->data['add'] = TRUE;
            $this->layout->title($this->lang->line('add') . ' | ' . SMS);
            $this->layout->view('generateticket/index', $this->data);

        }
    }


    public function update_approved_status()
    {
        $data['approved_status'] = $_POST['approved_status'];   
        $updated = $this->generateticket->update('generatetickets', $data, array('id' => $this->input->post('id')));
        echo '1';
    }


    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "generateticket" user interface
    *                    with populated "generateticket" value
    *                    and process to update "generateticket" into database
    * @param           : $id integer value
    * @return          : null
    * ********************************************************** */
    public function edit($id = null) {

        if ($this->session->userdata('role_id') != SUPER_ADMIN) { 

            if(!is_numeric($id)){
                error($this->lang->line('unexpected_error'));
                redirect('generateticket/generateticket/index');
            }

            if ($_POST) {
                $this->_prepare_generateticket_validation();
                if ($this->form_validation->run() === TRUE) {
                    $data = $this->_get_posted_generateticket_data();
                    $updated = $this->generateticket->update('generatetickets', $data, array('id' => $this->input->post('id')));

                    if ($updated) {

                        create_log('Has been updated an generateticket : '.$data['title']);

                        success($this->lang->line('update_success'));
                        redirect('generateticket/generateticket/index/'.$data['school_id']);
                    } else {
                        error($this->lang->line('update_failed'));
                        redirect('generateticket/edit/' . $this->input->post('id'));
                    }
                } else {
                    error($this->lang->line('update_failed'));
                    $this->data['generateticket'] = $this->generateticket->get_single('generatetickets', array('id' => $this->input->post('id')));
                }
            }

            if ($id) {
                $this->data['generateticket'] = $this->generateticket->get_single('generatetickets', array('id' => $id));

                if (!$this->data['generateticket']) {
                    redirect('generateticket/generateticket/index');
                }
            }

            $this->data['generatetickets'] = $this->generateticket->get_generateticket_list($this->data['generateticket']->school_id);

            $this->data['school_id'] = $this->data['generateticket']->school_id;
            $this->data['filter_school_id'] = $this->data['generateticket']->school_id;
            $this->data['schools'] = $this->schools;

            $this->data['edit'] = TRUE;
            $this->layout->title($this->lang->line('edit') . ' | ' . SMS);
            $this->layout->view('generateticket/index', $this->data);
        }
    }


    /*****************Function view**********************************
    * @type            : Function
    * @function name   : view
    * @description     : Load user interface with specific generateticket data
    *
    * @param           : $id integer value
    * @return          : null
    * ********************************************************** */
    public function view($id) {

        check_permission(VIEW);


        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
            redirect('generateticket/generateticket/index');
        }

        $this->data['generateticket'] = $this->generateticket->get_single_generateticket($id);

        $this->data['generatetickets'] = $this->generateticket->get_generateticket_list();

        $this->data['detail'] = TRUE;
        $this->layout->title($this->lang->line('view') . ' ' . $this->lang->line('generateticket') . ' | ' . SMS);
        $this->layout->view('generateticket/index', $this->data);
    }





     /*****************Function get_single_generateticket**********************************
     * @type            : Function
     * @function name   : get_single_generateticket
     * @description     : "Load single generateticket information" from database
     *                    to the user interface
     * @param           : null
     * @return          : null
     * ********************************************************** */
    public function get_single_generateticket(){

       $generateticket_id = $this->input->post('generateticket_id');

       $this->data['generateticket'] = $this->generateticket->get_single_generateticket($generateticket_id);
       echo $this->load->view('get-single-generateticket', $this->data);
    }

    /*****************Function _prepare_generateticket_validation**********************************
    * @type            : Function
    * @function name   : _prepare_generateticket_validation
    * @description     : Process "generateticket" user input data validation
    *
    * @param           : null
    * @return          : null
    * ********************************************************** */
    private function _prepare_generateticket_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

        $this->form_validation->set_rules('school_id', $this->lang->line('school_name'), 'trim|required');
        $this->form_validation->set_rules('title', $this->lang->line('title'), 'trim|required');
        $this->form_validation->set_rules('image', $this->lang->line('image'), 'trim|callback_image');
        $this->form_validation->set_rules('note', $this->lang->line('note'), 'trim');
    }


    public function image() {
        if ($_FILES['image']['name']) {

            list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
            if((!empty($width)) && $width > 750 || $height > 500){
                $this->form_validation->set_message('image', $this->lang->line('please_check_image_dimension'));
                return FALSE;
            }

            $name = $_FILES['image']['name'];
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('image', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }



    private function _get_posted_generateticket_data() {

        
        $items = array();
        $items[] = 'school_id';
        $items[] = 'title';
        $items[] = 'note';

        $data = elements($items, $_POST);

        $data['user_id'] = logged_in_user_id();

        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
        }

        if (isset($_FILES['image']['name'])) {
            $data['image'] = $this->_upload_image();
        }

        return $data;
    }


    /*****************Function _upload_image**********************************
    * @type            : Function
    * @function name   : _upload_image
    * @description     : Process to to upload generateticket image in the server
    *                    and return image name
    *
    * @param           : null
    * @return          : $return_image string value
    * ********************************************************** */
    private function _upload_image() {

        $prev_image = $this->input->post('prev_image');
        $image = $_FILES['image']['name'];
        $image_type = $_FILES['image']['type'];
        $return_image = '';
        if ($image != "") {
            if ($image_type == 'image/jpeg' || $image_type == 'image/pjpeg' ||
                    $image_type == 'image/jpg' || $image_type == 'image/png' ||
                    $image_type == 'image/x-png' || $image_type == 'image/gif') {

                $destination = 'assets/uploads/generateticket/';

                $file_type = explode(".", $image);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $image_path = 'generateticket-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['image']['tmp_name'], $destination . $image_path);

                // need to unlink previous image
                if ($prev_image != "") {
                    if (file_exists($destination . $prev_image)) {
                        @unlink($destination . $prev_image);
                    }
                }

                $return_image = $image_path;
            }
        } else {
            $return_image = $prev_image;
        }

        return $return_image;
    }



    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "generateticket" from database
    *                    and unlink generateticket image from server
    * @param           : $id integer value
    * @return          : null
    * ********************************************************** */
    public function delete($id = null) {

        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
            redirect('generateticket/generateticket/index');
        }

        $generateticket = $this->generateticket->get_single('generatetickets', array('id' => $id));
        if ($this->generateticket->delete('generatetickets', array('id' => $id))) {

            // delete teacher resume and image
            $destination = 'assets/uploads/';
            if (file_exists($destination . '/generateticket/' . $generateticket->image)) {
                @unlink($destination . '/generateticket/' . $generateticket->image);
            }

            create_log('Has been deleted an generateticket : '.$generateticket->title);
            success($this->lang->line('delete_success'));

        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('generateticket/generateticket/index/'.$generateticket->school_id);
    }

}
