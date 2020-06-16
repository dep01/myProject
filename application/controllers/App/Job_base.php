<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job_base extends CI_Controller {
public function __construct(){
    parent:: __construct();
    $this->load->model('App/Job_model','Job');
    $this->load->model('App/Profile_model','Profile');
    $sess   = $this->session->userdata('username');
    if(!$sess){
        redirect('index.php/Login');
    };
}
    public function index(){
        $mydata     = $this->session->userdata();
        $id_user    = array('a.id_user'=> $mydata['id_user']);
        $profile    = $this->Profile->get_my_profile($id_user);
        $user_id    = array(
                    'id_user'           =>$mydata['id_user'],
                    'id_active_status'  =>1
                );
        $list           =$this->Job->get_my_job($user_id);
        $cek['list']    = $profile[0];
        $cek['content'] ='App/Job_base/Job_base';
        $cek['title']   ='Job Base';
        $cek['joblist'] =$list;
        $cek['following']= $profile['following'] ;
        $cek['newproject']   = $profile['newproject'] ;
        $cek['total_notify'] = $profile['total_notify'] ;
        $this->load->view('App/Home/Home',$cek);
    }
    public function Add_job(){
        $mydata     = $this->session->userdata();
        $id_user    = array('a.id_user'=> $mydata['id_user']);
        $profile    = $this->Profile->get_my_profile($id_user);
        $user_id    = array(
                    'id_user'           =>$mydata['id_user'],
                    'id_active_status'  =>1
                        );
        $list=$this->Job->get_my_job($user_id);
        $cek['list']    = $profile[0];
        $cek['content'] ='App/Job_base/inc/add';
        $cek['title']   ='Job Base';
        $cek['joblist'] =$list;
        $cek['following']= $profile['following'] ;
        $cek['newproject']   = $profile['newproject'] ;
        $cek['total_notify'] = $profile['total_notify'] ;
        $this->load->view('App/Home/Home',$cek);
    }
    public function saveAdd(){
        $mydata     = $this->session->userdata();
        if ($this->input->post('fee') > 100){
            $this->session->set_flashdata('notif','Maximum percentage is 100');
            redirect("index.php/Jobadd",'refresh');
        }else{
            $id_user    = array('a.id_user'=> $mydata['id_user']);
            $profile    = $this->Profile->get_my_profile($id_user);
            $insert['percentageFee']    = $this->input->post('fee');
            $insert['jobbase']          = $this->input->post('job');
            $insert['id_user']          = $mydata['id_user'];
            $insert['id_active_status'] = 1;
            $model          = $this->Job->Add_job($insert);
            $user_id        = array(
                            'id_user'           =>$mydata['id_user'],
                            'id_active_status'  =>1
                        );
            $list           =$this->Job->get_my_job($user_id);
            $cek['list']    = $profile[0];
            $cek['following']= $profile['following'] ;
            $cek['content'] ='App/Job_base/Job_base';
            $cek['title']   ='Job Base';
            $cek['joblist'] =$list;
            $cek['newproject']   = $profile['newproject'] ;
            $cek['total_notify'] = $profile['total_notify'] ;
            redirect('index.php/Job');
        }
    }
    public function saveUpdate(){
        $mydata     = $this->session->userdata();
        $id_user    = array('a.id_user'=> $mydata['id_user']);
        $profile    = $this->Profile->get_my_profile($id_user);
        if ( $this->input->post('fee') > 100){
            $id     = $this->input->post('id');
            $this->session->set_flashdata('notif','Maximum percentage is 100');
            redirect('index.php/Job');
            }else{
                $insert['percentageFee']        = $this->input->post('fee');
                $insert['jobbase']              = $this->input->post('job');
                $condition['id_user']           = $mydata['id_user'];
                $condition['id_jobbase']        =$this->input->post('id');
                $condition['id_active_status']  = 1;
                $model          = $this->Job->Update_job($insert,$condition);
                $user_id        = array(
                                'id_user'           =>$mydata['id_user'],
                                'id_active_status'  =>1
                            );
                $list           =$this->Job->get_my_job($user_id);
                $cek['list']    = $profile[0];
                $cek['content'] ='App/Job_base/Job_base';
                $cek['title']   ='Job Base';
                $cek['joblist'] =$list;
                $cek['following']    = $profile['following'] ;
                $cek['newproject']   = $profile['newproject'] ;
                $cek['total_notify'] = $profile['total_notify'] ;
                redirect('index.php/Job');
            }
    }
    public function delete(){
        $mydata     = $this->session->userdata();
        $insert['id_active_status']     = 9;
        $condition['id_user']           = $mydata['id_user'];
        $condition['id_jobbase']        = $this->uri->segment('2');
        $condition['id_active_status']  = 1;
        $model = $this->Job->Update_job($insert,$condition);
        redirect('index.php/Job');
    }
    public function Update_job(){
        $mydata  = $this->session->userdata();
        $id_user = array('a.id_user'=> $mydata['id_user']);
        $profile = $this->Profile->get_my_profile($id_user);
        $user_id = array(
                'id_user'           =>$mydata['id_user'],
                'id_active_status'  =>1,
                'id_jobbase'        =>$this->uri->segment('2')
            );
        $list = $this->Job->get_my_job($user_id);
        if(empty($list)){
            redirect('index.php/Job');
        }
        $cek['list']    = $profile[0];
        $cek['following']    = $profile['following'] ;
        $cek['content'] ='App/Job_base/inc/Update';
        $cek['title']   ='Job Base';
        $cek['joblist'] =$list[0];
        $cek['newproject']   = $profile['newproject'] ;
        $cek['total_notify'] = $profile['total_notify'] ;
        $this->load->view('App/Home/Home',$cek);
    }

}

/* End of file Job_base.php */
?>