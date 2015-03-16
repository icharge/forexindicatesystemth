<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MY_Controller extends CI_Controller {

    protected $layout = 'layouts';
    protected $stylesheets = array(
        'app.css'
    );
    protected $javascripts = array(
        'app.js'
    );
    protected $local_stylesheets = array();
    protected $local_javascripts = array();
    protected $pageTitle = NULL;

    public function __construct() {
        parent::__construct();

        // Permissions List for this Class
        //$perm = array('admin');
        // Check
        if ($this->checkLogin()) {
            $this->DoOnLogged();
        } else {
            $this->DoOnNotLogged();
        }
    }

    protected function checkLogin() {
        return $this->session->userdata('logged') == true ? true : false;
    }
    
    protected function DoOnLogged() {
        return;
    }
    
    protected function DoOnNotLogged() {
        redirect('auth/login');
    }

    protected function get_stylesheets() {
        return array_merge($this->stylesheets, $this->local_stylesheets);
    }

    protected function get_javascripts() {
        return array_merge($this->javascripts, $this->local_javascripts);
    }
    
    protected function getCurrentPath() {
        return $this->router->class.'/'.$this->router->method.'/';
    }

    protected function render($content = '') {
        $view_data = array(
            'content' => $content,
            'fulltitle' => ($this->pageTitle == NULL ? $this->config->item('app_name') :
                    $this->pageTitle . ' - ' . $this->config->item('app_name')),
            'title' => ($this->pageTitle == NULL ? $this->config->item('app_name') :
                    $this->pageTitle),
            'stylesheets' => $this->get_stylesheets(),
            'javascripts' => $this->get_javascripts(),
        );
        if ($this->layout != false)
            $this->load->view($this->layout, $view_data);
        else
            echo $content;
    }

}
