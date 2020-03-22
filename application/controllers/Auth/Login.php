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
    Public function Validate(){
        $username = $_POST['email'];
        $password = $_POST['pass'];
        $query="select username,user_mail,id_user from user_table a where (username='$username' or user_mail='$username') and password='$password'";
        $this->load->model('Auth/Login_model');
        $model=$this->Login_model->Validate($query);
    }
}

/* End of file Login.php */

?>