<?php

class Countries_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_all_countries()
    {
    	$query = $this->db->get("countries");
    	return $query->result();
    }

}