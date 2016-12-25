<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Engines extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('engines_model');
        $this->auth->check_accessibility('admin');
    }

    public function index() {
        $this->manage_engines();
    }

    public function add_engine() {
        $this->load->view('back_end/admin/add_engine');
    }

    function do_add_engine() {
        $this->form_validation->set_rules('capacity', 'سعة المحرك', 'required|numeric|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $data['capacity'] = $this->input->post('capacity');
            $result = $this->engines_model->insert_engine($data);
            if ($result) {
                echo json_encode(array('status' => true, 'msg' => 'تم الإضافة بنجاح'));
            } else {
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

    public function do_edit_engine() {
        $this->form_validation->set_rules('capacity', 'سعة المحرك', 'required|numeric|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $engine_id = $this->input->post('engine_id');
            $data['capacity'] = $this->input->post('capacity');

            $result = $this->engines_model->update_engine($engine_id, $data);
            if ($result) {
                echo json_encode(array('status' => true, 'msg' => 'تم التعديل بنجاح'));
            } else {
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في تخزين البيانات'));
            }
        }
    }

    public function edit_engine($engine_id = NULL) {
        $data['engine'] = $this->engines_model->get_engine_info($engine_id);
        $this->load->view('back_end/admin/edit_engine', $data);
    }

    function get_all_engines() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->engines_model->get_engines_count($data);
        $result = $this->engines_model->get_all_engines($data);

        $row = array();
        foreach ($result as $value) {
            $record = array();
            $options = '';
            $record[] = $value->capacity;
            $options .= '<a href="edit_engine/' . $value->id . '" title="تعديل " class="btn btn-primary" href="#"><i class="fa fa-edit"></i></a> ';
            $options .= '<a href="#remove_engine" onclick="setTarget(' . $value->id . ');" class="btn btn-bricky" data-toggle="modal"><i class="fa fa-times fa fa-white"></i></a>';

            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function remove_engine() {
        $engine_id = $this->input->post('engine_id');
        $result = $this->engines_model->remove_engine($engine_id);
        if ($result)
            echo json_encode(array('status' => true, 'msg' => 'تم الحذف بنجاح'));
        else
            echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
    }

    public function manage_engines() {
        $this->load->view('back_end/admin/manage_engines');
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
    