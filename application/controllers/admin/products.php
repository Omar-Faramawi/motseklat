<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('products_model');

        $this->auth->check_accessibility('admin');
    }

    public function index() {
        $this->show_products();
    }

    public function show_products() {
        $this->load->view('back_end/admin/products');
    }

    function get_all_products() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->products_model->admin_get_products_count($data);

        $result = $this->products_model->admin_get_all_products($data);

        $row = array();
        foreach ($result as $product) {
            $record = array();
            $record[] = '<img width="120" src="' . base_url('uploads/products/thumbs/' . $product->product_picture_1) . '" alt="' . $product->title . '" />';
            $record[] = '<a target="_blank" href="' . base_url('home/product/' . $product->id) . '">' . $product->title . '</a>';
            $record[] = $product->category_name;
            $record[] = $product->added_date;
            $record[] = $product->views;
            $record[] = $product->interested;
            if ($product->active == 1) {
                $icon = '<i class="clip-eye"></i>';
                $options = '<a href="#" onclick="activate_product(' . $product->id . ',0);return false;" title="تفعيل" class="btn btn-green">' . $icon . '</a> ';
            } else {
                $icon = '<i class="clip-eye-2"></i>';
                $options = '<a href="#" onclick="activate_product(' . $product->id . ',1);return false;" title="تعطيل" class="btn btn-bricky" data-toggle="modal">' . $icon . '</a> ';
            }
            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
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

    function activate_product() { // blocked or Not
        $this->form_validation->set_rules('product_id', 'تحديد الإعلان', 'required|trim|numeric');
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $product_id = $this->input->post('product_id');
            $status = $this->input->post('status');
            $result = $this->products_model->activate_product($product_id, $status);
            if ($result) {
                if ($status == 1) {
                    $data = $this->products_model->get_activate_product_email_info($product_id);
                    $this->send_activate_product_email($data);
                    echo json_encode(array('status' => true, 'msg' => 'تم تفعيل هذا الإعلان'));
                } else {
                    echo json_encode(array('status' => true, 'msg' => 'تم تعطيل هذا الإعلان'));
                }
            } else
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
        }
    }
    
    function send_activate_product_email($data) {
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $website_email = $this->config->item('website_email');
        $this->email->from($website_email, $this->config->item('website_name'));
        $this->email->to($data->email);
        $this->email->subject($this->config->item('website_name') . '| '.$data->title);

        $message = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        </head><body>';
        $message .= '<p>مرحبا ' . $data->full_name . '</p><br/>';
        $message .= '<p>مبروك  .... تم قبول اعلانك على موقع موتسيكلات ...</p><br/>';
        $message .= '<p>عنوان الإعلان: ' . $data->title . '</p><br/>';
        $message .= '<p>للذهاب لمشاهدة الإعلان الرجاء الضغط  <a href="' . base_url('home/product/' . $data->id) . '">هنـــــا</a></p>';
        $message .= '</body></html>';
        $this->email->message($message);
        $this->email->send();
        //echo $this->email->print_debugger();
    }


}

/* End of file home.php */
    