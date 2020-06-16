

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function Validate($username,$password){
        $return     =array(
                    "msg"   =>"user not found",
                    "status"=>0,
                    "data"  =>""
            );
        $condition  ='(username ="'.$username.'" or user_mail = "'.$username.'") and password = "'.$password.'"';
        $this->db->select('id_user,username,user_mail');
        $this->db->where($condition);
        $data       = $this->db->get('user_table');
        $result     = $data->result_array();
        if ($result){
            $id_user = array(
                    'profile_table.id_user'=>$result[0]['id_user']
                );
            $this->db->select('*');
            $this->db->from('profile_table');
            $this->db->join('user_table','profile_table.id_user = user_table.id_user');
            $this->db->join('gender_table','profile_table.id_gender = gender_table.id_gender');
            $this->db->where($id_user);
            $data   = $this->db->get();
            $result = $data->result_array();
            if ($result){
                $return     =array(
                    "msg"   =>"User found",
                    "status"=>2,
                    "data"  =>$result[0]
                );
            }else{
                $return     =array(
                    "msg"   =>"Complete your profile",
                    "status"=>1,
                    "data"  =>$id_user
                );
            }
        }else{
            $return     =array(
                "msg"   =>"user not found",
                "status"=>0,
                "data"  =>""
            );
            $this->session->set_flashdata('notif','Username or password incorrect');
            
        };

        return $return;
    }
    public function count_project($id_user){
        $this->db->select('count(distinct(a.id_project))as data');
        $this->db->from('project a');
        $this->db->join('project_team b','a.id_project = b.id_project');
        $this->db->where("b.id_user = $id_user and b.id_project_team_status =2");
        $data1 = $this->db->get()->result_array();
        $this->db->select('count(distinct(a.id_project))as data');
        $this->db->from('project a');
        $this->db->join('project_team b','a.id_project = b.id_project');
        $this->db->where("b.id_user = $id_user and a.id_project_status = 3 and b.id_project_team_status =2");
        $data2 = $this->db->get()->result_array();
        $this->db->select('count(distinct(a.id_project))as data');
        $this->db->from('project a');
        $this->db->join('project_team b','a.id_project = b.id_project');
        $this->db->where("b.id_user = $id_user and a.id_project_status <> 3 and b.id_project_team_status =2");
        $data3 = $this->db->get()->result_array();
        $return = array(
            'project_total'     => $data1[0]['data'],
            'project_finished'  => $data2[0]['data'],
            'project_progress'  => $data3[0]['data']
        );
        return $return;
    }

}

/* End of file Login_model.php */

?>