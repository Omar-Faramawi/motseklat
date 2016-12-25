<?php

class Locations_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * get all countries
     */

    function get_countries() {
        $query = $this->db->get('countries');
        return $query->result();
    }

    /*
     * get all cities
     */

    function get_cities() {
        $query = $this->db->get('cities');
        return $query->result();
    }

    /*
     * get cities by country id
     */

    function get_cities_by_country($country_id) {
        $this->db->select('cities.id,cities.name');
        $query = $this->db->get_where('cities', array("cities.country_id" => $country_id));

        return $query->result();
    }

    function get_country_cities_by_user_id($user_id) {
        $this->db->select('cities.id,cities.name');
        $this->db->join('users', 'cities.country_id = users.country_id');
        $query = $this->db->get_where('cities', array("users.id" => $user_id));

        return $query->result();
    }

}
