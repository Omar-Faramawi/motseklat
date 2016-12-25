<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
//        redirect(base_url('back_end/admin/login'), 'location');
        $this->load->view('back_end/admin/login');
    }

}
