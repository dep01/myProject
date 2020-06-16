<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {
    
public function __construct(){
    parent::__construct();
    $this->load->model('App/Project_model','Project');
    $this->load->model('Auth/Login_model','Login');
    $this->load->model('App/Profile_model','Profile');
    $this->load->model('App/Team_model','Team');
    $this->load->model('App/Job_model','Job');
    $this->load->library('pdf');
    $sess   = $this->session->userdata('username');
    if(!$sess){
        redirect('index.php/Login');
    };
}
    public function project_create(){
        $mydata         = $this->session->userdata();
        $id_user        = array('a.id_user'=> $mydata['id_user']);
        $profile        = $this->Profile->get_my_profile($id_user);
        $data['list']   = $profile[0];
        $data['content']='App/Project/inc/project_create';
        $data['title']  ='Create Project';
        $data['following']    = $profile['following'] ;
        $data['newproject']   = $profile['newproject'] ;
        $data['total_notify'] = $profile['total_notify'] ;
        $this->load->view('App/Home/Home',$data);
    }
    public function save_new_project(){
        $mydata         = $this->session->userdata();
        if($_POST['projectstart']==date("Y-m-d")){
            $id_project_status = 2;
        }else{
            $id_project_status = 1;
        };
        $date   =date_create($_POST['projectstart']);
        $com    = $_POST['projectdeadline'];
        date_add($date,date_interval_create_from_date_string("$com days"));
        $project['id_user']             = $mydata['id_user'];
        $project['project_name']        = $_POST['projectname'];
        $project['project_fee']         = $_POST['projectfee'];
        $project['project_start']       = $_POST['projectstart'];
        $project['project_deadline']    = $_POST['projectdeadline'];
        $project['id_project_status']   = $id_project_status;
        $project['project_end']         = date_format($date,"Y-m-d");
        $this->Project->save_new_project($project);
        $this->Project->get_id_new_project($project);
        redirect('index.php/Home','refresh');
        
    }
    public function manage_project(){
        $mydata         = $this->session->userdata();
        $id_user        = array('a.id_user'=> $mydata['id_user']);
        $profile        = $this->Profile->get_my_profile($id_user);
        $list           = $this->Project->manage_project($mydata['id_user']);
        $projectlist=array();
        foreach ($list as $plist):
            $plist['teamlist'] = $this->Team->add_team_project($mydata['id_user'],$plist['id_project']);
            array_push($projectlist, $plist);
        endforeach;
        // print_r($projectlist);die;
        $cek['list']    = $profile[0];
        $cek['content'] ='App/Project/inc/Manage_project';
        $cek['title']   ='MyProject';
        $cek['projectlist']= $projectlist;
        $cek['following']  = $profile['following'] ;
        $cek['newproject']   = $profile['newproject'] ;
        $cek['total_notify'] = $profile['total_notify'] ;
        // print_r($cek);die;
        $this->load->view('App/Home/Home',$cek);

    }
    public function add_team(){
        if(!empty($this->input->post('mycheck'))){
            foreach ( $this->input->post('mycheck') as $obj){
                     $data = array(
                         'id_user'               => $obj,
                         'id_project'            => $this->input->post('idproject'),
                         'id_project_team_status'=>1
                     );
                     $this->Project->add_team($data);
                }
            }
        redirect('index.php/ManageMyProject');
    }
    public function add_job(){
        $mydata         = $this->session->userdata();
        $id_user        = array('a.id_user'=> $mydata['id_user']);
        $user_id        = array('id_user'=> $mydata['id_user']);
        $profile        = $this->Profile->get_my_profile($id_user);
        $list           = $this->Project->manage_project($mydata['id_user']);
        $myjob          = $this->Job->get_my_job($user_id);
        $cek['list']    = $profile[0];
        $cek['content'] ='App/Project/inc/Add_job';
        $cek['title']   ='MyProject';
        $cek['myjob']= $myjob;
        $cek['following']= $profile['following'] ;
        $cek['newproject']   = $profile['newproject'] ;
        $cek['total_notify'] = $profile['total_notify'] ;
        print_r($cek);die;
        $this->load->view('App/Home/Home',$cek);
    }
    public function update_project_status(){
        $mydata         = $this->session->userdata();
        $status_project = $this->uri->segment('3');
        $id_project = $this->uri->segment('2');
        if($status_project==1){
            $query = 'update project set id_project_status = 2,actual_start=curdate() where id_project='.$id_project ;
        }else{
            $query = 'update project set id_project_status = 3,actual_finish=curdate(),actual_timeline = datediff(curdate(),actual_start) where id_project='.$id_project;
        }
        $this->db->query($query);
        redirect('index.php/ManageMyProject');
    }
    public function print(){

        $mydata         = $this->session->userdata();
        $id_user        = array('a.id_user'=> $mydata['id_user']);
        $list           = $this->Project->manage_project($mydata['id_user']);
        // print_r($list);die;
        $cek['header'] = array('iduser','idproject','nama project','tanggal mulai','tanggal selesai','test','test','test','test','test','test','test','test','test');
        $cek['print_data']= $list;
        $data = $this->load->view('Print_docs', $cek, TRUE);
        $mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($data);
		$mpdf->Output('nama.pdf','I');
    }
    public function project_settings(){
        $mydata         = $this->session->userdata();
        $id_project     = $this->uri->segment('2');
        $id_user        = array('id_user'          => $mydata['id_user'],
                                'id_project'       => $id_project
                    );
        $data           = $this->Project->is_myproject($id_user);
        if ($data){
            $total              = $this->Project->count_team($id_project);
            $profile            = $this->Profile->get_my_profile(['a.id_user'=>$mydata['id_user']]);
            $cek['projectlist'] = $data[0];
            $cek['list']        = $profile[0];
            $cek['content']     ='App/Project/inc/Settings_project';
            $cek['title']       ='MyProject';
            $cek['total_team']  = $total[0]['total'];
            $cek['following']   = $profile['following'] ;
            $cek['newproject']   = $profile['newproject'] ;
            $cek['total_notify'] = $profile['total_notify'] ;
            // print_r($cek); die;
            $this->load->view('App/Home/Home',$cek);
        }else{
            redirect('index.php/ManageMyProject');
        };
    }
    
}

/* End of file Project.php */
?>
