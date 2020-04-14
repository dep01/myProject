<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Auth/Login_model','Login');
        $this->load->model('Auth/Regist_model','Regist');
    }
    public function index()
    {
        $this->load->view('Auth/Regist');
    }
    public function profile(){
        $this->load->view('Auth/Profil');
        
    }
    public function save_profile(){
        $save = array(
            'id_user'=> $_POST['id'],
            'fullname'=>$_POST['fullname'],
            'birthday'=>$_POST['birthday'],
            'id_gender'=>$_POST['gender'],
            'phone'=>$_POST['phone'],
            'address'=>$_POST['address'],
            'id_active_status'=>1
        );
        $model=$this->Regist->save_profile($save);
        $data['list']= $save;
        $data['content']='App/Project/Project_list';
        $data['title']='myProject';
        redirect('index.php/Login', 'refresh');
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
            $model=$this->Regist->check_username($data,$data_user,$data_mail);
            if($model==0){
                $this->load->view('Auth/Regist');
            }else{
                $this->load->view('Auth/Profil',$model);
            }
        }
    }
    public function fileUpload(){

        if(!empty($_FILES['file']['name'])){
     
          // Set preference
          $config['upload_path'] = 'assets/images/user/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '3000'; // max_size in kb
          $config['file_name'] = $this->uri->segment('4').".jpg";
          $filepath = "assets/images/user/".$this->uri->segment('4');
          //Load upload library
          unlink($filepath.".jpg");
          $this->load->library('upload',$config); 
          if($this->upload->do_upload('file')){
            // Get data about the file
            $uploadData = $this->upload->data();
          }
         
        }
     
      }
}

/* End of file Login.php */

?>