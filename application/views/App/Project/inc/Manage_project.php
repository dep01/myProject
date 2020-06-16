
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
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr>
                      <th>Project name</th>
                      <th>Start</th>
                      <th>Finish</th>
                      <th>Deadline</th>
                      <th>Project fee</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($projectlist as $list): ?>
                        <tr>
                            <td><?php echo $list['project_name']; ?></td>
                            <?php if ($list['actual_start']){ ?>
                              <td>
                                  <?php echo $list['project_start'].'(Plan)'; ?><br/>
                                  <?php echo $list['actual_start'].'(Actual)'; ?>
                              </td>
                            <?php }else{ ?>
                              <td>
                                  <?php echo $list['project_start'].'(Plan)'; ?> 
                              </td>
                            <?php }; ?>
                            <?php if ($list['actual_finish']){ ?>
                              <td>
                                  <?php echo $list['project_end'].'(Plan)'; ?><br/>
                                  <?php echo $list['actual_finish'].'(Actual)'; ?>
                              </td>
                            <?php }else{ ?>
                              <td>
                                  <?php echo $list['project_end'].'(Plan)'; ?> 
                              </td>
                            <?php }; ?>
                            <?php if ($list['actual_timeline']){ ?>
                              <td>
                                  <?php echo $list['project_deadline'].' Days(Plan)'; ?><br/>
                                  <?php echo $list['actual_timeline'].' Days(Actual)'; ?>
                              </td>
                            <?php }else{ ?>
                              <td>
                                  <?php echo $list['project_deadline'].' Days(Plan)'; ?> 
                              </td>
                            <?php }; ?>
                            <td class='text-right'><?php echo number_format($list['project_fee'], 0, ',', '.')  ; ?></td>
                            <td>
                                <i class="fas fa-fw fa-clock" data-placement="top" title="<?php echo $list['id_project_status']==1?$list['project_status']:'';?>"></i>
                                <i class="fas fa-fw fa-hourglass-start"<?php echo $list['id_project_status']>1?'':'style="color:#DDDDDD;"';?>data-placement="top" title="<?php echo $list['id_project_status']==2?$list['project_status']:'';?>"></i>
                                <i class="fas fa-fw fa-check" <?php echo $list['id_project_status']>2?'':'style="color:#DDDDDD;"';?>  data-placement="top" title="<?php echo $list['id_project_status']==3?$list['project_status']:'';?>"></i>
                            </td>
                            <td>
                            <a class="w-10 rounded-circle btn btn-secondary text-white btn-sm <?php echo $list['id_project_status']>=3?'disabled':''; ?> "  data-placement="top" title="<?php echo $list['id_project_status']==1?'Start Project':'Finish'; ?>" href="<?php echo base_url('index.php/UpdateStatus/'.$list['id_project'].'/'.$list['id_project_status']) ?>" style="text-decoration: none;">
                            <i class="fas fa-<?php echo $list['id_project_status']==1?'play':($list['id_project_status']==2?'stop':'check'); ?>"></i>
                            </a>
                            <a class="w-10 rounded-circle btn btn-secondary text-white btn-sm <?php echo $list['id_project_status']>=3?'disabled':''; ?> " data-placement="top"title="Add team" data-toggle="modal" data-target="#addteam<?php echo $list['id_project']?>" style="text-decoration: none;">
                            <i class="fas fa-user-plus"></i>
                            </a>
                            <a class="w-10 rounded-circle btn btn-secondary text-white btn-sm <?php echo $list['id_project_status']>=3?'disabled':''; ?> "data-placement="top" title="Settings"  href="<?php echo base_url('index.php/Settings/'.$list['id_project'])?>" style="text-decoration: none;">
                            <i class="fas fa-cogs"></i>
                            </a>
                            <a class="w-10 rounded-circle btn btn-secondary text-white btn-sm"data-placement="top" title="Print document"  href="<?php echo base_url('index.php/Print/'.$list['id_project_status']) ?>" style="text-decoration: none;">
                            <i class="fas fa-print"></i>
                            </a>
                            </td>
                        </tr>
                        <?php include('Add_team.php') ;?>
                    <?php endforeach;?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
  <!-- Delete Modal-->