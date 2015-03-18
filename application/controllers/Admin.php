<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        // Theme config
        $this->layout = "layouts/backend_layout";
        $this->stylesheets = array(
            asset_url() . '/skin/default_skin/css/theme.css',
        );
        $this->javascripts = array(
            asset_url() . '/vendor/jquery/jquery-1.11.1.min.js',
            asset_url() . '/vendor/jquery/jquery_ui/jquery-ui.min.js',
            asset_url() . '/js/bootstrap/bootstrap.min.js',
            asset_url() . '/js/utility/utility.js',
            asset_url() . '/js/utility/underscore/underscore-min.js',
            asset_url() . '/js/main.js',
            asset_url() . '/js/demo.js',
        );
        // Load model
        //$this->load->model('users_model');

        $this->load->helper('ckeditor');

        // Load Grocery CRUD
        $this->load->library('grocery_CRUD');
    }

    function index() {
        // Dashboard
        $this->pageTitle = "Dashboard";
        $content = $this->load->view('backend/dashboard_view', NULL, TRUE);
        $this->render($content);
    }

    function settings($method = NULL) {
        // LOAD MODEL
        $this->load->model('settings_model', 'webconfig');

        $this->pageTitle = "ตั้งค่าเว็บไซต์";

        $data = NULL;
        if ($method == "update") {
            // UPDATE
            $this->form_validation->set_rules('title', 'ชื่อบริษัท', 'required|trim');
            $this->form_validation->set_rules('title_th', 'ชื่อบริษัท (ภาษาไทย)', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'trim');
            $this->form_validation->set_rules('address', 'ที่อยู่', 'trim');
            $this->form_validation->set_rules('tel', 'หมายเลขโทรศัพท์', 'required|trim');
            $this->form_validation->set_rules('fax', 'FAX', 'trim');
            $this->form_validation->set_rules('workhours', 'เวลาทำการ', 'trim');
            $this->form_validation->set_message('required', 'คุณต้องกรอก %s');
            if ($this->form_validation->run()) {
                $data = array(
                    'title' => $this->input->post('title'),
                    'title_th' => $this->input->post('title_th'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                    'tel' => $this->input->post('tel'),
                    'fax' => $this->input->post('fax'),
                    'workhours' => $this->post('workhours'),
                );
                foreach ($data as $k => $v) {
                    $websetobj = array('id' => $k, 'value' => $v);
                    $this->webconfig->save($websetobj);
                }
                $this->session->set_flashdata('msg', 'บันทึกข้อมูลเรียบร้อย');
                redirect('admin/settings');
            }
        } else {
            // LOAD DATA
            $data = $this->webconfig->loadData();
        }

        $content = $this->load->view('backend/settings_view', $data, TRUE);
        $this->render($content);
    }

    function content_home($method = NULL) {
        $this->pageTitle = "เนื้อหาหน้าแรก";

        // Load Model
        $this->load->model('content_model', 'contentreq');

        if ($method == "update") {
            // UPDATE
            $this->form_validation->set_rules('aboutcontent', 'เนื้อหา', 'trim');
            $this->form_validation->set_rules('cid', 'CID', 'required');
            $this->form_validation->set_message('required', 'ไม่มีข้อมูล %s');

            if ($this->form_validation->run()) {
                $data = array(
                    'id' => $this->input->post('cid'),
                    'position' => 'home',
                    'content' => $this->input->post('aboutcontent'),
                    'user_id' => $this->session->userdata('id'),
                );

                $this->contentreq->save($data);
                $this->session->set_flashdata('msg', 'บันทึกข้อมูลเรียบร้อย');
                redirect('admin/content_home');
            }
        } else {
            $data = $this->contentreq->loadData('home');
        }

        $data['currentpath'] = $this->getCurrentPath();
        $content = $this->load->view('backend/aboutus_view', $data, TRUE);
        $this->render($content);
    }

    function content_company($method = NULL) {
        $this->pageTitle = "เนื้อหาบริษัท";

        // Load Model
        $this->load->model('content_model', 'contentreq');

        if ($method == "update") {
            // UPDATE
            $this->form_validation->set_rules('aboutcontent', 'เนื้อหา', 'trim');
            $this->form_validation->set_rules('cid', 'CID', 'required');
            $this->form_validation->set_message('required', 'ไม่มีข้อมูล %s');

            if ($this->form_validation->run()) {
                $data = array(
                    'id' => $this->input->post('cid'),
                    'position' => 'about',
                    'content' => $this->input->post('aboutcontent'),
                    'user_id' => $this->session->userdata('id'),
                );

                $this->contentreq->save($data);
                $this->session->set_flashdata('msg', 'บันทึกข้อมูลเรียบร้อย');
                redirect('admin/content_company');
            }
        } else {
            $data = $this->contentreq->loadData('about');
        }

        $data['currentpath'] = $this->getCurrentPath();
        $content = $this->load->view('backend/aboutus_view', $data, TRUE);
        $this->render($content);
    }

    function contacts($method = NULL, $id = NULL) {
        $this->pageTitle = "ข้อมูลติดต่อ";

        // Load Model
        $this->load->model('contact_model', 'contactm');

        switch ($method) {
            case 'markread':
                $this->contactm->markasread($id);
                redirect($this->getCurrentPath());
                break;

//            case 'markunread':
//                $this->contactm->markasunread($id);
//                redirect($this->getCurrentPath());
//                break;

            case 'markhigh':
                $this->contactm->markasimportant($id);
                redirect($this->getCurrentPath());
                break;

            default:
                $crud = new grocery_CRUD();
                // State
                $state = $crud->getState();
                $state_info = $crud->getStateInfo();
                if ($state == "read") {
                    $contactId = $state_info->primary_key;
                    $this->contactm->markasread($contactId, TRUE);
                }

                $crud->set_theme('bootstrap');
                $crud
                        ->set_table('contact')
                        ->set_subject('ผู้ติดต่อ')
                        ->columns('leaveon', 'namecontact', 'tel', 'email', 'status')
                        ->display_as('leaveon', 'วัน/เวลา')
                        ->display_as('namecontact', 'ผู้ติดต่อ')
                        ->display_as('tel', 'โทรศัพท์')
                        ->display_as('email', 'Email')
                        ->display_as('status', 'สถานะ')
                        ->display_as('message', 'ข้อความ')
                        ->order_by('priority', 'desc')
                        ->order_by('leaveon', 'desc')
                        ->add_action('ตั้งว่าอ่านแล้ว', NULL, $this->getCurrentPath() . 'markread', 'fa-check text-success')
                        ->add_action('ตั้งว่าสำคัญมาก', NULL, $this->getCurrentPath() . 'markhigh', 'fa-exclamation text-danger')
                        ->callback_column('status', array($this, 'setContactStatus'))
                        ->callback_read_field('status', array($this, 'setContactStatus'))
                        ->unset_fields('priority')
                        ->unset_add()
                        ->unset_edit()
                        ->unset_print()
                        ->unset_export();
                $crudoutput = $crud->unset_jquery()->render();

                // Merge JS CSS
                $this->stylesheets = array_merge($this->stylesheets, $crudoutput->css_files);
                $this->javascripts = array_merge($this->javascripts, $crudoutput->js_files);
                $this->render($crudoutput->output);
                break;
        }
    }

    function setContactStatus($str, $row) {
        switch ($str) {
            case 'unread':
                $ret = "ยังไม่ได้อ่าน";
                $labelclass = "label-default";
                break;
            case 'read':
                $ret = "อ่านแล้ว";
                $labelclass = "label-success";
                break;
            default:
                break;
        }

        $html = "<span class='label $labelclass' style='font-size: 100%'>$ret</span>";
        if (is_object($row)) {
            if ($row->priority > 0) {
                $html .= " <span class='label label-danger' style='font-size: 100%'>"
                        . "<i class='fa fa-exclamation'></i></span>";
            }
        }
        return $html;
    }

    function productcategory() {
        $this->pageTitle = "จัดการประเภทสินค้า";
        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud
                ->set_table('product_category')
                ->set_subject('กลุ่มสินค้า')
                ->set_field_upload('picture')
                ->columns('prdcate_id', 'parent', 'caption', 'picture')
                ->display_as('prdcate_id', 'รหัสกลุ่ม')
                ->display_as('caption', 'ชื่อกลุ่ม')
                ->display_as('picture', 'รูป')
                ->display_as('parent', 'ขึ้นกับ')
                ->order_by('product_category.prdcate_id');
        //$crud->unset_columns('prdcate_id');
        //$crud->callback_column('buyPrice', array($this, 'valueToEuro'));
        //$crud->callback_column($this->unique_field_name('caption'), array($this, 'valueToEuro'));
        //$crud->set_relation('parent', 'product_category', '{prdcate_id} - {caption}');
        $crudoutput = $crud->unset_jquery()->render();
        // Merge JS CSS
        $this->stylesheets = array_merge($this->stylesheets, $crudoutput->css_files);
        $this->javascripts = array_merge($this->javascripts, $crudoutput->js_files);
        $this->render($crudoutput->output);
    }

    function members() {
        $this->pageTitle = "Member Management";

        $crud = new grocery_CRUD();
        $crud->set_theme('bootstrap');
        $crud
                ->set_table('members')
                ->set_subject('สมาชิก')
                //->set_rules('prd_code', 'รหัสสินค้า', 'trim|required|xss_clean') // |callback_product_check
                ->set_field_upload('picture')
                ->required_fields('id', 'username', 'name', 'surname', 'role', 'status')
                ->columns('id', 'username', 'name', 'surname', 'member_ib', 'joinDate', 'role', 'status')
                ->field_type('id', 'readonly')
                ->field_type('username', 'readonly')
                ->display_as('id', 'รหัสสมาชิก')
                ->display_as('username', 'ชื่อผู้ใช้')
                ->display_as('name', 'ชื่อ')
                ->display_as('surname', 'สกุล')
                ->display_as('member_ib', 'เลขบัญชี')
                ->display_as('joinDate', 'วันที่เข้า')
                ->display_as('status', 'สถานะ');

        //$crud->unset_columns('prdcate_id');
        $crud->callback_column('price', array($this, 'toBaht'));
        //$crud->unset_jquery();

        $crudoutput = $crud->unset_jquery()->render();
        // Merge JS CSS
        $this->stylesheets = array_merge($this->stylesheets, $crudoutput->css_files);
        $this->javascripts = array_merge($this->javascripts, $crudoutput->js_files);
        $this->render($crudoutput->output);
    }

//    public function product_check($str) {
//        return TRUE;
//        $num_row = $this->db->where('prd_id', $str)->get('products')->num_rows();
//        if ($num_row >= 1) {
//            $this->form_validation->set_message('product_check', "รหัสสินค้า : '$str' มีอยู่ในระบบแล้ว ไม่สามารถใช้ซ้ำได้");
//            return FALSE;
//        } else {
//            return TRUE;
//        }
//    }
}
