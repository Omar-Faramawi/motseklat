<?php

class Groups_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Back-End 
     */

    function insert_group($data) {
        $query = $this->db->insert('groups', $data);
        return $query;
    }

    /*
     * Back-End 
     */

    function get_group_info($group_id) {
        $this->db->select('*');
        $query = $this->db->get_where('groups', array('id' => $group_id));
        return $query->row();
    }

    /*
     * Back-End 
     */

    function remove_group($group_id) {
        $this->db->select('picture');
        $query1 = $this->db->get_where('groups', array('id' => $group_id));

        $this->db->where('id', $group_id);
        $query = $this->db->delete('groups');

        return array('is_removed' => $query, 'picture' => $query1->row()->picture);
    }

    /*
     * Back-End 
     */

    function update_group($group_id, $data) {
        $this->db->where('id', $group_id);
        $query = $this->db->update('groups', $data);
        return $query;
    }

    /*
     * Back-End 
     */

    function get_old_picture($group_id) {
        $this->db->select('picture');
        $query = $this->db->get_where('groups', array('id' => $group_id));
        return $query->row()->picture;
    }

    /*
     * Back-End - user
     */

    function get_my_groups($user_id, $data = array()) {
        $this->db->select('*');
        !empty($data['i_search']) ? $this->db->like('name', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->join('events_subscribers', 'events_subscribers.event_id = events.id', 'left');
        $this->db->order_by('creation_date', 'DESC');
        $query = $this->db->get_where('events', array('user_id' => $user_id));
        return $query->result();
    }

    /*
     * Back-End - user
     */

    function get_my_groups_count($user_id, $data = NULL) {
        !empty($data['i_search']) ? $this->db->like('name', $data['i_search']) : '';
        return $this->db->count_all_results('groups', array('user_id' => $user_id));
    }

    /*
     * Front-End 
     */

    function subscribe_group($data) {
        $query = $this->db->insert('groups_subscribers', $data);
        return $query;
    }

    /*
     * Front-End 
     */

    function leave_group($data) {
        $this->db->where($data); //contain user_id and group_id
        $query = $this->db->delete('groups_subscribers');
        return $query;
    }

}

// end of file