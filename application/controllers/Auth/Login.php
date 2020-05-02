<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Auth/Login_model','Login');
        $this->load->model('Auth/Regist_model','Regist');
    }
    
    public function index()
    {
        $this->session->sess_destroy();
        $this->load->view('Auth/Login.php');
    }

    public function Register(){
        $this->load->view('Auth/Regist.php'); 
    }
    Public function Validate(){
        $this->load->model('Encrypt');
        $username       = $_POST['email'];
        $password       = $_POST['pass'];
        $encrypt        = $this->Encrypt->Encrypt_data($password);
        $model          = $this->Login->Validate($username,$encrypt);
        if ($model['status']==0){
            $this->load->view('Auth/Login.php');
        }elseif($model['status']==2){
            $ses    = array(
                'id_user'       => $model['data']['id_user'],
                'username'      => $model['data']['username'],
                'user_mail'     => $model['data']['user_mail'],
                // 'fullname'      => str_replace("''","'",$model['data']['fullname']),
                // 'birthday'      => $model['data']['birthday'],
                // 'phone'         => $model['data']['phone'],
                // 'address'       => str_replace("''","'",$model['data']['address']),
                // 'image'         => $model['data']['image'],
                // 'gender'        => $model['data']['gender'],
            );
            $this->session->set_userdata($ses);
            redirect('index.php/Home');
        }else{
            $id_user = array(
                    'id_user'=> $model['data']['profile_table.id_user']
            );
            $this->load->view('Auth/Profil',$id_user);
        }
    }
}

/* End of file Login.php */

?>