

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function Validate($username,$password){
        $return=array(
            "msg"=>"user not found",
            "status"=>0,
            "data"=>""
        );
        $condition="(username ='$username' or user_mail = '$username') and password = '$password'";
        $this->db->select('id_user,username,user_mail');
        $this->db->where($condition);
        $data = $this->db->get('user_table');
        $result = $data->result_array();
        if ($result){
            $id_user = array(
                'profile_table.id_user'=>$result[0]['id_user']);
            $this->db->select('*');
            $this->db->from('profile_table');
            $this->db->join('user_table','profile_table.id_user = user_table.id_user');
            $this->db->join('gender_table','profile_table.id_gender = gender_table.id_gender');
            $this->db->where($id_user);
            $data = $this->db->get();
            $result = $data->result_array();
            if ($result){
                $return=array(
                    "msg"=>"User found",
                    "status"=>2,
                    "data"=>$result[0]
                );
            }else{
                $return=array(
                    "msg"=>"Complete your profile",
                    "status"=>1,
                    "data"=>$id_user
                );
            }
        }else{
            $return=array(
                "msg"=>"user not found",
                "status"=>0,
                "data"=>""
            );
            echo "
            <script>
            alert('User not found');
            </script>
            ";
           
            
        }

        return $return;
    }

}

/* End of file Login_model.php */

?>