<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
	}
	public function index()
	{
		print_r($_SESSION);
		$this->load->view('myCss');
		$this->load->view('login_view');
		$this->load->view('myJs');
	}
	public function check()
	{
		if($this->input->post('username') == ''){
			$this->load->view('user');
		}else{
			$username = strtoupper($this->input->post('username'));
			$password = sha1($this->input->post('password'));
			
			$result = $this->User_model->fetch_user_login($username,$password);

			// echo $result;

			echo "<pre>";
			print_r($result);
			echo "</pre>";
			// if($username == 'ADMIN' && $password == 'admin'){
			// 	$this->session->set_userdata('level','admin');
			// 	$this->session->set_userdata('user',$username);
			// 	redirect('admin');
			// }else{
	
			// 	$this->session->set_userdata('level','user');
			// 	$this->session->set_userdata('user',$username);
			// 	echo 'username or password is invalid';
			// }
		}
	}
}