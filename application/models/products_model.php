<?php

class Products_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Back-End 
     */

    function insert_product($data) {
        $query = $this->db->insert('products', $data);
        return $query;
    }

    function get_products_views_interested($user_id, $data = array()) {
        $this->db->select('id,title,views,interested');
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->order_by('views', 'DESC');
        $this->db->order_by('interested', 'DESC');
        $query = $this->db->get_where('products', array('user_id' => $user_id, 'products.active' => 1));
        return $query->result();
    }

    function get_products_views_interested_count($user_id, $data = NULL) {
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        $this->db->where(array('user_id' => $user_id, 'products.active' => 1));
        return $this->db->count_all_results('products', array('user_id' => $user_id, 'products.active' => 1));
    }

    /*
     * Back-End
     */

    function get_product_info($product_id, $user_id) {
        $this->db->select('*');
        $query = $this->db->get_where('products', array('id' => $product_id, 'user_id' => $user_id));
        return $query->row();
    }

    /*
     * Back-End 
     */

    function remove_product($product_id, $user_id) {
        $this->db->select('product_picture_1,product_picture_2,product_picture_3,product_picture_4');
        $query1 = $this->db->get_where('products', array('id' => $product_id, 'user_id' => $user_id));

        $this->db->where(array('id' => $product_id, 'user_id' => $user_id));
        $query = $this->db->delete('products');
        return array('is_removed' => $query, 'picture' => $query1->row());
    }

    /*
     * Back-End 
     */

    function update_product($user_id, $product_id, $data) {
        $this->db->where(array('id' => $product_id, 'user_id' => $user_id));
        $query = $this->db->update('products', $data);
        return $query;
    }

    /*
     * Back-End 
     */

    function get_old_picture($product_id) {
        $this->db->select('product_picture_1,product_picture_2,product_picture_3,product_picture_4');
        $query = $this->db->get_where('products', array('id' => $product_id));
        return $query->row();
    }

    /*
     * Back-End 
     */

    function get_my_products($product_category, $user_id, $data = array()) {
        $this->db->select('products.id,products.title,products.active,products.views,products.interested,products.added_date,products.product_picture_1');
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->order_by('added_date', 'DESC');
        $query = $this->db->get_where('products', array('user_id' => $user_id, 'category_id' => $product_category));
        return $query->result();
    }

    function get_my_products_count($product_category, $user_id, $data = array()) {
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        !empty($product_category) ? $this->db->where('products.category_id', $product_category) : '';
        !empty($product_category) ? $this->db->where('products.category_id', $product_category) : '';
        return $this->db->count_all_results('products', array('user_id' => $user_id));
    }

    /*
     * Front-End 
     */

    function latest_products($limit = 10) {
        $this->db->select('products.id,products.added_date,countries.id as country_id,products.title,products.price,products.description,products.product_picture_1,currencies.currency_name,users.username');
        $this->db->join('users', 'users.id = products.user_id', 'left');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->join('currencies', 'currencies.id = products.currency_id', 'left');
        $this->db->limit($limit);
        $this->db->order_by('products.added_date', 'DESC');
        $query = $this->db->get_where('products', array('products.active' => 1));
        return $query->result();
    }

    /**
     * Front-End
     */
    function get_product_details($product_id) {
        $this->db->select('products.*,currencies.currency_name,users.full_name,users.mobile,user_types.name as user_type,countries.name as country_name,cities.name as city_name,manufacturers.name as manufacturer_name,models.name as model_name,products_types.name as product_type,'
                . '(select (select count(*) from bikes where user_id=products.user_id) + (select count(*) from products where user_id=products.user_id)) as supplies_count');
        $this->db->join('users', 'users.id = products.user_id', 'left');
        $this->db->join('user_types', 'users.user_type = user_types.id', 'left');
        $this->db->join('currencies', 'currencies.id = products.currency_id', 'left');
        $this->db->join('manufacturers', 'manufacturers.id = products.manufacturer_id', 'left');
        $this->db->join('models', 'models.id = products.model_id', 'left');
        $this->db->join('products_types', 'products_types.id = products.type_id', 'left');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->join('cities', 'cities.id = products.city_id', 'left');
        $query = $this->db->get_where('products', array('products.id' => $product_id, 'products.active' => 1));
        return $query->row();
    }

    /*
     * Front-End
     * get realted products where products manufacture and model similar the 
     * current product_id
     */

    function get_related_products($product_id = NULL) {
        $this->db->select('products.id,products.title,products.description,products.price,countries.id as country_id,currencies.currency_name,products.added_date,products.product_picture_1,users.username');
        $this->db->join('users', 'users.id = products.user_id', 'left');
        $this->db->join('currencies', 'currencies.id = products.currency_id', 'left');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->order_by('products.added_date', 'DESC');
        $this->db->where(array('products.id !=' => $product_id, 'products.active' => 1));
        $this->db->limit(3);
        $query = $this->db->get('products');
        return $query->result();
    }

    /*
     * Front-End
     */

    function set_product_interested($product_id = NULL) {
        $this->db->where('id', $product_id);
        $this->db->set('interested', 'interested+1', FALSE);
        $query = $this->db->update('products');
        return $query;
    }

    /*
     * Front-End
     */

    function set_product_view($product_id = NULL) {
        $this->db->where('id', $product_id);
        $this->db->set('views', 'views+1', FALSE);
        $query = $this->db->update('products');
        return $query;
    }

    /*
     * Front-End 
     */

    function get_products($limit = 9, $start, $search_criteria = NULL) {
        $this->db->select('products.id,products.title,products.description,products.price,countries.id as country_id,currencies.currency_name,products.added_date,products.product_picture_1,users.username');
        $this->db->join('users', 'users.id = products.user_id', 'left');
        $this->db->join('user_types', 'user_types.id = users.user_type', 'left');
        $this->db->join('currencies', 'currencies.id = products.currency_id', 'left');
        $this->db->join('cities', 'cities.id = products.city_id', 'left');
        $this->db->join('countries', 'countries.id = cities.country_id', 'left');
        $this->db->order_by('products.added_date', 'DESC');
        $this->db->limit($limit, $start);
        /* for searching */
        if ($search_criteria != NULL) {
            !empty($search_criteria['country_id']) ? $this->db->where('countries.id', $search_criteria['country_id']) : '';
            !empty($search_criteria['manufacturer_id']) ? $this->db->where('products.manufacturer_id', $search_criteria['manufacturer_id']) : '';
            !empty($search_criteria['model_id']) ? $this->db->where('products.model_id', $search_criteria['model_id']) : '';
            !empty($search_criteria['title']) ? $this->db->like('products.title', $search_criteria['title']) : '';
            !empty($search_criteria['product_status']) ? $this->db->where('products.product_status', $search_criteria['product_status']) : '';
            !empty($search_criteria['user_type']) ? $this->db->where('user_types.id', $search_criteria['user_type']) : '';
            if (!empty($search_criteria['price1']) and ! empty($search_criteria['price2'])) {
                $this->db->where('products.price >=', $search_criteria['price1']);
                $this->db->where('products.price <=', $search_criteria['price2']);
            }
        }
        $query = $this->db->get_where('products', array('products.active' => 1));
        return $query->result();
    }

    /*
     * Front-End 
     */

    function get_products_count($search_criteria = NULL) {
        /* for searching */
        $this->db->where('products.active', 1);
        if ($search_criteria != NULL) {
            $this->db->join('cities', 'cities.id = products.city_id', 'left');
            $this->db->join('countries', 'countries.id = cities.country_id', 'left');
            $this->db->join('users', 'users.id = products.user_id', 'left');
            $this->db->join('user_types', 'user_types.id = users.user_type', 'left');
            !empty($search_criteria['country_id']) ? $this->db->where('countries.id', $search_criteria['country_id']) : '';
            !empty($search_criteria['manufacturer_id']) ? $this->db->where('products.manufacturer_id', $search_criteria['manufacturer_id']) : '';
            !empty($search_criteria['model_id']) ? $this->db->where('products.model_id', $search_criteria['model_id']) : '';
            !empty($search_criteria['title']) ? $this->db->like('products.title', $search_criteria['title']) : '';
            !empty($search_criteria['product_status']) ? $this->db->where('products.product_status', $search_criteria['product_status']) : '';
            !empty($search_criteria['user_type']) ? $this->db->where('user_types.id', $search_criteria['user_type']) : '';
            if (!empty($search_criteria['price1']) and ! empty($search_criteria['price2'])) {
                $this->db->where('products.price >=', $search_criteria['price1']);
                $this->db->where('products.price <=', $search_criteria['price2']);
            }
        }
        return $this->db->count_all_results('products');
    }

    function get_member_products($limit = 9, $start, $user_id) {
        $this->db->select('products.id,products.title,products.description,products.price,countries.id as country_id,currencies.currency_name,products.added_date,products.product_picture_1,users.username');
        $this->db->join('users', 'users.id = products.user_id', 'left');
        $this->db->join('currencies', 'currencies.id = products.currency_id', 'left');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->where(array('products.user_id' => $user_id, 'products.active' => 1));
        $this->db->limit($limit, $start);
        $this->db->order_by('products.added_date', 'DESC');
        $query = $this->db->get('products');
        return $query->result();
    }

    function get_member_products_count($user_id = NULL) {
        $this->db->where(array('products.user_id' => $user_id, 'products.active' => 1));
        return $this->db->count_all_results('products');
    }

    /*
     * Front-End 
     */

    function get_category_products($limit = 9, $start, $category_id = NULL) {
        $this->db->select('products.id,products.title,countries.id as country_id,products.description,products.price,currencies.currency_name,products.added_date,products.product_picture_1,users.username');
        $this->db->join('users', 'users.id = products.user_id', 'left');
        $this->db->join('currencies', 'currencies.id = products.currency_id', 'left');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->order_by('products.added_date', 'DESC');
        $this->db->limit($limit, $start);
        $this->db->where(array('products.active' => 1));
        /* for searching */
        !empty($category_id) ? $this->db->where('products.category_id', $category_id) : '';
        $query = $this->db->get('products');
        return $query->result();
    }

    /*
     * Front-End 
     */

    function get_category_products_count($category_id = NULL) {
        $this->db->where(array('products.active' => 1));
        !empty($category_id) ? $this->db->where('products.category_id', $category_id) : '';
        return $this->db->count_all_results('products');
    }

    /*
     * Back-End
     * Admin Function
     */

    function admin_get_all_products($data = array()) {
        $this->db->select('products.id,products.title,products.active,products.views,products.interested,products.added_date,products.product_picture_1,products_categories.name as category_name');
        $this->db->join('products_categories', 'products_categories.id = products.type_id', 'left');
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->order_by('added_date', 'DESC');
        $query = $this->db->get('products');
        return $query->result();
    }

    /*
     * Back-End
     * Admin Function
     */

    function admin_get_products_count($data = NULL) {
        !empty($data['i_search']) ? $this->db->like('name', $data['i_search']) : '';
        return $this->db->count_all_results('products');
    }

    function get_products_types($category_id) {
        $query = $this->db->get_where('products_types', array('category_id' => $category_id));
        return $query->result();
    }

    /*
     * admin function
     */

    function activate_product($product_id, $status) {
        $this->db->where('id', $product_id);
        if ($status == 1) {
            $query = $this->db->update('products', array('active' => 1));
        } else {
            $query = $this->db->update('products', array('active' => 0));
        }
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    /*
     * admin function
     */

    function get_activate_product_email_info($product_id) {
        $this->db->select('products.id,products.title,users.full_name,users.email');
        $this->db->join('users', 'users.id = products.user_id', 'left');
        $query = $this->db->get_where('products', array('products.id' => $product_id));
        return $query->row();
    }

}

// end of file