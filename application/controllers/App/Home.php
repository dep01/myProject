<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
public function __construct(){
    parent:: __construct();
    $this->load->model('App/Profile_model','Profile');
    $this->load->model('Auth/Login_model','Login');
    $this->load->model('App/Project_model','Project');
    $sess   = $this->session->userdata('username');
    if(!$sess){
        redirect('index.php/Login');
    };
}
    public function index(){
        $mydata           = $this->session->userdata();
        $project_count    = $this->Login->count_project($mydata['id_user']);
        $projectlist      = $this->Project->project_list($mydata['id_user']);
        $id_user          = array('a.id_user'=> $mydata['id_user']);
        $profile          = $this->Profile->get_my_profile($id_user);
        $data['list']         = $profile[0];
        $data['following']    = $profile['following'] ;
        $data['newproject']   = $profile['newproject'] ;
        $data['total_notify'] = $profile['total_notify'] ;
        $data['content']      ='App/Project/Project_list';
        $data['title']        ='MyProject';
        $data['project_count']=$project_count;
        $data['projectlist']  =$projectlist;
        $this->load->view('App/Home/Home',$data);
    }
    public function edit_profile(){
        $mydata         = $this->session->userdata();
        $id_user        = array('a.id_user'=> $mydata['id_user']);
        $profile        = $this->Profile->get_my_profile($id_user);
        $cek['list']    = $profile[0];
        $cek['content'] ='App/Home/inc/Edit_profile';
        $cek['title']   ='Profile';
        $cek['following']= $profile['following'] ;
        $cek['newproject']   = $profile['newproject'] ;
        $cek['total_notify'] = $profile['total_notify'] ;
        $this->load->view('App/Home/Home',$cek);
    }
    public function update_profile(){
        $mydata     = $this->session->userdata();
        $id_user    = array('id_user'=> $mydata['id_user']);
        $mail       = $_POST['mail'];
        $fullname   = $_POST['fullname'];
        $address    = $_POST['address'];
        if($mydata['user_mail'] != $mail ){
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
        $id_user    = array('a.id_user'=> $mydata['id_user']);
        redirect('index.php/Home');
    }
    public function accept_project(){
        $mydata         = $this->session->userdata();
        $id_project     = $this->uri->segment('2');
        $this->db->set(array('id_project_team_status'=> 2));
        $this->db->where(array('id_user'=> $mydata['id_user'],'id_project'=>$id_project));
        $this->db->update('project_team');
        redirect('index.php/Home');
    }
    public function decline_project(){
        $mydata         = $this->session->userdata();
        $id_project     = $this->uri->segment('2');
        $this->db->delete('project_team',array('id_user'=> $mydata['id_user'],'id_project'=>$id_project));
        redirect('index.php/Home');
    }


}

/* End of file Home.php */

?>