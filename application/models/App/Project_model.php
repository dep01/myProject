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
        $this->db->where("d.id_user = $id_user and e.id_project_team_status=2");
        $data = $this->db->get()->result_array(); 
        return $data;
    }
    public function get_id_new_project($condition){
        $model  = $this->db->get_where('project',$condition)->result_array();
        $data   = array(
            "id_user"                   => $model[0]["id_user"],
            "id_project"                => $model[0]["id_project"],
            "id_project_team_status"    => 2,

        );
        $this->db->insert('project_team',$data);
    }
    public function is_myproject($id){
        $data = $this->db->get_where('project',$id)->result_array();
        return $data;
    }
    public function is_myproject_task($id){
        $this->db->select("a.*");
        $this->db->from("project a");
        $this->db->join("project_team b","a.id_project = b.id_project");
        $this->db->where($id);
        $data = $this->db->get()->result_array(); 
        return $data;
    }
    public function count_team($id){
        $this->db->select("a.*,c.jobbase,b.fullname");
        $this->db->from("project_team a");
        $this->db->join("profile_table b","a.id_user = b.id_user");
        $this->db->join("jobbase_table c","a.id_jobbase = c.id_jobbase","left");
        $this->db->where('id_project_team_status=2 and id_project ='.$id);
        $data = $this->db->get()->result_array();
        $test = array();
        foreach ($data as $d):
          $r= $this->db->query('select (select count(*)from project_detail where id_user ='.$d['id_user'].' and id_project = '.$id.' and id_job_status = 3 )/(select count(*)from project_detail where id_user ='.$d['id_user'].' and id_project = '.$id.' ) * 100 percent')->result_array();
          array_push($d,$r[0]['percent']);
          array_push($test,$d);
        endforeach; 
        // print_r($percentage);die;
        // $data['percentage']= $percentage;
        return $test;
    }
    public function get_team_detail($id){
        $this->db->select("c.jobbase,b.fullname,a.id_user");
        $this->db->from("project_team a");
        $this->db->join("profile_table b","a.id_user = b.id_user");
        $this->db->join("jobbase_table c","a.id_jobbase = c.id_jobbase");
        $this->db->where($id);
        $data = $this->db->get()->result_array(); 
        return $data;
    }
    public function get_job_detail($id){
        $this->db->select("*");
        $this->db->from("project_detail a");
        $this->db->join("job_status b","a.id_job_status = b.id_job_status");
        $this->db->where($id);
        $data = $this->db->get()->result_array(); 
        return $data;
    }
    public function add_team($data){
        $this->db->insert('project_team',$data);
    }
}

/* End of file Project_model.php */
