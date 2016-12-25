<?php

class Categories_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * get all Articles Categories
     */

    function get_articles_categories() {
        $query = $this->db->get('articles_categories');
        return $query->result();
    }

    /*
     * get all products Categories
     */

    function get_products_categories() {
        $query = $this->db->get('products_categories');
        return $query->result();
    }
    
}
