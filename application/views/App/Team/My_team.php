<h1 class="h3 mb-2 text-gray-800">My Team</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">My Team</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Name</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach($listteam as $list): ?>
                    <tr>
                      <td><?php echo str_replace("''","'",$list['fullname']); ?></td>
                      <td><?php echo $list['list_friend_status']; ?></td>
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

