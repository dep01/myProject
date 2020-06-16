<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API_login extends CI_Model {

    public function validate($user){
        $username   = $user['username'];
        $password   = $user['password'];
        $return     =array(
                    "msg"   =>"user not found",
                    "status"=>false,
                    "data"  =>""
            );
        $data       = $this->db->query("select username,user_mail,id_user from user_table a where (username='$username' or user_mail='$username') and password='$password'");
        $result     = $data->result_array();
        if ($result){
            $id_user= array(
                    'id_user'=>$result[0]['id_user']
                );
            $data   = $this->db->get_where('profile_table', $id_user);
            $result = $data->result();
            if ($result){
                $return     =array(
                    "msg"   =>"User found",
                    "status"=>200,
                    "data"  =>$result
                );
            }else{
                $return     =array(
                    "msg"   =>"Complete your profile",
                    "status"=>200,
                    "data"  =>$result
                );
            }
        }else{
            $return     =array(
                "msg"   =>"user not found",
                "status"=>false,
                "data"  =>""
            );
           
            
        }
    return $return;
    }

}

/* End of file API_login.php */
