<?php

class Engines_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Back-End 
     */

    function insert_engine($data) {
        $query = $this->db->insert('engines_capacity', $data);
        return $query;
    }

    /*
     * Back-End 
     */

    function get_engine_info($engine_id) {
        $this->db->select('*');
        $query = $this->db->get_where('engines_capacity', array('id' => $engine_id));
        return $query->row();
    }

    /*
     * Back-End 
     */

    function remove_engine($engine_id) {
        $this->db->where('id', $engine_id);
        $this->db->delete('engines_capacity');

        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    /*
     * Back-End 
     */

    function update_engine($article, $data) {
        $this->db->where('id', $article);
        $query = $this->db->update('engines_capacity', $data);
        return $query;
    }

    /*
     * Back-End 
     */

    function get_all_engines($data) {
        $this->db->select('*');
        !empty($data['i_search']) ? $this->db->like('capacity', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->order_by('capacity', 'ASC');
        $query = $this->db->get('engines_capacity');

        return $query->result();
    }

    /**
     * Front-end and Back-end
     */
    function get_engines_count($data = NULL) {
        !empty($data['i_search']) ? $this->db->like('capacity', $data['i_search']) : '';
        return $this->db->count_all_results('articles');
    }
    
    /*
     * Front-End 
     */

    function get_engines() {
        $this->db->select('*');
        $this->db->order_by('capacity', 'ASC');
        $query = $this->db->get('engines_capacity');

        return $query->result();
    }

}

// end of file