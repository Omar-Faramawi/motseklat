<?php

class Users_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert_user($data) {
        // Check User Name
        $this->db->select('id');
        $query = $this->db->get_where('users', array('username' => $data['username']));
        $result = $query->row();
        if (count($result) > 0) {
            return "Username already exists";
        } else {
            // Check User Name
            $this->db->select('id');
            $query = $this->db->get_where('users', array('email' => $data['email']));
            $result = $query->row();
            if (count($result) > 0) {
                return "Email already exists";
            } else {
                $query = $this->db->insert('users', $data);
                $current_user_id = $this->db->insert_id();
                $this->db->insert('privacy_config', array('user_id' => $current_user_id));
                return "success";
            }
        }
    }

    /*
     * admin function
     */

    function get_all_users($data) {
        $this->db->select('users.id,users.username,users.full_name,users.blocked,users.active,users.email,users.mobile,user_types.name as user_type');
        !empty($data['i_search']) ? $this->db->like('username', $data['i_search']) : '';
        !empty($data['i_search']) ? $this->db->like('full_name', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->order_by('added_date', 'ASC');
        $this->db->join('user_types', 'users.user_type = user_types.id', 'left');
        $query = $this->db->get('users');

        return $query->result_array();
    }

    /*
     * admin function
     */

    function get_users_count($data = NULL) {
        !empty($data['i_search']) ? $this->db->like('full_name', $data['i_search']) : '';
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        return $this->db->count_all_results('users');
    }

    /*
     * admin function
     */

    function block_account($user_id, $status) {
        $this->db->where('id', $user_id);
        if ($status == 1) {
            $query = $this->db->update('users', array('blocked' => 1));
        } else {
            $query = $this->db->update('users', array('blocked' => 0));
        }
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function do_login($data) {
        $this->db->select('id,full_name,username,picture,active,blocked,user_type,lat_position,lng_position');
        if (filter_var($data['username'], FILTER_VALIDATE_EMAIL)) {
            $this->db->where(array('email' => $data['username'], 'password' => $data['password']));
        } else {
            $this->db->where(array('username' => $data['username'], 'password' => $data['password']));
        }
        $query = $this->db->get('users');
        return $query->row();
    }

    function do_activate_account($data) {
        $this->db->select('id,active');
        $query = $this->db->get_where('users', array('username' => $data['username'], 'password' => $data['password']));
        $result = $query->row();
        if (count($result) > 0) {
            if ($result->active == 1) {
                return 'activated';
            } else {
                $this->db->where('id', $query->row()->id);
                $query = $this->db->update('users', array('active' => 1));
                return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function get_user_info($user_id) {
        $this->db->select('users.*,user_types.name as type_name');
        $this->db->join('user_types', 'user_types.id = users.user_type');
        $query = $this->db->get_where('users', array('users.id' => $user_id));
        return $query->row();
    }

    function update_user($user_id, $data) {
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function get_privacy_config($user_id) {
        $this->db->select('*');
        $query = $this->db->get_where('privacy_config', array('user_id' => $user_id));
        return $query->row();
    }

    function update_privacy_config($user_id, $data) {
        $this->db->where('user_id', $user_id);
        $this->db->update('privacy_config', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    /*
     * change password for admin 
     */

    function change_password($user_id, $old_password, $new_password) {
        $this->db->where(array('id' => $user_id, 'password' => $old_password));
        $this->db->update('users', array('password' => $new_password));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    function get_old_picture($user_id) {
        $this->db->select('picture');
        $query = $this->db->get_where('users', array('id' => $user_id));
        return $query->row()->picture;
    }

    /*
     * admin function
     */

    function admin_login($data) {
        $this->db->select('id,username');
        $query = $this->db->get_where('admin', array('username' => $data['username'], 'password' => $data['password']));
        return $query->row();
    }

    /*
     * front function
     */

    function get_members($limit = 9, $start, $type) {
        $this->db->select('users.id,users.username,users.full_name,users.website,users.facebook,users.mobile,users.picture,'
                . 'countries.name as country_name,cities.name as city_name,'
                . '(select (select count(*) from bikes where user_id=users.id) + (select count(*) from products where user_id=users.id)) as supplies_count');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->join('cities', 'cities.id = users.city_id', 'left');
        $this->db->where('user_type', $type);
        $this->db->limit($limit, $start);
        $this->db->order_by('added_date', 'DESC');
        $query = $this->db->get('users');

        return $query->result();
    }

    function get_user_type($type_id = NULL) {
        $this->db->select('name');
        $query = $this->db->get_where('user_types', array('id' => $type_id));
        return $query->row()->name;
    }

    /*
     * front function
     */

    function get_members_count($type) {
        $this->db->where('user_type', $type);
        return $this->db->count_all_results('users');
    }

    function update_user_position($user_id, $data) {
        $this->db->where('id', $user_id);
        $query = $this->db->update('users', $data);
        return $query;
    }

    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('users', array('email' => $email), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$email.')');
            return false;
        }
    }

    public function getUserInfo($id)
    {
        $q = $this->db->get_where('users', array('id' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }

    public function insertToken($id, $token)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('users', array('token' => $token));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function isTokenValid($token)
    {
        $query = $this->db->where('token', $token)->get('users');

        return ($this->db->affected_rows() > 0) ? $query->row() : FALSE;
    }

    public function updatePassword($post)
    {
        $this->db->where('id', $post['id']);
        $query = $this->db->update('users', array('password' => $post['password']));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
}

// end of file