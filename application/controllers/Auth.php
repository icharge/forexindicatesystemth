<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends MY_Controller {

    public function __construct() {
        parent::__construct();

        // Theme config
        $this->layout = "layouts/backend_layout";
        $this->stylesheets = array(
            asset_url()."/skin/default_skin/css/theme.css",
            asset_url().'/admin-tools/admin-forms/css/admin-forms.css',
        );
        $this->javascripts = array(
            asset_url().'/vendor/jquery/jquery-1.11.1.min.js',
            asset_url().'/vendor/jquery/jquery_ui/jquery-ui.min.js',
            asset_url().'/js/bootstrap/bootstrap.min.js',
            asset_url().'/js/pages/login/EasePack.min.js',
            asset_url().'/js/pages/login/rAF.js',
            asset_url().'/js/pages/login/TweenLite.min.js',
            asset_url().'/js/pages/login/login.js',
            asset_url().'/js/utility/utility.js',
            asset_url().'/js/main.js',
            asset_url().'/js/demo.js',
        );
        // Load model
        $this->load->model('users_model');
    }

    protected function DoOnNotLogged() {
        return;
    }

    public function index() {
        redirect('auth/login');
    }

    public function login() {
        $this->layout = "layouts/backend_login_layout";
        $this->pageTitle = "การเข้าสู่ระบบ";
        $this->render();
    }

    public function dologin() {
        # Login Process
        $this->form_validation->set_rules('username', 'ชื่อผู้ใช้', 'required');
        $this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');
        $this->form_validation->set_message('required', 'คุณต้องกรอก %s');
        // $this->form_validation->set_error_delimiters('<span style="color: red">', '</span>');
        if ($this->input->post()) {
            $username = $this->input->post('username');
            (is_array($username) ? $username = $username[0] : true);
            $password = $this->input->post('password');
            (is_array($password) ? $password = $password[0] : true);
            if ($this->form_validation->run()) {
                $userData = $this->users_model->getLogin($username, $password);
                if ($userData) {
                    $data = $userData;
                    $data = array_merge($data, array('logged' => true));

                    $this->session->set_userdata($data);
                    redirect('admin/index');
                } else {
                    $msg_error = 'ชื่อหรือรหัสผ่านไม่ถูกต้อง';
                }
            } else {
                $msg_error = 'กรุณากรอกข้อมูลให้ครบ';
            }
            $this->session->set_flashdata('msg', $msg_error);
            redirect('auth/login');
        } else {
            redirect('auth/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('main');
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */