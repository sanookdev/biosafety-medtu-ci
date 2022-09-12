<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(isset($_SESSION['level'])){
    echo "have session";
    $this->session->sess_destroy();
}else{
    header('Location: '.site_url('user'));
}
?>