<?php

/*
 *
 * Auth controller
 * @author: Omar Faramawi
 * @email:  omarfaramawi@gmail.com
 * @date: 25/12/2016
 *
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Validate extends CI_Controller
{
	/*
     *
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('countries_model');
        $this->load->library('session');
    }

	public function username()
	{
		$_POST['username'] = $this->input->get('username');

        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[6]|is_unique[users.username]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            header("HTTP/1.0 404 Not Found");
            echo json_encode(array(
                'status' => false,
                'error' => $errorMsg
            ));
        }
	}

	public function full_name()
	{
		$_POST['full_name'] = $this->input->get('full_name');

        $this->form_validation->set_rules('full_name', 'Full name', 'required|trim|min_length[6]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            header("HTTP/1.0 404 Not Found");
            echo json_encode(array(
                'status' => false,
                'error' => $errorMsg
            ));
        }
	}

	public function mobile()
	{
		$_POST['mobile'] = $this->input->get('mobile');

        $this->form_validation->set_rules('mobile', 'Mobile', 'required|trim|min_length[6]|xss_clean|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            header("HTTP/1.0 404 Not Found");
            echo json_encode(array(
                'status' => false,
                'error' => $errorMsg
            ));
        }
	}

	public function password()
	{
		$_POST['password'] = $this->input->get('password');

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            header("HTTP/1.0 404 Not Found");
            echo json_encode(array(
                'status' => false,
                'error' => $errorMsg
            ));
        }else{
        	if($this->session->userdata('password')){
        		$this->session->unset_userdata('password');
        	}
        	$this->session->set_userdata('password', $_POST['password']);
        	echo json_encode(array(
                'status' => false,
                'session' => $this->session->userdata('password')
            ));
        }
	}

	public function confirm_password()
	{
		$_POST['confirm_password'] = $this->input->get('confirm_password');

        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            header("HTTP/1.0 404 Not Found");
            echo json_encode(array(
                'status' => false,
                'error' => $errorMsg,
	            'session' => $this->session->userdata('password')

            ));
        }else{
        	if($_POST['confirm_password'] != $this->session->userdata('password')){
        		$errorMsg = "Passwords don't match";
	            header("HTTP/1.0 404 Not Found");
	            echo json_encode(array(
	                'status' => false,
	                'error' => $errorMsg,
	                'session' => $this->session->userdata('password')
	            ));
        	}
        }
	}	

	public function email()
	{
		$_POST['email'] = $this->input->get('email');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            header("HTTP/1.0 404 Not Found");
            echo json_encode(array(
                'status' => false,
                'error' => $errorMsg
            ));
        }else{
        	if($this->session->userdata('email')){
        		$this->session->unset_userdata('email');
        	}
        	$this->session->set_userdata('email', $_POST['email']);
        	echo json_encode(array(
                'status' => false,
                'session' => $this->session->userdata('email')
            ));

        }
	}

	public function confirm_email()
	{
		$_POST['confirm_email'] = $this->input->get('confirm_email');

        $this->form_validation->set_rules('confirm_email', 'Confirm Email', 'required|trim|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            header("HTTP/1.0 404 Not Found");
            echo json_encode(array(
                'status' => false,
                'error' => $errorMsg,
                'session' => $this->session->userdata('email')
            ));
        }else{
        	if($_POST['confirm_email'] != $this->session->userdata('email')){
        		$errorMsg = "Email addresses don't match";
	            header("HTTP/1.0 404 Not Found");
	            echo json_encode(array(
	                'status' => false,
	                'error' => $errorMsg,
	                'session' => $this->session->userdata('email')
	            ));
        	}
        }
	}
}