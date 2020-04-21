<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
public function __construct(){
    parent:: __construct();
    $this->load->model('App/Profile_model','Profile');
    $this->load->model('Auth/Login_model','Login');
    $sess   = $this->session->userdata('username');
    if(!$sess){
        redirect('index.php/Login');
    };
}
    public function index(){
        $mydata         = $this->session->userdata();
        $data['list']   = $mydata;
        $data['content']='App/Project/Project_list';
        $data['title']  ='MyProject';
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
        $mail       = str_replace("'","''",$_POST['mail']);
        $fullname   = str_replace("'","''",$_POST['fullname']);
        $address    = str_replace("'","''",$_POST['address']);
        if(str_replace("'","''",$mydata['user_mail']) != $mail ){
            $cek_mail = $this->Profile->cek_mail($mail);
            if($cek_mail){
                $this->session->set_flashdata('notif', 'Email is used by another account');
                redirect('index.php/EditProfile');
            }else{
                $user_mail = array('user_mail' => $mail);
                $this->Profile->update_user($id_user,$user_mail);
            }
        }
        $profile =array(
            'fullname'  => $fullname,
            'phone'     => $_POST['phone'],
            'address'   => $address,
            'birthday'  => $_POST['birthday']
        );
        $this->Profile->update_profile($id_user,$profile);
        $id_user    = array('profile_table.id_user'=> $mydata['id_user']);
        $model      = $this->Profile->get_my_profile($id_user);
        $count      = $this->Login->count_project($model[0]['id_user']);
        $session    =array(
            'id_user'       => $model[0]['id_user'],
            'fullname'      => str_replace("''","'",$model[0]['fullname']),
            'birthday'      => $model[0]['birthday'],
            'phone'         => $model[0]['phone'],
            'address'       => str_replace("''","'",$model[0]['address']),
            'image'         => $model[0]['image'],
            'username'      => str_replace("''","'",$model[0]['username']),
            'user_mail'     => str_replace("''","'",$model[0]['user_mail']),
            'gender'        => $model[0]['gender'],
            'project_total' => $count['project_total'],
            'project_finished' => $count['project_finished'],
            'project_progress' => $count['project_progress'],
        );
        $this->session->set_userdata($session);
        redirect('index.php/Home');
    }



}

/* End of file Home.php */

?>