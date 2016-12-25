<?php

class Events_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Back-End 
     */

    function insert_event($data) {
        $query = $this->db->insert('activities', $data);
        return $query;
    }

    /*
     * Back-End 
     */

    function get_event_info($event_id) {
        $this->db->select('*');
        $query = $this->db->get_where('activities', array('id' => $event_id));
        return $query->row();
    }

    /*
     * Back-End 
     */

    function remove_event($event_id) {
        $this->db->select('picture');
        $query1 = $this->db->get_where('activities', array('id' => $event_id));

        $this->db->where('id', $event_id);
        $query = $this->db->delete('activities');

        return array('is_removed' => $query, 'picture' => $query1->row()->picture);
    }

    /*
     * Back-End 
     */

    function update_event($event_id, $data) {
        $this->db->where('id', $event_id);
        $query = $this->db->update('activities', $data);
        return $query;
    }

    /*
     * Back-End 
     */

    function get_old_picture($event_id) {
        $this->db->select('picture');
        $query = $this->db->get_where('activities', array('id' => $event_id));
        return $query->row()->picture;
    }

    /*
     * Back-End - user
     */

    function get_my_events($user_id, $data = array()) {
        $this->db->select('*');
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->join('activities', 'activities.id = activities_subscribers.activity_id');
        $this->db->order_by('activities.added_date', 'DESC');
        $query = $this->db->get_where('activities_subscribers', array('activities_subscribers.user_id' => $user_id));
        return $query->result();
    }

    /*
     * Back-End - user
     */

    function get_my_events_count($user_id, $data = NULL) {
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        $this->db->join('activities', 'activities.id = activities_subscribers.activity_id');
        return $this->db->count_all_results('activities_subscribers', array('activities_subscribers.user_id' => $user_id));
    }

    /*
     * Front-End 
     */

    function subscribe_event($data) {
        $query = $this->db->insert('activities_subscribers', $data);
        return $query;
    }

    /*
     * Front-End 
     */

    function leave_event($data) {
        $this->db->where($data); //contain user_id and event_id
        $query = $this->db->delete('activities_subscribers');
        return $query;
    }

    /*
     * API Function
     */

    function get_all_events() {
        $this->db->select('*');
        $this->db->order_by('added_date', 'DESC');
        $query = $this->db->get_where('activities');
        return $query->result();
    }

    /*
     * API Function
     */

    function get_user_events($user_id) {
        $this->db->select('*');
        $this->db->join('activities', 'activities.id = activities_subscribers.activity_id');
        $this->db->order_by('activities.added_date', 'DESC');
        $query = $this->db->get_where('activities_subscribers', array('activities_subscribers.user_id' => $user_id));
        return $query->result();
    }

    function get_user_position_in_event($event_id) {
        $this->db->select('users.id, lat_position, lng_position, picture, full_name');
        $this->db->join('users', 'users.id = activities_subscribers.user_id');
        $query = $this->db->get_where('activities_subscribers', array('activities_subscribers.activity_id' => $event_id));
        return $query->result();
    }

}

// end of file