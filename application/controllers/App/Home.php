<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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



}

/* End of file Home.php */

?>