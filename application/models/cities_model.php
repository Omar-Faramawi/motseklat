<?php

class Cities_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_cities_by_country_id($id)
    {
    	$this->db->where('country_id', $id);

    	$query = $this->db->get('cities');

    	return $query->result();
    }

}