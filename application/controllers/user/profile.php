<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    private $_user_id = null;

    function __construct() {
        parent::__construct();
        $this->load->model('locations_model');
        $this->load->model('users_model');
        $this->load->model('manufacturers_model');
        $this->load->model('bikes_model');
        $this->load->model('products_model');
        $this->load->model('currencies_model');
        $this->load->model('categories_model');
        $this->load->model('centers_model');
        $this->load->model('engines_model');
        $this->load->library('image_lib');

        $this->auth->check_accessibility('user');
        $this->_user_id = $this->session->userdata('user_id');
        $this->_added_notification = 'تم إضافة إعلان جديد على موقع متسيكلات الرجاء الموافقة علية في أسرع وقت';
        define("USER_TYPE", $this->session->userdata('user_type'));
    }

    public function index() {
//        $data['counters'] = $this->bikes_model->get_statistics($this->_user_id);
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/statistics', $data);
    }

    function get_bikes_views_interested() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->bikes_model->get_bikes_views_interested_count($this->_user_id, $data);
        $bikes = $this->bikes_model->get_bikes_views_interested($this->_user_id, $data);

        $row = array();
        foreach ($bikes as $bike) {
            $record = array();
            $options = '';
            $record[] = '<a target="_blank" href="' . base_url('home/bike/' . $bike->id) . '">' . character_limiter(strip_tags($bike->title), 31) . '</a>';
            $record[] = $bike->views;
            $record[] = $bike->interested;
            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function get_products_views_interested() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->products_model->get_products_views_interested_count($this->_user_id, $data);
        $bikes = $this->products_model->get_products_views_interested($this->_user_id, $data);

        $row = array();
        foreach ($bikes as $bike) {
            $record = array();
            $options = '';
            $record[] = '<a target="_blank" href="' . base_url('home/product/' . $bike->id) . '">' . character_limiter(strip_tags($bike->title), 31) . '</a>';
            $record[] = $bike->views;
            $record[] = $bike->interested;
            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function get_bikes_statistics() {
        $data['manufacturers'] = $this->bikes_model->get_bikes_statistics($this->_user_id);
        echo json_encode($data);
    }

    /**
     * loginout
     * 
     * function call logout function to destroy the user session
     * 
     * @access public
     * @return void
     */
    function logout() {
        $this->auth->logout();
    }

    public function purchase_order() {
        $data['manufacturers'] = $this->manufacturers_model->get_manufacturers();
        $data['currencies'] = $this->currencies_model->get_currencies_by_user_id($this->_user_id);
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/purchase_order', $data);
    }

    function do_purchase_order() {
        $this->form_validation->set_rules('title', 'عنوان الإعلان', 'required|trim|xss_clean');
        $this->form_validation->set_rules('description', 'تفاصيل الطلب', 'required|trim|xss_clean');
        $this->form_validation->set_rules('manufacturer_id', 'الشركة المصنعة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('model_id', 'الموديل', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('status', 'الحالة', 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('production_date', 'تاريخ الصنع', 'required|trim|xss_clean');
        $this->form_validation->set_rules('price', 'السعر', 'required|trim|xss_clean');
        $this->form_validation->set_rules('currency_id', 'العملة', 'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $data['title'] = $this->input->post('title');
            $data['manufacturer_id'] = $this->input->post('manufacturer_id');
            $data['model_id'] = $this->input->post('model_id');
            $data['status'] = $this->input->post('status');
            $data['production_date'] = $this->input->post('production_date');
            $data['price'] = $this->input->post('price');
            $data['description'] = $this->input->post('description');
            $data['currency_id'] = $this->input->post('currency_id');
            $data['user_id'] = $this->_user_id;
            $data['added_date'] = date('Y-m-d H:i:s');

            $result = $this->bikes_model->do_purchase_order($data);
            if ($result) {
//                $this->send_email_notification_for_admin($this->_added_notification,$data);
                echo json_encode(array('status' => true, 'msg' => 'تم إضافة الطلب بنجاح ... بإنتظار الموافقة من الإدارة بنشر الإعلان'));
            } else {
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

    public function add_bike() {
        $data['cities'] = $this->locations_model->get_country_cities_by_user_id($this->_user_id);
        $data['manufacturers'] = $this->manufacturers_model->get_manufacturers();
        $data['currencies'] = $this->currencies_model->get_currencies_by_user_id($this->_user_id);
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $data['engines'] = $this->engines_model->get_engines();
        $this->load->view('back_end/user/add_bike', $data);
    }

    function do_add_bike() {
        $this->form_validation->set_rules('title', 'عنوان الإعلان', 'required|trim|xss_clean');
        $this->form_validation->set_rules('description', 'تفاصيل الإعلان', 'required|trim|xss_clean');
        $this->form_validation->set_rules('manufacturer_id', 'الشركة المصنعة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('model_id', 'الموديل', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('bike_status', 'الحالة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('color', 'اللون', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('production_date', 'تاريخ الصنع', 'required|trim|xss_clean');
        $this->form_validation->set_rules('mileage', 'عدد الكيلومترات', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('price', 'السعر المطلوب', 'required|numeric|trim|xss_clean');
        $this->form_validation->set_rules('currency_id', 'العملة', 'required|trim|xss_clean');
        $this->form_validation->set_rules('engine', 'سعة المحرك', 'required|trim|xss_clean');
        $this->form_validation->set_rules('city_id', 'المدينة', 'required|trim|numeric|xss_clean');
        $have_pic = TRUE;
        $bike_picture_1 = $_FILES['bike_picture_1']['name'];
        if (empty($bike_picture_1)) {
            $have_pic = false;
            $this->form_validation->set_rules('bike_picture_1', 'يجب عدم ترك الصورة الأولى فارغة', 'required|trim|xss_clean');
        }

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            if ($have_pic) {
                $data = array();
                foreach ($_FILES as $key => $value) {
                    if (!empty($value['tmp_name']) && $value['size'] > 0) {
                        $file_element_name = $key;
                        $result = $this->uploadImage($file_element_name, 'bikes');
                        if ($result['status'] == FALSE) {
                            echo json_encode($result);
                            exit();
                        } else {
                            $data[$key] = $result['msg'];
                        }
                        $this->generateThumb(640, 426, 'bikes/small');
                        $this->generateThumb(620, 860, 'bikes/medium');
                        $this->generateThumb(156, 100, 'bikes/thumbs');
                        @unlink($_FILES[$file_element_name]);
                    }
                }
            }
            $data['title'] = $this->input->post('title');
            $data['manufacturer_id'] = $this->input->post('manufacturer_id');
            $data['model_id'] = $this->input->post('model_id');
            $data['bike_status'] = $this->input->post('bike_status');
            $data['color'] = $this->input->post('color');
            $data['production_date'] = $this->input->post('production_date');
            $data['mileage'] = $this->input->post('mileage');
            $data['price'] = $this->input->post('price');
            $data['currency_id'] = $this->input->post('currency_id');
            $data['engine'] = $this->input->post('engine');
            $data['city_id'] = $this->input->post('city_id');
            $data['description'] = $this->input->post('description');
            $data['user_id'] = $this->_user_id;
            $data['added_date'] = date('Y-m-d H:i:s');

            $result = $this->bikes_model->insert_bike($data);
            if ($result) {
                $this->send_email_notification_for_admin($this->_added_notification, $data);
                echo json_encode(array('status' => true, 'msg' => 'تم إضافة الإعلان بنجاح ... بإنتظار الموافقة من الإدارة بنشر الإعلان'));
            } else {
                if (!empty($_FILES)) {
                    foreach ($_FILES as $key => $value) {
                        $this->auth->remove_file('./uploads/bikes/', $value);
                        $this->auth->remove_file('./uploads/bikes/small/', $value);
                        $this->auth->remove_file('./uploads/bikes/medium/', $value);
                        $this->auth->remove_file('./uploads/bikes/thumbs/', $value);
                    }
                }
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

    private function send_email_notification_for_admin($notification_title, $data) {
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $website_email = $this->config->item('website_email');
        $admin_email = $this->config->item('admin_email');
        $this->email->from($website_email, $this->config->item('website_name'));
        $this->email->to($admin_email);
        $this->email->subject($this->config->item('website_name') . ': Activate Account');

        $message = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        </head><body>';
        $message .= '<p>' . $notification_title . '</p><br/>';
        $message .= '<p>عنوان الإعلان: ' . $data['title'] . '</p><br/>';
        $message .= '<p>تاريخ الإضافة: ' . date('Y-m-d H:i') . '</p><br/>';
        $message .= '</body></html>';
        $this->email->message($message);
        $this->email->send();
//        echo $this->email->print_debugger();
    }

    public function add_spare_parts() {
        $data['manufacturers'] = $this->manufacturers_model->get_manufacturers();
        $data['cities'] = $this->locations_model->get_country_cities_by_user_id($this->_user_id);
        $data['currencies'] = $this->currencies_model->get_currencies_by_user_id($this->_user_id);
        $data['products_types'] = $this->products_model->get_products_types(3); //spare_products
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/add_spare_parts', $data);
    }

    function do_add_spare_parts() {
        $this->form_validation->set_rules('title', 'عنوان الإعلان', 'required|trim|xss_clean');
        $this->form_validation->set_rules('manufacturer_id', 'الشركة المصنعة', 'required|numeric|trim|xss_clean');
        $this->form_validation->set_rules('model_id', 'المودل', 'required|numeric|trim|xss_clean');
        $this->form_validation->set_rules('product_status', 'الحالة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('price', 'السعر المطلوب', 'required|numeric|trim|xss_clean');
        $this->form_validation->set_rules('currency_id', 'العملة', 'required|trim|xss_clean');
        $this->form_validation->set_rules('city_id', 'المدينة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('type_id', 'نوع القطعة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('description', 'تفاصيل الإعلان', 'required|trim|xss_clean');
        $have_pic = TRUE;
        $product_picture_1 = $_FILES['product_picture_1']['name'];
        if (empty($product_picture_1)) {
            $have_pic = false;
            $this->form_validation->set_rules('product_picture_1', 'يجب عدم ترك الصورة الأولى فارغة', 'required|trim|xss_clean');
        }

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            if ($have_pic) {
                $data = array();
                foreach ($_FILES as $key => $value) {
                    if (!empty($value['tmp_name']) && $value['size'] > 0) {
                        $file_element_name = $key;
                        $result = $this->uploadImage($file_element_name, 'products');
                        if ($result['status'] == FALSE) {
                            echo json_encode($result);
                            exit();
                        } else {
                            $data[$key] = $result['msg'];
                        }
                        $this->generateThumb(640, 426, 'products/small');
                        $this->generateThumb(620, 860, 'products/medium');
                        $this->generateThumb(156, 100, 'products/thumbs');
                        @unlink($_FILES[$file_element_name]);
                    }
                }
            }
            $data['title'] = $this->input->post('title');
            $data['manufacturer_id'] = $this->input->post('manufacturer_id');
            $data['model_id'] = $this->input->post('model_id');
            $data['product_status'] = $this->input->post('product_status');
            $data['price'] = $this->input->post('price');
            $data['currency_id'] = $this->input->post('currency_id');
            $data['city_id'] = $this->input->post('city_id');
            $data['description'] = $this->input->post('description');
            $data['user_id'] = $this->_user_id;
            $data['type_id'] = $this->input->post('type_id');
            $data['added_date'] = date('Y-m-d H:i:s');

            $result = $this->products_model->insert_product($data);
            if ($result) {
                $this->send_email_notification_for_admin($this->_added_notification, $data);
                echo json_encode(array('status' => true, 'msg' => 'تم إضافة الإعلان بنجاح ... بإنتظار الموافقة من الإدارة بنشر الإعلان'));
            } else {
                if (!empty($_FILES)) {
                    foreach ($_FILES as $key => $value) {
                        $this->auth->remove_file('./uploads/products/', $value);
                        $this->auth->remove_file('./uploads/products/small/', $value);
                        $this->auth->remove_file('./uploads/products/medium/', $value);
                        $this->auth->remove_file('./uploads/products/thumbs/', $value);
                    }
                }
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

    public function add_safty_equipment() {
        $data['cities'] = $this->locations_model->get_country_cities_by_user_id($this->_user_id);
        $data['currencies'] = $this->currencies_model->get_currencies_by_user_id($this->_user_id);
        $data['products_types'] = $this->products_model->get_products_types(1); //safty equipment
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/add_safety_equipment', $data);
    }

    public function add_accessory() {
        $data['cities'] = $this->locations_model->get_country_cities_by_user_id($this->_user_id);
        $data['currencies'] = $this->currencies_model->get_currencies_by_user_id($this->_user_id);
        $data['products_types'] = $this->products_model->get_products_types(2); //accessories
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/add_accessory', $data);
    }

    public function add_tires() {
        $data['cities'] = $this->locations_model->get_country_cities_by_user_id($this->_user_id);
        $data['currencies'] = $this->currencies_model->get_currencies_by_user_id($this->_user_id);
        $data['products_types'] = $this->products_model->get_products_types(4); //tires
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/add_tires', $data);
    }

    function do_add_product() {
        $this->form_validation->set_rules('title', 'عنوان الإعلان', 'required|trim|xss_clean');
        $this->form_validation->set_rules('product_status', 'الحالة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('price', 'السعر المطلوب', 'required|numeric|trim|xss_clean');
        $this->form_validation->set_rules('currency_id', 'العملة', 'required|trim|xss_clean');
        $this->form_validation->set_rules('city_id', 'المدينة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('type_id', 'نوع القطعة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('description', 'تفاصيل الإعلان', 'required|trim|xss_clean');
        if (isset($_POST['size'])) {
            $this->form_validation->set_rules('size', 'مقاس الإطار', 'required|trim|numeric|xss_clean');
        }
        $have_pic = TRUE;
        $product_picture_1 = $_FILES['product_picture_1']['name'];
        if (empty($product_picture_1)) {
            $have_pic = false;
            $this->form_validation->set_rules('product_picture_1', 'يجب عدم ترك الصورة الأولى فارغة', 'required|trim|xss_clean');
        }

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            if ($have_pic) {
                $data = array();
                foreach ($_FILES as $key => $value) {
                    if (!empty($value['tmp_name']) && $value['size'] > 0) {
                        $file_element_name = $key;
                        $result = $this->uploadImage($file_element_name, 'products');
                        if ($result['status'] == FALSE) {
                            echo json_encode($result);
                            exit();
                        } else {
                            $data[$key] = $result['msg'];
                        }
                        $this->generateThumb(640, 426, 'products/small');
                        $this->generateThumb(620, 860, 'products/medium');
                        $this->generateThumb(156, 100, 'products/thumbs');
                        @unlink($_FILES[$file_element_name]);
                    }
                }
            }

            $data['category_id'] = $this->input->post('category_id');
            $data['title'] = $this->input->post('title');
            $data['product_status'] = $this->input->post('product_status');
            $data['price'] = $this->input->post('price');
            $data['currency_id'] = $this->input->post('currency_id');
            $data['city_id'] = $this->input->post('city_id');
            $data['description'] = $this->input->post('description');
            $data['user_id'] = $this->_user_id;
            $data['type_id'] = $this->input->post('type_id');
            $data['added_date'] = date('Y-m-d H:i:s');
            if (isset($_POST['size'])) {
                $data['size'] = $this->input->post('size');
            }

            $result = $this->products_model->insert_product($data);
            if ($result) {
                $this->send_email_notification_for_admin($this->_added_notification, $data);
                echo json_encode(array('status' => true, 'msg' => 'تم إضافة الإعلان بنجاح ... بإنتظار الموافقة من الإدارة بنشر الإعلان'));
            } else {
                if (!empty($_FILES)) {
                    foreach ($_FILES as $key => $value) {
                        $this->auth->remove_file('./uploads/products/', $value);
                        $this->auth->remove_file('./uploads/products/small/', $value);
                        $this->auth->remove_file('./uploads/products/medium/', $value);
                        $this->auth->remove_file('./uploads/products/thumbs/', $value);
                    }
                }
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

    function do_add_offer() {
        $this->form_validation->set_rules('offer_price', 'السعر الجديد', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('expire_date', 'تاريخ الإنتهاء', 'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $bike_id = $this->input->post('bike_id');
            $offer_price = $this->input->post('offer_price');
            $bike = $this->bikes_model->get_bike_price($bike_id, $this->_user_id);
            $published_days = $this->get_days_beteen_two_dates($bike->added_date);
            if ($published_days >= 15 and $bike->views >= 15 and $this->input->post('offer_price') < $bike->price) {
                $data['bike_id'] = $bike_id;
                $data['offer_price'] = $offer_price;
                $data['expire_date'] = $this->input->post('expire_date');

                $result = $this->bikes_model->add_offer($data);
                if ($result) {
                    echo json_encode(array('status' => true, 'msg' => 'تم إضافة الإعلان بنجاح'));
                } else {
                    echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
                }
            } else if ($published_days < 15) {
                echo json_encode(array('status' => false, 'msg' => 'عذراً لابد من مرور 15 يوماً على وضع الإعلان في الموقع'));
            } else if ($bike->views < 15) {
                echo json_encode(array('status' => false, 'msg' => 'عذراً لتتمكن من وضع عرض على هذا الإعلان لابد من أن يشاهدة على الأقل 15 زائر'));
            } else if ($this->input->post('offer_price') >= $bike->price) {
                echo json_encode(array('status' => false, 'msg' => 'عذراً يجب أن يكون سعر العرض أقل من سعر الإعلان'));
            }
        }
    }

    function get_days_beteen_two_dates($added_date) {
        $now = strtotime(date('Y-m-d')); // or your date as well
        $expiration_time = strtotime(date("Y-m-d", strtotime($added_date)));
        $datediff = $now - $expiration_time;
        return ceil($datediff / (60 * 60 * 24));
    }

    function my_bikes() {
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/my_bikes', $data);
    }

    function get_my_bikes() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->bikes_model->get_my_bikes_count($this->_user_id, $data);
        $bikes = $this->bikes_model->get_my_bikes($this->_user_id, $data);

        $row = array();
        foreach ($bikes as $bike) {
            $record = array();
            $options = '';
            $record[] = '<img width="120" src="' . base_url('uploads/bikes/thumbs/' . $bike->bike_picture_1) . '" alt="' . $bike->title . '" />';
            $record[] = '<a target="_blank" href="' . base_url('home/bike/' . $bike->id) . '">' . character_limiter(strip_tags($bike->title), 31) . '</a>';
            $record[] = $bike->added_date;
            $record[] = $bike->views;
            $record[] = $bike->interested;
            $record[] = ($bike->active == 1) ? '<span class="label label-success">متاح</span>' : '<span title="بإنتظار الموافقة من قبل الإدارة" class="label label-warning">بإنتظار الموافقة</span>';
            $options .= '<a href="edit_bike/' . $bike->id . '" title="تعديل الإعلان" class="btn btn-primary"><i class="fa fa-edit"></i></a> ';
            $options .= '<a href="#remove_bike" title="حذف الإعلان" onclick="setTarget(' . $bike->id . ');" class="btn btn-bricky" data-toggle="modal"><i class="fa fa-times fa fa-white"></i></a> ';
            if ($bike->offer_id == NULL) {
                $options .= '<a href="#add_offer" title="إضافة عرض على الإعلان" onclick="setTarget(' . $bike->id . ');" class="btn btn-blue" data-toggle="modal"><i class="fa fa-bell-o"></i></a>';
            }

            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function my_products() {
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/my_products', $data);
    }

    function my_spare_parts() {
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/my_spare_parts', $data);
    }

    function my_accessories() {
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/my_accessories', $data);
    }

    function my_safty_equipments() {
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/my_safty_equipments', $data);
    }

    function my_tires() {
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/my_tires', $data);
    }

    function get_my_products() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->products_model->get_my_products_count($this->_user_id, $data);
        $bikes = $this->products_model->get_my_products($this->_user_id, $data);

        $row = array();
        foreach ($bikes as $product) {
            $record = array();
            $options = '';
            $record[] = '<img width="120" src="' . base_url('uploads/products/thumbs/' . $product->product_picture_1) . '" alt="' . $product->name . '" />';
            $record[] = '<a target="_blank" href="' . base_url('home/product/' . $product->id) . '">' . $product->name . '</a>';
            $record[] = $product->manufacturer_name;
            $record[] = $product->city_name;
            $record[] = $product->price . ' ' . $product->currency_name;
            $record[] = $product->added_date;
            $record[] = ($product->active == 1) ? '<span class="label label-success">متاح</span>' : '<span title="بإنتظار الموافقة من قبل الإدارة" class="label label-warning">بإنتظار الموافقة</span>';
            $options .= '<a href="edit_product/' . $product->id . '" title="تعديل الإعلان" class="btn btn-primary"><i class="fa fa-edit"></i></a> ';
            $options .= '<a href="#remove_spare_parts" title="حذف الإعلان" onclick="setTarget(' . $product->id . ');" class="btn btn-bricky" data-toggle="modal"><i class="fa fa-times fa fa-white"></i></a> ';
            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function get_my_spare_parts() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->products_model->get_my_products_count(3, $this->_user_id, $data);
        $bikes = $this->products_model->get_my_products(3, $this->_user_id, $data);

        $row = array();
        foreach ($bikes as $product) {
            $record = array();
            $options = '';
            $record[] = '<img width="120" src="' . base_url('uploads/products/thumbs/' . $product->product_picture_1) . '" alt="' . $product->title . '" />';
            $record[] = '<a target="_blank" href="' . base_url('home/product/' . $product->id) . '">' . $product->title . '</a>';
            $record[] = $product->added_date;
            $record[] = $product->views;
            $record[] = $product->interested;
            $record[] = ($product->active == 1) ? '<span class="label label-success">متاح</span>' : '<span title="بإنتظار الموافقة من قبل الإدارة" class="label label-warning">بإنتظار الموافقة</span>';
            $options .= '<a href="edit_spare_parts/' . $product->id . '" title="تعديل الإعلان" class="btn btn-primary"><i class="fa fa-edit"></i></a> ';
            $options .= '<a href="#remove_product" title="حذف الإعلان" onclick="setTarget(' . $product->id . ');" class="btn btn-bricky" data-toggle="modal"><i class="fa fa-times fa fa-white"></i></a> ';
            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function get_my_accessories() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->products_model->get_my_products_count(2, $this->_user_id, $data);
        $bikes = $this->products_model->get_my_products(2, $this->_user_id, $data);

        $row = array();
        foreach ($bikes as $product) {
            $record = array();
            $options = '';
            $record[] = '<img width="120" src="' . base_url('uploads/products/thumbs/' . $product->product_picture_1) . '" alt="' . $product->title . '" />';
            $record[] = '<a target="_blank" href="' . base_url('home/product/' . $product->id) . '">' . $product->title . '</a>';
            $record[] = $product->added_date;
            $record[] = $product->views;
            $record[] = $product->interested;
            $record[] = ($product->active == 1) ? '<span class="label label-success">متاح</span>' : '<span title="بإنتظار الموافقة من قبل الإدارة" class="label label-warning">بإنتظار الموافقة</span>';
            $options .= '<a href="edit_accessory/' . $product->id . '" title="تعديل الإعلان" class="btn btn-primary"><i class="fa fa-edit"></i></a> ';
            $options .= '<a href="#remove_product" title="حذف الإعلان" onclick="setTarget(' . $product->id . ');" class="btn btn-bricky" data-toggle="modal"><i class="fa fa-times fa fa-white"></i></a> ';
            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function get_my_tires() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->products_model->get_my_products_count(4, $this->_user_id, $data);
        $bikes = $this->products_model->get_my_products(4, $this->_user_id, $data);

        $row = array();
        foreach ($bikes as $product) {
            $record = array();
            $options = '';
            $record[] = '<img width="120" src="' . base_url('uploads/products/thumbs/' . $product->product_picture_1) . '" alt="' . $product->title . '" />';
            $record[] = '<a target="_blank" href="' . base_url('home/product/' . $product->id) . '">' . $product->title . '</a>';
            $record[] = $product->added_date;
            $record[] = $product->views;
            $record[] = $product->interested;
            $record[] = ($product->active == 1) ? '<span class="label label-success">متاح</span>' : '<span title="بإنتظار الموافقة من قبل الإدارة" class="label label-warning">بإنتظار الموافقة</span>';
            $options .= '<a href="edit_tires/' . $product->id . '" title="تعديل الإعلان" class="btn btn-primary"><i class="fa fa-edit"></i></a> ';
            $options .= '<a href="#remove_product" title="حذف الإعلان" onclick="setTarget(' . $product->id . ');" class="btn btn-bricky" data-toggle="modal"><i class="fa fa-times fa fa-white"></i></a> ';
            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function get_my_safty_equipments() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->products_model->get_my_products_count(1, $this->_user_id, $data);
        $bikes = $this->products_model->get_my_products(1, $this->_user_id, $data);

        $row = array();
        foreach ($bikes as $product) {
            $record = array();
            $options = '';
            $record[] = '<img width="120" src="' . base_url('uploads/products/thumbs/' . $product->product_picture_1) . '" alt="' . $product->title . '" />';
            $record[] = '<a target="_blank" href="' . base_url('home/product/' . $product->id) . '">' . $product->title . '</a>';
            $record[] = $product->added_date;
            $record[] = $product->views;
            $record[] = $product->interested;
            $record[] = ($product->active == 1) ? '<span class="label label-success">متاح</span>' : '<span title="بإنتظار الموافقة من قبل الإدارة" class="label label-warning">بإنتظار الموافقة</span>';
            $options .= '<a href="edit_safty_equipments/' . $product->id . '" title="تعديل الإعلان" class="btn btn-primary"><i class="fa fa-edit"></i></a> ';
            $options .= '<a href="#remove_product" title="حذف الإعلان" onclick="setTarget(' . $product->id . ');" class="btn btn-bricky" data-toggle="modal"><i class="fa fa-times fa fa-white"></i></a> ';
            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function remove_product() {
        $product_id = $this->input->post('product_id', true);
        $result = $this->products_model->remove_product($product_id, $this->_user_id);
        if ($result) {
            echo json_encode(array('status' => true, 'msg' => 'تم حذف الملحق بنجاح'));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
        }
    }

    function edit_safty_equipments($product_id = NULL) {
        $data['product'] = $this->products_model->get_product_info($product_id, $this->_user_id);
        $data['cities'] = $this->locations_model->get_cities($this->_user_id);
        $data['currencies'] = $this->currencies_model->get_currencies_by_user_id($this->_user_id);
        $data['products_types'] = $this->products_model->get_products_types(1); //safty
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/edit_safty_equipments', $data);
    }

    function edit_accessory($product_id = NULL) {
        $data['product'] = $this->products_model->get_product_info($product_id, $this->_user_id);
        $data['cities'] = $this->locations_model->get_cities($this->_user_id);
        $data['currencies'] = $this->currencies_model->get_currencies_by_user_id($this->_user_id);
        $data['products_types'] = $this->products_model->get_products_types(2); //accessory
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/edit_accessory', $data);
    }

    function edit_tires($product_id = NULL) {
        $data['product'] = $this->products_model->get_product_info($product_id, $this->_user_id);
        $data['cities'] = $this->locations_model->get_cities($this->_user_id);
        $data['currencies'] = $this->currencies_model->get_currencies_by_user_id($this->_user_id);
        $data['products_types'] = $this->products_model->get_products_types(4); //accessory
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/edit_tires', $data);
    }

    function do_edit_product() {
        $this->form_validation->set_rules('title', 'عنوان الإعلان', 'required|trim|xss_clean');
        $this->form_validation->set_rules('product_status', 'الحالة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('price', 'السعر المطلوب', 'required|numeric|trim|xss_clean');
        $this->form_validation->set_rules('currency_id', 'العملة', 'required|trim|xss_clean');
        $this->form_validation->set_rules('city_id', 'المدينة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('type_id', 'نوع القطعة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('description', 'تفاصيل الإعلان', 'required|trim|xss_clean');
        if (isset($_POST['size'])) {
            $this->form_validation->set_rules('size', 'مقاس الإطار', 'required|trim|numeric|xss_clean');
        }
        $have_pic = TRUE;
        if (empty($_FILES)) {
            $have_pic = false;
            $this->form_validation->set_rules('product_picture_1', 'يجب إختيار صورة واحدة على الأقل', 'required|trim|xss_clean');
        }

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            if ($have_pic) {
                $data = array();
                foreach ($_FILES as $key => $value) {
                    if (!empty($value['tmp_name']) && $value['size'] > 0) {
                        $file_element_name = $key;
                        $result = $this->uploadImage($file_element_name, 'products');
                        if ($result['status'] == FALSE) {
                            echo json_encode($result);
                            exit();
                        } else {
                            $data[$key] = $result['msg']; //don't forget to remove the old picutures
                        }
                        $this->generateThumb(640, 426, 'products/small');
                        $this->generateThumb(620, 860, 'products/medium');
                        $this->generateThumb(156, 100, 'products/thumbs');
                        @unlink($_FILES[$file_element_name]);
                    }
                }
            }
            $data['title'] = $this->input->post('title');
            $data['product_status'] = $this->input->post('product_status');
            $data['price'] = $this->input->post('price');
            $data['currency_id'] = $this->input->post('currency_id');
            $data['city_id'] = $this->input->post('city_id');
            $data['description'] = $this->input->post('description');
            $data['user_id'] = $this->_user_id;
            $data['type_id'] = $this->input->post('type_id');
            $data['added_date'] = date('Y-m-d H:i:s');
            $product_id = $this->input->post('id');
            if (isset($_POST['size'])) {
                $data['size'] = $this->input->post('size');
            }

            $result = $this->products_model->update_product($this->_user_id, $product_id, $data);
            if ($result) {
                echo json_encode(array('status' => true, 'msg' => 'تم التعديل بنجاح'));
            } else {
                if (!empty($_FILES)) {
                    foreach ($_FILES as $key => $value) {
                        $this->auth->remove_file('./uploads/products/', $value);
                        $this->auth->remove_file('./uploads/products/small/', $value);
                        $this->auth->remove_file('./uploads/products/medium/', $value);
                        $this->auth->remove_file('./uploads/products/thumbs/', $value);
                    }
                }
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

    function edit_spare_parts($product_id = NULL) {
        $data['product'] = $this->products_model->get_product_info($product_id, $this->_user_id);
        $data['manufacturers'] = $this->manufacturers_model->get_manufacturers();
        $data['models'] = $this->manufacturers_model->get_models_by_manufacturer($data['product']->manufacturer_id);
        $data['cities'] = $this->locations_model->get_cities($this->_user_id);
        $data['currencies'] = $this->currencies_model->get_currencies_by_user_id($this->_user_id);
        $data['products_types'] = $this->products_model->get_products_types(3); //spare_products
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/edit_spare_parts', $data);
    }

    function do_edit_spare_part() {
        $this->form_validation->set_rules('title', 'عنوان الإعلان', 'required|trim|xss_clean');
        $this->form_validation->set_rules('manufacturer_id', 'الشركة المصنعة', 'required|numeric|trim|xss_clean');
        $this->form_validation->set_rules('model_id', 'المودل', 'required|numeric|trim|xss_clean');
        $this->form_validation->set_rules('product_status', 'الحالة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('price', 'السعر المطلوب', 'required|numeric|trim|xss_clean');
        $this->form_validation->set_rules('currency_id', 'العملة', 'required|trim|xss_clean');
        $this->form_validation->set_rules('city_id', 'المدينة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('type_id', 'نوع القطعة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('description', 'تفاصيل الإعلان', 'required|trim|xss_clean');
        $have_pic = TRUE;
        if (empty($_FILES)) {
            $have_pic = false;
            $this->form_validation->set_rules('product_picture_1', 'يجب إختيار صورة واحدة على الأقل', 'required|trim|xss_clean');
        }

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            if ($have_pic) {
                $data = array();
                foreach ($_FILES as $key => $value) {
                    if (!empty($value['tmp_name']) && $value['size'] > 0) {
                        $file_element_name = $key;
                        $result = $this->uploadImage($file_element_name, 'products');
                        if ($result['status'] == FALSE) {
                            echo json_encode($result);
                            exit();
                        } else {
                            $data[$key] = $result['msg']; //don't forget to remove the old picutures
                        }
                        $this->generateThumb(640, 426, 'products/small');
                        $this->generateThumb(620, 860, 'products/medium');
                        $this->generateThumb(156, 100, 'products/thumbs');
                        @unlink($_FILES[$file_element_name]);
                    }
                }
            }
            $data['title'] = $this->input->post('title');
            $data['manufacturer_id'] = $this->input->post('manufacturer_id');
            $data['model_id'] = $this->input->post('model_id');
            $data['product_status'] = $this->input->post('product_status');
            $data['price'] = $this->input->post('price');
            $data['currency_id'] = $this->input->post('currency_id');
            $data['city_id'] = $this->input->post('city_id');
            $data['description'] = $this->input->post('description');
            $data['user_id'] = $this->_user_id;
            $data['type_id'] = $this->input->post('type_id');
            $data['added_date'] = date('Y-m-d H:i:s');
            $product_id = $this->input->post('id');

            $result = $this->products_model->update_product($this->_user_id, $product_id, $data);
            if ($result) {
                echo json_encode(array('status' => true, 'msg' => 'تم تعديل الملحق بنجاح'));
            } else {
                if (!empty($_FILES)) {
                    foreach ($_FILES as $key => $value) {
                        $this->auth->remove_file('./uploads/products/', $value);
                        $this->auth->remove_file('./uploads/products/small/', $value);
                        $this->auth->remove_file('./uploads/products/medium/', $value);
                        $this->auth->remove_file('./uploads/products/thumbs/', $value);
                    }
                }
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

    function my_offers() {
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/my_offers', $data);
    }

    function get_my_offers() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->bikes_model->get_my_offers_count($this->_user_id, $data);
        $offers = $this->bikes_model->get_my_offers($this->_user_id, $data);

        $row = array();
        foreach ($offers as $offer) {
            $record = array();
            $options = '';
            $record[] = '<a target="_blank" href="' . base_url('home/offer/' . $offer->id) . '">' . $offer->title . '</a>';
            $record[] = $offer->added_date;
            $record[] = ($offer->expire_date >= date('Y-m-d')) ? '<span class="label label-success" style="opacity: 1;">' . $offer->expire_date . '</span>' : '<span class="label label-danger" style="opacity: 1;">' . $offer->expire_date . '</span>';
            $record[] = $offer->views;
            $record[] = $offer->interested;
            $record[] = ($offer->active == 1) ? '<span class="label label-success">متاح</span>' : '<span title="بإنتظار الموافقة من قبل الإدارة" class="label label-warning">بإنتظار الموافقة</span>';
            $options .= '<a href="#remove_offer" onclick="setTarget(' . $offer->offer_id . ');" class="btn btn-bricky" data-toggle="modal"><i class="fa fa-times fa fa-white"></i></a> ';
            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function my_purchase_orders() {
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/my_purchase_orders', $data);
    }

    function get_my_purchase_orders() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->bikes_model->get_my_purchase_orders_count($this->_user_id, $data);
        $orders = $this->bikes_model->get_my_purchase_orders($this->_user_id, $data);

        $row = array();
        foreach ($orders as $order) {
            $record = array();
            $options = '';
            $record[] = '<a target="_blank" href="' . base_url('home/order/' . $order->id) . '">' . $order->title . '</a>';
            $record[] = $order->added_date;
            $record[] = $order->views;
            $record[] = ($order->active == 1) ? '<span class="label label-success">متاح</span>' : '<span title="بإنتظار الموافقة من قبل الإدارة" class="label label-warning">بإنتظار الموافقة</span>';
            $options .= '<a href="#remove_order" onclick="setTarget(' . $order->id . ');" class="btn btn-bricky" data-toggle="modal"><i class="fa fa-times fa fa-white"></i></a> ';
            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function remove_offer() {
        $offer_id = $this->input->post('offer_id', true);
        $result = $this->bikes_model->remove_offer($offer_id, $this->_user_id);
        if ($result) {
            echo json_encode(array('status' => true, 'msg' => 'تم حذف العرض بنجاح'));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
        }
    }

    function remove_purchase_order() {
        $order_id = $this->input->post('order_id', true);
        $result = $this->bikes_model->remove_order($order_id, $this->_user_id);
        if ($result) {
            echo json_encode(array('status' => true, 'msg' => 'تم حذف طلب الشراء بنجاح'));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
        }
    }

    function edit_bike($bike_id = NULL) {
        $data['bike'] = $this->bikes_model->get_bike_info($bike_id, $this->_user_id);
        $data['cities'] = $this->locations_model->get_cities($this->_user_id);
        $data['models'] = $this->manufacturers_model->get_models_by_manufacturer($data['bike']->manufacturer_id);
        $data['currencies'] = $this->currencies_model->get_currencies_by_user_id($this->_user_id);
        $data['manufacturers'] = $this->manufacturers_model->get_manufacturers();
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $data['engines'] = $this->engines_model->get_engines();
        $this->load->view('back_end/user/edit_bike', $data);
    }

    function do_edit_bike() {
        $this->form_validation->set_rules('title', 'عنوان الإعلان', 'required|trim|xss_clean');
        $this->form_validation->set_rules('description', 'وصف الإعلان', 'required|trim|xss_clean');
        $this->form_validation->set_rules('manufacturer_id', 'الشركة المصنعة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('model_id', 'الموديل', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('bike_status', 'الحالة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('color', 'اللون', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('production_date', 'تاريخ الصنع', 'required|trim|xss_clean');
        $this->form_validation->set_rules('mileage', 'عدد الأميال', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('price', 'السعر المطلوب', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('currency_id', 'العملة', 'required|trim|xss_clean');
        $this->form_validation->set_rules('engine', 'المحرك', 'required|trim|xss_clean');
        $this->form_validation->set_rules('city_id', 'المدينة', 'required|trim|numeric|xss_clean');
        $have_pic = TRUE;
        if (empty($_FILES)) {
            $have_pic = false;
            $this->form_validation->set_rules('bike_picture_1', 'يجب إختيار صورة واحدة على الأقل', 'required|trim|xss_clean');
        }

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            if ($have_pic) {
                $data = array();
                foreach ($_FILES as $key => $value) {
                    if (!empty($value['tmp_name']) && $value['size'] > 0) {
                        $file_element_name = $key;
                        $result = $this->uploadImage($file_element_name, 'bikes');
                        if ($result['status'] == FALSE) {
                            echo json_encode($result);
                            exit();
                        } else {
                            $data[$key] = $result['msg']; //don't forget to remove the old picutures
                        }
                        $this->generateThumb(640, 426, 'bikes/small');
                        $this->generateThumb(620, 860, 'bikes/medium');
                        $this->generateThumb(156, 100, 'bikes/thumbs');
                        @unlink($_FILES[$file_element_name]);
                    }
                }
            }
            $data['title'] = $this->input->post('title');
            $data['manufacturer_id'] = $this->input->post('manufacturer_id');
            $data['model_id'] = $this->input->post('model_id');
            $data['bike_status'] = $this->input->post('bike_status');
            $data['color'] = $this->input->post('color');
            $data['production_date'] = $this->input->post('production_date');
            $data['mileage'] = $this->input->post('mileage');
            $data['price'] = $this->input->post('price');
            $data['currency_id'] = $this->input->post('currency_id');
            $data['engine'] = $this->input->post('engine');
            $data['city_id'] = $this->input->post('city_id');
            $data['description'] = $this->input->post('description');
            $data['added_date'] = date('Y-m-d H:i:s');
            $bike_id = $this->input->post('id');

            $result = $this->bikes_model->update_bike($this->_user_id, $bike_id, $data);
            if ($result) {
                echo json_encode(array('status' => true, 'msg' => 'تم تعديل الإعلان بنجاح'));
            } else {
                if (!empty($_FILES)) {
                    foreach ($_FILES as $key => $value) {
                        $this->auth->remove_file('./uploads/bikes/', $value);
                        $this->auth->remove_file('./uploads/bikes/small/', $value);
                        $this->auth->remove_file('./uploads/bikes/medium/', $value);
                        $this->auth->remove_file('./uploads/bikes/thumbs/', $value);
                    }
                }
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

    function remove_bike() {
        $bike_id = $this->input->post('bike_id');
        $result = $this->bikes_model->remove_bike($bike_id, $this->_user_id);
        if ($result['is_removed']) {
            $this->auth->remove_file('./uploads/bikes/', $result['picture']->bike_picture_1);
            $this->auth->remove_file('./uploads/bikes/small/', $result['picture']->bike_picture_2);
            $this->auth->remove_file('./uploads/bikes/thumbs/', $result['picture']->bike_picture_3);
            $this->auth->remove_file('./uploads/bikes/thumbs/', $result['picture']->bike_picture_4);
            if ($result)
                echo json_encode(array('status' => true, 'msg' => 'تم حذف الإعلان بنجاح'));
            else
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
        }
    }

    function createOutput($sEcho, $records_number, $aaData = array()) {
        $output = array(
            "sEcho" => $sEcho,
            "iTotalRecords" => $records_number,
            "iTotalDisplayRecords" => $records_number,
            "aaData" => $aaData
        );
        return $output;
    }

    public function privacy_config() {
        $data['config'] = $this->users_model->get_privacy_config($this->_user_id);
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/privacy_config', $data);
    }

    function update_privacy_config() {
        $data['show_mobile'] = $this->input->post('show_mobile');
        $data['msg_from_buyers'] = $this->input->post('msg_from_buyers');
        $data['msg_from_members'] = $this->input->post('msg_from_members');
        $data['msg_from_admin'] = $this->input->post('msg_from_admin');
        $result = $this->users_model->update_privacy_config($this->_user_id, $data);
        if ($result) {
            echo json_encode(array
                ('status' => true, 'msg' => 'تم تعديل إعدادات الخصوصية بنجاح'));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
        }
    }

    public function my_info() {
        $data['countries'] = $this->get_countries();
        $data['user_info'] = $this->users_model->get_user_info($this->_user_id); //plz limit the selection
        $data['cities'] = $this->locations_model->get_cities_by_country($data['user_info']->country_id);
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/my_info', $data);
    }

    function update_my_info() {
//        $this->form_validation->set_rules('user_type', 'نوع الحساب', 'required|trim|numeric|xss_clean');
//        $this->form_validation->set_rules('username', 'إسم المستخدم', 'required|trim|min_length[6]|xss_clean');
        $this->form_validation->set_rules('full_name', 'الإسم بالكامل', 'required|trim|min_length[6]|xss_clean');
        $this->form_validation->set_rules('email', 'البريد الإلكتروني', 'required|trim|valid_email|xss_clean');
        $this->form_validation->set_rules('mobile', 'رقم الهاتف', 'required|trim|xss_clean');
        $this->form_validation->set_rules('country_id', 'الدولة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('city_id', 'المدينة', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('birth_date', 'تاريخ الميلاد', 'required|trim|xss_clean');
        if ($this->input->post('user_type') == 2 or $this->input->post('user_type') == 3 or $this->input->post('user_type') == 4) {
            $this->form_validation->set_rules('website', 'صفحة الفيس', 'required|trim|prep_url|xss_clean');
            $this->form_validation->set_rules('facebook', 'صفحة الفيس بوك', 'required|prep_url|trim|xss_clean');
        }

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
//            $data['user_type'] = $this->input->post('user_type');
//            $data['username'] = $this->input->post('username');
            $data['full_name'] = $this->input->post('full_name');
            $data['email'] = $this->input->post('email');
            $data['city_id'] = $this->input->post('city_id');
            $data['country_id'] = $this->input->post('country_id');
            $data['mobile'] = $this->input->post('mobile');
            $data['birth_date'] = $this->input->post('birth_date');
            if ($this->input->post('user_type') == 2 or $this->input->post('user_type') == 3 or $this->input->post('user_type') == 4) {
                $data['website'] = $this->input->post('website');
                $data['facebook'] = $this->input->post('facebook');
            }
            $result = $this->users_model->update_user($this->_user_id, $data);
            if ($result) {
                echo json_encode(array
                    ('status' => true, 'msg' => 'تم تعديل البيانات بنجاح'));
            } else {
                echo json_encode(array
                    ('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

    public function my_picture() {
        $data['old_picture'] = $this->users_model->get_old_picture($this->_user_id);
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/my_picture', $data);
    }

    public function update_my_picture() {
        $new_picture = $_FILES['user_picture']['name'];
        if (empty($new_picture)) {
            echo json_encode(array('status' => false, 'msg' => 'يجب إختيار الصورة'));
        } else {
            $imageName = NULL;
            if (!empty($new_picture)) {
                $file_element_name = 'user_picture';
                $result = $this->uploadImage($file_element_name, 'users', FALSE);
                if ($result['status']) {
                    $imageName = $result['msg'];
                } else {
                    echo json_encode(array('status' => false, 'msg' => $result['msg']));
                    exit();
                }
                $this->generateThumb(100, 100, 'users/small');
                $this->generateThumb(35, 35, 'users/thumbs');

                @unlink($_FILES[$file_element_name]);
            }

            //$user_id = $this->input->post('user_id');
            $old_pic = $this->users_model->get_old_picture($this->_user_id);
            $data['picture'] = $this->input->post('picture');
            if (empty($new_picture))
                $data['picture'] = $old_pic;
            else
                $data['picture'] = ($imageName != NULL) ? $imageName : '';
            $result = $this->users_model->update_user($this->_user_id, $data);
            if ($result) {
                if ($new_picture != NULL) {
                    $this->auth->remove_file('./uploads/users/', $old_pic);
                    $this->auth->remove_file('./uploads/users/small/', $old_pic);
                    $this->auth->remove_file('./uploads/users/thumbs/', $old_pic);
                }
                echo json_encode(array('status' => true, 'msg' => 'تم تعديل البيانات بنجاح'));
            } else {
                $this->auth->remove_file('./uploads/users/', $old_pic);
                $this->auth->remove_file('./uploads/users/small/', $old_pic);
                $this->auth->remove_file('./uploads/users/thumbs/', $old_pic);
                echo json_encode(array
                    ('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

    public function change_password() {
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/change_password', $data);
    }

    function do_change_password() {
        $this->form_validation->set_rules('old_password', 'كلمة المرور القديمة', 'required|trim|min_length[6]|xss_clean');
        $this->form_validation->set_rules('new_password', 'كلمة المرور الجديدة', 'required|trim|min_length[6]|matches[confirm_password]|xss_clean');
        $this->form_validation->set_rules('confirm_password', 'تأكيد كلمة المرور', 'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $old_password = $this->auth->encrypt($this->input->post('old_password'));
            $new_password = $this->auth->encrypt($this->input->post('new_password'));
            $user_id = $this->_user_id;
            $result = $this->users_model->change_password($user_id, $old_password, $new_password);
            if ($result) {
                echo json_encode(array
                    ('status' => true, 'msg' => 'تم تعديل البيانات بنجاح'));
            } else {
                echo

                json_encode(array('status' => false, 'msg' => 'الرجاء التأكد من كلمة المرور القديمة'));
            }
        }
    }

    public function my_centers() {
        if (USER_TYPE == 3) {
            $this->center();
        } else if (USER_TYPE == 4) {
            $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
            $this->load->view('back_end/user/my_centers', $data);
        }
    }

    public function center($id = null) {
        $data['center'] = $this->centers_model->get_center_info($this->_user_id, $id);
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/my_center', $data);
    }

    function do_update_center() {
        $this->form_validation->set_rules('name', 'إسم المعرض/الفرع', 'required|trim|xss_clean');
        $this->form_validation->set_rules('address', 'العنوان بالكامل', 'required|trim|xss_clean');
        $this->form_validation->set_rules('phone', 'رقم الهاتف', 'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $id = $this->input->post('id');
            $data = array();
            $data['name'] = $this->input->post('name');
            $data['address'] = $this->input->post('address');
            $data['phone'] = $this->input->post('phone');
            $result = $this->centers_model->update_center($this->_user_id, $id, $data);
            if ($result) {
                echo json_encode(array('status' => true, 'msg' => 'تم تعديل البيانات بنجاح'));
            } else {
                echo

                json_encode(array('status' => false, 'msg' => 'الرجاء التأكد من البيانات المدخلة'));
            }
        }
    }

    public function add_center() {
        $data['top_manufacturers'] = $this->bikes_model->get_top_manufacturers();
        $this->load->view('back_end/user/add_center', $data);
    }

    function do_add_center() {
        $this->form_validation->set_rules('name', 'إسم المعرض/الفرع', 'required|trim|xss_clean');
        $this->form_validation->set_rules('address', 'العنوان بالكامل', 'required|trim|xss_clean');
        $this->form_validation->set_rules('phone', 'رقم الهاتف', 'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $data = array(
                'user_id' => $this->_user_id,
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone')
            );

            $result = $this->centers_model->insert_center($data);
            if ($result) {
                echo json_encode(array('status' => true, 'msg' => 'تم الإضافة بنجاح'));
            } else {
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

    function get_my_centers() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->centers_model->get_my_centers_count($this->_user_id, $data);
        $centers = $this->centers_model->get_my_centers($this->_user_id, $data);

        $row = array();
        foreach ($centers as $center) {
            $record = array();
            $options = '';
            $record[] = $center->name;
            $record[] = $center->address;
            $record[] = $center->phone;
            $record[] = $center->added_date;
            $options .= '<a href="center/' . $center->id . '" title="تعديل" class="btn btn-primary"><i class="fa fa-edit"></i></a> ';
            $options .= '<a href="#remove_center" onclick="setTarget(' . $center->id . ');" class="btn btn-bricky" data-toggle="modal"><i class="fa fa-times fa fa-white"></i></a> ';

            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function remove_center() {
        $center_id = $this->input->post('center_id');
        $result = $this->centers_model->remove_center($center_id, $this->_user_id);
        if ($result)
            echo json_encode(array('status' => true, 'msg' => 'تم الحذف بنجاح'));
        else
            echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
    }

    public function add_group() {
        $this->load->view('back_end/user/add_group', $data);
    }

    function do_add_group() {
        $this->form_validation->set_rules('name', 'إسم المجموعة', 'required|trim|xss_clean');
        $this->form_validation->set_rules('description', 'وصف المجموعة', 'required|trim|xss_clean');
        $have_pic = TRUE;
        $group_picture = $_FILES['group_picture']['name'];
        if (empty($group_picture)) {
            $have_pic = false;
            $this->form_validation->set_rules('group_picture', 'يجب عدم ترك الصورة فارغة', 'required|trim|xss_clean');
        }

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            if ($have_pic) {
                $file_element_name = 'group_picture';
                $result = $this->uploadImage($file_element_name, 'groups');
                if ($result['status']) {
                    $imageName = $result['msg'];
                } else {
                    echo json_encode(array('status' => false, 'msg' => $result['msg']));
                    exit();
                }
                $this->generateThumb(640, 426, 'groups/small');
                $this->generateThumb(620, 860, 'groups/medium');
                $this->generateThumb(156, 100, 'groups/thumbs');
                @unlink($_FILES[$file_element_name]);
            }

            $data = array();
            $data['name'] = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            $data['picture'] = ($imageName != NULL) ? $imageName : '';
            $data['admin_id'] = $this->_user_id;
            $data['creation_date'] = date('Y-m-d H:i:s');

            $result = $this->groups_model->insert_group($data);
            if ($result) {
                echo json_encode(array('status' => true, 'msg' => 'تم إنشاء المجموعة بنجاح يمكنك الأن دعوة أصدقائك للمجموعة وتشارك المنشورات'));
            } else {
                if (!empty($_FILES)) {
                    $this->auth->remove_file('./uploads/groups/', $value);
                    $this->auth->remove_file('./uploads/groups/small/', $value);
                    $this->auth->remove_file('./uploads/groups/medium/', $value);
                    $this->auth->remove_file('./uploads/groups/thumbs/', $value);
                }
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

    function edit_group($group_id = NULL) {
        $data['group'] = $this->groups_model->get_group_info($group_id, $this->_user_id);
        $this->load->view('back_end/user/edit_group', $data);
    }

    function do_edit_group() {
        $group_pic = $_FILES['group_picture']['name'];
        $this->form_validation->set_rules('name', 'إسم المجموعة', 'required|trim|xss_clean');
        $this->form_validation->set_rules('description', 'وصف المجموعة', 'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $imageName = NULL;
            if (!empty($group_pic)) {
                $file_element_name = 'group_picture';
                $result = $this->uploadImage($file_element_name, 'groups');
                if ($result['status']) {
                    $imageName = $result['msg'];
                } else {
                    echo json_encode(array('status' => false, 'msg' => $result['msg']));
                    exit();
                }
                $this->generateThumb(393, 178, 'groups/small');
                $this->generateThumb(100, 63, 'groups/thumbs');
                @unlink($_FILES[$file_element_name]);
            }

            $data = array();
            $data['name'] = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            $data['picture'] = ($imageName != NULL) ? $imageName : '';
            $data['admin_id'] = $this->_user_id;
            $data['creation_date'] = date('Y-m-d H:i:s');
            $group_id = $this->input->post('id');

            $result = $this->groups_model->update_group($this->_user_id, $group_id, $data);
            if ($result) {
                echo json_encode(array('status' => true, 'msg' => 'تم تعديل الإعلان بنجاح'));
            } else {
                if (!empty($_FILES)) {
                    $this->auth->remove_file('./uploads/bikes/', $value);
                    $this->auth->remove_file('./uploads/bikes/small/', $value);
                    $this->auth->remove_file('./uploads/bikes/medium/', $value);
                    $this->auth->remove_file('./uploads/bikes/thumbs/', $value);
                }
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

    function my_groups() {
        $this->load->view('back_end/user/my_groups', $data);
    }

    function get_my_groups() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->groups_model->get_my_groups_count($this->_user_id, $data);
        $groups = $this->groups_model->get_my_groups($this->_user_id, $data);

        $row = array();
        foreach ($groups as $group) {
            $record = array();
            $options = '';
            $record[] = '<img width="120" src="' . base_url('uploads/groups/thumbs/' . $group->group_picture) . '" alt="' . $group->name . '" />';
            $record[] = '<a target="_blank" href="' . base_url('home/group/' . $group->id) . '">' . character_limiter(strip_tags($group->name), 31) . '</a>';
            $record[] = $group->description;
            $record[] = $group->creation_date;
            $options .= '<a href="edit_group/' . $group->id . '" title="تعديل بيانات المجموعة" class="btn btn-primary"><i class="fa fa-edit"></i></a> ';
            $options .= '<a href="#remove_group" title="حذف المجموعة" onclick="setTarget(' . $group->id . ');" class="btn btn-bricky" data-toggle="modal"><i class="fa fa-times fa fa-white"></i></a> ';

            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function remove_group() {
        $group_id = $this->input->post('group_id');
        $result = $this->groups_model->remove_group($group_id, $this->_user_id);
        if ($result['is_removed']) {
            $this->auth->remove_file('./uploads/groups/', $result['picture']);
            $this->auth->remove_file('./uploads/groups/small/', $result['picture']);
            $this->auth->remove_file('./uploads/groups/thumbs/', $result['picture']);
            if ($result)
                echo json_encode(array('status' => true, 'msg' => 'تم حذف المجموع بنجاح'));
            else
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
        }
    }

    function subscribe_group() {
        $data = array();
        $data['group_id'] = $this->input->post('group_id');
        $data['user_id'] = $this->_user_id;
        $result = $this->groups_model->subscribe_group($data);
        if ($result)
            echo json_encode(array('status' => true, 'msg' => 'تم الإنضمام بالمجموعة'));
        else
            echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
    }

    function leave_group() {
        $data = array();
        $data['group_id'] = $this->input->post('group_id');
        $data['user_id'] = $this->_user_id;
        $result = $this->groups_model->leave_group($data);
        if ($result)
            echo json_encode(array('status' => true, 'msg' => 'تم مغادرة بالمجموعة'));
        else
            echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
    }

    public function add_event() {
        $this->load->view('back_end/user/add_event', $data);
    }

    function do_add_event() {
        $this->form_validation->set_rules('title', 'عنوان  الحدث', 'required|trim|xss_clean');
        $this->form_validation->set_rules('description', 'تفاصيل الحدث', 'required|trim|xss_clean');
        $this->form_validation->set_rules('type', 'نوع الحدث', 'required|numeric|trim|xss_clean');
        $this->form_validation->set_rules('external_members', 'السماح للأعضاء الخارجيين', 'required|numeric|trim|xss_clean');
        $this->form_validation->set_rules('status', 'الحالة', 'required|numeric|trim|xss_clean');
        $this->form_validation->set_rules('start_date', 'وقت البدء', 'required|trim|xss_clean');
        $this->form_validation->set_rules('end_date', 'وقت الإنتهاء', 'required|trim|xss_clean');
        $this->form_validation->set_rules('start_position', 'مكان البداية', 'required|trim|xss_clean');
        $this->form_validation->set_rules('end_position', 'مكان النهاية', 'required|trim|xss_clean');
        $this->form_validation->set_rules('cover_image', 'صورة معبرة', 'required|trim|xss_clean');
        $have_pic = TRUE;
        $group_picture = $_FILES['cover_image']['name'];
        if (empty($group_picture)) {
            $have_pic = false;
            $this->form_validation->set_rules('cover_image', 'يجب عدم ترك الصورة فارغة', 'required|trim|xss_clean');
        }

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            if ($have_pic) {
                $file_element_name = 'cover_image';
                $result = $this->uploadImage($file_element_name, 'events');
                if ($result['status']) {
                    $imageName = $result['msg'];
                } else {
                    echo json_encode(array('status' => false, 'msg' => $result['msg']));
                    exit();
                }
                $this->generateThumb(640, 426, 'events/small');
                $this->generateThumb(620, 860, 'events/medium');
                $this->generateThumb(156, 100, 'events/thumbs');
                @unlink($_FILES[$file_element_name]);
            }

            $data = array();
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['type'] = $this->input->post('type');
            $data['external_members'] = $this->input->post('external_members');
            $data['status'] = $this->input->post('status');
            $data['start_date'] = $this->input->post('start_date');
            $data['end_date'] = $this->input->post('end_date');
            $data['start_position'] = $this->input->post('start_position');
            $data['end_position'] = $this->input->post('end_position');
            $data['cover_image'] = ($imageName != NULL) ? $imageName : '';
            $data['added_date'] = date('Y-m-d H:i:s');

            $result = $this->groups_model->insert_group($data);
            if ($result) {
                echo json_encode(array('status' => true, 'msg' => 'تم إدراج الحدث بنجاح'));
            } else {
                if (!empty($_FILES)) {
                    $this->auth->remove_file('./uploads/events/', $value);
                    $this->auth->remove_file('./uploads/events/small/', $value);
                    $this->auth->remove_file('./uploads/events/medium/', $value);
                    $this->auth->remove_file('./uploads/events/thumbs/', $value);
                }
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

    private function get_countries() {
        return $this->locations_model->get_countries();
    }

    private function get_cities() {
        return $this->locations_model->get_cities();
    }

    function get_cities_by_country() {
        $country_id = $this->input->post('country_id', TRUE);
        $data['cities'] = $this->locations_model->get_cities_by_country($country_id);
        echo json_encode($data);
    }

    function get_models_by_manufacturer() {
        $manufacturer_id = $this->input->post('manufacturer_id', TRUE);
        $data['models'] = $this->manufacturers_model->get_models_by_manufacturer($manufacturer_id);
        echo json_encode($data);
    }

//    function get_currencies_by_country() {
//        $country_id = $this->input->post('country_id', TRUE);
//        $data['currencies'] = $this->currencies_model->get_currencies_by_country($country_id);
//        echo json_encode($data);
//    }

    /**
     * generateThumb
     * 
     * function will resize the actual image and store it into project folder
     * 
     * @access public
     * @return void
     */
    function generateThumb($width = 640, $height = 426, $location = NULL) {
        $config['new_image'] = './uploads/' . $location . '/' . $this->upload->file_name;
        $config['source_image'] = $this->upload->upload_path . $this->upload->file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $width;
        $config['height'] = $height;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }

    /**
     * uploadImage
     * 
     * function will take the actual image and store it into project folder
     * 
     * @access public
     * @return void
     */
    function uploadImage($file_element_name = NULL, $location = NULL, $water_mark = TRUE) {
        $config['upload_path'] = './uploads/' . $location . '/';
        $config['allowed_types'] = 'gif|GIF|png|PNG|TIF|tif|jpg|JPG|jpeg|JPEG|JPGE|jpge';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_element_name)) {
            $msg = $this->upload->display_errors('', '');
            return array('status' => false, 'msg' => $file_element_name . ': ' . $msg);
        } else {
            $picture = $this->upload->data();
            if ($water_mark == TRUE) {
                $this->text_watermark($picture['full_path']);
            }
            return array('status' => true, 'msg' => $picture['file_name']);
        }
    }

    public function text_watermark($image_path) {
        $config['source_image'] = $image_path;
        $config['wm_text'] = 'www.motseklat.com';
        $config['wm_type'] = 'text';
        $config['wm_font_size'] = 16;
        $config['wm_font_color'] = '#0DA3E2';
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'center';
        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        $this->image_lib->watermark();
    }

}

/* End of file home.php */