<?php

class Centers_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Back-End
     */

    function insert_center($data) {
        $query = $this->db->insert('centers', $data);
        return $query;
    }

    /*
     * Back-End 
     */

    function get_center_info($user_id, $center_id) {
        $this->db->select('*');
        if ($center_id != NULL) {
            $this->db->where(array('id' => $center_id, 'user_id' => $user_id));
        } else {
            $this->db->where('user_id', $user_id);
        }
        $this->db->order_by('added_date', 'DESC');
        $query = $this->db->get('centers');
        return $query->row();
    }

    /*
     * Back-End 
     */

    function remove_center($center_id, $user_id) {
        $this->db->where(array('id' => $center_id, 'user_id' => $user_id));
        $this->db->delete('centers');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    /*
     * Back-End 
     */

    function update_center($user_id, $id, $data) {
        $this->db->where(array('id' => $id, 'user_id' => $user_id));
        $query = $this->db->update('centers', $data);
        return $query;
    }

    /*
     * Back-End
     */

    function get_my_centers($user_id, $data) {
        $this->db->select('*');
        !empty($data['i_search']) ? $this->db->like('name', $data['i_search']) : '';
        $this->db->where('user_id', $user_id);
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->order_by('added_date', 'DESC');
        $query = $this->db->get('centers');
        return $query->result();
    }

    /**
     * Back-end
     */
    function get_my_centers_count($user_id, $data = NULL) {
        !empty($data['i_search']) ? $this->db->like('name', $data['i_search']) : '';
        $this->db->where('user_id', $user_id);
        return $this->db->count_all_results('centers');
    }

}

// end of file