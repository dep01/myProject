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
        $this->load->model('Encrypt');
        $encrypt=$this->Encrypt->Encrypt_data($password);
        $query="select username,user_mail,id_user from user_table a where (username='$username' or user_mail='$username') and password='$encrypt'";
        $this->load->model('Auth/Login_model');
        $model=$this->Login_model->Validate($query);
        if ($model==0){
            $this->load->view('Auth/Login.php');
        }elseif($model==2){
            $this->load->view('App/Home.php'); 
        }else{
            $this->load->view('Auth/Profil',$model);
        }
    }
}

/* End of file Login.php */

?>