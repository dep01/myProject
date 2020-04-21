
<h1 class="h3 mb-2 text-gray-800">MyJob Settings</h1>
<a href="<?php echo base_url();?>index.php/Jobadd" class="btn btn-dark padding-card">Add new job setting</a>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-dark">MyJob</h6>
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
                         <a class="btn btn-dark text-white btn-sm" href="<?php echo base_url();?>index.php/Updatejob/<?php echo $list['id_jobbase']; ?>" style="text-decoration: none;">Update</a> 
                         <a data-toggle="modal" data-target="#DeleteModal<?php echo $list['id_jobbase']?>" class="btn btn-secondary text-white btn-sm " style="text-decoration: none;">Delete</a>
                      </td> 
                    </tr>
                         <?php include('inc/Delete_modal.php')?>
                    <?php endforeach;?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
   <!-- End Of Delete Modal-->
