<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('userRole') == false){
            redirect('member','refresh');
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
		$this->load->view('admin');
        $this->load->view('Layouts/footer');
	}

    public function show($projectId){
        $data['results'] = $this->Project_model->getProject($projectId);
        $data['results_date_extend'] = $this->Project_model->getExtended($projectId);
        $data['results_date_progress'] = $this->Project_model->getProgress($projectId);
        $data['documents'] = $this->Project_model->getDocuments($projectId);
        $data['documentType'] = $this->Project_model->getDocumentType();
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
		$this->load->view('project/show',$data);
        $this->load->view('Layouts/footer');
    }

    public function addExtend($projectId){
        $data['project'] = $this->Project_model->getProject($projectId);
        $this->load->view('admin/admin_css');
        $this->load->view('admin/admin_js');
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
		$this->load->view('project/addExtend',$data);
        $this->load->view('Layouts/footer');
    }
    public function addProgress($projectId){
        $data['project'] = $this->Project_model->getProject($projectId);
        $this->load->view('admin/admin_css');
        $this->load->view('admin/admin_js');
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
		$this->load->view('project/addProgress',$data);
        $this->load->view('Layouts/footer');
    }

    public function add()
    {
        $this->load->view('admin/admin_css');
        $this->load->view('admin/admin_js');
        $this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
		$this->load->view('project/add');
        $this->load->view('Layouts/footer');
    }

    public function create(){
        if($this->Project_model->create($this->input->post())){
            $this->session->set_flashdata('err_message', 'Project Created');
            $this->session->set_flashdata('err_status', 1);
        }else{
            $this->session->set_flashdata('err_message', 'Fails');
            $this->session->set_flashdata('err_status', 0);
        }
        redirect('report');
    }
    public function createExtend(){
        if($this->Project_model->createExtend($this->input->post())){
            $this->session->set_flashdata('err_message', 'success');
            $this->session->set_flashdata('err_status', 1);
        }else{
            $this->session->set_flashdata('err_message', 'Fails');
            $this->session->set_flashdata('err_status', 0);
        }
        redirect('show/'.$this->input->post('projectId'));
    }

    public function createProgress(){
        if($this->Project_model->createProgress($this->input->post())){
            $this->session->set_flashdata('err_message', 'success');
            $this->session->set_flashdata('err_status', 1);
        }else{
            $this->session->set_flashdata('err_message', 'Fails');
            $this->session->set_flashdata('err_status', 0);
        }
        redirect('show/'.$this->input->post('projectId'));
    }

    public function edit($projectId)
    {
        $data['results'] = $this->Project_model->getProject($projectId);
        $data['documents'] = $this->Project_model->getDocuments($projectId);
        $data['documentType'] = $this->Project_model->getDocumentType();
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
		$this->load->view('project/edit',$data);
        $this->load->view('Layouts/footer');
    }

    public function documents($projectId){
        $data['documents'] = $this->Project_model->getDocuments($projectId);
        $data['documentType'] = $this->Project_model->getDocumentType();
        $data['projectId'] = $projectId;
        if($data['documents']){
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
		$this->load->view('project/documents',$data);
        $this->load->view('Layouts/footer');
    }
    
    public function update()
    {
        if($this->Project_model->update($this->input->post())){
            $this->session->set_flashdata('err_message', 'Updated');
            $this->session->set_flashdata('err_status', 1);
        }
        redirect('project/show/'.$this->input->post('projectId'));
    }

    public function delete($projectId){
        if($this->Project_model->delete($projectId)){
            $this->session->set_flashdata('err_message', 'Deleted');
            $this->session->set_flashdata('err_status', 1);
        }
        redirect('report');
    }
}