<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job_base extends CI_Controller {

    public function index()
    {
        $data = $this->session->flashdata('data');
        if($data){
            // print_r($data);
            // die;
            $this->load->library('session');
            $this->session->set_flashdata('data', $data);
            $cek['list']  = $data['list'];
            $cek['content']='App/Job_base/Job_base';
            $cek['title']='Job Base';
            $this->load->view('App/Home/Home',$cek);
        }else{
            redirect('index.php/Login');
        }
    }

}

/* End of file Job_base.php */
?>