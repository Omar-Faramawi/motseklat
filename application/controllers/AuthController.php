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

class AuthController extends CI_Controller
{
    /*
     *
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
    }
    
    /*
     *
     * login page
     * @return view
     */
    public function show_login()
    {
    	 $this->load->view('front_end/partials/header');
    	 $this->load->view('front_end/partials/sidebar');
    	 $this->load->view('login');
    	 $this->load->view('front_end/partials/footer');
    }

    /*
     *
     * forgot page
     * @return view
     */
    public function show_forgot()
    {
    	$this->load->view('front_end/partials/header');
    	$this->load->view('front_end/partials/sidebar');
    	$this->load->view('forgot');
    	$this->load->view('front_end/partials/footer');
    }

	/*
     *
     * registration page
     * @return view
     */
    public function show_register()
    {
    	$this->load->view('front_end/partials/header');
    	$this->load->view('front_end/partials/sidebar');
    	$this->load->view('register');
    	$this->load->view('front_end/partials/footer');
    }
    
    /*
     *
     * log user in
     * @return json object
     */
    function login()
    {
        $this->form_validation->set_rules('username', 'Email', 'required|trim|min_length[6]|xss_clean|email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array(
                'status' => false,
                'msg' => $errorMsg
            ));
        } else {
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->auth->encrypt($this->input->post('password'));
            $info             = $this->users_model->do_login($data);
            if ($info) {
                if ($info->active == 0) {
                    $this->auth->fill_user_session($info);
                    echo json_encode(array(
                        'status' => false,
                        'msg' => "Sorry you have not activated your account yet, please check your email inbox"
                    ));
                }
                if ($info->blocked == 1) {
                    echo json_encode(array(
                        'status' => false,
                        'msg' => "Sorry this account is suspended, please contact the website admin"
                    ));
                }
                if ($info->blocked == 0 and $info->active == 1) {
                    $this->auth->fill_user_session($info); 
                    echo json_encode(array(
                        'status' => true,
                        'msg' => 'Logged in successfully',
                        'redirect' => base_url('user/profile/')
                    ));
                }
            } else {
                echo json_encode(array(
                    'status' => false,
                    'msg' => 'Wrong username or password'
                ));
            }
        }
    }
    
    /*
     *
     * forgot password
     * @return json object
     */
    public function forgot()
    {
        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array(
                'status' => false,
                'msg' => "Invalid email address"
            ));
        } else {
            $email    = $this->input->post('email');
            $clean    = $this->security->xss_clean($email);
            $userInfo = $this->users_model->getUserInfoByEmail($clean);
            
            if (!$userInfo) {
                echo json_encode(array(
                    'status' => false,
                    'msg' => "We cant find your email address"
                ));
                exit();
            }
            
            if ($userInfo->blocked == 1) {
                echo json_encode(array(
                    'status' => false,
                    'msg' => "Your account is suspended, please contact website admin"
                ));
                exit();
            }
            
            //build token 
            $token = $this->generateRandomString();
            
            if (!$this->users_model->insertToken($userInfo->id, $token)) {
                echo json_encode(array(
                    'status' => false,
                    'msg' => "Sorry, Error happened, please try again later"
                ));
                exit();
            }
            
            $qstring = $this->base64url_encode($token);
            $url     = base_url() . 'reset_password/token/' . $qstring;
            $link    = '<a href="' . $url . '">' . $url . '</a>';
            
            $message = '';
            $message .= '<strong>A password reset has been requested for this email account</strong><br>';
            $message .= '<strong>Please click:</strong> ' . $link;
            
            /* Send Email instead of this */
            echo json_encode(array(
                'status' => true,
                'msg' => $message
            ));
            
        }
        
    }

    /*
     *
     * do reset password form
     * @return view
     */
    public function reset_password()
    {
        $token      = $this->base64url_decode($this->uri->segment(3));
        $cleanToken = $this->security->xss_clean($token);
        
        $user_info = $this->users_model->isTokenValid($cleanToken);               
        if (!$user_info) {
            $this->session->set_flashdata('error', 'Token is invalid or expired');
            redirect(base_url().'auth/login');
        }

        $data = array(
            'firstName' => $user_info->full_name,
            'email' => $user_info->email,
            'token' => base64_encode($token)
        );
        
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        
        if ($this->form_validation->run() == FALSE) {
        	$data['errors'] = validation_errors();
            $this->load->view('reset_password', $data);
        } else {
            $post                  = $this->input->post(NULL, TRUE);
            $cleanPost             = $this->security->xss_clean($post);
            $cleanPost['password'] = $this->auth->encrypt($this->input->post('password'));
            $cleanPost['id']  = $user_info->id;
            unset($cleanPost['passconf']);
            if (!$this->users_model->updatePassword($cleanPost)) {
                $this->session->set_flashdata('error', 'There was a problem updating your password');
            } else {
                $this->session->set_flashdata('success', 'Your password has been updated. You may now login');
            }
            redirect(base_url('auth/login'));
        }
    }
    
    /*
     *
     * Generate Random Strings
     * @return String
     */
    function generateRandomString($length = 10)
    {
        $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    /*
     *
     * Encrypt string
     * @return String
     */
    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
    
    /*
     *
     * decrypt string
     * @return String
     */
    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}