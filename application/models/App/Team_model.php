<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model {

    public function get_my_team($id_user){
        $query = $this->db->query("select b.fullname,c.list_friend_status from list_friend a 
        inner join profile_table b on a.id_user_friend = b.id_user 
        inner join list_friend_status c on a.id_list_friend_status = c.id_list_friend_status
        where a.id_user = $id_user");
        $result = $query->result_array();

        return $result;
    }
    public function search_team($username,$id_user){
        $query = $this->db->query("Select b.username, concat(a.fullname,'( ',b.username,' )') as userdata from profile_table a
        inner join user_table b on a.id_user = b.id_user where a.id_active_status = 1 and a.id_user <> $id_user and (a.fullname like '%".$username."%' or b.username like '%".$username."%') limit 10");
        $result = $query->result_array();
        return $result;
    }

}

/* End of file Team_model.php */
