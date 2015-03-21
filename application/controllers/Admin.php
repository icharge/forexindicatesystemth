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
        redirect('Admin/members');
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
        //$crud->callback_column('price', array($this, 'toBaht'));
        //$crud->unset_jquery();
        
        $crudoutput = $crud->unset_jquery()->render();
        // Merge JS CSS
        $this->stylesheets = array_merge($this->stylesheets, $crudoutput->css_files);
        $this->javascripts = array_merge($this->javascripts, $crudoutput->js_files);
        $this->render($crudoutput->output);
    }

}
