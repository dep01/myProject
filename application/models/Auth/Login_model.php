

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function Validate($query){
        $data = $this->db->query($query);
        $result = $data->result_array();
        if (empty($result)){
                echo "
                <script>
                alert('User not found');
                </script>
                ";
                redirect('Auth/Login','refresh'); 
            
        }else{
            $id_user = array(
                'id_user'=>$result[0]['id_user']);
            $data = $this->db->get_where('profile_table', $id_user);
            $result = $data->result_array();
            if (empty($result)){
                redirect('Auth/Regist/Profile?id='.$id_user['id_user']); 
            }else{
                echo'ini home';
            }
            
        }
    }

}

/* End of file Login_model.php */

?>