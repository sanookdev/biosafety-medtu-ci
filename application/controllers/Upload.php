<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Upload extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		// Load Model
		$this->ip_address    = $_SERVER['REMOTE_ADDR'];
		$this->datetime 	    = date("Y-m-d H:i:s");
		if($this->session->userdata('userRole') != '1'){
            redirect('user','refresh');
        }else{
			$this->load->model('upload_model');
		}
	}
	
	public function index() {
        $this->load->view('admin/admin_css');
        $this->load->view('admin/admin_js');
		$this->load->view('Layouts/header');
        $this->load->view('Layouts/navbar');
        $this->load->view('Layouts/sidebar');
	    $this->load->view('formupload_view');
		$this->load->view('Layouts/footer');
	}
	
	public function display() {
    	$data 	= [];
    	$data ["result"] = $this->upload->get_all();
    	$this->load->view("formupload_view");
    }

	public function date_customFormat($date){
		$old = explode('/',$date);
		$new = $old[2] . "-" . (($old[0] < 10) ? '0'. $old[0] : $old[0]) . "-" . $old[1];
		return $new;
	}

	public function import() {
		$path 		= 'documents/users/';
		$json 		= [];
		$this->upload_config($path);
		if (!$this->upload->do_upload('file')) {
			$json = [
				'error_message' => $this->upload->display_errors(),
			];
		} else {
			$file_data 	= $this->upload->data();
			$file_name 	= $path.$file_data['file_name'];
			$arr_file 	= explode('.', $file_name);
			$extension 	= end($arr_file);
			if('csv' == $extension) {
				$reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else {
				$reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet 	= $reader->load($file_name);


			// 


			// $value 	= $spreadsheet->getActiveSheet()->getCell('O2')->ca();
			// $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($value);


			
			// echo json_encode(strtotime('Y-m-d',$value));
			// echo $value;
			// exit();
			// echo "<pre>";
			// print_r($sheet_data);
			// echo "</pre>";
			// $sheet_data = $spreadsheet->getActiveSheet();

			// print_r($sheet_data);
			// exit();




			$sheet_data 	= $spreadsheet->getActiveSheet()->toArray();

			// $list 			= [];
			foreach($sheet_data as $key => $val) {

				if($key != null && $val[0] != null) {
					// $list[] = $val;
                    $list[] = array(
                        'projectCode' => $val[1],
                        'projectCertificateNo' => $val[2],
                        'projectNameTH' => $val[3],
                        'projectNameEN' => $val[4],
                        'projectPosition' => $val[5],
                        'projectLeader' => $val[6],
                        'projectDepartment' => $val[7],
                        'projectFaculty' => $val[8],
                        'projectMobile' => $val[9],
                        'projectEmail' => $val[10],
                        'projectType' => $val[11],
                        'projectSecurityLabLevel' => $val[12],
                        'projectRoom' => $val[13],
						// Date Default format dd/mm/yyyy
                        'projectRequestDate' => ($val[14] != '' ? $this->date_customFormat($val[14]) : ''),
                        'projectPresentCeoDate' => ($val[15] != '' ? $this->date_customFormat($val[15]) : ''),
                        'projectPassToUniversityDate' => ($val[16] != '' ? $this->date_customFormat($val[16]) : ''),
                        'projectApprovalDate' => ($val[17] != '' ? $this->date_customFormat($val[17]) : ''),
                        'projectProcessDate' =>($val[18] != '' ? $this->date_customFormat($val[18]) : ''),
                        'projectCertificateExpireDate' => ($val[19] != '' ? $this->date_customFormat($val[19]) : ''),
                        'projectDateClose' => ($val[20] != '' ? $this->date_customFormat($val[20]) : ''),
                        'projectComment' => $val[21]
                    );
				}
			}
			if(file_exists($file_name)){
				unlink($file_name);
			}else{
				echo "cannot remove file.";
				exit();
			}
			if(count($list) > 0) {
				$this->table = 'projects';
				$result = $this->upload_model->add_batch($list);
				if($result) {
					$json = [
						'success_message' 	=> "upload complete",
					];
				} else {
					$json = [
						'error_message' 	=> "Something went wrong. Please try again."
					];
				}
			} else {
				$json = [
					'error_message' => "No new record is found.",
				];
			}
		}
		echo json_encode($json);
		// echo json_encode($json);
	}

	public function upload_config($path) {
		if (!is_dir($path)) 
			mkdir($path, 0777, TRUE);		
		$config['upload_path'] 		= './'.$path;		
		$config['allowed_types'] 	= 'csv|CSV|xlsx|XLSX|xls|XLS';
		$config['max_filename']	 	= '255';
		$config['encrypt_name'] 	= TRUE;
		$config['max_size'] 		= 4096; 
		$this->load->library('upload', $config);
	}
}