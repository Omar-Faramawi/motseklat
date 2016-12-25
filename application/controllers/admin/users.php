<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_model');

//        $this->auth->check_accessibility('admin');
    }

    public function index() {
        $this->login();
    }

    function login() {
        $this->load->view('back_end/admin/login');
    }

    /**
     * loginout
     * 
     * function call logout function to destroy the user session
     * 
     * @access public
     * @return void
     */
    function logout() {
        $this->auth->logout();
    }

    function do_login() {
        $this->form_validation->set_rules('username', 'إسم المستخدم/البريد الإلكتروني', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'كلمة المرور', 'required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->auth->encrypt($this->input->post('password'));
            $info = $this->users_model->admin_login($data);
            if ($info) {
                $this->auth->fill_admin_session($info);
                echo json_encode(array('status' => true, 'msg' => 'تم تسجيل الدخول بنجاح'));
            } else {
                echo json_encode(array('status' => false, 'msg' => 'خطأ في إسم المستخدم أو كلمة المرور'));
            }
        }
    }

    function block_account() { // blocked or Not
        $this->form_validation->set_rules('user_id', 'تحديد المستخدم', 'required|trim|numeric');
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $user_id = $this->input->post('user_id');
            $status = $this->input->post('status');
            $result = $this->users_model->block_account($user_id, $status);
            if ($result) {
                if ($status == 0) {
                    echo json_encode(array('status' => true, 'msg' => 'تم تفعيل هذا المستخدم'));
                } else {
                    echo json_encode(array('status' => true, 'msg' => 'تم تعطيل هذا المستخدم'));
                }
            } else
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
        }
    }

    public function manage_users() {
        $this->auth->check_accessibility('admin');

        $this->load->view('back_end/admin/manage_users');
    }

    function get_all_users() {
        $this->auth->check_accessibility('admin');

        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->users_model->get_users_count($data);
        $result = $this->users_model->get_all_users($data);

        $row = array();
        foreach ($result as $value) {
            $record = array();
            $options = '';
            $record[] = $value['username'];
            $record[] = $value['full_name'];
            $record[] = $value['email'];
            $record[] = $value['mobile'];
            $record[] = $value['user_type'];
            if ($value['blocked'] == 1) {
                $icon = '<i class="glyphicon glyphicon-ok-sign"></i>';
                $options = '<a href="#" onclick="block_account(' . $value['id'] . ',0);return false;" title="تفعيل" class="btn btn-green">' . $icon . '</a> ';
            } else {
                $icon = '<i class="clip-user-block"></i>';
                $options = '<a href="#" onclick="block_account(' . $value['id'] . ',1);return false;" title="تعطيل" class="btn btn-bricky" data-toggle="modal">' . $icon . '</a> ';
            }
            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function createOutput($sEcho, $records_number, $aaData = array()) {
        $output = array(
            "sEcho" => $sEcho,
            "iTotalRecords" => $records_number,
            "iTotalDisplayRecords" => $records_number,
            "aaData" => $aaData
        );
        return $output;
    }

}

/* End of file users.php */
    