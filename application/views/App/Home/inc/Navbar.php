
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form action="<?php echo base_url('index.php/TeamProfile');?>" method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group" >
              <input type="text" id="searchteam" name="searchteam"class="form-control bg-light border-0 small" placeholder="Search your team..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-dark" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?php echo ($total_notify >0?$total_notify.'+':'');?></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notifications
                </h6>
                <?php foreach($following as $followlist): ?>
                <div class="dropdown-item d-flex flex-row align-items-center">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div class="d-flex flex-column w-100">
                      <div class="small text-gray-500"><?php echo $followlist['created'];?></div>
                        <span class="font-weight-bold"><?php echo $followlist['fullname'];?></span>
                        <span class="">Want be your teams</span>
                      <div class="d-flex flex-row-reverse">
                       <a href="<?php echo base_url('index.php/AddTeam/'.$followlist['id_user_friend']); ?>" class="m-2 btn-sm btn-dark">Accept</a>
                       <a href="<?php echo base_url('index.php/DeclineTeam/'.$followlist['id_user_friend']); ?>" class="m-2 btn-sm btn-dark">Decline</a>
                      </div>
                  </div>
                </div>
                <?php endforeach; ?>
                <?php foreach($newproject as $newprojectlist): ?>
                <div class="dropdown-item d-flex flex-row align-items-center">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div class="d-flex flex-column w-100">
                      <div class="small text-gray-500"><?php echo $newprojectlist['created'];?></div>
                        <span class="font-weight-bold"><?php echo $newprojectlist['fullname'];?></span>
                        <span class="font-weight-bold">Want you join <?php echo $newprojectlist['project_name'];?> </span>
                      <div class="d-flex flex-row-reverse">
                       <a href="<?php echo base_url('index.php/AcceptProject/'.$newprojectlist['id_project']); ?>" class="m-2 btn-sm btn-dark">Accept</a>
                       <a href="<?php echo base_url('index.php/DeclineProject/'.$newprojectlist['id_project']); ?>" class="m-2 btn-sm btn-dark">Decline</a>
                      </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $list['fullname']; ?></span>
                <img class="img-profile rounded-circle" src="<?php echo isset($list['image'])?base_url('assets/images/user/'.$list['image']):base_url('assets/images/userUnknown1.jpg') ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url('index.php/MyProfile') ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>
        </nav>