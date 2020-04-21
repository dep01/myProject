
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
                          <?php echo $list['project_total'] ?>
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
                          <?php echo $list['project_finished'] ?>
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
                          <?php echo $list['project_progress'] ?>
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
<?php 
    $data['list']=array(
        ['title'=>'Perpustakaan',
        'author'=>'Dani andri',
        'start'=>'28,December 2019',
        'end'=>'28,February 2020'],
        ['title'=>'Project Management',
        'author'=>'Diaz erlangga',
        'start'=>'28,February 2020',
        'end'=>'28,Mei 2020'],
        ['title'=>'Cloud Management',
        'author'=>'Rio baskara',
        'start'=>'28,March 2020',
        'end'=>'28,Mei 2020']
    );
    
 ?>
<div class="column">
<a href="#" class="btn btn-primary">Create new project</a>
    <?php foreach($data['list'] as $list): ?>
      <?php include('inc/Project_card.php'); ?>
    <?php endforeach;?>
</div>
