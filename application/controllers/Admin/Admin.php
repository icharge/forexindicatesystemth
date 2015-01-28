<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model','Users');
		
		// Permissions List for this Class
		$perm = array('admin');
		// Check
		if ($this->Users->_checkLogin())
		{
			if ( ! $this->Users->_checkRole($perm)) redirect('main');
		} else {
			redirect('auth/login');
		}

	}
	

	public function index()
	{
		$this->load->view('template/t_header_view');
		
		$this->load->view('main');

		$this->load->view('template/t_rightsidebar_view');
		$this->load->view('template/t_footer_view');

	}

}
