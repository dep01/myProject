<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Auth/Login_model','Login');
        $this->load->model('Auth/Regist_model','Regist');
        $this->load->model('App/Profile_model','Profile');
    }
    public function index(){
        $this->load->view('Auth/Regist');
    }
    public function profile(){
        $this->load->view('Auth/Profil'); 
    }
    public function save_profile(){
        $save = array(
            'id_user'           =>$_POST['id'],
            'fullname'          =>$_POST['fullname'],
            'birthday'          =>$_POST['birthday'],
            'id_gender'         =>$_POST['gender'],
            'phone'             =>$_POST['phone'],
            'address'           =>$_POST['address'],
            'id_active_status'  =>1,
            'image'             =>$this->session->flashdata('image')
        );
        $model          =$this->Regist->save_profile($save);
        redirect('index.php/Login', 'refresh');
    }
    public function check_username(){
        $username   = $_POST['username'];
        $pass       = $_POST['pass'];
        $cpass      = $_POST['cpass'];
        $mail       = $_POST['mail'];
        $this->load->model('Encrypt');
        $encrypt    =$this->Encrypt->Encrypt_data($pass);
        if(strlen($pass) < 8){
            $this->session->set_flashdata('notif', 'Minimum password is 8 character');
            redirect('index.php/Auth/Regist');
        }
        if ($pass != $cpass){
            $this->session->set_flashdata('notif', 'Password must be same');
            redirect('index.php/Auth/Regist');
        }else{
            $data = array(
                'username'          =>$username,
                'password'          =>$encrypt,
                'user_mail'         =>$mail,
                'verify_code'       =>123456,
                'id_verify_status'  =>2,
                'id_active_status'  =>1
            );
            $data_user=array(
                'username'          =>$username,
            );
            $data_mail=array(
                'user_mail'         =>$mail,
            );
            $model=$this->Regist->check_username($data,$data_user,$data_mail);
            if($model==0){
                redirect('index.php/Auth/Regist');
            }else{
                $this->load->view('Auth/Profil',$model);
            }
        }
    }
    public function fileUpload(){

        if(!empty($_FILES['file']['name'])){
          $new_name                 = time().$_FILES["file"]['name'];
          $config['upload_path']    = 'assets/images/user/'; 
          $config['allowed_types']  = 'jpg|jpeg|png|gif';
          $config['max_size']       = '3000'; // max_size in kb
          $config['file_name']      = $new_name;
          $this->load->library('upload',$config); 
          if($this->upload->do_upload('file')){
            $uploadData = $this->upload->data();
            $sess       = $this->session->userdata('username');
            if (!$sess){
                $this->session->set_flashdata('image',$new_name);
            }else{
                $mydata     = $this->session->userdata();
                $id_user    = array(
                    'a.id_user'=>$mydata['id_user']
                );
                $old_image  = $this->Profile->get_my_profile($id_user);
                if($old_image['image']){
                    unlink('assets/images/user/'.$old_image['image']);
                }
                $id_user    = array(
                            'id_user'=>$mydata['id_user']
                        );
                $image      = array(
                            'image'  => $new_name
                        );
                $model      = $this->Regist->update_picture($id_user,$image);
            }

          }

         
        }
     
      }
}

/* End of file Login.php */

?>