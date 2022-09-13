<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('userRole') != '1'){
            redirect('user','refresh');
        }
    }

	public function index()
	{
        $this->load->view('admin/admin_css');
        $this->load->view('admin/admin_js');
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
		$this->load->view('admin/admin_view');
        $this->load->view('Layouts/footer');
	}

    public function report(){
        $this->load->view('admin/admin_css');
        $this->load->view('admin/admin_js');
        $this->load->view('Layouts/sidebar');
        $this->load->view('Layouts/header');
		$this->load->view('admin/report');
        $this->load->view('Layouts/footer');
    }

    public function setting(){
        $this->load->view('admin/admin_css');
        $this->load->view('admin/admin_js');
        $this->load->view('Layouts/sidebar');
        $this->load->view('Layouts/header');
		$this->load->view('admin/setting');
        $this->load->view('Layouts/footer');
    }
}