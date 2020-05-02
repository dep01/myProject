
<div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          YOUR PROJECT
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php echo $project_count['project_total'] ?>
                      </div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-history fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          FINISHED
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php echo $project_count['project_finished'] ?>
                      </div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-check-double fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          ON PROGRESS
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php echo $project_count['project_progress'] ?>
                      </div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-clock fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="column">
<div class="m-1 flex-row d-flex">
<a href="<?php echo base_url('index.php/CreateProject'); ?>" class="m-2 btn btn-dark">Create new project</a>
<a href="<?php echo base_url('index.php/ManageMyProject'); ?>" class="m-2 btn btn-dark">Manage MyProject</a>
</div>
<?php if($projectlist){ ?>
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-dark">MyProject</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Project</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($projectlist as $list): ?>
                        <tr>
                            <td>
                            <?php include('inc/Project_card.php'); ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
<?php }else { ?>
    <h1 class="h3 mt-5 d-flex justify-content-center text-gray-800">Create your first project</h1>
<?php } ;?>
</div>
