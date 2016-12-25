<?php

class Slider_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Back-End 
     */

    function do_add_slide($data) {
        $query = $this->db->insert('slider', $data);
        return $query;
    }

    /*
     * Back-End 
     */

    function get_all_slides($data) {
        $this->db->select('*');
        $this->db->from('slider');
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->order_by('publish_date', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    /*
     * Back-End 
     */

    function get_slides_count($data = NULL) {
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        return $this->db->count_all_results('slider');
    }

    /*
     * Back-End 
     */

    function update_slide($slide_id, $data) {
        $this->db->where('id', $slide_id);
        $query = $this->db->update('slider', $data);
        return $query;
    }

    /*
     * Back-End 
     */

    function remove_slide($slide_id) {
        $this->db->select('picture');
        $query1 = $this->db->get_where('slider', array('slider.id' => $slide_id));

        $this->db->where('id', $slide_id);
        $query = $this->db->delete('slider');

        return array('is_removed' => $query, 'picture' => $query1->row()->picture);
    }

    /*
     * Back-End 
     */

    function get_slide_info($slide_id) {
        $this->db->select('slider.*');
        $query = $this->db->get_where('slider', array('slider.id' => $slide_id));
        return $query->row();
    }

    /*
     * Back-End 
     */

    function get_old_picture($slide_id) {
        $this->db->select('picture');
        $query = $this->db->get_where('slider', array('id' => $slide_id));
        return $query->row()->picture;
    }

    /*
     * Front-End 
     */

    function get_slides() {
        $this->db->select('title,picture,description');
        $this->db->limit(5);
        $this->db->order_by('publish_date', 'DESC');
        $query = $this->db->get('slider');
        return $query->result();
    }

}
