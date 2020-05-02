<h1 class="h3 mb-2 text-gray-800">My Team</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">My Team</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Profile</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Profile</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach($listteam as $list): ?>
                    <tr>
                      <td><?php echo $list['fullname']; ?></td>
                      <td>
                        <a href="<?php echo base_url('index.php/AddTeam/'.$list['id_user_friend']); ?>"  class="btn btn<?php echo ($list['id_list_friend_status']==1 || $list['id_list_friend_status']==3 )?'-white text-dark font-weight-bold disabled':'-dark text-white'; ?>"><?php echo ($list['id_list_friend_status'])?$list['list_friend_status']:'Follow'; ?></a> 
                      </td>
                      <td><a href="<?php echo base_url('index.php/ProfileTeam/'.$list['id_user_friend']); ?>"class="btn btn-secondary text-white">View Profile</a></td>
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

