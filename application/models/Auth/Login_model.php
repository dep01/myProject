

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function Validate($query){
        $return=array(
            "msg"=>"user not found",
            "status"=>0,
            "data"=>""
        );
        $data = $this->db->query($query);
        $result = $data->result_array();
        if ($result){
            $id_user = array(
                'id_user'=>$result[0]['id_user']);
            $data = $this->db->get_where('profile_table', $id_user);
            $result = $data->result_array();
            if ($result){
                $return=array(
                    "msg"=>"User found",
                    "status"=>2,
                    "data"=>$result[0]
                );
            }else{
                $return=array(
                    "msg"=>"Complete your profile",
                    "status"=>1,
                    "data"=>$id_user
                );
            }
        }else{
            $return=array(
                "msg"=>"user not found",
                "status"=>0,
                "data"=>""
            );
           
            
        }
        // if (empty($result)){
        //         echo "
        //         <script>
        //         alert('User not found');
        //         </script>
        //         ";
            
        // }else{
        //     $id_user = array(
        //         'id_user'=>$result[0]['id_user']);
        //     $data = $this->db->get_where('profile_table', $id_user);
        //     $result = $data->result_array();
        //     if (empty($result)){
        //         $return = array(
        //             'return'=>1,
        //             'id_user'=>$id_user['id_user']
        //         );
        //     }else{
        //         $return = 2;
        //     }
            
        // }
        return $return;
    }

}

/* End of file Login_model.php */

?>