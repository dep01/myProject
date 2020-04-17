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
        $model=$this->Login->Validate($username,$encrypt);
        $data['list']  = $model['data'];
        $data['content']='App/Project/Project_list';
        $data['title']='myProject';
        if ($model['status']==0){
            $this->load->view('Auth/Login.php');
        }elseif($model['status']==2){
            if(file_exists("assets/images/user/".$data['list']['id_user'].".jpg")){
                $data['img'] = "images/user/".$data['list']['id_user'].".jpg";
            }else{
                $data['img'] = "images/userUnknown1.jpg";
            };
            $this->load->library('session');
            $this->session->set_flashdata('data', $data);

            redirect('index.php/Home');
        }else{
            $this->load->view('Auth/Profil',$model['data']);
        }
    }
}

/* End of file Login.php */

?>