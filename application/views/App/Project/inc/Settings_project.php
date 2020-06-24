<div class="card shadow mb-4">
   <div class="d-flex flex-row">
    <div class="flex-column w-50 align-content-center">
       <div class="m-2">
          <h4><span class="badge badge">Project name</span></h4>
          <h4><span class="badge badge-light"><?php echo $projectlist['project_name']; ?></span></h4>
          <h4><span class="badge badge">Project fee</span></h4>
          <h4><span class="badge badge-light"><?php echo Formatcurrency($projectlist['project_fee'])  ; ?></span></h4>
          <h4><span class="badge badge">Total team</span></h4>
          <h4><span class="badge badge-light"><?php echo $total_team; ?></span></h4>
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
                  <th >Job base</th>
                  <th style="text-align:center">Fee</th>
                  <th style="text-align:right">Percentage clear</th>
                  <th style="text-align:center">Action</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach($teams as $teamlist): ?>
                  <tr>
                     <td><?php echo $teamlist['fullname']; ?></td>
                     <td><?php echo $teamlist['jobbase']; ?></td>
                     <td align='right'><?php echo Formatcurrency($teamlist['fee']); ?></td>
                     <td align='right'><?php echo ($teamlist[0] > 0 ?Formatcurrency($teamlist[0]).'%':''); ?></td>
                     <td align='right'>
                     <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class=" btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-briefcase"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                           <?php foreach($joblist as $listjob): ?>
                              <a class="dropdown-item" href="<?php echo base_url('index.php/AddJobbase/'.$projectlist['id_project'].'/'.$listjob['id_jobbase'].'/'.$teamlist['id_user'].'/'.$listjob['percentageFee']); ?>"><?php echo $listjob['jobbase'] ?></a>
                           <?php endforeach;?>
                        </div>
                     </div>
                     <?php if($teamlist['jobbase']){ ?>
                        <a class="rounded-circle btn btn-secondary text-white btn-sm" data-placement="top" title="Add task"  href="<?php echo base_url('index.php/AddJobProject/'.$teamlist['id_project'].'/'.$teamlist['id_user']);?>" style="text-decoration: none;">
                           <i class="fas fa-tasks"></i>
                        </a>
  
                     <?php } ;?>  
                          
                     </td>
                  </tr>
               <?php endforeach;?>
            </tbody>
         </table>
      </div>
   </div>
</div>