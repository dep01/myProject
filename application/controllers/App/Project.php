<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
    
public function __construct(){
    parent::__construct();
    $this->load->model('App/Project_model','Project');
    $this->load->model('Auth/Login_model','Login');
    $this->load->model('App/Profile_model','Profile');
    $this->load->model('App/Team_model','Team');
    $sess   = $this->session->userdata('username');
    if(!$sess){
        redirect('index.php/Login');
    };
}
    public function project_create(){
        $mydata         = $this->session->userdata();
        $id_user        = array('a.id_user'=> $mydata['id_user']);
        $profile        = $this->Profile->get_my_profile($id_user);
        $data['list']   = $profile[0];
        $data['content']='App/Project/inc/project_create';
        $data['title']  ='Create Project';
        $this->load->view('App/Home/Home',$data);
    }
    public function save_new_project(){
        $mydata         = $this->session->userdata();
        if($_POST['projectstart']==date("Y-m-d")){
            $id_project_status = 2;
        }else{
            $id_project_status = 1;
        };
        $date   =date_create($_POST['projectstart']);
        $com    = $_POST['projectdeadline'];
        date_add($date,date_interval_create_from_date_string("$com days"));
        $project['id_user']             = $mydata['id_user'];
        $project['project_name']        = $_POST['projectname'];
        $project['project_fee']         = $_POST['projectfee'];
        $project['project_start']       = $_POST['projectstart'];
        $project['project_deadline']    = $_POST['projectdeadline'];
        $project['id_project_status']   = $id_project_status;
        $project['project_end']         = date_format($date,"Y-m-d");
        $this->Project->save_new_project($project);
        $this->Project->get_id_new_project($project);
        redirect('index.php/Home','refresh');
        
    }
    public function manage_project(){
        $mydata         = $this->session->userdata();
        $id_user        = array('a.id_user'=> $mydata['id_user']);
        $profile        = $this->Profile->get_my_profile($id_user);
        $list           = $this->Project->manage_project($mydata['id_user']);
        $teamlist       = $this->Team->get_my_team($mydata['id_user']);
        $cek['list']    = $profile[0];
        $cek['content'] ='App/Project/inc/Manage_project';
        $cek['title']   ='MyProject';
        $cek['projectlist']= $list;
        $cek['teamlist']   = $teamlist;
        $this->load->view('App/Home/Home',$cek);

    }
    public function add_team(){
        $cek['id_user_friend']  = $this->uri->segment('2');
        $cek['id_project']      = $this->uri->segment('3'); 
        print_r($cek);
        die;
        
    }

}

/* End of file Project.php */
?>
