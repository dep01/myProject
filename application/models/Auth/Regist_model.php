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
    private function _uploadImage()
        {
            $config['upload_path']          = './assets/images/user/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $this->product_id;
            $config['overwrite']			= true;
            $config['max_size']             = 5000; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
        
            $this->load->library('upload', $config);
        
            if ($this->upload->do_upload('image')) {
                return $this->upload->data("file_name");
            }

            return "default.jpg";
        }

}

/* End of file ModelName.php */

?>