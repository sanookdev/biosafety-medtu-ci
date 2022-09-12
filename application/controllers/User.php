<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
	}
	public function index()
	{
		// print_r($_SESSION);
		$this->load->view('myCss');
		$this->load->view('login_view');
		$this->load->view('myJs');
	}
	public function check()
	{
		if($this->input->post('username') == '' || $this->input->post('password') == ''){
			$this->load->view('user');
		}else{
			$username = strtoupper($this->input->post('username'));
			$password = $this->input->post('password');
			$result = $this->User_model->fetch_user_login($username,sha1($password));
			if(!empty($result)){
				$sess = array(
					'userName' => $result->userName,
					'userRole' => $result->userRole
				);
				$this->session->set_userdata($sess);
				print_r($_SESSION);
			}else{
				$jsonurl = 'http://203.131.209.236/_authen/_authen.php?user_login=' . $username;
				$json = file_get_contents($jsonurl);
				$returnInfo = json_decode($json, true);
				if($returnInfo['chkData'] == md5($password)){
					$sess = array(
						'userName' => $username,
						'userRole' => '3'
					);
					$this->session->set_userdata($sess);
					print_r($_SESSION);
				}else{
					$this->session->unset_userdata(array('userName','userRole'));
					redirect('user');
				}
			}
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('user');
	}
}