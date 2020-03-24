<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends CI_Controller {

    public function index()
    {
        $this->load->view('Auth/Regist');
    }
    public function profile(){
        $this->load->view('Auth/Profil');
        
    }
    public function save_profile(){
        $data = array(
            'id_user'=> $_POST['id'],
            'fullname'=>$_POST['fullname'],
            'birthday'=>$_POST['birthday'],
            'id_gender'=>$_POST['gender'],
            'phone'=>$_POST['phone'],
            'address'=>$_POST['address'],
            'id_active_status'=>1
        );
        $this->load->model('Auth/Regist_model');
        $model=$this->Regist_model->save_profile($data);
        echo 'ini home';

    }
    public function check_username(){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $cpass =$_POST['cpass'];
        $mail =$_POST['mail'];
        $this->load->model('Encrypt');
        $encrypt=$this->Encrypt->Encrypt_data($pass);
        if ($pass != $cpass){
            echo "
            <script>
            alert('Password must be same');
            </script>
            ";
            $this->load->view('Auth/Regist');
        }else{
            $data= array(
                'username'=>$username,
                'password'=>$encrypt,
                'user_mail'=>$mail,
                'verify_code'=>123456,
                'id_verify_status'=>2,
                'id_active_status'=>1
            );
            $data_user=array(
                'username'=>$username,
            );
            $data_mail=array(
                'user_mail'=>$mail,
            );
            $this->load->model('Auth/Regist_model');
            $model=$this->Regist_model->check_username($data,$data_user,$data_mail);
            if($model==0){
                $this->load->view('Auth/Regist');
            }else{
                $this->load->view('Auth/Profil',$model);
            }
        }
    }

}

/* End of file Login.php */

?>