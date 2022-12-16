<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('userRole') != false){
    if($this->session->userdata('userRole') == '1'){
        redirect('admin');
    }else{
        redirect('user');
    }
}else{
    redirect('signin');
}

?>