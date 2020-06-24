<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

// class Login extends CI_Controller {
// public function __construct(){
//     parent::__construct();
//     $this->load->model('API_Services/API_login','Login');
// }
//     public function index()
//     {

//         $username   = $_POST['username'];
//         $password   = $_POST['pass'];
//         $this->load->model('Encrypt');
//         $encrypt    =$this->Encrypt->Encrypt_data($password);
//         $user       = array(
//             'username'=>$username,
//             'password'=>$encrypt
//         );
//         $data=$this->Login->validate($user);
//         header('Content-Type: application/json');
//         echo json_encode($data,true);
//     }

// }

/* End of file Login.php */

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Auth/Login_model','Login');
        $this->load->model('Auth/Regist_model','Regist');
    }
    Public function index(){
        $this->load->model('Encrypt');
        $data = json_decode($this->input->raw_input_stream, true);
        $username       = $data['user'];
        $password       = $data['pass'];
        $encrypt        = $this->Encrypt->Encrypt_data($password);
        $model          = $this->Login->Validate($username,$encrypt);
        if ($model['status']==2){
            $username   = $model['data']['username'];
            $date = date("Y-m-d h:i:sa");
            $token = token_generate($username,$date);
            $query = 'update user_table set token ="'.$token.'", token_date="'.$date.'" where username="'.$username.'"';
            // print_r($query);die;
            $this->db->query($query);
            $data = array(
                'code'=>200,
                'message'=>'Login succes',
                'token'=>$token.$date);
            header('Content-Type: application/json');
            echo json_encode($data,true);
        }else{
            $data = array(
                'code'=>404,
                'message'=>'Login gagal',
                'token'=>null);
            header('Content-Type: application/json');
            echo json_encode($data,true);
        }
    }
}

/* End of file Login.php */

?>