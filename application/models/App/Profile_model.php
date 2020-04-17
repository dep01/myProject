<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

    public function update_profile($id,$profile){
        $this->db->where($id);
        $this->db->update('profile_table', $profile);
    }
    public function update_user($id,$user){
        $this->db->where($id);
        $this->db->update('user_table', $user);
    }
    public function cek_mail($mail){
        $condition = array(
            'user_mail' => $mail
        );
        $query = $this->db->get_where('user_table', $condition);
        $result = $query->result_array();
        return $result;
    }

}

/* End of file Profile_model.php */
?>
