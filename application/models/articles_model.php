<?php

class Articles_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     * Back-End 
     */

    function insert_article($data) {
        $query = $this->db->insert('articles', $data);
        return $query;
    }

    /*
     * Back-End 
     */

    function get_article_info($article_id) {
        $this->db->select('*');
        $query = $this->db->get_where('articles', array('id' => $article_id));
        return $query->row();
    }

    /*
     * Back-End 
     */

    function remove_article($article_id) {
        $this->db->select('picture');
        $query1 = $this->db->get_where('articles', array('id' => $article_id));

        $this->db->where('id', $article_id);
        $query = $this->db->delete('articles');

        return array('is_removed' => $query, 'picture' => $query1->row()->picture);
    }

    /*
     * Back-End 
     */

    function update_article($article, $data) {
        $this->db->where('id', $article);
        $query = $this->db->update('articles', $data);
        return $query;
    }

    /*
     * Back-End 
     */

    function get_old_picture($article_id) {
        $this->db->select('picture');
        $query = $this->db->get_where('articles', array('id' => $article_id));
        return $query->row()->picture;
    }

    /*
     * Back-End 
     */

    function get_all_articles($data) {
        $this->db->select('*');
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        $this->db->limit($data['i_end_index'], $data['i_start_index']);
        $this->db->order_by('publish_date', 'DESC');
        $query = $this->db->get('articles');

        return $query->result_array();
    }

    /**
     * Front-end and Back-end
     */
    function get_articles_count($data = NULL) {
        !empty($data['i_search']) ? $this->db->like('title', $data['i_search']) : '';
        return $this->db->count_all_results('articles');
    }

    /*
     * Front-End 
     */

    function latest_articles() {
        $this->db->select('articles.*,articles_categories.name as category_name');
        $this->db->join('articles_categories', 'articles.category_id = articles_categories.id', 'left');
        $this->db->group_by('articles.id');
        $this->db->order_by('publish_date', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get('articles');
        return $query->result();
    }

    /*
     * Front-End 
     * 
     */

    function article_view($article_id) {
        $this->db->where('articles.id', $article_id);
        $this->db->set('views', 'views+1', FALSE);
        $query = $this->db->update('articles');
        return $query;
    }

    /*
     * Front-End 
     * 
     */

    function get_article($article_id) {
        $this->db->select('articles.*, articles_categories.name as category_name');
        $this->db->join('articles_categories', 'articles.category_id = articles_categories.id', 'left');
        $query = $this->db->get_where('articles', array('articles.id' => $article_id));
        return $query->row_array();
    }

    /*
     * Front-End 
     * 
     */

//    function insert_article_comment($data) {
//        $query = $this->db->insert('articles_comments', $data);
//        return $query;
//    }

    /*
     * Front-End 
     */

    function get_articles($limit = 6, $start) {
        $this->db->select('articles.*,articles_categories.name as category_name');
        $this->db->join('articles_categories', 'articles.category_id = articles_categories.id', 'left');
        $this->db->group_by('articles.id');
        $this->db->order_by('articles.publish_date', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get('articles');
        return $query->result();
    }

    function get_category_articles($category_id = NULL, $limit = 6, $start) {
        $this->db->select('articles.*,articles_categories.name as category_name');
        $this->db->join('articles_categories', 'articles.category_id = articles_categories.id', 'left');
        ($category_id != NULL) ? $this->db->where('articles.category_id', $category_id) : '';
        $this->db->group_by('articles.id');
        $this->db->order_by('articles.publish_date', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get('articles');
        return $query->result();
    }

    function get_article_category_name($category_id = NULL) {
        $this->db->select('name');
        $query = $this->db->get_where('articles_categories', array('id' => $category_id));
        return $query->row()->name;
    }

    function get_category_articles_count($category_id = NULL) {
        !empty($category_id) ? $this->db->where('articles.category_id', $category_id) : '';
        $this->db->count_all_results('articles');
        return $this->db->count_all_results('articles');
    }

    /*
     * Front-End 
     * 
     */

//    function get_article_comments($category_id = NULL, $article_id = NULL) {
//        $this->db->select('name, comment, publish_date');
////        ($category_id != NULL) ? $this->db->where('articles.category_id', $category_id) : '';
//        $this->db->order_by('publish_date');
//        $this->db->where(array('status' => 1, 'article_id' => $article_id));
//        $query = $this->db->get('articles_comments');
//
//        return $query->result();
//    }

    /*
     * Front-End 
     */

    function categories_count() {
        $this->db->select('COUNT(*) as articles_count,articles_categories.id,articles_categories.name');
        $this->db->join('articles_categories', 'articles.category_id = articles_categories.id', 'left');
        $this->db->group_by('articles_categories.id');
        $query = $this->db->get('articles');
        return $query->result();
    }

}

// end of file