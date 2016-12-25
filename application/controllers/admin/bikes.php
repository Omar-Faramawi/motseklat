<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bikes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('bikes_model');

        $this->auth->check_accessibility('admin');
    }

    public function index() {
        $this->supplies();
    }

    public function supplies() {
        $this->load->view('back_end/admin/supplies');
    }

    function get_all_supplies() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->bikes_model->admin_get_supplies_count($data);

        $result = $this->bikes_model->admin_get_all_supplies($data);

        $row = array();
        foreach ($result as $bike) {
            $record = array();
            $record[] = '<img width="120" src="' . base_url('uploads/bikes/thumbs/' . $bike->bike_picture_1) . '" alt="' . $bike->title . '" />';
            $record[] = '<a target="_blank" href="' . base_url('home/bike/' . $bike->id) . '">' . character_limiter(strip_tags($bike->title), 31) . '</a>';
            $record[] = $bike->manufacturer_name;
            $record[] = $bike->model_name;
            $record[] = $bike->price . ' ' . $bike->currency_name;
            $record[] = $bike->added_date;
            if ($bike->active == 1) {
                $icon = '<i class="clip-eye"></i>';
                $options = '<a href="#" onclick="activate_supply(' . $bike->id . ',0);return false;" title="تفعيل" class="btn btn-green">' . $icon . '</a> ';
            } else {
                $icon = '<i class="clip-eye-2"></i>';
                $options = '<a href="#" onclick="activate_supply(' . $bike->id . ',1);return false;" title="تعطيل" class="btn btn-bricky" data-toggle="modal">' . $icon . '</a> ';
            }
            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function activate_supply() { // blocked or Not
        $this->form_validation->set_rules('supply_id', 'تحديد الإعلان', 'required|trim|numeric');
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $supply_id = $this->input->post('supply_id');
            $status = $this->input->post('status');
            $result = $this->bikes_model->activate_supply($supply_id, $status);
            if ($result) {
                if ($status == 1) {
                    $data = $this->bikes_model->get_activate_supply_email_info($supply_id);
                    $this->send_activate_supply_email($data);
                    echo json_encode(array('status' => true, 'msg' => 'تم تفعيل هذا الإعلان'));
                } else {
                    echo json_encode(array('status' => true, 'msg' => 'تم تعطيل هذا الإعلان'));
                }
            } else
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
        }
    }
    
    function send_activate_order_email($data) {
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $website_email = $this->config->item('website_email');
        $this->email->from($website_email, $this->config->item('website_name'));
        $this->email->to($data->email);
        $this->email->subject($this->config->item('website_name') . '| ' . $data->title);

        $message = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        </head><body>';
        $message .= '<p>مرحبا ' . $data->full_name . '</p><br/>';
        $message .= '<p>مبروك  .... تم قبول طلب الشراء الذي قدمتة على موقع موتسيكلات ...</p><br/>';
        $message .= '<p>عنوان الإعلان: ' . $data->title . '</p><br/>';
        $message .= '<p>للذهاب لمشاهدة الإعلان الرجاء الضغط  <a href="' . base_url('home/order/' . $data->id) . '">هنـــــا</a></p>';
        $message .= '</body></html>';
        $this->email->message($message);
        $this->email->send();
        //echo $this->email->print_debugger();
    }

    function send_activate_supply_email($data) {
        $this->load->library('email');
        $this->email->set_mailtype('html');
        $website_email = $this->config->item('website_email');
        $this->email->from($website_email, $this->config->item('website_name'));
        $this->email->to($data->email);
        $this->email->subject($this->config->item('website_name') . '| ' . $data->title);

        $message = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        </head><body>';
        $message .= '<p>مرحبا ' . $data->full_name . '</p><br/>';
        $message .= '<p>مبروك  .... تم قبول اعلانك على موقع موتسيكلات ...</p><br/>';
        $message .= '<p>عنوان الإعلان: ' . $data->title . '</p><br/>';
        $message .= '<p>للذهاب لمشاهدة الإعلان الرجاء الضغط  <a href="' . base_url('home/bike/' . $data->id) . '">هنـــــا</a></p>';
        $message .= '</body></html>';
        $this->email->message($message);
        $this->email->send();
        //echo $this->email->print_debugger();
    }

    public function offers() {
        $this->load->view('back_end/admin/offers');
    }

    function get_all_offers() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->bikes_model->admin_get_offers_count($data);

        $offers = $this->bikes_model->admin_get_all_offers($data);

        $row = array();
        foreach ($offers as $offer) {
            $record = array();
            $record[] = '<a target="_blank" href="' . base_url('home/offer/' . $offer->id) . '">' . $offer->title . '</a>';
            $record[] = $offer->manufacturer_name;
            $record[] = $offer->model_name;
            $record[] = $offer->price . ' ' . $offer->currency_name;
            $record[] = $offer->offer_price . ' ' . $offer->currency_name;
            $record[] = $offer->added_date;
            $record[] = ($offer->expire_date >= date('Y-m-d')) ? '<span class="label label-success" style="opacity: 1;">' . $offer->expire_date . '</span>' : '<span class="label label-danger" style="opacity: 1;">' . $offer->expire_date . '</span>';
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    public function orders() {
        $this->load->view('back_end/admin/orders');
    }

    function get_all_orders() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->bikes_model->admin_get_orders_count($data);

        $orders = $this->bikes_model->admin_get_all_orders($data);

        $row = array();
        foreach ($orders as $order) {
            $record = array();
            $record[] = $order->title;
            $record[] = $order->manufacturer_name;
            $record[] = $order->model_name;
            $record[] = $order->price . ' ' . $order->currency_name;
            $record[] = $order->production_date;
            $record[] = $order->added_date;
            if ($order->active == 1) {
                $icon = '<i class="clip-eye"></i>';
                $options = '<a href="#" onclick="activate_order(' . $order->id . ',0);return false;" title="تفعيل" class="btn btn-green">' . $icon . '</a> ';
            } else {
                $icon = '<i class="clip-eye-2"></i>';
                $options = '<a href="#" onclick="activate_order(' . $order->id . ',1);return false;" title="تعطيل" class="btn btn-bricky" data-toggle="modal">' . $icon . '</a> ';
            }
            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function activate_order() { // blocked or Not
        $this->form_validation->set_rules('order_id', 'تحديد الطلب', 'required|trim|numeric');
        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $order_id = $this->input->post('order_id');
            $status = $this->input->post('status');
            $result = $this->bikes_model->activate_order($order_id, $status);
            if ($result) {
                if ($status == 1) {
                    $data = $this->bikes_model->get_activate_order_email_info($order_id);
                    $this->send_activate_order_email($data);
                    echo json_encode(array('status' => true, 'msg' => 'تم تفعيل هذا الطلب'));
                } else {
                    echo json_encode(array('status' => true, 'msg' => 'تم تعطيل هذا الطلب'));
                }
            } else
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

}

/* End of file home.php */
    