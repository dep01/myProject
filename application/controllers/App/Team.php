<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {
public function __construct(){
    parent::__construct();
    $this->load->model('App/Team_model','Team');
    $this->load->model('Auth/Login_model','Login');
    $this->load->model('App/Profile_model','Profile');
    $sess   = $this->session->userdata('username');
    if(!$sess){
        redirect('index.php/Login');
    };
}
    public function index(){
        $mydata         = $this->session->userdata();
        $list           = $this->Team->get_my_team($mydata['id_user']);
        $id_user        = array('a.id_user'=> $mydata['id_user']);
        $profile        = $this->Profile->get_my_profile($id_user);
        $cek['list']    = $profile[0];
        $cek['content'] ='App/Team/My_team';
        $cek['title']   ='MyTeam';
        $cek['listteam']= $list;
        $this->load->view('App/Home/Home',$cek);
    }
    public function search_team(){
        $mydata = $this->session->userdata();
        if (isset($_GET['term'])) {
            $searchTerm =$_GET['term'];
            $id_user    = $mydata['id_user'];
            $list       = $this->Team->search_team($searchTerm,$id_user);
            if (count($list) > 0) {
            foreach ($list as $row)
                $arr_result[] = $row['userdata'];
            }else{
                $arr_result[] = 'Oops!! Nobody was found!';
            }
            echo json_encode($arr_result);
        }
    }
    public function profile_team(){
        $mydata     = $this->session->userdata();
        $id_user    = array('a.id_user'=> $mydata['id_user']);
        $profile    = $this->Profile->get_my_profile($id_user);
        $condition  = array(
            'a.id_user'=> $this->uri->segment('2'),
        );
        $model      = $this->Team->team_profile($condition);
        if ($model){
            $teamproject            = $this->Login->count_project($model[0]['id_user']);
            $teamstatus             = $this->Team->check_team($mydata['id_user'],$model[0]['id_user']);
            if ($teamstatus){
                $cek['idteamstatus']= $teamstatus[0]['id_list_friend_status'];
                $cek['teamstatus']  = $teamstatus[0]['list_friend_status'];
            }else{
                $cek['idteamstatus']= '';
                $cek['teamstatus']  = '';
            }
            $cek['content']         = 'App/Team/inc/Find';
            $cek['teamlist']        = $model[0];
            $cek['title']           = 'Team Profile';
            $cek['project_detail']  =array(
                'project_total'     => $teamproject['project_total'],
                'project_finished'  => $teamproject['project_finished'],
                'project_progress'  => $teamproject['project_progress'],
            );
        }else{
            $this->session->set_flashdata('notif','Opps!! Nobody was found!');
            redirect('index.php/Team','refresh');
        };
        $cek['list']    = $profile[0];
        $this->load->view('App/Home/Home',$cek);
    }
    public function profile(){
        $mydata     = $this->session->userdata();
        $id_user    = array('a.id_user'=> $mydata['id_user']);
        $profile    = $this->Profile->get_my_profile($id_user);
        $repalce    = $_POST['searchteam'];
        $string     = ' ' .$repalce;
        $start      = '( ';
        $end        =' )';
        $ini        = strpos($string, $start);
        if ($ini == 0) {
            $trim   ='';
        }else{
            $ini    += strlen($start);
            $len    = strpos($string, $end, $ini) - $ini;
            $trim   = substr($string, $ini, $len);
        };
        if(empty($trim)){
            $model  = $this->Team->list_profile($repalce,$mydata['id_user']);
            if (empty($model)){
                $this->session->set_flashdata('notif','Opps!! Nobody was found!');
                redirect('index.php/Team','refresh');  
            }
            $cek['content']     ='App/Team/inc/List';
            $cek['teamlist']    = $model;
            $cek['title']       ='Find Team';
        }else{
            $condition  = array(
                'b.username'=>$trim
            );
            $model      = $this->Team->team_profile($condition);
            if ($model){
                $teamproject            = $this->Login->count_project($model[0]['id_user']);
                $teamstatus             = $this->Team->check_team($mydata['id_user'],$model[0]['id_user']);
                if ($teamstatus){
                    $cek['idteamstatus']= $teamstatus[0]['id_list_friend_status'];
                    $cek['teamstatus']  = $teamstatus[0]['list_friend_status'];
                }else{
                    $cek['idteamstatus']= '';
                    $cek['teamstatus']  = '';
                }
                $cek['content']         = 'App/Team/inc/Find';
                $cek['teamlist']        = $model[0];
                $cek['title']           = 'Team Profile';
                $cek['project_detail']  =array(
                    'project_total'     => $teamproject['project_total'],
                    'project_finished'  => $teamproject['project_finished'],
                    'project_progress'  => $teamproject['project_progress'],
                );
            }else{
                $this->session->set_flashdata('notif','Opps!! Nobody was found!');
                redirect('index.php/Team','refresh');
            };

        };
        $cek['list']    = $profile[0];
        $this->load->view('App/Home/Home',$cek);
    }
    public function add_team(){
        $mydata     = $this->session->userdata();
        $id_friend  = $this->uri->segment('2');
        $model      = $this->Team->check_team($mydata['id_user'],$id_friend);
        if (empty($model)){
            $forme  = array(
                'id_user'               => $mydata['id_user'],
                'id_user_friend'        => $id_friend,
                'id_list_friend_status' => 1
            );
            $forteam  = array(
                'id_user'               => $id_friend,
                'id_user_friend'        => $mydata['id_user'],
                'id_list_friend_status' => 2
            );
            $this->Team->add_team($forme,$forteam);  
        }else{
            $forme  = array(
                'id_user'               => $mydata['id_user'],
                'id_user_friend'        => $id_friend,
            );
            $forteam= array(
                'id_user'               => $id_friend,
                'id_user_friend'        => $mydata['id_user'],
            );
            $update = array(
                'id_list_friend_status' => 3
            );
            $this->Team->follow_team($forme,$forteam,$update);
        }
        redirect('index.php/Team','refresh');  
    }

}

/* End of file Job_base.php */
?>