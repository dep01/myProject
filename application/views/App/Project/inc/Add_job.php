
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
                      <th>Project start</th>
                      <th>Project start</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($myjob as $list): ?>
                        <tr>
                            <td><?php echo $list['id_jobbase']; ?></td>
                            <td><?php echo $list['jobbase']; ?></td>
                            <td><?php echo $list['percentageFee']; ?></td>
                        </tr>
                    <?php endforeach;?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
  <!-- Delete Modal-->