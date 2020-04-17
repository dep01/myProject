<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job_base extends CI_Controller {
public function __construct(){
    parent:: __construct();
    $this->load->model('App/Job_model','Job');
}
    public function index()
    {
        $data = $this->session->flashdata('data');
        if($data){
            $this->load->library('session');
            $this->session->set_flashdata('data', $data);
            // print_r($data);
            // die;
            $user_id = array(
                'id_user'=>$data['list']['id_user'],
                'id_active_status'=>1);
            $list=$this->Job->get_my_job($user_id);
            $cek['list']  = $data['list'];
            $cek['content']='App/Job_base/Job_base';
            $cek['title']='Job Base';
            $cek['img'] = $data['img'];
            $cek['joblist']=$list;
            $this->load->view('App/Home/Home',$cek);
        }else{
            redirect('index.php/Login');
        }
    }
    public function Add_job(){
        $data = $this->session->flashdata('data');
        if($data){
            $this->load->library('session');
            $this->session->set_flashdata('data', $data);
            $user_id = array(
                'id_user'=>$data['list']['id_user'],
                'id_active_status'=>1);
            $list=$this->Job->get_my_job($user_id);
            $cek['list']  = $data['list'];
            $cek['img'] = $data['img'];
            $cek['content']='App/Job_base/inc/add';
            $cek['title']='Job Base';
            $cek['joblist']=$list;
            $this->load->view('App/Home/Home',$cek);
        }else{
            redirect('index.php/Login');
        }
    }
    public function saveAdd(){
        $data = $this->session->flashdata('data');
        if($data){
            $this->load->library('session');
            $this->session->set_flashdata('data', $data);
            if ($this->input->post('fee') > 100){
                echo  "
                <script>
                alert('Maximum percentage is 100');
                document.location.href = 'Jobadd';
                </script>
                ";
            }else{
                $insert['percentageFee'] = $this->input->post('fee');
                $insert['jobbase'] = $this->input->post('job');
                $insert['id_user'] = $data['list']['id_user'];
                $insert['id_active_status'] = 1;
                $model = $this->Job->Add_job($insert);
                $user_id = array(
                    'id_user'=>$data['list']['id_user'],
                    'id_active_status'=>1);
                $list=$this->Job->get_my_job($user_id);
                $cek['list']  = $data['list'];
                $cek['content']='App/Job_base/Job_base';
                $cek['title']='Job Base';
                $cek['img'] = $data['img'];
                $cek['joblist']=$list;
                redirect('index.php/Job');
            }
            
        }else{
            redirect('index.php/Login');
        }
    }
    public function saveUpdate(){
        $data = $this->session->flashdata('data');
        if($data){
            $this->load->library('session');
            $this->session->set_flashdata('data', $data);
            if ( $this->input->post('fee') > 100){
                $id = $this->input->post('id');
                $locate ="Updatejob/".$id;
                echo  "
                <script>
                alert('Maximum percentage is 100');
                document.location.href = '$locate';
                </script>
                ";
            }else{
                $insert['percentageFee'] = $this->input->post('fee');
                $insert['jobbase'] = $this->input->post('job');
                $condition['id_user'] = $data['list']['id_user'];
                $condition['id_jobbase']=$this->input->post('id');
                $condition['id_active_status'] = 1;
                $model = $this->Job->Update_job($insert,$condition);
                $user_id = array(
                    'id_user'=>$data['list']['id_user'],
                    'id_active_status'=>1);
                $list=$this->Job->get_my_job($user_id);
                $cek['list']  = $data['list'];
                $cek['content']='App/Job_base/Job_base';
                $cek['title']='Job Base';
                $cek['joblist']=$list;
                $cek['img'] = $data['img'];
                redirect('index.php/Job');
            }  
        }else{
            redirect('index.php/Login');
        }
    }
    public function delete(){
        $data = $this->session->flashdata('data');
        if($data){
            $this->load->library('session');
            $this->session->set_flashdata('data', $data);
            $insert['id_active_status'] = 9;
            $condition['id_user'] = $data['list']['id_user'];
            $condition['id_jobbase']=$this->uri->segment('2');
            $condition['id_active_status'] = 1;
            $model = $this->Job->Update_job($insert,$condition);
            redirect('index.php/Job');
        }else{
            redirect('index.php/Login');
        }
    }
    public function Update_job(){
        $data = $this->session->flashdata('data');
        if($data){
            $this->load->library('session');
            $this->session->set_flashdata('data', $data);
            $user_id = array(
                'id_user'=>$data['list']['id_user'],
                'id_active_status'=>1,
                'id_jobbase'=> $this->uri->segment('2'));
            $list=$this->Job->get_my_job($user_id);
            $cek['list']  = $data['list'];
            $cek['content']='App/Job_base/inc/Update';
            $cek['title']='Job Base';
            $cek['joblist']=$list[0];
            $cek['img'] = $data['img'];
            $this->load->view('App/Home/Home',$cek);
        }else{
            redirect('index.php/Login');
        }
    }

}

/* End of file Job_base.php */
?>