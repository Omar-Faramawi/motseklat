<?php

class Bikes_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

//    function get_statistics($user_id) {
//        $this->db->select('sum(views) as views_count,sum(interested) as interested_count');
//        $query = $this->db->get_where('bikes', array('user_id' => $user_id));
////        $this->db->select('sum(views)');
////        $query2 = $this->db->get_where('bikes', array('user_id' => $user_id));
////        $this->db->select('sum(views)');
////        $query3 = $this->db->get_where('products', array('user_id' => $user_id));
//
//        return $query->row();
//    }

    function get_bikes_statistics($user_id) {
        $this->db->select('count(*) as manufacturer_bikes,manufacturers.name');
        $this->db->group_by('manufacturer_id');
        $this->db->join('manufacturers', 'manufacturers.id = bikes.manufacturer_id');
        $query = $this->db->get_where('bikes', array('user_id' => $user_id, 'bikes.active' => 1));
        return $query->result();
    }

    function get_bikes_views_interested($user_id, $data = array()) {
        $this->db->select('id,title,views,interested');
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->order_by('views', 'DESC');
        $this->db->order_by('interested', 'DESC');
        $query = $this->db->get_where('bikes', array('user_id' => $user_id, 'bikes.active' => 1));
        return $query->result();
    }

    function get_bikes_views_interested_count($user_id, $data = NULL) {
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        $this->db->where(array('user_id' => $user_id, 'bikes.active' => 1));
        return $this->db->count_all_results('bikes', array('user_id' => $user_id, 'bikes.active' => 1));
    }

    /*
     * Back-End 
     */

    function insert_bike($data) {
        $query = $this->db->insert('bikes', $data);
        return $query;
    }

    /*
     * Back-End 
     */

    function add_offer($data) {
        $query = $this->db->insert('offers', $data);
        return $query;
    }

    /*
     * Back-End
     */

    function get_bike_info($bike_id, $user_id) {
        $this->db->select('*');
        $query = $this->db->get_where('bikes', array('id' => $bike_id, 'user_id' => $user_id));
        return $query->row();
    }

    /*
     * Back-End 
     */

    function remove_bike($bike_id, $user_id) {
        $this->db->select('bike_picture_1,bike_picture_2,bike_picture_3,bike_picture_4');
        $query1 = $this->db->get_where('bikes', array('id' => $bike_id, 'user_id' => $user_id));

        $this->db->where(array('id' => $bike_id, 'user_id' => $user_id));
        $query = $this->db->delete('bikes');
        return array('is_removed' => $query, 'picture' => $query1->row());
    }

    /*
     * Back-End 
     */

    function remove_offer($offer_id, $user_id) {
        $this->db->select('bikes.user_id');
        $this->db->join('bikes', 'bikes.id = offers.bike_id');
        $query = $this->db->get_where('offers', array('user_id' => $user_id, 'offers.id' => $offer_id));
        if ($query->row()->user_id == $user_id) {
            $this->db->where(array('id' => $offer_id));
            $query = $this->db->delete('offers');
            return $query;
        } else {
            return false;
        }
    }

    /*
     * Back-End 
     */

    function remove_order($order_id, $user_id) {
        $this->db->where(array('id' => $order_id,'user_id' => $user_id));
        $query = $this->db->delete('orders');
        return $query;
    }

    /*
     * Back-End 
     */

    function update_bike($user_id, $bike_id, $data) {
        $this->db->where(array('id' => $bike_id, 'user_id' => $user_id));
        $query = $this->db->update('bikes', $data);
        return $query;
    }

    /*
     * Back-End 
     */

    function get_old_picture($bike_id) {
        $this->db->select('bike_picture_1,bike_picture_2,bike_picture_3,bike_picture_4');
        $query = $this->db->get_where('bikes', array('id' => $bike_id));
        return $query->row();
    }

    /*
     * Back-End - user
     */

    function get_my_bikes($user_id, $data = array()) {
        $this->db->select('bikes.id,bikes.title,bikes.added_date,bikes.bike_picture_1,bikes.views,bikes.interested,bikes.active,offers.id as offer_id');
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->join('offers', 'bikes.id = offers.bike_id', 'left');
        $this->db->order_by('added_date', 'DESC');
        $query = $this->db->get_where('bikes', array('user_id' => $user_id));
        return $query->result();
    }

    /*
     * Back-End - user
     */

    function get_my_bikes_count($user_id, $data = NULL) {
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        return $this->db->count_all_results('bikes', array('user_id' => $user_id));
    }

    /*
     * Back-End 
     */

    function get_my_offers($user_id, $data = array()) {
        $this->db->select('bikes.id,bikes.active,bikes.title,bikes.views,bikes.interested,offers.id as offer_id,offers.offer_price,offers.added_date,offers.expire_date,currencies.currency_name');
        !empty($data['i_search']) ? $this->db->like('bikes.title', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->join('bikes', 'bikes.id = offers.bike_id');
        $this->db->join('currencies', 'currencies.id = bikes.currency_id', 'left');
        $this->db->order_by('added_date', 'DESC');
        $query = $this->db->get_where('offers', array('user_id' => $user_id));
        return $query->result();
    }

    /*
     * Back-End 
     */

    function get_my_offers_count($user_id, $data = NULL) {
        if (!empty($data['i_search'])) {
            $this->db->join('bikes', 'bikes.id = offers.bike_id');
            $this->db->like('bikes.title', $data['i_search']);
        }
        return $this->db->count_all_results('offers', array('user_id' => $user_id));
    }

    /*
     * Back-End 
     */

    function get_my_purchase_orders($user_id, $data = array()) {
        $this->db->select('orders.id,orders.active,orders.title,orders.views,orders.added_date');
        !empty($data['i_search']) ? $this->db->like('orders.title', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->join('currencies', 'currencies.id = orders.currency_id', 'left');
        $this->db->order_by('added_date', 'DESC');
        $query = $this->db->get_where('orders', array('user_id' => $user_id));
        return $query->result();
    }

    /*
     * Back-End 
     */

    function get_my_purchase_orders_count($user_id, $data = NULL) {
        if (!empty($data['i_search'])) {
            $this->db->like('orders.title', $data['i_search']);
        }
        return $this->db->count_all_results('orders', array('user_id' => $user_id));
    }

    /*
     * Front-End 
     */

    function latest_bikes() {
        $this->db->select('bikes.id,bikes.title,bikes.description,countries.id as country_id,bikes.price,currencies.currency_name,bikes.added_date,bikes.bike_picture_1,users.username');
        $this->db->join('users', 'users.id = bikes.user_id', 'left');
        $this->db->join('currencies', 'currencies.id = bikes.currency_id', 'left');
        $this->db->join('offers', 'bikes.id = offers.bike_id', 'left');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->where(array('bikes.active' => 1, 'offers.id' => NULL));
        $this->db->order_by('bikes.added_date', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get('bikes');
        return $query->result();
    }

    /*
     * Front-End 
     */

    function bikes_most_viewed() {
        $this->db->select('bikes.id,bikes.title,bikes.added_date,bikes.bike_picture_1,bikes.views');
        $this->db->order_by('bikes.views', 'DESC');
        $this->db->limit(4);
        $this->db->where('bikes.active', 1);
        $query = $this->db->get('bikes');
        return $query->result();
    }

    /*
     * Front-End 
     */

    function bikes_most_price() {
        $this->db->select('bikes.id,bikes.title,bikes.added_date,bikes.bike_picture_1,bikes.price,currencies.currency_name');
        $this->db->join('currencies', 'currencies.id = bikes.currency_id', 'left');
        $this->db->order_by('bikes.price', 'DESC');
        $this->db->limit(4);
        $this->db->where('bikes.active', 1);
        $query = $this->db->get('bikes');
        return $query->result();
    }

    /*
     * Front-End 
     */

    function bikes_most_interested() {
        $this->db->select('bikes.id,bikes.title,bikes.added_date,bikes.bike_picture_1,bikes.interested');
        $this->db->order_by('bikes.interested', 'DESC');
        $this->db->limit(4);
        $this->db->where('bikes.active', 1);
        $query = $this->db->get('bikes');
        return $query->result();
    }

    /*
     * Front-End 
     */

    function latest_offers($limit = 10) {
        $this->db->select('bikes.title,currencies.currency_name,countries.id as country_id,bikes.price,bikes.description,bikes.bike_picture_1,offers.id as offer_id,'
                . 'offers.id,offers.offer_price,offers.added_date,offers.expire_date,users.username');
        $this->db->join('bikes', 'bikes.id = offers.bike_id');
        $this->db->join('users', 'users.id = bikes.user_id', 'left');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->join('currencies', 'currencies.id = bikes.currency_id', 'left');
        $this->db->limit($limit);
        $this->db->order_by('offers.added_date', 'DESC');
        $query = $this->db->get_where('offers', array('offers.expire_date >=' => date('Y-m-d'), 'bikes.active' => 1));
        return $query->result();
    }

    /**
     * Front-End
     */
    function get_bike_details($bike_id) {
        $this->db->select('bikes.*,currencies.currency_name,models.name as model_name,manufacturers.name as manufacturer_name,'
                . 'users.full_name,users.mobile,user_types.name as user_type,countries.name as country_name,cities.name as city_name,engines_capacity.capacity as engine_capacity,'
                . '(select (select count(*) from bikes where bikes.user_id = users.id) + (select count(*) from products where products.user_id =users.id)) as supplies_count');
        $this->db->join('users', 'users.id = bikes.user_id', 'left');
        $this->db->join('currencies', 'currencies.id = bikes.currency_id', 'left');
        $this->db->join('manufacturers', 'manufacturers.id = bikes.manufacturer_id', 'left');
        $this->db->join('models', 'models.id = bikes.model_id', 'left');
        $this->db->join('user_types', 'users.user_type = user_types.id', 'left');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->join('cities', 'cities.id = bikes.city_id', 'left');
        $this->db->join('engines_capacity', 'engines_capacity.id = bikes.engine', 'left');
        $query = $this->db->get_where('bikes', array('bikes.id' => $bike_id, 'bikes.active' => 1));
        return $query->row();
    }

    /*
     * Front-End
     * get realted bikes where bikes manufacture and model similar the 
     * current bike_id
     */

    function get_related_bikes($bike_id = NULL) {
        $this->db->select('bikes.id,bikes.title,bikes.description,bikes.price,countries.id as country_id,currencies.currency_name,bikes.added_date,bikes.bike_picture_1,users.username,offers.id as offer_id');
        $this->db->join('users', 'users.id = bikes.user_id', 'left');
        $this->db->join('offers', 'offers.bike_id = bikes.id', 'left');
        $this->db->join('currencies', 'currencies.id = bikes.currency_id', 'left');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->order_by('bikes.added_date', 'DESC');
        $this->db->where('bikes.manufacturer_id = (SELECT manufacturer_id FROM bikes where id= ' . $bike_id . ')', NULL, FALSE);
        $this->db->where(array('bikes.id !=' => $bike_id, 'bikes.active' => 1));
        $this->db->limit(3);
        $query = $this->db->get('bikes');
        return $query->result();
    }

    /*
     * Front-End
     */

    function set_bike_interested($bike_id = NULL) {
        $this->db->where('id', $bike_id);
        $this->db->set('interested', 'interested+1', FALSE);
        $query = $this->db->update('bikes');
        return $query;
    }

    /*
     * Front-End
     */

    function set_bike_view($bike_id = NULL) {
        $this->db->where('id', $bike_id);
        $this->db->set('views', 'views+1', FALSE);
        $query = $this->db->update('bikes');
        return $query;
    }

    /**
     * Front-End
     */
    function get_offer_details($offer_id) {
        $this->db->select('bikes.*,offers.id as offer_id,offers.offer_price,offers.expire_date,currencies.currency_name,models.name as model_name,manufacturers.name as manufacturer_name,'
                . 'users.full_name,users.mobile,user_types.name as user_type,countries.name as country_name,cities.name as city_name,engines_capacity.capacity as engine_capacity,'
                . '(select (select count(*) from bikes where bikes.user_id=users.id) + (select count(*) from products where bikes.user_id=users.id)) as supplies_count');
        $this->db->join('bikes', 'bikes.id = offers.bike_id');
        $this->db->join('users', 'users.id = bikes.user_id', 'left');
        $this->db->join('currencies', 'currencies.id = bikes.currency_id', 'left');
        $this->db->join('manufacturers', 'manufacturers.id = bikes.manufacturer_id', 'left');
        $this->db->join('models', 'models.id = bikes.model_id', 'left');
        $this->db->join('user_types', 'users.user_type = user_types.id', 'left');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->join('cities', 'cities.id = bikes.city_id', 'left');
        $this->db->join('engines_capacity', 'engines_capacity.id = bikes.engine', 'left');
        $query = $this->db->get_where('offers', array('offers.id' => $offer_id, 'bikes.active' => 1));
        return $query->row();
    }

    /*
     * Front-End
     * get realted offers where bikes manufacture and model similar the 
     * current offer_id
     */

    function get_related_offers($bike_id = NULL) {
        $this->db->select('offers.id as offer_id,offers.offer_price,offers.expire_date,countries.id as country_id,bikes.title,bikes.description,bikes.price,currencies.currency_name,bikes.added_date,bikes.bike_picture_1,users.username');
        $this->db->join('offers', 'offers.bike_id = bikes.id');
        $this->db->join('users', 'users.id = bikes.user_id', 'left');
        $this->db->join('currencies', 'currencies.id = bikes.currency_id', 'left');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->where('bikes.manufacturer_id = (SELECT manufacturer_id FROM bikes where id= ' . $bike_id . ')', NULL, FALSE);
        $this->db->where(array('bikes.id !=' => $bike_id, 'bikes.active' => 1));
        $this->db->limit(3);
        $this->db->order_by('bikes.added_date', 'DESC');
        $query = $this->db->get('bikes');
        return $query->result();
    }

    /*
     * Front-End 
     */

    function get_offers($limit = 9, $start, $search_criteria = NULL) {
        $this->db->select('bikes.id,bikes.title,bikes.description,bikes.price,countries.id as country_id,currencies.currency_name,bikes.added_date,bikes.bike_picture_1,users.username,offers.expire_date,offers.offer_price,offers.id as offer_id');
        $this->db->join('bikes', 'bikes.id = offers.bike_id');
        $this->db->join('users', 'users.id = bikes.user_id', 'left');
        $this->db->join('currencies', 'currencies.id = bikes.currency_id', 'left');
        $this->db->join('cities', 'cities.id = bikes.city_id', 'left');
        $this->db->join('countries', 'countries.id = cities.country_id', 'left');
        $this->db->order_by('offers.added_date', 'DESC');
        $this->db->limit($limit, $start);
        /* for searching */
        !empty($search_criteria['country_id']) ? $this->db->where('countries.id', $search_criteria['country_id']) : '';
        !empty($search_criteria['manufacturer_id']) ? $this->db->where('bikes.manufacturer_id', $search_criteria['manufacturer_id']) : '';
        !empty($search_criteria['model_id']) ? $this->db->where('bikes.model_id', $search_criteria['model_id']) : '';
        !empty($search_criteria['bike_status']) ? $this->db->where('bikes.bike_status', $search_criteria['bike_status']) : '';
        $query = $this->db->get_where('offers', array('bikes.active' => 1));
//        echo $this->db->last_query();
        return $query->result();
    }

    /*
     * Front-End 
     */

    function get_offers_count($search_criteria = NULL) {
        /* for searching */
        $this->db->where('bikes.active', 1);
        if ($search_criteria != null) {
            $this->db->join('bikes', 'bikes.id = offers.bike_id');
            $this->db->join('cities', 'cities.id = bikes.city_id', 'left');
            $this->db->join('countries', 'countries.id = cities.country_id', 'left');
            !empty($search_criteria['country_id']) ? $this->db->where('countries.id', $search_criteria['country_id']) : '';
            !empty($search_criteria['manufacturer_id']) ? $this->db->where('bikes.manufacturer_id', $search_criteria['manufacturer_id']) : '';
            !empty($search_criteria['model_id']) ? $this->db->where('bikes.model_id', $search_criteria['model_id']) : '';
            !empty($search_criteria['bike_status']) ? $this->db->where('bikes.bike_status', $search_criteria['bike_status']) : '';
        }

        return $this->db->count_all_results('offers');
    }

    /*
     * Front-End 
     */

    function get_supplies($limit = 9, $start, $search_criteria = NULL) {
        $this->db->select('bikes.id,bikes.title,bikes.description,bikes.price,countries.id as country_id,currencies.currency_name,bikes.added_date,bikes.bike_picture_1,users.username,offers.id as offer_id');
        $this->db->join('users', 'users.id = bikes.user_id', 'left');
        $this->db->join('user_types', 'user_types.id = users.user_type', 'left');
        $this->db->join('currencies', 'currencies.id = bikes.currency_id', 'left');
        $this->db->join('cities', 'cities.id = bikes.city_id', 'left');
        $this->db->join('countries', 'countries.id = cities.country_id', 'left');
        $this->db->join('offers', 'offers.bike_id = bikes.id', 'left');
        $this->db->order_by('bikes.added_date', 'DESC');
        $this->db->limit($limit, $start);
        /* for searching */
        !empty($search_criteria['title']) ? $this->db->like('bikes.title', $search_criteria['title']) : '';
        !empty($search_criteria['country_id']) ? $this->db->where('countries.id', $search_criteria['country_id']) : '';
        !empty($search_criteria['manufacturer_id']) ? $this->db->where('bikes.manufacturer_id', $search_criteria['manufacturer_id']) : '';
        !empty($search_criteria['model_id']) ? $this->db->where('bikes.model_id', $search_criteria['model_id']) : '';
        !empty($search_criteria['bike_status']) ? $this->db->where('bikes.bike_status', $search_criteria['bike_status']) : '';
        !empty($search_criteria['color']) ? $this->db->where('bikes.color', $search_criteria['color']) : '';
        !empty($search_criteria['production_date']) ? $this->db->where('bikes.production_date', $search_criteria['production_date']) : '';
        !empty($search_criteria['user_type']) ? $this->db->where('user_types.id', $search_criteria['user_type']) : '';
        if (!empty($search_criteria['price1']) and ! empty($search_criteria['price2'])) {
            $this->db->where('bikes.price >=', $search_criteria['price1']);
            $this->db->where('bikes.price <=', $search_criteria['price2']);
        }
        $query = $this->db->get_where('bikes', array('bikes.active' => 1));
        return $query->result();
    }

    /**
     * Front-End
     */
    function get_order_details($order_id) {
        $this->db->select('orders.*,countries.id as country_id,currencies.currency_name,orders.added_date,users.full_name,'
                . 'users.mobile,user_types.name as user_type,countries.name as country_name,cities.name as city_name,'
                . 'models.name as model_name,manufacturers.name as manufacturer_name,manufacturers.image as manufacturer_image');
        $this->db->join('users', 'users.id = orders.user_id', 'left');
        $this->db->join('user_types', 'users.user_type = user_types.id', 'left');
        $this->db->join('manufacturers', 'manufacturers.id = orders.manufacturer_id');
        $this->db->join('models', 'models.id = orders.model_id', 'left');
        $this->db->join('currencies', 'currencies.id = orders.currency_id', 'left');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->join('cities', 'cities.country_id = countries.id', 'left');
        $query = $this->db->get_where('orders', array('orders.active' => 1, 'orders.id' => $order_id));
        return $query->row();
    }

    /*
     * Front-End
     */

    function set_order_view($oder_id = NULL) {
        $this->db->where('id', $oder_id);
        $this->db->set('views', 'views+1', FALSE);
        $query = $this->db->update('orders');
        return $query;
    }

    /*
     * Front-End 
     */

    function get_orders($limit = 9, $start) {
        $this->db->select('orders.id,orders.title,orders.description,orders.price,countries.id as country_id,currencies.currency_name,orders.added_date,users.username,manufacturers.image as manufacturer_image');
        $this->db->join('users', 'users.id = orders.user_id', 'left');
        $this->db->join('manufacturers', 'manufacturers.id = orders.manufacturer_id');
        $this->db->join('currencies', 'currencies.id = orders.currency_id', 'left');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->order_by('orders.added_date', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get_where('orders', array('orders.active' => 1));
        return $query->result();
    }

    function get_top_manufacturers() {
        $this->db->select('count(*) as count,manufacturers.id,manufacturers.name');
        $this->db->join('manufacturers', 'manufacturers.id = bikes.manufacturer_id');
        $this->db->order_by('count(*)', 'DESC');
        $this->db->group_by('bikes.manufacturer_id');
        $this->db->limit(5);
        $query = $this->db->get_where('bikes', array('bikes.active' => 1));
        return $query->result();
    }

    function get_bike_price($bike_id, $user_id) {
        $this->db->select('bikes.price,bikes.added_date,bikes.views');
        $query = $this->db->get_where('bikes', array('bikes.id' => $bike_id, 'bikes.user_id' => $user_id));
        return $query->row();
    }

    /*
     * Front-End
     */

    function get_supplies_count($search_criteria = NULL) {
        /* for searching */
        $this->db->where('bikes.active', 1);
        if ($search_criteria != null) {
            $this->db->join('cities', 'cities.id = bikes.city_id', 'left');
            $this->db->join('countries', 'countries.id = cities.country_id', 'left');
            $this->db->join('users', 'users.id = bikes.user_id', 'left');
            $this->db->join('user_types', 'user_types.id = users.user_type', 'left');
            !empty($search_criteria['title']) ? $this->db->like('bikes.title', $search_criteria['title']) : '';
            !empty($search_criteria['country_id']) ? $this->db->where('countries.id', $search_criteria['country_id']) : '';
            !empty($search_criteria['manufacturer_id']) ? $this->db->where('bikes.manufacturer_id', $search_criteria['manufacturer_id']) : '';
            !empty($search_criteria['model_id']) ? $this->db->where('bikes.model_id', $search_criteria['model_id']) : '';
            !empty($search_criteria['bike_status']) ? $this->db->where('bikes.bike_status', $search_criteria['bike_status']) : '';
            !empty($search_criteria['color']) ? $this->db->where('bikes.color', $search_criteria['color']) : '';
            !empty($search_criteria['user_type']) ? $this->db->where('user_types.id', $search_criteria['user_type']) : '';
            if (!empty($search_criteria['price1']) and ! empty($search_criteria['price2'])) {
                $this->db->where('bikes.price >=', $search_criteria['price1']);
                $this->db->where('bikes.price <=', $search_criteria['price2']);
            }
            !empty($search_criteria['production_date']) ? $this->db->where('bikes.production_date', $search_criteria['production_date']) : '';
        }

        return $this->db->count_all_results('bikes');
    }

    /*
     * Front-End
     */

    function get_orders_count() {
        $this->db->where('orders.active', 1);
        return $this->db->count_all_results('orders');
    }

    function get_member_supplies($limit = 9, $start, $user_id = NULL) {
        $this->db->select('bikes.id,bikes.title,bikes.description,bikes.price,countries.id as country_id,currencies.currency_name,bikes.added_date,bikes.bike_picture_1,users.username,offers.id as offer_id');
        $this->db->join('users', 'users.id = bikes.user_id', 'left');
        $this->db->join('currencies', 'currencies.id = bikes.currency_id', 'left');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->join('offers', 'offers.bike_id = bikes.id', 'left');
        $this->db->limit($limit, $start);
        $this->db->order_by('bikes.added_date', 'DESC');
        $query = $this->db->get_where('bikes', array('bikes.user_id' => $user_id, 'bikes.active' => 1));
        return $query->result();
    }

    function get_member_supplies_count($user_id = NULL) {
        $this->db->where(array('bikes.user_id' => $user_id, 'bikes.active' => 1));
        return $this->db->count_all_results('bikes');
    }

    function get_manufacturer_supplies($limit = 9, $start, $manufacturer_id = NULL) {
        $this->db->select('bikes.id,bikes.title,bikes.description,bikes.price,countries.id as country_id,currencies.currency_name,bikes.added_date,bikes.bike_picture_1,users.username,offers.id as offer_id');
        $this->db->join('users', 'users.id = bikes.user_id', 'left');
        $this->db->join('currencies', 'currencies.id = bikes.currency_id', 'left');
        $this->db->join('countries', 'countries.id = users.country_id', 'left');
        $this->db->join('offers', 'offers.bike_id = bikes.id', 'left');
        $this->db->limit($limit, $start);
        $this->db->order_by('bikes.added_date', 'DESC');
        $query = $this->db->get_where('bikes', array('bikes.manufacturer_id' => $manufacturer_id, 'bikes.active' => 1));
        return $query->result();
    }

    function get_manufacturer_supplies_count($manufacturer_id = NULL) {
        $this->db->where(array('bikes.manufacturer_id' => $manufacturer_id, 'bikes.active' => 1));
        return $this->db->count_all_results('bikes');
    }

    /*
     * Back-End
     * Admin Function
     */

    function admin_get_supplies_count($data = NULL) {
        !empty($data['i_search']) ? $this->db->where('bikes.title', $data['i_search']) : '';
        return $this->db->count_all_results('bikes');
    }

    /*
     * Back-End
     * Admin Function
     */

    function admin_get_all_supplies($data = NULL) {
        $this->db->select('bikes.id,bikes.title,bikes.active,currencies.currency_name,bikes.price,bikes.added_date,bikes.bike_picture_1,'
                . 'manufacturers.name as manufacturer_name,models.name as model_name');
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->join('users', 'users.id = bikes.user_id', 'left');
        $this->db->join('manufacturers', 'bikes.manufacturer_id = manufacturers.id', 'left');
        $this->db->join('models', 'bikes.model_id = models.id', 'left');
        $this->db->join('currencies', 'currencies.id = bikes.currency_id', 'left');
        $this->db->order_by('added_date', 'DESC');
        $query = $this->db->get('bikes');
        return $query->result();
    }

    /*
     * Back-End
     * Admin Function
     */

    function admin_get_offers_count($data = NULL) {
        !empty($data['i_search']) ? $this->db->where('bikes.title', $data['i_search']) : '';
        return $this->db->count_all_results('offers');
    }

    /*
     * Back-End
     * Admin Function
     */

    function admin_get_all_offers($data = NULL) {
        $this->db->select('bikes.id,bikes.title,currencies.currency_name,bikes.price,manufacturers.name as manufacturer_name,'
                . 'models.name as model_name,offers.id as offer_id,offers.offer_price,offers.added_date,offers.expire_date');
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->join('bikes', 'bikes.id = offers.bike_id');
        $this->db->join('manufacturers', 'bikes.manufacturer_id = manufacturers.id', 'left');
        $this->db->join('models', 'bikes.model_id = models.id', 'left');
        $this->db->join('currencies', 'currencies.id = bikes.currency_id', 'left');
        $this->db->order_by('added_date', 'DESC');
        $query = $this->db->get('offers');
        return $query->result();
    }

    /*
     * Back-End 
     */

    function do_purchase_order($data) {
        $query = $this->db->insert('orders', $data);
        return $query;
    }

    /*
     * get purchase orders for admin
     */

    function admin_get_all_orders($data = NULL) {
        $this->db->select('orders.id,orders.title,orders.active,currencies.currency_name,orders.production_date,orders.price,orders.added_date,'
                . 'manufacturers.name as manufacturer_name,models.name as model_name');
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->join('users', 'users.id = orders.user_id', 'left');
        $this->db->join('manufacturers', 'orders.manufacturer_id = manufacturers.id', 'left');
        $this->db->join('models', 'orders.model_id = models.id', 'left');
        $this->db->join('currencies', 'currencies.id = orders.currency_id', 'left');
        $this->db->order_by('orders.added_date', 'DESC');
        $query = $this->db->get('orders');
        return $query->result();
    }

    /*
     * get purchase orders count for admin
     */

    function admin_get_orders_count($data = NULL) {
        !empty($data['i_search']) ? $this->db->where('orders.title', $data['i_search']) : '';
        return $this->db->count_all_results('orders');
    }

    /*
     * admin function
     */

    function activate_supply($supply_id, $status) {
        $this->db->where('id', $supply_id);
        if ($status == 1) {
            $query = $this->db->update('bikes', array('active' => 1));
        } else {
            $query = $this->db->update('bikes', array('active' => 0));
        }
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    /*
     * admin function
     */

    function activate_order($order_id, $status) {
        $this->db->where('id', $order_id);
        if ($status == 1) {
            $query = $this->db->update('orders', array('active' => 1));
        } else {
            $query = $this->db->update('orders', array('active' => 0));
        }
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    /*
     * admin function
     */

    function get_activate_supply_email_info($bike_id) {
        $this->db->select('bikes.id,bikes.title,users.full_name,users.email');
        $this->db->join('users', 'users.id = bikes.user_id', 'left');
        $query = $this->db->get_where('bikes', array('bikes.id' => $bike_id));
        return $query->row();
    }

    /*
     * admin function
     */

    function get_activate_order_email_info($order_id) {
        $this->db->select('orders.id,orders.title,users.full_name,users.email');
        $this->db->join('users', 'users.id = orders.user_id', 'left');
        $query = $this->db->get_where('orders', array('orders.id' => $order_id));
        return $query->row();
    }

}

// end of file