<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
public function __construct(){
    parent:: __construct();
    $this->load->model('App/Profile_model','Profile');
    $this->load->model('Auth/Login_model','Login');
}
    public function index()
    {
        $data = $this->session->flashdata('data');
        if($data){
            $this->load->library('session');
            $this->session->set_flashdata('data', $data);
            $this->load->view('App/Home/Home',$data);
        }else{
            redirect('index.php/Login');
        }
     
    }
    public function edit_profile(){
        $data = $this->session->flashdata('data');
        if($data){
            $this->load->library('session');
            $this->session->set_flashdata('data', $data);
            $cek['list']  = $data['list'];
            $cek['img'] = $data['img'];
            $cek['content']='App/Home/inc/Edit_profile';
            $cek['title']='Profile';
            // print_r($cek);
            // die;
            $this->load->view('App/Home/Home',$cek);
        }else{
            redirect('index.php/Login');
        }
    }
    public function update_profile(){
        $data = $this->session->flashdata('data');
        if($data){
            $this->load->library('session');
            $id_user = array(
                'id_user'=> $data['list']['id_user']);
            if($data['list']['user_mail'] != $_POST['mail'] ){
                $cek_mail = $this->Profile->cek_mail($_POST['mail']);
                if($cek_mail){
                    echo "
                    <script>
                    alert('This email is used by another account');
                    </script>
                    ";
                    $this->session->set_flashdata('data', $data);
                    redirect('index.php/EditProfile','refresh');
                }else{
                    $user_mail = array(
                        'user_mail' => $_POST['mail']
                    );
                    $this->Profile->update_user($id_user,$user_mail);
                }
            }
            $profile =array(
                'fullname' => $_POST['fullname'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address']
            );
            $this->Profile->update_profile($id_user,$profile);
            $model=$this->Login->Validate($data['list']['username'],$data['list']['password']);
            $cek['list']  = $model['data'];
            $cek['content']='App/Project/Project_list';
            $cek['title']='myProject';
                if ($model['status']==2){
                    if(file_exists("assets/images/user/".$data['list']['id_user'].".jpg")){
                        $cek['img'] = "images/user/".$data['list']['id_user'].".jpg";
                    }else{
                        $cek['img'] = "images/userUnknown1.jpg";
                    };
                    $this->load->library('session');
                    $this->session->set_flashdata('data', $cek);
                    redirect('index.php/Home');
                }

            }else{
                redirect('index.php/Login');
            }
    }



}

/* End of file Home.php */

?>