<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

    public function get_my_profile($id){
        // print_r($id);die;
        $this->db->select('b.username,b.id_user,a.fullname,a.birthday,a.phone,a.address,a.image,b.user_mail,c.gender');
        $this->db->from('profile_table a');
        $this->db->join('user_table b','a.id_user = b.id_user');
        $this->db->join('gender_table c','a.id_gender = c.id_gender');
        // $this->db->join('( select a.id_user_friend,b.fullname friend_name ,a.id_user from list_friend a inner join profile_table b on a.id_user_friend = b.id_user where id_list_friend_status = 2 and a.id_user ='.$id['a.id_user'].') d','a.id_user = d.id_user','left');
        $this->db->where($id);
        $data = $this->db->get()->result_array();


        $this->db->select('a.id_user_friend,b.fullname,a.created');
        $this->db->from('list_friend a');
        $this->db->join('profile_table b','a.id_user_friend = b.id_user');
        $this->db->where('a.id_list_friend_status = 2 and a.id_user ='.$id['a.id_user']);
        $data1 = $this->db->get();

        $this->db->select('b.project_name,d.fullname,a.created,b.id_project');
        $this->db->from('project_team a');
        $this->db->join('project b','a.id_project = b.id_project');
        $this->db->join('profile_table c','a.id_user = c.id_user');
        $this->db->join('profile_table d','d.id_user = b.id_user');
        $this->db->where('a.id_project_team_status = 1 and a.id_user ='.$id['a.id_user']);
        $data2 = $this->db->get();
        $data['total_notify'] = $data1->num_rows() + $data2->num_rows();
        $data['following']=$data1->result_array();
        $data['newproject']=$data2->result_array(); 
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
