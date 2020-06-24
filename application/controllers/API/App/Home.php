<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
public function __construct(){
    parent:: __construct();
    $this->load->model('App/Profile_model','Profile');
    $this->load->model('Auth/Login_model','Login');
    $this->load->model('App/Project_model','Project');
}
    public function index(){
        $token = json_decode($this->input->raw_input_stream, true);
        $decrypt=token_decription($token['token']);
        if($decrypt['code']==200){
            $id = $decrypt['result']['id_user'];
            $project_count    = $this->Login->count_project($id);
            $projectlist      = $this->Project->project_list($id);
            $id_user          = array('a.id_user'=> $id);
            $profile          = $this->Profile->get_my_profile($id_user);
            $data['following']    = $profile['following'] ;
            $data['newproject']   = $profile['newproject'] ;
            $data['total_notify'] = $profile['total_notify'] ;
            $data['project_count']=$project_count;
            $data['projectlist']  =$projectlist;
            $return = array(
                'code' => 200,
                'message'=> 'your home',
                'result'=>$data
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);
        }else{
            $return = array(
                'code' => 404,
                'message'=> 'acces denied',
                'result'=>null
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);
        }
    }
    public function profile(){
        $token = json_decode($this->input->raw_input_stream, true);
        $decrypt=token_decription($token['token']);
        if($decrypt['code']==200){
            $id = $decrypt['result']['id_user'];
            $id_user          = array('a.id_user'=> $id);
            $profile          = $this->Profile->get_my_profile($id_user);
            $return = array(
                'code' => 200,
                'message'=> 'Profile',
                'result'=> $profile[0]
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);
        }else{
            $return = array(
                'code' => 404,
                'message'=> 'acces denied',
                'result'=>null
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);
        }
    }
    public function update_profile(){
       
        $token = json_decode($this->input->raw_input_stream, true);
        $decrypt=token_decription($token['token']);
        $mail       = $token['email'];
        $fullname   = $token['fullname'];
        $address    = $token['address'];
        $phone      = $token['phone'];
        $birthday   = $token['birthday'];
        if($decrypt['code']==200){
            $id = $decrypt['result']['id_user'];
            $id_user    = array('id_user'=> $id);
            $cek_mail = $this->Profile->cek_mail($mail);
            if($cek_mail){
                $return = array(
                    'code' => 404,
                    'message'=> 'email is used by another account',
                    'result'=> null
                );
                header('Content-Type: application/json');
                echo json_encode($return,true);die;
            }else{
                $user_mail = array('user_mail' => $mail);
                $this->Profile->update_user($id_user,$user_mail);
            }
            $profile =array(
                'fullname'  => $fullname,
                'phone'     => $phone,
                'address'   => $address,
                'birthday'  => $$birthday
            );
            $this->Profile->update_profile($id_user,$profile);
            $return = array(
                'code' => 200,
                'message'=> 'Profile updated',
                'result'=> $profile[0]
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);
        }else{
            $return = array(
                'code' => 404,
                'message'=> 'acces denied',
                'result'=>null
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);
        }
    }
    public function accept_project(){
        $token = json_decode($this->input->raw_input_stream, true);
        $decrypt=token_decription($token['token']);
        if($decrypt['code']==200){
            $id_project=$token['id_project'];
            $id = $decrypt['result']['id_user'];
            $this->db->set(array('id_project_team_status'=> 2));
            $this->db->where(array('id_user'=> $id,'id_project'=>$id_project));
            $this->db->update('project_team');
            $return = array(
                'code' => 200,
                'message'=> 'success',
                'result'=> null
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);
        }else{
            $return = array(
                'code' => 404,
                'message'=> 'rejected',
                'result'=>null
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);
        }
     
    }
    public function decline_project(){

        $token = json_decode($this->input->raw_input_stream, true);
        $decrypt=token_decription($token['token']);
        if($decrypt['code']==200){
            $id_project=$token['id_project'];
            $id = $decrypt['result']['id_user'];
            $this->db->delete('project_team',array('id_user'=> $id,'id_project'=>$id_project));
            $return = array(
                'code' => 200,
                'message'=> 'success',
                'result'=> null
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);
        }else{
            $return = array(
                'code' => 404,
                'message'=> 'rejected',
                'result'=>null
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);
        }
    }


}

/* End of file Home.php */

?>