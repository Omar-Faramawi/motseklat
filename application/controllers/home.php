<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('locations_model');
        $this->load->model('users_model');
        $this->load->model('articles_model');
        $this->load->model('manufacturers_model');
        $this->load->model('slider_model');
        $this->load->model('bikes_model');
        $this->load->model('products_model');
        $this->load->model('public_model');
    }
    
    /* public function index(){
    
    header("Location: http://www.motseklat.com/index.html");
    die();
    } */
    
    public function index()
    {
        $data['articles']              = $this->articles_model->latest_articles();
        $data['categories_count']      = $this->articles_model->categories_count();
        $data['bikes']                 = $this->bikes_model->latest_bikes();
        $data['bikes_most_viewed']     = $this->bikes_model->bikes_most_viewed();
        $data['bikes_most_interested'] = $this->bikes_model->bikes_most_interested();
        $data['bikes_most_price']      = $this->bikes_model->bikes_most_price();
        $data['offers']                = $this->bikes_model->latest_offers();
        $data['products']              = $this->products_model->latest_products();
        $data['slides']                = $this->slider_model->get_slides();
        $data['top_manufacturers']     = $this->bikes_model->get_top_manufacturers();
        
        $this->load->view('front_end/index', $data);
    }
    
    public function article()
    {
        $article_id = $this->uri->segment(3, TRUE);
        empty($article_id) ? redirect(base_url()) : '';
        
        $this->articles_model->article_view($article_id);
        $data['article_info']      = $this->articles_model->get_article($article_id);
        //        $data['settings'] = $this->articles_model->get_settings();
        $data['categories_count']  = $this->articles_model->categories_count();
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('front_end/article', $data);
    }
    
    public function terms()
    {
        $data['categories_count']  = $this->articles_model->categories_count();
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        
        $this->load->view('front_end/term_of_use', $data);
    }
    
    public function about_us()
    {
        $data['categories_count']  = $this->articles_model->categories_count();
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        
        $this->load->view('front_end/about_us', $data);
    }
    
    public function articles()
    {
        $this->load->library("pagination");
        
        $config                = array();
        $config["base_url"]    = base_url("home/articles");
        $config["total_rows"]  = $this->articles_model->get_articles_count();
        $config["per_page"]    = 6;
        $config["uri_segment"] = 3;
        
        $config['query_string_segment'] = 'page';
        
        $config['full_tag_open']  = '<ul>';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_link']      = 'البداية';
        $config['first_tag_open']  = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']      = 'الأخير &raquo;';
        $config['last_tag_open']  = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link']      = 'التالي &rarr;';
        $config['next_tag_open']  = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link']      = '&larr; السابق';
        $config['prev_tag_open']  = '<li class="prev page">';
        $config['prev_tag_close'] = '</a></li>';
        
        $config['cur_tag_open']  = '<li class="selected"><span class="skew25">';
        $config['cur_tag_close'] = '</span></li>';
        
        $config['num_tag_open']  = '<li><a class="skew25" href="#">';
        $config['num_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);
        $page                 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['all_articles'] = $this->articles_model->get_articles($config["per_page"], $page);
        $data["pageNumber"]   = $this->pagination->create_links();
        
        $data['categories_count']  = $this->articles_model->categories_count();
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        //        $data['settings'] = $this->settings_model->get_settings();
        //        $data['categories_count'] = $this->news_model->categories_count();
        $this->load->view('front_end/articles', $data);
    }
    
    /* this function to get articles by category id */
    
    public function categories()
    {
        $category_id = $this->uri->segment(3);
        empty($category_id) ? redirect(base_url()) : '';
        
        $this->load->library("pagination");
        
        $config                = array();
        $config["base_url"]    = base_url() . "home/categories/" . $category_id;
        $config["total_rows"]  = $this->articles_model->get_category_articles_count($category_id);
        $config["per_page"]    = 6;
        $config["uri_segment"] = 4;
        
        $config['query_string_segment'] = 'page';
        
        $config['full_tag_open']  = '<ul>';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_link']      = 'البداية';
        $config['first_tag_open']  = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']      = 'الأخير &raquo;';
        $config['last_tag_open']  = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link']      = 'التالي &rarr;';
        $config['next_tag_open']  = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link']      = '&larr; السابق';
        $config['prev_tag_open']  = '<li class="prev page">';
        $config['prev_tag_close'] = '</a></li>';
        
        $config['cur_tag_open']  = '<li class="selected"><span class="skew25">';
        $config['cur_tag_close'] = '</span></li>';
        
        $config['num_tag_open']  = '<li><a class="skew25" href="#">';
        $config['num_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);
        $page                  = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['all_articles']  = $this->articles_model->get_category_articles($category_id, $config["per_page"], $page);
        $data['category_name'] = $this->articles_model->get_article_category_name($category_id);
        $data["pageNumber"]    = $this->pagination->create_links();
        
        $data['categories_count']  = $this->articles_model->categories_count();
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        //        $data['settings'] = $this->settings_model->get_settings();
        //        $data['categories_count'] = $this->news_model->categories_count();
        $this->load->view('front_end/articles', $data);
    }
    
    public function members()
    {
        $type_id = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        empty($type_id) ? redirect(base_url()) : '';
        
        $this->load->library("pagination");
        
        $config                = array();
        $config["base_url"]    = base_url() . "home/members/$type_id";
        $config["total_rows"]  = $this->users_model->get_members_count($type_id);
        $config["per_page"]    = 12;
        $config["uri_segment"] = 4;
        
        $config['query_string_segment'] = 'page';
        
        $config['full_tag_open']  = '<ul>';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_link']      = 'البداية';
        $config['first_tag_open']  = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']      = 'الأخير &raquo;';
        $config['last_tag_open']  = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link']      = 'التالي &rarr;';
        $config['next_tag_open']  = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link']      = '&larr; السابق';
        $config['prev_tag_open']  = '<li class="prev page">';
        $config['prev_tag_close'] = '</a></li>';
        
        $config['cur_tag_open']  = '<li class="selected"><span class="skew25">';
        $config['cur_tag_close'] = '</span></li>';
        
        $config['num_tag_open']  = '<li><a class="skew25" href="#">';
        $config['num_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);
        $page                   = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['members']        = $this->users_model->get_members($config["per_page"], $page, $type_id);
        $data['user_type_name'] = $this->users_model->get_user_type($type_id);
        $data["pageNumber"]     = $this->pagination->create_links();
        
        $data['categories_count']  = $this->articles_model->categories_count();
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        //        $data['settings'] = $this->settings_model->get_settings();
        $this->load->view('front_end/members', $data);
    }
    
    /* products categories */
    
    public function category()
    {
        $this->load->library("pagination");
        $category_id = $this->uri->segment(3);
        
        $config                = array();
        $config["base_url"]    = base_url() . "home/category";
        $config["total_rows"]  = $this->products_model->get_category_products_count($category_id);
        $config["per_page"]    = 1;
        $config["uri_segment"] = 4;
        
        $config['query_string_segment'] = 'page';
        
        $config['full_tag_open']  = '<ul>';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_link']      = 'البداية';
        $config['first_tag_open']  = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']      = 'الأخير &raquo;';
        $config['last_tag_open']  = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link']      = 'التالي &rarr;';
        $config['next_tag_open']  = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link']      = '&larr; السابق';
        $config['prev_tag_open']  = '<li class="prev page">';
        $config['prev_tag_close'] = '</a></li>';
        
        $config['cur_tag_open']  = '<li class="selected"><span class="skew25">';
        $config['cur_tag_close'] = '</span></li>';
        
        $config['num_tag_open']  = '<li><a class="skew25" href="#">';
        $config['num_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);
        $page                 = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['all_products'] = $this->products_model->get_category_products($config["per_page"], $page, $category_id);
        $data["pageNumber"]   = $this->pagination->create_links();
        
        $data['countries']             = $this->get_countries();
        $data['bikes_most_viewed']     = $this->bikes_model->bikes_most_viewed();
        $data['bikes_most_interested'] = $this->bikes_model->bikes_most_interested();
        $data['bikes_most_price']      = $this->bikes_model->bikes_most_price();
        $data['top_manufacturers']     = $this->bikes_model->get_top_manufacturers();
        //        $data['settings'] = $this->settings_model->get_settings();
        //        $data['categories_count'] = $this->news_model->categories_count();
        $this->load->view('front_end/products', $data);
    }
    
    public function register()
    {
        $data['countries']         = $this->get_countries();
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('front_end/register', $data);
    }
    
    //    public function do_purchase_order() {
    //        $this->form_validation->set_rules('manufacturer_id', 'الشركة المصنعة', 'required|trim|xss_clean');
    //        $this->form_validation->set_rules('email', 'البريد الإلكتروني', 'required|trim|valid_email|max_length[70]|xss_clean');
    //        $this->form_validation->set_rules('details', 'التفاصيل', 'required|trim|xss_clean');
    //
    //        if ($this->form_validation->run() == FALSE) {
    //            $errorMsg = validation_errors();
    //            echo json_encode(array('status' => false, 'msg' => $errorMsg));
    //        } else {
    //            $data = array();
    //            $data['user_id'] = $this->session->userdata('user_id');
    //            $data['manufacturer_id'] = $this->input->post('manufacturer_id');
    //            $data['email'] = $this->input->post('email');
    //            $data['details'] = $this->input->post('details');
    //            $query = $this->bikes_model->do_purchase_order($data);
    //            if ($query) {
    //                echo json_encode(array('status' => true, 'msg' => 'تم الطلب بنجاح...سيتم التواصل مع المزودين'));
    //            } else {
    //                echo json_encode(array('status' => true, 'msg' => 'هناك خطأ يجب التأكد من البيانات المدخلة'));
    //            }
    //        }
    //    }
    
    public function product($product_id = NULL)
    {
        if (!trim($product_id) == NULL or is_numeric(trim($product_id))) {
            $this->products_model->set_product_view($product_id);
            $product_id      = $product_id;
            $data['product'] = $this->products_model->get_product_details($product_id);
            if (count($data['product']) > 0 and $data['product']->id != null) {
                $data['related_products'] = $this->products_model->get_related_products($product_id);
            } else {
                $data['related_products'] = null;
            }
            $data['categories_count']  = $this->articles_model->categories_count();
            $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
            $this->load->view('front_end/product_details', $data);
        }
    }
    
    public function set_product_interested()
    {
        $product_id = $this->input->post('product_id', TRUE);
        $this->products_model->set_product_interested($product_id);
        return true;
    }
    
    public function products()
    {
        $search_criteria = array(
            'country_id' => $this->input->get('country_id', TRUE),
            'title' => $this->input->get('title', TRUE),
            'manufacturer_id' => $this->input->get('manufacturer_id', TRUE),
            'model_id' => $this->input->get('model_id', TRUE),
            'bike_status' => $this->input->get('bike_status', TRUE),
            'price1' => $this->input->get('price1'),
            'price2' => $this->input->get('price2'),
            'user_type' => $this->input->get('type') //user type
        );
        $query_string    = '';
        foreach ($search_criteria as $key => $value) {
            $query_string .= $key . '=' . $value . '&';
        }
        $query_string = rtrim($query_string, '&');
        
        $this->load->library("pagination");
        $config                         = array();
        $page                           = $this->input->get('page', TRUE);
        $config["base_url"]             = base_url() . "home/products/?" . $query_string;
        $config["total_rows"]           = $this->products_model->get_products_count($search_criteria);
        $config["per_page"]             = 9;
        //        $config["uri_segment"] = 4;
        $config['query_string_segment'] = 'page';
        
        $config['full_tag_open']  = '<ul>';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_link']      = 'البداية';
        $config['first_tag_open']  = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']      = 'الأخير &raquo;';
        $config['last_tag_open']  = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link']      = 'التالي &rarr;';
        $config['next_tag_open']  = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link']      = '&larr; السابق';
        $config['prev_tag_open']  = '<li class="prev page">';
        $config['prev_tag_close'] = '</a></li>';
        
        $config['cur_tag_open']  = '<li class="selected"><span class="skew25">';
        $config['cur_tag_close'] = '</span></li>';
        
        $config['num_tag_open']  = '<li><a class="skew25" href="#">';
        $config['num_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);
        $data['all_products'] = $this->products_model->get_products($config["per_page"], $page, $search_criteria);
        $data["pageNumber"]   = $this->pagination->create_links();
        
        $data['countries']             = $this->get_countries();
        $data['bikes_most_viewed']     = $this->bikes_model->bikes_most_viewed();
        $data['bikes_most_interested'] = $this->bikes_model->bikes_most_interested();
        $data['bikes_most_price']      = $this->bikes_model->bikes_most_price();
        $data['top_manufacturers']     = $this->bikes_model->get_top_manufacturers();
        //        $data['settings'] = $this->settings_model->get_settings();
        //        $data['categories_count'] = $this->news_model->categories_count();
        $this->load->view('front_end/products', $data);
    }
    
    public function member_products()
    {
        $user_id = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->load->library("pagination");
        
        $config                = array();
        $config["base_url"]    = base_url() . "home/member_supplies";
        $config["total_rows"]  = $this->products_model->get_member_products_count($user_id);
        $config["per_page"]    = 9;
        $config["uri_segment"] = 4;
        
        $config['query_string_segment'] = 'page';
        
        $config['full_tag_open']  = '<ul>';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_link']      = 'البداية';
        $config['first_tag_open']  = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']      = 'الأخير &raquo;';
        $config['last_tag_open']  = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link']      = 'التالي &rarr;';
        $config['next_tag_open']  = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link']      = '&larr; السابق';
        $config['prev_tag_open']  = '<li class="prev page">';
        $config['prev_tag_close'] = '</a></li>';
        
        $config['cur_tag_open']  = '<li class="selected"><span class="skew25">';
        $config['cur_tag_close'] = '</span></li>';
        
        $config['num_tag_open']  = '<li><a class="skew25" href="#">';
        $config['num_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);
        $page                 = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['all_products'] = $this->products_model->get_member_products($config["per_page"], $page, $user_id);
        $data["pageNumber"]   = $this->pagination->create_links();
        
        $data['manufacturers']         = $this->manufacturers_model->get_manufacturers();
        $data['countries']             = $this->get_countries();
        $data['bikes_most_viewed']     = $this->bikes_model->bikes_most_viewed();
        $data['bikes_most_interested'] = $this->bikes_model->bikes_most_interested();
        $data['bikes_most_price']      = $this->bikes_model->bikes_most_price();
        $data['top_manufacturers']     = $this->bikes_model->get_top_manufacturers();
        //        $data['settings'] = $this->settings_model->get_settings();
        //        $data['categories_count'] = $this->news_model->categories_count();
        $this->load->view('front_end/products', $data);
    }
    
    public function member_supplies()
    {
        $user_id = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        if ($user_id == null) {
            redirect(base_url(), 'location');
        }
        $this->load->library("pagination");
        
        $config                = array();
        $config["base_url"]    = base_url() . "home/member_supplies";
        $config["total_rows"]  = $this->bikes_model->get_member_supplies_count($user_id);
        $config["per_page"]    = 9;
        $config["uri_segment"] = 4;
        
        $config['query_string_segment'] = 'page';
        
        $config['full_tag_open']  = '<ul>';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_link']      = 'البداية';
        $config['first_tag_open']  = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']      = 'الأخير &raquo;';
        $config['last_tag_open']  = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link']      = 'التالي &rarr;';
        $config['next_tag_open']  = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link']      = '&larr; السابق';
        $config['prev_tag_open']  = '<li class="prev page">';
        $config['prev_tag_close'] = '</a></li>';
        
        $config['cur_tag_open']  = '<li class="selected"><span class="skew25">';
        $config['cur_tag_close'] = '</span></li>';
        
        $config['num_tag_open']  = '<li><a class="skew25" href="#">';
        $config['num_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);
        $page                 = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['all_supplies'] = $this->bikes_model->get_member_supplies($config["per_page"], $page, $user_id);
        $data["pageNumber"]   = $this->pagination->create_links();
        
        $data['manufacturers']         = $this->manufacturers_model->get_manufacturers();
        $data['countries']             = $this->get_countries();
        $data['bikes_most_viewed']     = $this->bikes_model->bikes_most_viewed();
        $data['bikes_most_interested'] = $this->bikes_model->bikes_most_interested();
        $data['bikes_most_price']      = $this->bikes_model->bikes_most_price();
        $data['top_manufacturers']     = $this->bikes_model->get_top_manufacturers();
        //        $data['settings'] = $this->settings_model->get_settings();
        //        $data['categories_count'] = $this->news_model->categories_count();
        $this->load->view('front_end/supplies', $data);
    }
    
    public function manufacturer_supplies()
    {
        $manufacturer_id = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        if ($manufacturer_id == null) {
            redirect(base_url(), 'location');
        }
        $this->load->library("pagination");
        
        $config                = array();
        $config["base_url"]    = base_url() . "home/manufacturer_supplies";
        $config["total_rows"]  = $this->bikes_model->get_manufacturer_supplies_count($manufacturer_id);
        $config["per_page"]    = 9;
        $config["uri_segment"] = 4;
        
        $config['query_string_segment'] = 'page';
        
        $config['full_tag_open']  = '<ul>';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_link']      = 'البداية';
        $config['first_tag_open']  = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']      = 'الأخير &raquo;';
        $config['last_tag_open']  = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link']      = 'التالي &rarr;';
        $config['next_tag_open']  = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link']      = '&larr; السابق';
        $config['prev_tag_open']  = '<li class="prev page">';
        $config['prev_tag_close'] = '</a></li>';
        
        $config['cur_tag_open']  = '<li class="selected"><span class="skew25">';
        $config['cur_tag_close'] = '</span></li>';
        
        $config['num_tag_open']  = '<li><a class="skew25" href="#">';
        $config['num_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);
        $page                 = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['all_supplies'] = $this->bikes_model->get_manufacturer_supplies($config["per_page"], $page, $manufacturer_id);
        $data["pageNumber"]   = $this->pagination->create_links();
        
        $data['manufacturers']         = $this->manufacturers_model->get_manufacturers();
        $data['countries']             = $this->get_countries();
        $data['bikes_most_viewed']     = $this->bikes_model->bikes_most_viewed();
        $data['bikes_most_interested'] = $this->bikes_model->bikes_most_interested();
        $data['bikes_most_price']      = $this->bikes_model->bikes_most_price();
        $data['top_manufacturers']     = $this->bikes_model->get_top_manufacturers();
        //        $data['settings'] = $this->settings_model->get_settings();
        //        $data['categories_count'] = $this->news_model->categories_count();
        $this->load->view('front_end/supplies', $data);
    }
    
    public function supplies()
    {
        $search_criteria = array(
            'title' => $this->input->get('title'),
            'country_id' => $this->input->get('country_id'),
            'manufacturer_id' => $this->input->get('manufacturer_id'),
            'model_id' => $this->input->get('model_id'),
            'bike_status' => $this->input->get('bike_status'),
            'color' => $this->input->get('color'),
            'price1' => $this->input->get('price1'),
            'price2' => $this->input->get('price2'),
            'user_type' => $this->input->get('type'), //user type
            'production_date' => $this->input->get('production_date')
        );
        $query_string    = '';
        foreach ($search_criteria as $key => $value) {
            $query_string .= $key . '=' . $value . '&';
        }
        $query_string = rtrim($query_string, '&');
        
        $this->load->library("pagination");
        $config               = array();
        $config["base_url"]   = base_url() . "home/supplies/?" . $query_string;
        $config["total_rows"] = $this->bikes_model->get_supplies_count($search_criteria);
        $config["per_page"]   = 9;
        //        $config["uri_segment"] = 3;
        
        $config['query_string_segment'] = 'page';
        
        $config['full_tag_open']  = '<ul>';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_link']      = 'البداية';
        $config['first_tag_open']  = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']      = 'الأخير &raquo;';
        $config['last_tag_open']  = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link']      = 'التالي &rarr;';
        $config['next_tag_open']  = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link']      = '&larr; السابق';
        $config['prev_tag_open']  = '<li class="prev page">';
        $config['prev_tag_close'] = '</a></li>';
        
        $config['cur_tag_open']  = '<li class="selected"><span class="skew25">';
        $config['cur_tag_close'] = '</span></li>';
        
        $config['num_tag_open']  = '<li><a class="skew25" href="#">';
        $config['num_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);
        $page                 = $this->input->get('page', TRUE);
        $data['all_supplies'] = $this->bikes_model->get_supplies($config["per_page"], $page, $search_criteria);
        $data["pageNumber"]   = $this->pagination->create_links();
        
        $data['manufacturers']         = $this->manufacturers_model->get_manufacturers();
        $data['countries']             = $this->get_countries();
        $data['bikes_most_viewed']     = $this->bikes_model->bikes_most_viewed();
        $data['bikes_most_interested'] = $this->bikes_model->bikes_most_interested();
        $data['bikes_most_price']      = $this->bikes_model->bikes_most_price();
        $data['top_manufacturers']     = $this->bikes_model->get_top_manufacturers();
        //        $data['settings'] = $this->settings_model->get_settings();
        //        $data['categories_count'] = $this->news_model->categories_count();
        $this->load->view('front_end/supplies', $data);
    }
    
    public function orders()
    {
        $this->load->library("pagination");
        $config               = array();
        $config["base_url"]   = base_url() . "home/orders/";
        $config["total_rows"] = $this->bikes_model->get_orders_count();
        $config["per_page"]   = 9;
        //        $config["uri_segment"] = 3;
        
        $config['query_string_segment'] = 'page';
        
        $config['full_tag_open']  = '<ul>';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_link']      = 'البداية';
        $config['first_tag_open']  = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']      = 'الأخير &raquo;';
        $config['last_tag_open']  = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link']      = 'التالي &rarr;';
        $config['next_tag_open']  = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link']      = '&larr; السابق';
        $config['prev_tag_open']  = '<li class="prev page">';
        $config['prev_tag_close'] = '</a></li>';
        
        $config['cur_tag_open']  = '<li class="selected"><span class="skew25">';
        $config['cur_tag_close'] = '</span></li>';
        
        $config['num_tag_open']  = '<li><a class="skew25" href="#">';
        $config['num_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);
        $page               = $this->input->get('page', TRUE);
        $data['all_orders'] = $this->bikes_model->get_orders($config["per_page"], $page);
        $data["pageNumber"] = $this->pagination->create_links();
        
        $data['bikes_most_viewed']     = $this->bikes_model->bikes_most_viewed();
        $data['bikes_most_interested'] = $this->bikes_model->bikes_most_interested();
        $data['bikes_most_price']      = $this->bikes_model->bikes_most_price();
        $data['top_manufacturers']     = $this->bikes_model->get_top_manufacturers();
        //        $data['settings'] = $this->settings_model->get_settings();
        //        $data['categories_count'] = $this->news_model->categories_count();
        $this->load->view('front_end/orders', $data);
    }
    
    public function offers()
    {
        $search_criteria = array(
            'country_id' => $this->input->post('country_id'),
            'manufacturer_id' => $this->input->post('manufacturer_id'),
            'model_id' => $this->input->post('model_id'),
            'bike_status' => $this->input->post('bike_status')
        );
        $this->load->library("pagination");
        
        $config                = array();
        $config["base_url"]    = base_url() . "home/offers";
        $config["total_rows"]  = $this->bikes_model->get_offers_count($search_criteria);
        $config["per_page"]    = 9;
        $config["uri_segment"] = 3;
        
        $config['query_string_segment'] = 'page';
        
        $config['full_tag_open']  = '<ul>';
        $config['full_tag_close'] = '</ul>';
        
        $config['first_link']      = 'البداية';
        $config['first_tag_open']  = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']      = 'الأخير &raquo;';
        $config['last_tag_open']  = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link']      = 'التالي &rarr;';
        $config['next_tag_open']  = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link']      = '&larr; السابق';
        $config['prev_tag_open']  = '<li class="prev page">';
        $config['prev_tag_close'] = '</a></li>';
        
        $config['cur_tag_open']  = '<li class="selected"><span class="skew25">';
        $config['cur_tag_close'] = '</span></li>';
        
        $config['num_tag_open']  = '<li><a class="skew25" href="#">';
        $config['num_tag_close'] = '</a></li>';
        
        $this->pagination->initialize($config);
        $page               = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['all_offers'] = $this->bikes_model->get_offers($config["per_page"], $page, $search_criteria);
        $data["pageNumber"] = $this->pagination->create_links();
        
        $data['manufacturers']         = $this->manufacturers_model->get_manufacturers();
        $data['countries']             = $this->get_countries();
        $data['bikes_most_viewed']     = $this->bikes_model->bikes_most_viewed();
        $data['bikes_most_interested'] = $this->bikes_model->bikes_most_interested();
        $data['bikes_most_price']      = $this->bikes_model->bikes_most_price();
        $data['top_manufacturers']     = $this->bikes_model->get_top_manufacturers();
        //        $data['settings'] = $this->settings_model->get_settings();
        //        $data['categories_count'] = $this->news_model->categories_count();
        $this->load->view('front_end/offers', $data);
    }
    
    public function bike($bike_id = NULL)
    {
        if (!trim($bike_id) == NULL and is_numeric(trim($bike_id))) {
            $this->bikes_model->set_bike_view($bike_id);
            $bike_id      = $bike_id;
            $data['bike'] = $this->bikes_model->get_bike_details($bike_id);
            if (count($data['bike']) > 0 and $data['bike']->id != null) {
                $data['related_bikes'] = $this->bikes_model->get_related_bikes($bike_id);
            } else {
                $data['related_bikes'] = null;
            }
            $data['categories_count']  = $this->articles_model->categories_count();
            $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
            $this->load->view('front_end/bike_details', $data);
        }
    }
    
    public function order($order_id = NULL)
    {
        if (!trim($order_id) == NULL and is_numeric(trim($order_id))) {
            $this->bikes_model->set_order_view($order_id);
            $order_id                  = $order_id;
            $data['order']             = $this->bikes_model->get_order_details($order_id);
            $data['categories_count']  = $this->articles_model->categories_count();
            $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
            $this->load->view('front_end/order_details', $data);
        }
    }
    
    public function set_bike_interested()
    {
        $bike_id = $this->input->post('bike_id', TRUE);
        $this->bikes_model->set_bike_interested($bike_id);
        return true;
    }
    
    public function offer($offer_id = NULL)
    {
        if (!trim($offer_id) == NULL and is_numeric(trim($offer_id))) {
            $this->bikes_model->set_bike_view($offer_id);
            $data['offer'] = $this->bikes_model->get_offer_details($offer_id);
            if (count($data['offer']) > 0 and $data['offer']->id != null) {
                $bike_id                = $data['offer']->id;
                $data['related_offers'] = $this->bikes_model->get_related_offers($bike_id);
            } else {
                $data['related_offers'] = null;
            }
            $data['categories_count']  = $this->articles_model->categories_count();
            $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
            
            $this->load->view('front_end/offer_details', $data);
        }
    }
    
    private function get_countries()
    {
        return $this->locations_model->get_countries();
    }
    
    function get_cities_by_country()
    {
        $country_id     = $this->input->post('country_id', TRUE);
        $data['cities'] = $this->locations_model->get_cities_by_country($country_id);
        echo json_encode($data);
    }
    
    function get_models_by_manufacturer()
    {
        $manufacturer_id = $this->input->post('manufacturer_id', TRUE);
        $data['models']  = $this->manufacturers_model->get_models_by_manufacturer($manufacturer_id);
        echo json_encode($data);
    }
    
    function do_register()
    {
        $this->form_validation->set_rules('user_type', 'نوع الحساب', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('full_name', 'الإسم بالكامل', 'required|trim|min_length[6]|xss_clean');
        $this->form_validation->set_rules('username', 'إسم المستخدم', 'required|trim|min_length[6]|is_unique[users.username]|xss_clean');
        $this->form_validation->set_rules('password', 'كلمة المرور', 'required|trim|min_length[6]|matches[confirm_password]|xss_clean');
        $this->form_validation->set_rules('confirm_password', 'تأكيد كلمة المرور', 'required|trim|xss_clean');
        $this->form_validation->set_rules('email', 'البريد الإلكتروني', 'required|trim|valid_email|is_unique[users.email]|matches[confirm_email]|xss_clean');
        $this->form_validation->set_rules('confirm_email', 'البريد الإلكتروني', 'required|trim|xss_clean');
        $this->form_validation->set_rules('mobile', 'رقم الهاتف', 'required|trim|xss_clean');
        $this->form_validation->set_rules('country_id', 'الدولة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('city_id', 'المدينة', 'required|trim|numeric|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array(
                'status' => false,
                'msg' => $errorMsg
            ));
        } else {
            $agreement = $this->input->post('agreement');
            if (isset($agreement) and $agreement == TRUE) {
                $data['user_type']  = $this->input->post('user_type');
                $data['full_name']  = $this->input->post('full_name');
                $data['username']   = $this->input->post('username');
                $data['password']   = $this->auth->encrypt($this->input->post('password'));
                $data['email']      = $this->input->post('email');
                $data['mobile']     = $this->input->post('mobile');
                $data['city_id']    = $this->input->post('city_id');
                $data['country_id'] = $this->input->post('country_id');
                $data['added_date'] = date('Y-m-d H:i:s');
                $result             = $this->users_model->insert_user($data);
                if ($result) {
                    $this->send_validation_email($data);
                    echo json_encode(array(
                        'status' => true,
                        'msg' => 'تم التسجيل بنجاح ...قم بتفعيل الحساب من خلال بريدك الإلكتروني'
                    ));
                } else {
                    echo json_encode(array(
                        'status' => false,
                        'msg' => 'هناك خطأ في البيانات المدخلة'
                    ));
                }
            } else {
                echo json_encode(array(
                    'status' => false,
                    'msg' => 'يجب الموافقة على إتفاقية الموقع لإستكمال عملية التسجيل'
                ));
            }
        }
    }
    
    private function send_validation_email($data)
    {
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $website_email = $this->config->item('website_email');
        $this->email->from($website_email, $this->config->item('website_name'));
        $this->email->to($data['email']);
        $this->email->subject($this->config->item('website_name') . ': Activate Account');
        
        $message = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        </head><body>';
        $message .= '<p>Hello ' . $data['full_name'] . '</p>';
        $message .= '<p>To activate your account, please click <a href="' . base_url() . 'home/activate_account/' . $data['username'] . '/' . $data['password'] . '"><strong> here </strong></a></p>';
        $message .= '<p>Best regard,</p>';
        $message .= '</body></html>';
        $this->email->message($message);
        $this->email->send();
        //        echo $this->email->print_debugger();
    }
    
    function activate_account($username = NULL, $password = NULL)
    {
        $data['username'] = trim($username);
        $data['password'] = trim($password);
        $result           = $this->users_model->do_activate_account($data);
        if ($result == 'activated') {
            // your account was activated
            //            echo "لقد قمت بتفعيل حسابك سابقاً";
            redirect(base_url() . 'home', 'location');
        } else if ($result == TRUE) {
            // success activation
            //            echo "تم تفعيل حسابك...جاري تحويلك للصفحة الرئيسية";
            redirect(base_url() . 'home', 'location');
        } else {
            // error in the data, please contact with administrator
            //            echo "تم تفعيل حسابك...جاري تحويلك للصفحة الرئيسية";
            //            redirect(base_url() . 'home', 'location');
            echo "Error Linke";
        }
    }
    
    function login()
    {
        $this->form_validation->set_rules('username', 'Email', 'required|trim|min_length[6]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array(
                'status' => false,
                'msg' => $errorMsg
            ));
        } else {
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->auth->encrypt($this->input->post('password'));
            $info             = $this->users_model->do_login($data);
            if ($info) {
                if ($info->active == 0) {
                    $this->auth->fill_user_session($info);
                    echo json_encode(array(
                        'status' => false,
                        'msg' => "Sorry you have not activated your account yet, please check your email inbox"
                    ));
                }
                if ($info->blocked == 1) {
                    echo json_encode(array(
                        'status' => false,
                        'msg' => "Sorry this account is suspended, please contact the website admin"
                    ));
                }
                if ($info->blocked == 0 and $info->active == 1) {
                    $this->auth->fill_user_session($info); // info as object not array
                    echo json_encode(array(
                        'status' => true,
                        'msg' => 'Logged in successfully',
                        'redirect' => base_url('user/profile/')
                    ));
                }
            } else {
                echo json_encode(array(
                    'status' => false,
                    'msg' => 'Wrong username or password'
                ));
            }
        }
    }
    
    public function do_article_comment()
    {
        $article_id   = $this->input->post('article_id');
        $name         = $this->input->post('name');
        $email        = $this->input->post('email');
        $comment_text = $this->input->post('comment_text');
        
        $this->form_validation->set_rules('article_id', 'رقم المقال', 'required|trim|xss_clean');
        $this->form_validation->set_rules('name', 'الإسم', 'required|trim|max_length[60]|xss_clean');
        $this->form_validation->set_rules('email', 'البريد الإلكتروني', 'required|trim|valid_email|max_length[60]|xss_clean');
        $this->form_validation->set_rules('comment_text', 'التعليق', 'required|trim|max_length[300]|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array(
                'status' => false,
                'msg' => $errorMsg
            ));
        } else {
            $data  = array(
                'article_id' => $article_id,
                'name' => $name,
                'email' => $email,
                'comment' => $comment_text
            );
            $query = $this->articles_model->insert_article_comment($data);
            if ($query) {
                echo json_encode(array(
                    'status' => true,
                    'msg' => 'تم إرسال التعليق بإنتظار القبول من الإدارة'
                ));
            } else {
                echo json_encode(array(
                    'status' => true,
                    'msg' => 'هناك خطأ يجب التأكد من البيانات المدخلة'
                ));
            }
        }
    }
    
    public function do_feedback()
    {
        $name  = $this->input->post('full_name');
        $email = $this->input->post('email');
        $notes = $this->input->post('notes');
        
        $this->form_validation->set_rules('full_name', 'الإسم', 'required|trim|max_length[60]|xss_clean');
        $this->form_validation->set_rules('email', 'البريد الإلكتروني', 'required|trim|valid_email|max_length[60]|xss_clean');
        $this->form_validation->set_rules('notes', 'التعليق', 'required|trim|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array(
                'status' => false,
                'msg' => $errorMsg
            ));
        } else {
            $data  = array(
                'full_name' => $name,
                'email' => $email,
                'notes' => $notes
            );
            $query = $this->public_model->insert_feedback($data);
            if ($query) {
                echo json_encode(array(
                    'status' => true,
                    'msg' => 'تم الإرسال ... شكراً لتعاونك معنا'
                ));
            } else {
                echo json_encode(array(
                    'status' => true,
                    'msg' => 'هناك خطأ يجب التأكد من البيانات المدخلة'
                ));
            }
        }
    }
    
    /* Subscribe To Email List */
    
    public function subscribe()
    {
        $this->form_validation->set_rules('email', 'البريد الإلكتروني', 'required|trim|valid_email|max_length[100]');
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array(
                'status' => false,
                'msg' => ($errorMsg)
            ));
        } else {
            $data['email'] = $this->input->post('email');
            $result        = $this->public_model->subscribe($data);
            if ($result) {
                echo json_encode(array(
                    'status' => true,
                    'msg' => 'تم الإشتراك بنجاح'
                ));
            } else {
                echo json_encode(array(
                    'status' => false,
                    'msg' => 'هذا الإيميل موجود مسبقاً'
                ));
            }
        }
    }
    
}

/* End of file home.php */