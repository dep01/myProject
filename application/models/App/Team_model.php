<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model {

    public function get_my_team($id_user){
        $this->db->select('a.id_user_friend,d.username,b.fullname,c.list_friend_status,a.id_user_friend,a.id_list_friend_status,b.image');
        $this->db->from('list_friend a ');
        $this->db->join('profile_table b','a.id_user_friend = b.id_user ');
        $this->db->join('list_friend_status c','a.id_list_friend_status = c.id_list_friend_status');
        $this->db->join('user_table d','a.id_user_friend = d.id_user');
        $this->db->where("a.id_user = $id_user");
        $query  = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    public function add_team_project($id_user,$id_project){
        $this->db->distinct();
        $this->db->select('a.id_user_friend,d.username,b.fullname,c.list_friend_status,a.id_user_friend,a.id_list_friend_status,b.image');
        $this->db->from('list_friend a ');
        $this->db->join('profile_table b','a.id_user_friend = b.id_user ');
        $this->db->join('list_friend_status c','a.id_list_friend_status = c.id_list_friend_status');
        $this->db->join('user_table d','a.id_user_friend = d.id_user');
        $this->db->join('project_team e','a.id_user_friend = e.id_user','left');
        $this->db->where("a.id_user = $id_user and a.id_list_friend_status = 3 and a.id_user_friend not in(select id_user from project_team where id_project = $id_project)");
        $this->db->order_by('b.fullname', 'ASC');
        $query  = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
    public function search_team($username,$id_user){
        $sql    = 'Select b.username, concat(a.fullname,"( ",b.username," )") as userdata from profile_table a
        inner join user_table b on a.id_user = b.id_user where a.id_active_status = 1 and a.id_user <> '.$id_user.' and (a.fullname like "%'.$username.'%" or b.username like "%'.$username.'%") limit 10';
        $query  = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function team_profile($username){
        $this->db->select('a.id_user,b.username,b.user_mail,a.fullname,a.phone,a.address,c.gender,a.image');
        $this->db->from('profile_table a');
        $this->db->join('user_table b','a.id_user = b.id_user');
        $this->db->join('gender_table c','a.id_gender = c.id_gender');
        $this->db->where($username);
        $data = $this->db->get()->result_array();
        return $data;
    }
    public function list_profile($username,$id_user){
        $sql   = 'select a.id_user,c.username,a.fullname,a.image, b.* from profile_table a
        inner join user_table c on a.id_user = c.id_user
        left join (
        select a.id_user_friend,d.id_list_friend_status,d.list_friend_status from list_friend a 
        inner join profile_table b on a.id_user = b.id_user 
        inner join profile_table c on a.id_user_friend = c.id_user
        inner join list_friend_status d on a.id_list_friend_status = d.id_list_friend_status where b.id_user = '.$id_user.'
        ) b on a.id_user = b.id_user_friend
        where a.id_active_status = 1 and a.id_user <> '.$id_user.' and (a.fullname like "%'.$username.'%" or c.username like "%'.$username.'%")';
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;

    }
    public function check_team($id_user,$id_friend){
        $condition  = array(
            'id_user'       =>$id_user,
            'id_user_friend'=>$id_friend
        );
        $this->db->select('*');
        $this->db->from('list_friend a');
        $this->db->join('list_friend_status b','b.id_list_friend_status=a.id_list_friend_status');
        $this->db->where($condition);
        $result     = $this->db->get()->result_array();
        return $result;
    }
    public function add_team($forme,$forteam){
        $this->db->insert('list_friend',$forme);
        $this->db->insert('list_friend',$forteam);

    }
    public function follow_team($forme,$forteam,$update){
        $this->db->set($update);
        $this->db->where($forme);
        $this->db->update('list_friend');
        $this->db->set($update);
        $this->db->where($forteam);
        $this->db->update('list_friend');

    }

}

/* End of file Team_model.php */
