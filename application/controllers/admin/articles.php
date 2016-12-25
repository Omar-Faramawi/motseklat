<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Articles extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('categories_model');
        $this->load->model('articles_model');
        $this->auth->check_accessibility('admin');
        $this->load->library('image_lib');
    }

    public function index() {
        $this->manage_articles();
    }

    public function add_article() {
        $data['categories'] = $this->categories_model->get_articles_categories();
        $this->load->view('back_end/admin/add_article', $data);
    }

    function do_add_article() {
        $new_pic = $_FILES['article_picture']['name'];
        $this->form_validation->set_rules('article_category', 'تصنيف المقال', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('article_title', 'عنوان المقال', 'required|trim|xss_clean');
        $this->form_validation->set_rules('article_description', 'تفاصيل المقال', 'required|trim|xss_clean');
        if (empty($new_pic)) {
            $this->form_validation->set_rules('article_picture', 'صورة المقال', 'required|trim|max_length[100]|xss_clean');
        }

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $imageName = NULL;
            if (!empty($new_pic)) {
                $file_element_name = 'article_picture';
                $result = $this->uploadImage($file_element_name, 'articles');
                if ($result['status']) {
                    $imageName = $result['msg'];
                } else {
                    echo json_encode(array('status' => false, 'msg' => $result['msg']));
                    exit();
                }
                $this->generateThumb(393, 178, 'articles/small');
                $this->generateThumb(100, 63, 'articles/thumbs');
                @unlink($_FILES[$file_element_name]);
            }

            if (!empty($new_pic)) {
                $data = array(
                    'category_id' => $this->input->post('article_category'),
                    'title' => $this->input->post('article_title'),
                    'description' => $this->input->post('article_description'),
                    'picture' => ($imageName != NULL) ? $imageName : '',
                    'publish_date' => date('Y-m-d H:i:s')
                );

                $result = $this->articles_model->insert_article($data);
                if ($result) {
                    echo json_encode(array('status' => true, 'msg' => 'تم إضافة المقال بنجاح'));
                } else {
                    if (!empty($imageName)) {
                        $this->auth->remove_file('./uploads/articles/', $imageName);
                        $this->auth->remove_file('./uploads/articles/small/', $imageName);
                        $this->auth->remove_file('./uploads/articles/thumbs/', $imageName);
                    }
                    echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
                }
            }
        }
    }

    public function do_edit_article() {
        $new_pic = $_FILES['article_picture']['name'];
        $this->form_validation->set_rules('article_category', 'تصنيف المقال', 'required|trim|numeric|xss_clean');
        $this->form_validation->set_rules('article_title', 'عنوان المقال', 'required|trim|xss_clean');
        $this->form_validation->set_rules('article_description', 'تفاصيل المقال', 'required|trim|xss_clean');
        $this->form_validation->set_rules('article_picture', 'صورة الخبر', 'trim|max_length[100]');

        if ($this->form_validation->run() == FALSE) {
            $errorMsg = validation_errors();
            echo json_encode(array('status' => false, 'msg' => $errorMsg));
        } else {
            $imageName = NULL;
            if (!empty($new_pic)) {
                $file_element_name = 'article_picture';
                $result = $this->uploadImage($file_element_name, 'articles');
                if ($result['status']) {
                    $imageName = $result['msg'];
                } else {
                    echo json_encode(array('status' => false, 'msg' => $result['msg']));
                    exit();
                }
                $this->generateThumb(393, 178, 'articles/small');
                $this->generateThumb(100, 63, 'articles/thumbs');
                @unlink($_FILES[$file_element_name]);
            }

            $article_id = $this->input->post('article_id');
            $old_pic = $this->articles_model->get_old_picture($article_id);
            $data = array();
            $data['category_id'] = $this->input->post('article_category');
            $data['title'] = $this->input->post('article_title');
            $data['description'] = $this->input->post('article_description');
            if ($new_pic == NULL)
                $data['picture'] = $old_pic;
            else
                $data['picture'] = ($imageName != NULL) ? $imageName : '';

            $result = $this->articles_model->update_article($article_id, $data);
            if ($result) {
                if ($new_pic != NULL) {
                    $this->auth->remove_file('./uploads/articles/', $old_pic);
                    $this->auth->remove_file('./uploads/articles/small/', $old_pic);
                    $this->auth->remove_file('./uploads/articles/thumbs/', $old_pic);
                }
                echo json_encode(array('status' => true, 'msg' => 'تم تعديل المقالة بنجاح'));
            } else {
                $this->auth->remove_file('./uploads/articles/', $old_pic);
                $this->auth->remove_file('./uploads/articles/small/', $old_pic);
                $this->auth->remove_file('./uploads/articles/thumbs/', $old_pic);
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في تخزين البيانات'));
            }
        }
    }

    public function edit_article($article_id = NULL) {
        $data['categories'] = $this->categories_model->get_articles_categories();
        $data['article'] = $this->articles_model->get_article_info($article_id);
        $this->load->view('back_end/admin/edit_article', $data);
    }

    function get_all_articles() {
        $data['i_search'] = isset($_POST['sSearch']) ? $_POST['sSearch'] : '';
        $data['i_start_index'] = $this->input->post('iDisplayStart');
        $data['i_end_index'] = $this->input->post('iDisplayLength');
        $records_number = $this->articles_model->get_articles_count($data);
        $result = $this->articles_model->get_all_articles($data);

        $row = array();
        foreach ($result as $value) {
            $record = array();
            $options = '';
            $record[] = '<img src="' . base_url('uploads/articles/thumbs/'.$value['picture']) . '" alt="' . $value['title'] . '" />';
            $record[] = '<a target="_blank" href="'.base_url('home/article/' . $value['id']).'">'.$value['title'].'</a>';
            $record[] = character_limiter(strip_tags(preg_replace('/(<[^>]+) style=".*?"/i', '$1', $value['description'])), 70);
            $record[] = $value['publish_date'];
            $record[] = $value['views'];
            $options .= '<a href="edit_article/' . $value['id'] . '" title="تعديل المقال" class="btn btn-primary" href="#"><i class="fa fa-edit"></i></a> ';
            $options .= '<a href="#remove_article" onclick="setTarget(' . $value['id'] . ');" class="btn btn-bricky" data-toggle="modal"><i class="fa fa-times fa fa-white"></i></a>';

            $record[] = $options;
            array_push($row, $record);
        }
        $output = $this->createOutput(intval($_POST['sEcho']), $records_number, $row);
        echo json_encode($output);
    }

    function remove_article() {
        $article_id = $this->input->post('article_id');
        $result = $this->articles_model->remove_article($article_id);

        if ($result['is_removed']) {
            $this->auth->remove_file('./uploads/articles/', $result['picture']);
            $this->auth->remove_file('./uploads/articles/small/', $result['picture']);
            $this->auth->remove_file('./uploads/articles/thumbs/', $result['picture']);

            if ($result)
                echo json_encode(array('status' => true, 'msg' => 'تم حذف المقالة بنجاح'));
            else
                echo json_encode(array('status' => false, 'msg' => 'هناك خطأ في البيانات المدخلة'));
        }
    }

    public function manage_articles() {
//        $data['categories'] = $this->articles_model->get_articles();
        $this->load->view('back_end/admin/manage_articles');
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
            return array('status' => false, 'msg' => $msg);
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

/* End of file home.php */
    