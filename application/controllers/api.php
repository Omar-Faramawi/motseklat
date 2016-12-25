<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('groups_model');
        $this->load->model('events_model');

//        $this->auth->check_accessibility('user');
    }

    /*
     * NOTE: url access to any function
     * motseklat.com/api/function_name
     * also send the request parameter as post
     */

    function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($username == NULL or $password == NULL) {
            echo json_encode(array('status' => false, 'message' => 'يجب ملئ جميع الحقول'));
        } else {
            $data['username'] = $username;
            $data['password'] = $this->auth->encrypt($password);
            $info = $this->users_model->do_login($data);
            if ($info) {
                if ($info->active == 0) {
                    echo json_encode(array('status' => false, 'message' => 'عذراً لم تقم بتفعيل الحساب...الرجاء مراجعه بريدك الإلكتروني'));
                }
                if ($info->blocked == 1) {
                    echo json_encode(array('status' => false, 'message' => 'عذراً حسابك مقفل يرجى التواصل مع إدارة الموقع'));
                }
                if ($info->blocked == 0 and $info->active == 1) {
                    echo json_encode(array('status' => true, 'user_info' => $info)); //user info is array of object contain [id,username,picture,active,blocked,user_type]
                }
            } else {
                echo json_encode(array('status' => false, 'message' => 'الرجاء التأكد من إسم المستخدم وكلمة المرور'));
            }
        }
    }

    function update_position() {
        $lat_position = $this->input->post('lat_position');
        $lng_position = $this->input->post('lng_position');
        $user_id = $this->input->post('user_id');

        $data = array();
        $data['lat_position'] = $lat_position;
        $data['lng_position'] = $lng_position;
        $result = $this->users_model->update_user_position($user_id, $data);
        if ($result) {
            echo json_encode(array('status' => true, 'message' => 'تم التعديل بنجاح'));
        } else {
            echo json_encode(array('status' => false, 'message' => 'الرجاء المحاولة ثانيتاً'));
        }
    }

    function get_all_events() {
        $events = $this->events_model->get_all_events();
        echo json_encode(array('events' => $events)); // array of objects
    }

    function get_user_events() {
        $user_id = $this->input->post('user_id');
        $events = $this->events_model->get_user_events($user_id);
        echo json_encode(array('events' => $events)); // array of objects
    }


    function get_user_position_in_event() {
        $event_id = $this->input->post('event_id');
        $user_positions = $this->events_model->get_user_position_in_event($event_id);
        echo json_encode(array('user_positions' => $user_positions)); // array of objects
    }
	
	function password_encryption($plain_text){ // password incryption ... will add salt text to the plainText then md5 algorithem 
		echo json_encode($this->auth->encrypt($plain_text));
	}
    
    function sign_up() {
        $data = array();
        $data['full_name'] = $this->input->post('full_name');
        $data['username'] = $this->input->post('username');
        $plain_password = $this->input->post('password');
        $data['password'] = $this->auth->encrypt($plain_password);
        $data['email'] = $this->input->post('email');
        $data['registration_type'] = $this->input->post('registration_type');
        $data['active'] = $this->input->post('active');
        $query = $this->users_model->insert_user($data);
        echo $query;
    }
}

/* End of file api.php */