<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('API_Services/API_login','Login');
}
    public function index()
    {

        $username   = $_POST['username'];
        $password   = $_POST['pass'];
        $this->load->model('Encrypt');
        $encrypt    =$this->Encrypt->Encrypt_data($password);
        $user       = array(
            'username'=>$username,
            'password'=>$encrypt
        );
        $data=$this->Login->validate($user);
        header('Content-Type: application/json');
        echo json_encode($data,true);
    }

}

/* End of file Login.php */
