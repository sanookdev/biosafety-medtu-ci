<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('userRole') != '1'){
            redirect('user','refresh');
        }else{
            $this->load->model('Project_model');
        }
    }

	public function index()
	{
        $this->load->view('admin/admin_css');
        $this->load->view('admin/admin_js');
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
		$this->load->view('admin/report');
        $this->load->view('Layouts/footer');
	}

    public function show($projectId){
        $data['results'] = $this->Project_model->getProject($projectId);
        if($data['results']){
            $data['message'] = 'success';
            $data['status'] = '1';
        }else{
            $data['message'] = 'Project Not Found.';
            $data['status'] = '0';
        }
        $this->load->view('admin/admin_css');
        $this->load->view('admin/admin_js');
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
		$this->load->view('admin/project/show',$data);
        $this->load->view('Layouts/footer');
    }

    public function edit($projectId)
    {
        $data['results'] = $this->Project_model->getProject($projectId);
        if($data['results']){
            $data['message'] = 'success';
            $data['status'] = '1';
        }else{
            $data['message'] = 'Project Not Found.';
            $data['status'] = '0';
        }
        $this->load->view('admin/admin_css');
        $this->load->view('admin/admin_js');
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
		$this->load->view('admin/project/edit',$data);
        $this->load->view('Layouts/footer');
    }

    public function update()
    {
        if($this->Project_model->update($this->input->post())){
            $this->session->set_flashdata('err_message', 'Updated');
            $this->session->set_flashdata('err_status', 1);
        }
        redirect('project/edit/'.$this->input->post('projectId'));


        // echo "<pre>";
        // print_r($test);
        // echo "</pre>";
    }
}