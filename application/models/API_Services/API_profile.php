<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class API_profile extends CI_Model {

    public function get_profile(){
        $data = $this->db->get('profile_table');
        return $data->result();
    }

}

/* End of file API_profile.php */
