<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->view('App/head');
        $this->load->view('App/sidebar');
        $this->load->view('App/content');
        $this->load->view('App/footer');
        $this->load->view('App/js');
    }



}

/* End of file Home.php */

?>