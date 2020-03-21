<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Regist_model extends CI_Model {

    public function check_username($data,$username,$mail){
        $query = $this->db->get_where('user_table', $username);
        $result = $query->result_array();
        if (empty($result)){
            $query = $this->db->get_where('user_table', $mail);
            $result = $query->result_array();
            if(empty($result)){
                $this->db->insert('user_table', $data);
            }else{
                echo "
                <script>
                alert('Email is used,Change with another one');
                </script>
                ";
                redirect('Auth/Regist','refresh'); 
            }
        }else{
            echo "
            <script>
            alert('Username is used,Change with another one');
            </script>
            ";
            redirect('Auth/Regist','refresh');
        }
    }
    

}

/* End of file ModelName.php */

?>