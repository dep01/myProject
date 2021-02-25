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
        $id_project     = $this->uri->segment('2');
        $id_friend      = $this->uri->segment('3');
        $id_user        = array('id_user'          => $mydata['id_user'],
                                'id_project'       => $id_project
                    );
        $data           = $this->Project->is_myproject($id_user);
        if ($data){
            $condition          =array(
                                'id_project'            =>$id_project,
                                'a.id_user'               =>$id_friend,
                                'id_project_team_status'=>2
                    );
            $teams              = $this->Project->get_team_detail($condition);
            if($teams){
                $profile            = $this->Profile->get_my_profile(['a.id_user'=>$mydata['id_user']]);
                $user_id    = array(
                    'id_user'           =>$mydata['id_user'],
                    'id_active_status'  =>1
                );
                $condition          =array(
                    'id_project'            =>$id_project,
                    'a.id_user'               =>$id_friend,
                 );
                $list               =$this->Project->get_job_detail($condition);
                // print_r($list);die;
                $cek['projectlist'] = $data[0];
                $cek['list']        = $profile[0];
                $cek['content']     ='App/Project/inc/Add_job';
                $cek['title']       ='MyProject';
                $cek['teams']       = $teams[0];
                $cek['following']   = $profile['following'] ;
                $cek['newproject']  = $profile['newproject'] ;
                $cek['total_notify']= $profile['total_notify'] ;
                $cek['joblist']     = $list;
                // print_r($cek); die;
                $this->load->view('App/Home/Home',$cek);
            }else{
                redirect('index.php/Settings'.$id_project);
            }
            
        }else{
            redirect('index.php/ManageMyProject');
        };
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
        $mydata   = $this->session->userdata();
        $id_user  = array('a.id_user'=> $mydata['id_user']);
        $list     = $this->Project->manage_project($mydata['id_user']);
        $header   = array('iduser','idproject','nama project','tanggal mulai','tanggal selesai','test','test','test','test','test','test','test','test','test');
        print_data($header,$list,'Document');
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
            $user_id    = array(
                'id_user'           =>$mydata['id_user'],
                'id_active_status'  =>1
            );
            $list               =$this->Job->get_my_job($user_id);
            $cek['projectlist'] = $data[0];
            $cek['list']        = $profile[0];
            $cek['content']     ='App/Project/inc/Settings_project';
            $cek['title']       ='MyProject';
            $cek['total_team']  = count($total);
            $cek['teams']       = $total;
            $cek['following']   = $profile['following'] ;
            $cek['newproject']  = $profile['newproject'] ;
            $cek['total_notify']= $profile['total_notify'] ;
            $cek['joblist']     = $list;
            // print_r($cek); die;
            $this->load->view('App/Home/Home',$cek);
        }else{
            redirect('index.php/ManageMyProject');
        };
    }
    public function print_all_task(){
        $mydata         = $this->session->userdata();
        $id_project     = $this->uri->segment('2');
        $id_user        = array('b.id_user'          => $mydata['id_user'],
                                'a.id_project'       => $id_project
                    );
        $data           = $this->Project->is_myproject_task($id_user);
        if ($data){
            $total              = $this->Project->count_team($id_project);
            $profile            = $this->Profile->get_my_profile(['a.id_user'=>$mydata['id_user']]);
            $user_id    = array(
                'id_user'           =>$mydata['id_user'],
                'id_active_status'  =>1
            );
            $list               =$this->db->query('select a.*,b.job_status from project_detail a inner join job_status b on a.id_job_status = b.id_job_status where id_project = '.$id_project)->result_array();
            $cek['projectlist'] = $data[0];
            $cek['total_team']  = count($total);
            $cek['teams']       = $total;
            $cek['joblist']     = $list;
            $print = $this->load->view('Print_task', $cek, TRUE);
            $mpdf = new \Mpdf\Mpdf();
            // print_r($cek);die;
            $mpdf->WriteHTML($print);
            $mpdf->Output($data[0]['project_name'].'.pdf','I');
        }else{
            redirect('index.php/Home');
        };
    }
    public function add_jobbase(){
        $mydata         = $this->session->userdata();
        $id_project     = $this->uri->segment('2');
        $id_jobbase     = $this->uri->segment('3');
        $id_user        = $this->uri->segment('4');
        $percentage     = $this->uri->segment('5');
        $percentagecek  = $this->uri->segment('5');
        $cek            = $this->db->query('select distinct id_jobbase,percentageFee from project_team where id_project ='.$id_project)->result_array();
        foreach ($cek as $c):
            if ($id_jobbase == $c['id_jobbase'] && $percentage ==$c['percentageFee']){

            }else{
                $percentagecek  = $c['percentageFee'] + $percentagecek; 
            }
        endforeach;
        if ($percentagecek > 100){
            $this->session->set_flashdata('notif','Your total of percentage is '.$percentagecek.'%. Total cannot be over 100%');
            redirect('index.php/Settings/'.$id_project);
        }else{
            $this->db->set(array('percentageFee'=> $percentage,'id_jobbase'=>$id_jobbase));
            $this->db->where(array('id_user'=> $id_user,'id_project'=>$id_project));
            $this->db->update('project_team');
            $projectfee = $this->db->query('select project_fee from project where id_project = '.$id_project)->result_array();
            // print_r($projectfee[0]['project_fee']);die;
            $cek            = $this->db->query('select distinct id_jobbase,percentageFee from project_team where id_project ='.$id_project)->result_array();
            foreach ($cek as $e):
                $totaljob = $this->db->query('select count(*)t from project_team where id_project ='.$id_project.' and id_jobbase = '.$e['id_jobbase'].' and percentageFee = '.$e['percentageFee'])->result_array();
                $fee = $projectfee[0]['project_fee'] * $e['percentageFee'] / 100 / $totaljob[0]['t'];
                // print_r($fee);die;
                $this->db->set(array('fee'=> $fee));
                $this->db->where(array('id_project'=>$id_project,'id_jobbase'=>$e['id_jobbase'],'percentageFee'=>$e['percentageFee']));
                $this->db->update('project_team');
            endforeach;
            $totalorang = $this->db->query('select count(*)t from project_team where id_project ='.$id_project)->result_array();
            $tambahan = (100 - $percentagecek)/100 * $projectfee[0]['project_fee'] / $totalorang[0]['t'] ;
            $this->db->query('update project_team set fee = fee +'.$tambahan.' where id_project ='.$id_project);
            redirect('index.php/Settings/'.$id_project);
        }
        // $array = array(
        //     $id_project,$id_jobbase,$id_user,$percentage
        // );
        // print_r($array);die;
    }
    public function save_job_project(){
        $id_project = $_POST['id_project'];
        $id_user = $_POST['id_user'];
        $job = $_POST['job'];
        $job_start = $_POST['job_start'];
        $deadline = $_POST['deadline'];
        $date   =date_create($job_start);
        date_add($date,date_interval_create_from_date_string("$deadline days"));
        $this->db->insert('project_detail',array(
            'id_project'=>$id_project,
            'id_user'   =>$id_user,
            'job_detail'=>$job,
            'start_job' =>$job_start,
            'finish_job'=>date_format($date,"Y-m-d"),
            'deadline_job'=>$deadline,
            'id_job_status'=>2
        ));
        redirect('index.php/AddJobProject/'.$id_project.'/'.$id_user);
        
    }
    public function delete_job(){
        $id_project  = $this->uri->segment('2');
        $id_user     = $this->uri->segment('3');
        $id          = $this->uri->segment('4');
        $this->db->delete('project_detail',array('id'=>$id));
        redirect('index.php/AddJobProject/'.$id_project.'/'.$id_user);
        
    }
    public function project_task(){
        $mydata         = $this->session->userdata();
        $id_project     = $this->uri->segment('2');
        $id_user        = array('b.id_user'          => $mydata['id_user'],
                                'a.id_project'       => $id_project
                    );
        $data           = $this->Project->is_myproject_task($id_user);
        if ($data){
            $total              = $this->Project->count_team($id_project);
            $profile            = $this->Profile->get_my_profile(['a.id_user'=>$mydata['id_user']]);
            $user_id    = array(
                'id_user'           =>$mydata['id_user'],
                'id_active_status'  =>1
            );
            $list               =$this->db->query('select a.*,b.job_status from project_detail a inner join job_status b on a.id_job_status = b.id_job_status where id_project = '.$id_project)->result_array();
            $cek['projectlist'] = $data[0];
            $cek['list']        = $profile[0];
            $cek['content']     ='App/Project/inc/Project_task';
            $cek['title']       ='MyProject';
            $cek['total_team']  = count($total);
            $cek['teams']       = $total;
            $cek['following']   = $profile['following'] ;
            $cek['newproject']  = $profile['newproject'] ;
            $cek['total_notify']= $profile['total_notify'] ;
            $cek['joblist']     = $list;
            // print_r($cek); die;
            $this->load->view('App/Home/Home',$cek);
        }else{
            redirect('index.php/Home');
        };
    }
    public function clear_job(){
        $id_project     = $this->uri->segment('2');
        $id             = $this->uri->segment('3');
        // $this->db->set(array('id_job_status'=> 3));
        // $this->db->where(array('id'=> $id));
        // $this->db->update('project_detail');
        $this->db->query('update project_detail set id_job_status = 3,actual_finish = curdate(),actual_timeline = datediff(curdate(),start_job) where id='.$id);
        redirect('index.php/Mytask/'.$id_project);
    }
    
}

/* End of file Project.php */
?>
