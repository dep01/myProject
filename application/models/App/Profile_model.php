<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

    public function get_my_profile($id){
        $this->db->select('b.username,b.id_user,a.fullname,a.birthday,a.phone,a.address,a.image,b.user_mail,c.gender');
        $this->db->from('profile_table a');
        $this->db->join('user_table b','a.id_user = b.id_user');
        $this->db->join('gender_table c','a.id_gender = c.id_gender');
        $this->db->where($id);
        $data = $this->db->get()->result_array(); 
        return $data;
    }
    public function update_profile($id,$profile){
        $this->db->where($id);
        $this->db->update('profile_table', $profile);
    }
    public function update_user($id,$user){
        $this->db->where($id);
        $this->db->update('user_table', $user);
    }
    public function cek_mail($mail){
        $condition  = array(
                    'user_mail' => $mail
            );
        $query      = $this->db->get_where('user_table', $condition);
        $result     = $query->result_array();
        return $result;
    }

}

/* End of file Profile_model.php */
?>
