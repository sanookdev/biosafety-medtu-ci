<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('userRole') != '1'){
            redirect('user','refresh');
        }else{
            $this->load->model('Admin_model');
        }
    }

	public function index()
	{
        $data['results'] = array(
            '0' => $this->Admin_model->getCountProjectStatus(0),
            '1' => $this->Admin_model->getCountProjectStatus(1),
            '2' => $this->Admin_model->getCountProjectStatus(2)
        );
        $this->load->view('admin/admin_css');
        $this->load->view('admin/admin_js');
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
		$this->load->view('admin/dashboard',$data);
        $this->load->view('Layouts/footer');
	}

    public function report(){

        $data['result'] = $this->Admin_model->fetch_projectAll();
        $this->load->view('admin/admin_css');
        $this->load->view('admin/admin_js');
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
		$this->load->view('admin/report_view',$data);
        $this->load->view('Layouts/footer');
    }

    public function setting(){
        $this->load->view('admin/admin_css');
        $this->load->view('admin/admin_js');
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
		$this->load->view('admin/admin_setting');
        $this->load->view('Layouts/footer');
    }

    public function waiting($res){
        echo $res;
    }
}