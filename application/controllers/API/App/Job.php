<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {
public function __construct(){
    parent:: __construct();
    $this->load->model('App/Job_model','Job');
    $this->load->model('App/Profile_model','Profile');
}
    public function index(){
        $token = json_decode($this->input->raw_input_stream, true);
        $decrypt=token_decription($token['token']);
        if($decrypt['code']==200){
            $id = $decrypt['result']['id_user'];
            $user_id    = array(
                        'id_user'           =>$id,
                        'id_active_status'  =>1
                    );
            $list           =$this->Job->get_my_job($user_id);
            $return = array(
                'code' => 200,
                'message'=> 'Job base',
                'result'=> $list
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);
        }else{
            $return = array(
                'code' => 404,
                'message'=> 'rejected',
                'result'=>null
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);
        }
    }
    public function saveAdd(){
        $token = json_decode($this->input->raw_input_stream, true);
        $decrypt=token_decription($token['token']);
        if($decrypt['code']==200){
            $id = $decrypt['result']['id_user'];
            $fee = $token['fee'];
            $job = $token['job'];
            if ($fee > 100){
                $return = array(
                    'code' => 202,
                    'message'=> 'Maximum percentage is 100%',
                    'result'=> null
                );
                header('Content-Type: application/json');
                echo json_encode($return,true);die;
            }else{
                $insert['percentageFee']    = $fee;
                $insert['jobbase']          = $job;
                $insert['id_user']          = $id;
                $insert['id_active_status'] = 1;
                $model          = $this->Job->Add_job($insert);
                $return = array(
                    'code' => 200,
                    'message'=> 'success',
                    'result'=> null
                );
                header('Content-Type: application/json');
                echo json_encode($return,true);die;
            }
        }else{
            $return = array(
                'code' => 404,
                'message'=> 'rejected',
                'result'=>null
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);
        }
    }
    public function saveUpdate(){
        $token = json_decode($this->input->raw_input_stream, true);
        $decrypt=token_decription($token['token']);
        if($decrypt['code']==200){
            $id = $decrypt['result']['id_user'];
            $fee = $token['fee'];
            $job = $token['job'];
            $idjob = $token['id_job'];
            if ($fee > 100){
                $return = array(
                    'code' => 202,
                    'message'=> 'Maximum percentage is 100%',
                    'result'=> null
                );
                header('Content-Type: application/json');
                echo json_encode($return,true);die;
            }else{
                $insert['percentageFee']        = $fee;
                $insert['jobbase']              = $job;
                $condition['id_user']           = $id;
                $condition['id_jobbase']        =$idjob;
                $condition['id_active_status']  = 1;
                $model          = $this->Job->Update_job($insert,$condition);
                $return = array(
                    'code' => 200,
                    'message'=> 'success',
                    'result'=> null
                );
                header('Content-Type: application/json');
                echo json_encode($return,true);die;
            }
        }else{
            $return = array(
                'code' => 404,
                'message'=> 'rejected',
                'result'=>null
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);
        }
            
    }
    public function delete(){
        $token = json_decode($this->input->raw_input_stream, true);
        $decrypt=token_decription($token['token']);
        if($decrypt['code']==200){
            $id = $decrypt['result']['id_user'];
            $idjob = $token['id_job'];
            $insert['id_active_status']     = 9;
            $condition['id_user']           = $id;
            $condition['id_jobbase']        = $idjob;
            $condition['id_active_status']  = 1;
            $model = $this->Job->Update_job($insert,$condition);
            $return = array(
                'code' => 200,
                'message'=> 'success',
                'result'=> null
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);die;
        }else{
            $return = array(
                'code' => 404,
                'message'=> 'rejected',
                'result'=>null
            );
            header('Content-Type: application/json');
            echo json_encode($return,true);
        }
    }

}

/* End of file Job_base.php */
?>