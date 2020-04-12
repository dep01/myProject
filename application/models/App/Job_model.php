
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_model extends CI_Model {

    public function get_my_job($user_id){
        $query = $this->db->get_where('jobbase_table', $user_id);
        $result = $query->result_array();
        // print_r($result);
        // die;
        return $result;
    }
    public function Add_job($data){
        $this->db->insert('jobbase_table', $data);
    }
    public function Update_job($data,$condition){
        $this->db->where($condition);
        $this->db->update('jobbase_table', $data);
    }



}

/* End of file ModelName.php */
