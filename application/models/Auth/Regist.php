<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends CI_Model {

    public function check_username($username){
        
        $this->db->where('username', $username);
        $this->db->get('user_table');
        

    }

}

/* End of file Regist.php */

?>