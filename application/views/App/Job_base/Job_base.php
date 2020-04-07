<h1 class="h3 mb-2 text-gray-800">MyJob Settings</h1>
<a href="<?php echo base_url();?>index.php/Jobadd" class="btn btn-primary padding-card">Add new job setting</a>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">MyJob</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Job Base</th>
                      <th>Percentage fee</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Job Base</th>
                      <th>Percentage fee</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach($joblist as $list): ?>

                    <tr>
                      <td><?php echo $list['jobbase']; ?></td>
                      <td><?php echo $list['percentageFee']; ?></td>
                      <td>
                         <a class="btn btn-warning btn-sm" href="<?php echo base_url();?>index.php/Updatejob/<?php echo $list['id_jobbase']; ?>" style="text-decoration: none;">Update</a> 
                         <a data-toggle="modal" data-target="#DeleteModal" class="btn btn-danger btn-sm" style="text-decoration: none;">Delete</a>
                      </td> 
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
  <!-- Delete Modal-->
  <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure to delete this data?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url();?>index.php/deletejob/<?php echo $list['id_jobbase']; ?>">Delete</a>
        </div>
      </div>
    </div>
  </div>
