<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('template/t_header_view');
		
		$this->load->view('main');

		$this->load->view('template/t_rightsidebar_view');
		$this->load->view('template/t_footer_view');

	}

}
