<div class="card shadow mb-4">
   <div class="d-flex flex-row">
    <div class="m-2 flex-column w-50 align-content-center">
          <h4><span class="badge badge">Teams</span></h4>
          <h4><span class="badge badge-light"><?php echo $teams['fullname']; ?></span></h4>
          <h4><span class="badge badge">Job base</span></h4>
          <h4><span class="badge badge-light"><?php echo $teams['jobbase']  ; ?></span></h4>
    </div>
    <div class="m-2 d-flex flex-row-reverse w-50 align-content-center">
         <a href="#" data-toggle="modal" data-target="#AddModal" class="m-3 btn btn-dark text-white align-self-center text-center">Add job detail</a>
    </div>
   </div>
   <?php include('Add_job_modal.php')?>

   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-hover" width="100%" cellspacing="0">
            <thead class="thead-dark">
               <tr>
                  <th>Job detail</th>
                  <th>Start</th>
                  <th>Finish</th>
                  <th>Deadline</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach($joblist as $job): ?>
                  <tr>
                     <td><?php echo $job['job_detail']; ?></td>

                        <?php if ($job['actual_start']){ ?>
                          <td>
                             <?php echo format_date($job['start_job']).'(Plan)'; ?><br/>
                             <?php echo format_date($job['actual_start']).'(Actual)'; ?>
                          </td>
                        <?php }else{ ?>
                          <td>
                             <?php echo format_date($job['start_job']); ?> 
                          </td>
                        <?php }; ?>

                        <?php if ($job['actual_finish']){ ?>
                          <td>
                             <?php echo format_date($job['finish_job']).'(Plan)'; ?><br/>
                             <?php echo format_date($job['actual_finish']).'(Actual)'; ?>
                          </td>
                        <?php }else{ ?>
                          <td>
                             <?php echo format_date($job['finish_job']).'(Plan)'; ?> 
                          </td>
                        <?php }; ?>
                        
                        <?php if ($job['actual_timeline']){ ?>
                          <td>
                             <?php echo $job['deadline_job'].'(Plan)'; ?><br/>
                             <?php echo $job['actual_timeline'].'(Actual)'; ?>
                          </td>
                        <?php }else{ ?>
                          <td>
                             <?php echo $job['deadline_job'].'(Plan)'; ?> 
                          </td>
                        <?php }; ?>
                     <td><?php echo $job['job_status']; ?></td>
                     <td>
                        <a class="rounded-circle btn btn-secondary text-white btn-sm" data-placement="top" title="Delete"  href="<?php echo base_url('index.php/DeleteJobDetail/'.$projectlist['id_project'].'/'.$teams['id_user'].'/'.$job['id']);?>" style="text-decoration: none;">
                           <i class="fas fa-trash"></i>
                        </a>    
                     </td>
                  </tr>
               <?php endforeach;?>
            </tbody>
         </table>
      </div>
   </div>
</div>