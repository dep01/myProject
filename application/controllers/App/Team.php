<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('App/Team_model','Team');
}
    public function index()
    {
        $data = $this->session->flashdata('data');
        if($data){
            $this->load->library('session');
            $this->session->set_flashdata('data', $data);
            $list = $this->Team->get_my_team($data['list']['id_user']);
            $cek['list']  = $data['list'];
            $cek['content']='App/Team/My_team';
            $cek['title']='MyTeam';
            $cek['listteam']= $list;
            $this->load->view('App/Home/Home',$cek);
        }else{
            redirect('index.php/Login');
        }
    }
    public function search_team(){

    }

}

/* End of file Job_base.php */
?>