<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

public function __construct(){
    parent::__construct();
    $this->load->model('API_Services/API_profile','profile');
}

    public function index()
    {
        $data=$this->profile->get_profile();
        $response=array(
            'msg'=>'Profile',
            'status'=>true,
            'data'=>$data
        );
        header('Content-Type: application/json');
        echo json_encode($response,true);
    }

}

/* End of file API_profile.php */
