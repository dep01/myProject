<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $data = $this->session->flashdata('data');
        $this->load->view('App/Home/Home',$data);
    }



}

/* End of file Home.php */

?>