<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Regist_model extends CI_Model {
    public function save_profile($data){
        $this->db->insert('profile_table', $data);
    }
    public function check_username($data,$username,$mail){
        $return = 0;
        $query = $this->db->get_where('user_table', $username);
        $result = $query->result_array();
        if (empty($result)){
            $query = $this->db->get_where('user_table', $mail);
            $result = $query->result_array();
            if(empty($result)){
                $this->db->insert('user_table', $data);
                $query = $this->db->get_where('user_table', $username);
                $result = $query->result_array();
                $return=array(
                    'return'=>1,
                    'id_user'=>$result[0]['id_user']
                ); 
            }else{
                echo "
                <script>
                alert('Email is used,Change with another one');
                </script>
                ";
            }
        }else{
            echo "
            <script>
            alert('Username is used,Change with another one');
            </script>
            ";
        }
        return $return;
    }

}

/* End of file ModelName.php */

?>