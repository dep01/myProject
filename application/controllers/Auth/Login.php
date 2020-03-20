<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $this->load->view('Auth/Login.php');
    }

    public function Register(){
        $this->load->view('Auth/Regist.php'); 
    }
}

/* End of file Login.php */

?>