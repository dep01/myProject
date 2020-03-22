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
    public function check_username(){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $cpass =$_POST['cpass'];
        $mail =$_POST['mail'];
        
        if ($pass != $cpass){
            echo "
            <script>
            alert('Password must be same');
            </script>
            ";
            redirect('Auth/Regist','refresh'); 
        }else{
            $data= array(
                'username'=>$username,
                'password'=>$pass,
                'user_mail'=>$mail,
                'verify_code'=>123456,
                'id_verify_status'=>1,
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
        }
    }

}

/* End of file Login.php */

?>