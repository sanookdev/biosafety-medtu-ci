<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('userRole') != '1'){
            redirect('user','refresh');
        }
        print_r($_SESSION);
    }

	public function index()
	{
        $this->load->view('Layouts/header');
		$this->load->view('admin/admin_view');
        $this->load->view('Layouts/footer');
	}
}