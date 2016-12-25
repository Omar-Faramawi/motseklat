<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    private $_user_id = null;

    function __construct() {
        parent::__construct();
        $this->load->model('locations_model');
        $this->load->model('users_model');
        $this->load->model('manufacturers_model');
        $this->load->model('bikes_model');
        $this->load->model('products_model');
        $this->load->model('currencies_model');
        $this->load->model('categories_model');
        $this->load->model('centers_model');
        $this->load->model('engines_model');
        $this->load->library('image_lib');

        // $this->auth->check_accessibility('user');
        // $this->_user_id = $this->session->userdata('user_id');
        // $this->_added_notification = 'تم إضافة إعلان جديد على موقع متسيكلات الرجاء الموافقة علية في أسرع وقت';
        // define("USER_TYPE", $this->session->userdata('user_type'));
    }

    public function index() {
    	redirect(base_url());
    }

    public function show($user)
    {
        //$this->laod->view("public_profile");
    	echo $user;
    }

}

/* End of file home.php */