<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') != 'admin'){
            redirect('user','refresh');
        }
    }

	public function index()
	{
        $this->load->view('Layouts/header');
		$this->load->view('admin/admin_view');
        $this->load->view('Layouts/footer');
	}
}