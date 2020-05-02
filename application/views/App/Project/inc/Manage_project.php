       <style>
       .w-10{
         width : 30px;
         height: 30px
       }
       </style>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-dark">MyProject</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Project name</th>
                      <th>Project fee</th>
                      <th>Project start</th>
                      <th>Project finish</th>
                      <th>Project deadline</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($projectlist as $list): ?>
                        <tr>
                            <td><?php echo $list['project_name']; ?></td>
                            <td><?php echo $list['project_fee']; ?></td>
                            <td><?php echo $list['project_start']; ?></td>
                            <td><?php echo $list['project_end']; ?></td>
                            <td><?php echo $list['project_deadline']; ?> Days</td>
                            <td>
                                <i class="fas fa-fw fa-clock" data-placement="top" title="<?php echo $list['id_project_status']==1?$list['project_status']:'';?>"></i>
                                <i class="fas fa-fw fa-hourglass-start"<?php echo $list['id_project_status']>1?'':'style="color:#DDDDDD;"';?>data-placement="top" title="<?php echo $list['id_project_status']==2?$list['project_status']:'';?>"></i>
                                <i class="fas fa-fw fa-check" <?php echo $list['id_project_status']>2?'':'style="color:#DDDDDD;"';?>  data-placement="top" title="<?php echo $list['id_project_status']==3?$list['project_status']:'';?>"></i>
                            </td>
                            <td>
                            <a class="w-10 rounded-circle btn btn-secondary text-white btn-sm <?php echo $list['id_project_status']>=3?'disabled':''; ?> "  data-placement="top" title="<?php echo $list['id_project_status']==1?'Start Project':'Finish'; ?>" href="" style="text-decoration: none;">
                            <i class="fas fa-<?php echo $list['id_project_status']==1?'play':'stop'; ?>"></i>
                            </a>
                            <a class="w-10 rounded-circle btn btn-secondary text-white btn-sm" data-toggle="modal"data-target="#Addteam<?php echo $list['id_project']?>" data-placement="top" title="Add team" href="#" style="text-decoration: none;">
                            <i class="fas fa-user-plus"></i>
                            </a>
                            <a class="w-10 rounded-circle btn btn-secondary text-white btn-sm"data-placement="top" title="Add job"  href="" style="text-decoration: none;">
                            <i class="fas fa-briefcase"></i>
                            </a>
                            </td>
                        </tr>
                        <?php include('Add_team.php');?>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
  <!-- Delete Modal-->