<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

    public function index()
    {
        $data = $this->session->flashdata('data');
        if($data){
            // print_r($data);
            // die;
            $this->load->library('session');
            $this->session->set_flashdata('data', $data);
            $cek['list']  = $data['list'];
            $cek['content']='App/Team/My_team';
            $cek['title']='Job Base';
            $this->load->view('App/Home/Home',$cek);
        }else{
            redirect('index.php/Login');
        }
    }

}

/* End of file Job_base.php */
?>