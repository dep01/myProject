<div class="card shadow mb-4">
   <div class="d-flex flex-row">
    <div class="flex-column w-50 align-content-center">
       <div class="m-2">
          <h4><span class="badge badge">Project name</span></h4>
          <h4><span class="badge badge-light"><?php echo $projectlist['project_name']; ?></span></h4>
          <h4><span class="badge badge">Project fee</span></h4>
          <h4><span class="badge badge-light"><?php echo Formatcurrency($projectlist['project_fee'])  ; ?></span></h4>
          <h4><span class="badge badge">My Fee</span></h4>
          <h4><span class="badge badge-light"><?php 
            foreach($teams as $t): 
                if($t['id_user']==$list['id_user']){
                  echo Formatcurrency($t['fee']);
                }
            endforeach;
          ?></span></h4>
          <h4><span class="badge badge-light">Total team       : <?php echo $total_team; ?></span></h4>

       </div>
    </div>  
    <div class="flex-column w-50 align-content-center">
       <div class="m-2">
          <h4><span class="badge badge">Project start</span></h4>
          <h4><span class="badge badge-light"><?php echo  FormatDate($projectlist['project_start']); ?></span></h4>
          <h4><span class="badge badge">Project end</span></h4>
          <h4><span class="badge badge-light"><?php echo FormatDate($projectlist['project_end']); ?></span></h4>
          <h4><span class="badge badge">Project deadline</span></h4>
          <h4><span class="badge badge-light"><?php echo $projectlist['project_deadline']; ?> Days</span></h4>
       </div>
    </div>  
   </div>

   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-hover" width="100%" cellspacing="0">
            <thead class="thead-dark">
               <tr>
                  <th>Team</th>
                  <th>Job</th>
                  <th>Deadline</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach($teams as $teamlist): ?>
                  <tr>
                     <td><?php echo $teamlist['fullname']; ?></td>
                     <td><?php echo $teamlist['jobbase']; ?></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <?php foreach($joblist as $job): ?>
                        <?php if ($teamlist['id_user']==$job['id_user']){ ?>
                          <tr>
                          <td></td>
                          <td><?php echo $job['job_detail']; ?></td>
                          <td><?php echo FormatDate($job['finish_job']); ?></td>
                          <td><?php echo $job['job_status']; ?></td>
                          <?php if($job['id_user']==$list['id_user']){ ?>
                          <td>
                          <a class="rounded-circle btn btn-secondary text-white btn-sm <?php echo ($job['id_job_status']==3?'disabled':'');?>"data-placement="top" title="Clear ?"  href="<?php echo base_url('index.php/ClearJob/'.$projectlist['id_project'].'/'.$job['id']);?>" style="text-decoration: none;">
                            <i class="fas fa-check"></i>
                          </a>
                          </td>
                          <?php } else{?>
                          <td></td>
                          <?php };?>
                          </tr>
                        <?php };?>
                     <?php endforeach;?>
                     <tr><td></td><td></td><td></td><td></td><td></td></tr>
                  </tr>
               <?php endforeach;?>
            </tbody>
         </table>
      </div>
   </div>
</div>