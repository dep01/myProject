<div class="card shadow mb-4">
<table border="5"  width="100%" cellspacing="7">
   <tr>
   <th style="text-align:left"><h4><span class="badge badge">Project name</span></h4></th>
   <th style="text-align:left"><h4><span class="badge badge-light">:<?php echo $projectlist['project_name']; ?></span></h4></th>
   <th style="text-align:left"><h4><span class="badge badge">Project start</span></h4></th>
   <th style="text-align:left"><h4><span class="badge badge-light">:<?php echo  FormatDate($projectlist['project_start']); ?></span></h4></th>
   </tr>
   <tr>
   <th style="text-align:left"><h4><span class="badge badge">Project fee</span></h4></th>
   <th style="text-align:left"><h4><span class="badge badge-light">:<?php echo Formatcurrency($projectlist['project_fee'])  ; ?></span></h4></th>
   <th style="text-align:left"><h4><span class="badge badge">Project end</span></h4></th>
   <th style="text-align:left"><h4><span class="badge badge-light">:<?php echo FormatDate($projectlist['project_end']); ?></span></h4></th>
   </tr>
   <tr>
   <th style="text-align:left"><h4><span class="badge badge">Total team</span></h4></th>
   <th style="text-align:left"><h4><span class="badge badge-light">:<?php echo $total_team; ?></span></h4></th>
   <th style="text-align:left"><h4><span class="badge badge">Project deadline</span></h4></th>
   <th style="text-align:left"><h4><span class="badge badge-light">:<?php echo $projectlist['project_deadline']; ?> Days</span></h4></th>
   </tr>
   <tr><th></th></tr>
   <tr><th></th></tr>
   <tr><th></th></tr>
   <tr><th></th></tr>
</table>
   <div class="d-flex flex-row">
    <div class="flex-column w-50 align-content-center">
       <div class="m-2">

    </div>  
    <div class="flex-column w-50 align-content-center">
       <div class="m-2">
 </div>
    </div>  
   </div>

   <div class="card-body">
      <div class="table-responsive" >
         <table  border="5"  width="100%" cellspacing="7">
            <thead>
               <tr>
                  <th style="text-align:left">Team</th>
                  <th style="text-align:left">Job</th>
                  <th style="text-align:left">Deadline</th>
                  <th style="text-align:center">Fee</th>
                  <th style="text-align:center">Status</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach($teams as $teamlist): ?>
                  <tr>
                     <td align='left'><?php echo $teamlist['fullname']; ?></td>
                     <td align='left'><?php echo $teamlist['jobbase']; ?></td>
                     <td></td>
                     <td align='right'><?php echo Formatcurrency($teamlist['fee']); ?></td>
                     <td></td>
                     <?php foreach($joblist as $job): ?>
                        <?php if ($teamlist['id_user']==$job['id_user']){ ?>
                          <tr>
                          <td align='left'></td>
                          <td align='left'><?php echo $job['job_detail']; ?></td>
                          <td align='left'><?php echo FormatDate($job['finish_job']); ?></td>
                          <td></td>
                          <td align='center'><?php echo $job['job_status']; ?></td>
                          </tr>
                        <?php };?>
                     <?php endforeach;?>
                     <tr><td></td><td></td><td></td><td></td></tr>
                  </tr>
               <?php endforeach;?>
            </tbody>
         </table>
      </div>
   </div>
</div>