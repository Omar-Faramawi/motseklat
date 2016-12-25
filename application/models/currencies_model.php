<?php

class Currencies_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * get cities by country id
     */

    function get_currencies_by_user_id($user_id) {
        $this->db->select('currencies.id,currencies.currency_name');
        $this->db->join('users', 'currencies.country_id = users.country_id');
        $query = $this->db->get_where('currencies', array("users.id" => $user_id));

        return $query->result();
    }

}
