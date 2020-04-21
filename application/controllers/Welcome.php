<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $sess   = $this->session->userdata('username');
        if(!$sess){
            redirect('index.php/Login');
        };
    }
	public function index()
	{
        redirect('index.php/Home');
	}
}
