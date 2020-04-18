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
                $this->session->set_flashdata('notif', 'Email is used by another account,Change with another one');
            }
        }else{
            $this->session->set_flashdata('notif', 'Username is used by another account,Change with another one');
        }
        return $return;
    }

}

/* End of file ModelName.php */

?>