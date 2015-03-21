<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member extends MY_Controller {

    public function __construct() {
        parent::__construct();
        // Theme config
        $this->layout = "layouts/frontend_member_layout";
        $this->stylesheets = array(
            asset_url() . "/skin/default_skin/css/theme.css",
            asset_url() . '/admin-tools/admin-forms/css/admin-forms.css',
        );
        $this->javascripts = array(
            asset_url() . '/vendor/jquery/jquery-1.11.1.min.js',
            asset_url() . '/vendor/jquery/jquery_ui/jquery-ui.min.js',
            asset_url() . '/js/bootstrap/bootstrap.min.js',
            asset_url() . '/js/pages/login/EasePack.min.js',
            asset_url() . '/js/pages/login/rAF.js',
            asset_url() . '/js/pages/login/TweenLite.min.js',
            asset_url() . '/js/pages/login/login.js',
            asset_url() . '/js/utility/utility.js',
            asset_url() . '/js/main.js',
                //asset_url().'/js/demo.js',
        );
        // Load model
        $this->load->model('members_model', 'userm');

        $this->load->helper('ckeditor');

        // Load Grocery CRUD
        $this->load->library('grocery_CRUD');
    }

    function index() {
        // Dashboard
        $this->pageTitle = "Member";

        $memberData = $this->userm->search("id = '" . $this->session->userdata('id') . "'");
        $isVip = $this->userm->checkVip($memberData[0]->member_ib);
        
        $data['memberData'] = $memberData[0];
        $data['isVip'] = $isVip;
        
        $content = $this->load->view('frontend/member_view', $data, TRUE);
        $this->render($content);
    }

}
