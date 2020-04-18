<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
public function __construct(){
    parent:: __construct();
    $this->load->model('App/Profile_model','Profile');
    $sess   = $this->session->userdata('username');
    if(!$sess){
        redirect('index.php/Login');
    }
}
    public function index(){
        $mydata         = $this->session->userdata();
        $data['list']   = $mydata;
        $data['content']='App/Project/Project_list';
        $data['title']  ='myProject';
        $this->load->view('App/Home/Home',$data);
    }
    public function edit_profile(){
        $mydata         = $this->session->userdata();
        $cek['list']    = $mydata;
        $cek['content'] ='App/Home/inc/Edit_profile';
        $cek['title']   ='Profile';
        $this->load->view('App/Home/Home',$cek);
    }
    public function update_profile(){
        $mydata     = $this->session->userdata();
        $id_user    = array('id_user'=> $mydata['id_user']);
        if($mydata['user_mail'] != $_POST['mail'] ){
            $cek_mail = $this->Profile->cek_mail($_POST['mail']);
            if($cek_mail){
                $this->session->set_flashdata('notif', 'Email is used by another account');
                redirect('index.php/EditProfile');
            }else{
                $user_mail = array('user_mail' => $_POST['mail']);
                $this->Profile->update_user($id_user,$user_mail);
            }
        }
        $profile =array(
            'fullname'  => $_POST['fullname'],
            'phone'     => $_POST['phone'],
            'address'   => $_POST['address']
        );
        $this->Profile->update_profile($id_user,$profile);
        $id_user    = array('profile_table.id_user'=> $mydata['id_user']);
        $model      = $this->Profile->get_my_profile($id_user);
        $this->session->set_userdata($model[0]);
        redirect('index.php/Home');
    }



}

/* End of file Home.php */

?>