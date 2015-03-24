<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends MY_Controller {

    public function __construct() {
        parent::__construct();

        // Theme config
        $this->layout = "layouts/backend_layout";
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
            asset_url() . '/js/demo.js',
        );
        // Load model
        $this->load->model('members_model', 'userm');
    }

    protected function DoOnNotLogged() {
        return;
    }

    public function index() {
        redirect('Auth/login');
    }

    public function login() {
        $this->layout = "layouts/backend_login_layout";
        $this->pageTitle = "การเข้าสู่ระบบ";
        $this->render();
    }

    public function register() {
        $this->layout = "layouts/frontend_member_layout";
        $this->pageTitle = "ลงทะเบียน";

        $this->addPushRenderData(array(
            'registerpage' => true
        ));

        $content = $this->load->view('frontend/register_view', NULL, TRUE);
        $this->render($content);
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
                $userData = $this->userm->getLogin($username, $password);
                if ($userData) {
                    $data = $userData;
                    $data = array_merge($data, array('logged' => true));

                    $this->session->set_userdata($data);

                    switch ($data['role']) {
                        case "admin":
                            redirect('Admin/index');
                            break;

                        case "member":
                            redirect('Member/index');
                            break;

                        default:
                            break;
                    }
                } else {
                    $msg_error = 'ชื่อหรือรหัสผ่านไม่ถูกต้อง';
                }
            } else {
                $msg_error = 'กรุณากรอกข้อมูลให้ครบ';
            }
            $this->session->set_flashdata('msg', $msg_error);
            redirect('Auth/login');
        } else {
            redirect('Auth/login');
        }
    }

    public function doregister() {
        $this->form_validation->set_rules('username', 'ชื่อผู้ใช้', 'trim|required');
        $this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');
        $this->form_validation->set_rules('name', 'ชื่อ', 'trim|required');
        $this->form_validation->set_rules('surname', 'นามสกุล', 'trim|required');
        $this->form_validation->set_rules('ib', 'เลขบัญชี', 'trim|required');
        $this->form_validation->set_rules('ggp', 'Google+', 'trim|required');
        $this->form_validation->set_rules('fbname', 'Facebook', 'trim|required');

        $this->form_validation->set_message('required', 'คุณต้องกรอก %s');

        if ($this->input->post()) {
            $input = $this->input;

            $userData = array(
                'username' => $input->post('username'),
                'password' => $input->post('password'),
                'name' => $input->post('name'),
                'surname' => $input->post('surname'),
                'member_ib' => $input->post('ib'),
                'email' => $input->post('ggp'),
                'fb_name' => $input->post('fbname'),
                'join_date' => date('Y-m-d'),
            );

            if ($this->form_validation->run()) {
                if ($this->userm->insert($userData)) {
                    $this->userm->update(array('status' => 1), "ib = '$userData[member_ib]'", 'ib_vip');
                    redirect('Auth/login');
                } else {
                    $msg_error = 'สมัครสมาชิกไม่สำเร็จ';
                }
            } else {
                $msg_error = 'กรุณากรอกข้อมูลให้ครบ';
            }
            $this->session->set_flashdata('msg', $msg_error);
            redirect('Auth/register');
        } else {
            redirect('Auth/register');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Main');
    }

    public function facebook() {
        $fb_config = array(
            'appId' => '1615988941971351',
            'secret' => '80ba14f0e1e16a83ca542bb051c008ea'
        );
        $this->load->library('facebook', $fb_config);
        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }

        if ($user) {
            $data['logout_url'] = $this->facebook->getLogoutUrl();
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl();
        }

        $this->load->view('facebook', $data);
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */