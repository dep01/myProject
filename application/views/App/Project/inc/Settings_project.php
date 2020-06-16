<div class="card shadow mb-4">
   <div class="d-flex flex-row">
    <div class="flex-column w-50 align-content-center">
       <div class="">
          <h4><span class="badge badge-light">Project name     : <?php echo $projectlist['project_name']; ?></span></h4>
          <h4><span class="badge badge-light">Project fee      : <?php echo number_format($projectlist['project_fee'], 0, ',', '.')  ; ?></span></h4>
          <h4><span class="badge badge-light">Total team       : <?php echo $total_team; ?></span></h4>
       </div>
    </div>  
    <div class="flex-column w-50 align-content-center">
       <div class="">
          <h4><span class="badge badge-light">Project start    : <?php echo $projectlist['project_start']; ?></span></h4>
          <h4><span class="badge badge-light">Project end      : <?php echo $projectlist['project_end']; ?></span></h4>
          <h4><span class="badge badge-light">Project deadline : <?php echo $projectlist['project_deadline']; ?></span></h4>
       </div>
    </div>  
   </div>

   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
               <tr>
                  <th>Team</th>
                  <th>Job base</th>
                  <th>Job detail</th>
                  <th>Job start</th>
                  <th>Job finished</th>
                  <th>Deadline</th>
               </tr>
            </thead>
            <tbody>
            </tbody>
         </table>
      </div>
   </div>
</div>