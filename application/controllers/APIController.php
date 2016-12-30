<?php

require APPPATH . '/libraries/REST_Controller.php';

class APIController extends REST_Controller
{
   
    function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
        parent::__construct();
    }

    function cities_get($country_id)
    {
    	//$country_id = $this->input->post('country_id');
    	$this->load->model('cities_model');

    	$cities = $this->cities_model->get_cities_by_country_id(intval($country_id));

    	$this->response($cities);

    }

}