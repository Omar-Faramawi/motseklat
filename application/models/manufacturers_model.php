<?php

class Manufacturers_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * get all manufacturers
     */

    function get_manufacturers() {
        $query = $this->db->get('manufacturers');
        return $query->result();
    }

    /*
     * get models by manufacturer id
     */

    function get_models_by_manufacturer($manufacturer_id) {
        $this->db->select('models.id,models.name');
        $query = $this->db->get_where('models', array("models.manufacturer_id" => $manufacturer_id));
        return $query->result();
    }

}
