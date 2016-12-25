<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('slider_model');
        $this->auth->check_accessibility('admin');
        $this->load->library('image_lib');
    }

    public function index() {
        redirect(base_url('admin/slider/slider_management'), 'location');
    }

    function add_slide() {
        $this->load->view('back_end/admin/add_slide');
    }

    function do_add_slide() {
        $new_pic = $_FILES['picture']['name'];
        $this->form_validation->set_rules('title', 'العنوان', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'الشرح', 'trim|required|xss_clean');
        if (empty($new_pic)) {
            $this->form_validation->set_rules('picture', 'الصورة', 'required|trim');
        }

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $imageName = NULL;
            if (!empty($new_pic)) {
                $file_element_name = 'picture';
                $result = $this->uploadImage($file_element_name, 'slider');
                if ($result['status']) {
                    $imageName = $result['msg'];
                } else {
                    echo json_encode(array('status' => false, 'msg' => $result['msg']));
                    exit();
                }
                $this->generateThumb(1170, 350, 'slider/small');
                $this->generateThumb(156, 100, 'slider/thumbs');
                @unlink($_FILES[$file_element_name]);
            }
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'picture' => ($imageName != NULL) ? $imageName : '',
                'publish_date' => date('Y-m-d H:i:s')
            );

            $result = $this->slider_model->do_add_slide($data);
            if ($result) {
                echo json_encode(array('status' => true, 'msg' => 'تم الإضافة بنجاح'));
            } else {
                if ($imageName != NULL) {
                    $this->auth->remove_file('./uploads/slides/', $imageName);
                    $this->auth->remove_file('./uploads/slides/small/', $imageName);
                    $this->auth->remove_file('./uploads/slides/thumbs/', $imageName);
                }
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
        }
    }

    function slider_management() {
        $this->load->view('back_end/admin/slider_management');
    }

    function get_all_slides() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->slider_model->get_slides_count($data);
        $result = $this->slider_model->get_all_slides($data);

        $row = array();
        foreach ($result as $value) {
            $record = array();
            $options = '';
            $record[] = '<img src="' . base_url("uploads/slider/thumbs/" . $value->picture) . '" alt="' . $value->title . '">';
            $record[] = '<a target="_blank" href="' . base_url('home/slide/' . $value->id) . '">' . $value->title . '</a>';
            $record[] = character_limiter(strip_tags(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $value->description)), 100);
            $record[] = $value->publish_date;
            $options .= '<a href="update_slide/' . $value->id . '" class="btn btn-primary" title="تعديل"><i class="fa fa-edit"></i></a> ';
            $options .= '<a href="#confirme_remove" onclick="setTarget(' . $value->id . ',this);" title="حذف" class="btn btn-bricky" data-toggle="modal"><i class="fa fa-times fa fa-white"></i></a>';
            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function remove_slide() {
        $slide_id = $this->input->post('slide_id');
        $result = $this->slider_model->remove_slide($slide_id);
        if ($result->is_removed) {
            $this->auth->remove_file('./uploads/slider/', $result->picture);
            $this->auth->remove_file('./uploads/slider/small/', $result->picture);
            $this->auth->remove_file('./uploads/slider/thumbs/', $result->picture);

            echo json_encode(array('status' => true, 'msg' => "تم الحذف بنجاح"));
        } else {
            echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
        }
    }

    function update_slide($slide_id = NULL) {
        $result['slide'] = $this->slider_model->get_slide_info($slide_id);
        $this->load->view('back_end/admin/update_slide', $result);
    }

    public function do_update_slide() {
        $new_pic = $_FILES['picture']['name'];
        $this->form_validation->set_rules('title', 'العنوان', 'trim');
        $this->form_validation->set_rules('description', 'الشرح', 'trim');
        $this->form_validation->set_rules('picture', 'الصورة', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $imageName = NULL;
            if (!empty($new_pic)) {
                $file_element_name = 'picture';
                $result = $this->uploadImage($file_element_name, 'slider');
                if ($result['status']) {
                    $imageName = $result['msg'];
                } else {
                    echo json_encode(array('status' => false, 'msg' => $result['msg']));
                    exit();
                }
                $this->generateThumb(1170, 350, 'slider/small');
                $this->generateThumb(156, 100, 'slider/thumbs');
                @unlink($_FILES[$file_element_name]);
            }

            $slide_id = $this->input->post('slide_id');
            $old_pic = $this->slider_model->get_old_picture($slide_id);
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['publish_date'] = date('Y-m-d H:i:s');
            if (empty($new_pic))
                $data['picture'] = $old_pic;
            else
                $data['picture'] = ($imageName != NULL) ? $imageName : '';

            $result = $this->slider_model->update_slide($slide_id, $data);
            if ($result) {
                if ($new_pic != NULL) {
                    $this->auth->remove_file('./uploads/slider/', $old_pic);
                    $this->auth->remove_file('./uploads/slider/small/', $old_pic);
                    $this->auth->remove_file('./uploads/slider/thumbs/', $old_pic);
                }
                echo json_encode(array('status' => true, 'msg' => 'تم التعديل بنجاح'));
            } else {
                $this->auth->remove_file('./uploads/slider/', $old_pic);
                $this->auth->remove_file('./uploads/slider/small/', $old_pic);
                $this->auth->remove_file('./uploads/slider/thumbs/', $old_pic);
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
            }
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
    function uploadImage($file_element_name = NULL, $location = NULL) {
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
            $this->text_watermark($picture['full_path']);

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
        $this->image_lib->initialize($config);
        $this->image_lib->watermark();
    }

}

/* End of file Home.php */