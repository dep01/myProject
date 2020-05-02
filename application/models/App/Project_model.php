<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {

    public function save_new_project($data){
        $this->db->insert('project',$data);
    }
    public function manage_project($id_user){
        $this->db->select("a.*,b.project_status");
        $this->db->from("project a");
        $this->db->join("project_status b","a.id_project_status = b.id_project_status");
        $this->db->where("a.id_user = $id_user");
        $data = $this->db->get()->result_array(); 
        return $data;
    }
    public function project_list($id_user){
        $this->db->select("a.*,b.project_status,c.fullname");
        $this->db->from("project a");
        $this->db->join("project_status b","a.id_project_status = b.id_project_status");
        $this->db->join("profile_table c","a.id_user = c.id_user");
        $this->db->join("project_team d","a.id_project = d.id_project");
        $this->db->join("project_team_status e","d.id_project_team_status = e.id_project_team_status");
        $this->db->where("d.id_user = $id_user and e.id_project_team_status=3");
        $data = $this->db->get()->result_array(); 
        return $data;
    }
    public function get_id_new_project($condition){
        $model  = $this->db->get_where('project',$condition)->result_array();
        $data   = array(
            "id_user"                   => $model[0]["id_user"],
            "id_project"                => $model[0]["id_project"],
            "id_project_team_status"    => 3,

        );
        $this->db->insert('project_team',$data);
    }
}

/* End of file Project_model.php */
