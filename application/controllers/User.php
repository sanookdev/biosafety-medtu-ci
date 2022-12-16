<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('userRole') != '3'){ // 3 = user
            redirect('member','refresh');
        }else{
            $this->load->model('User_model');
            // $this->load->model('Project_model');
        }
    }

	public function index()
	{
        $this->report();
	}

    public function report(){
        $data['result'] = $this->User_model->fetch_projectAll();
        $this->load->view('user/user_css');
        $this->load->view('user/user_js');
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
		$this->load->view('user/user_view',$data);
        $this->load->view('Layouts/footer');

    }
}