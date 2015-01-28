<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model','Users');
	}

	public function index()
	{
		redirect('main');
	}

	public function login()
	{
		$data['formlink'] = "auth/dologin";
		$this->load->view('template/t_login_view', $data);
	}

	public function dologin()
	{

		# Login Process
		$this->form_validation->set_rules('username', 'ชื่อผู้ใช้', 'trim|required');
		$this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');
		$this->form_validation->set_message('required', 'คุณต้องกรอก %s');
		// $this->form_validation->set_error_delimiters('<span style="color: red">', '</span>');
		if (is_array($this->input->post()))
		{
			$username = $this->input->post('username');(is_array($username)?$username=$username[0]:true);
			$password = $this->input->post('password');(is_array($password)?$password=$password[0]:true);
			if ($this->form_validation->run())
			{
				$check = $this->Users->_checkuser($username, $password);

				$userinfo = $this->Users->_getUserInfo($username, $check);
				// Session
				$data = array(
					'id' => $userinfo['id'],
					'username' => $username,
					'fullname' => $userinfo['title'].$userinfo['name']." ".$userinfo['surname'],
					'title' => $userinfo['title'],
					'nick' => $userinfo['nick'],
					'pic' => $userinfo['picture'],
					'name' => $userinfo['name'],
					'surname' => $userinfo['surname'],
					'role' => $userinfo['role'],
					'joindate' => $userinfo['joinDate'],
					'status' => $userinfo['status'],
					'token' => $this->Users->updateToken($userinfo['id']),
					'logged' => true
				);
				$this->session->set_userdata($data);

				switch ($check) 
				{
					case 'admin':
						redirect('admin');
						break;
					
					case 'member':
						redirect('member');
						break;

					case 'notfound':
						$this->session->set_flashdata('msg_error', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
						redirect('auth/login');
						break;

					default:
					$this->session->set_flashdata('msg_error', 'Error');
						redirect('auth/login');
				}
			} else {
				$this->session->set_flashdata('msg_error', 'กรุณากรอกข้อมูลให้ครบ');
				redirect('auth/login');
			}
		} else {
			redirect('auth/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('main');
	}

}
