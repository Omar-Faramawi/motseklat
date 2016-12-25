<?php

class Public_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Front-End 
     */

    function insert_feedback($data) {
        $query = $this->db->insert('feedback', $data);
        return $query;
    }

    function subscribe($data) {
        $this->db->where('email', $data['email']);
        $query = $this->db->get('mailing_list');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            $query = $this->db->insert('mailing_list', $data);
            return $query;
        }
    }

}
