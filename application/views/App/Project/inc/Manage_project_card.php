<div class="w-50 column">
    <style>
        .w-15 {
            width: 20%;
        }
        .w-10 {
            width: 8%;
        }
    </style>
            <div class="flex-row card padding-card bg-white">
                <div class="w-50 card-body border font-weight-bold">
                    <h5 class="card-title font-weight-bold text-dark"><?php echo $list['project_name'];?></h5> Fee
                    <h5 class="card-title text-dark"><?php echo $list['project_fee'];?></h5> Deadline
                    <h5 class="card-title text-dark"><?php echo $list['project_deadline'];?> Days</h5>
                </div>
                <div class="w-15 card-body border font-weight-bold">
                    Start From
                    <h5 class="card-title text-dark"><?php echo $list['project_start'];?></h5> Finished
                    <h5 class="card-title text-dark"><?php echo $list['project_end'];?></h5> Status
                    <h5 class="card-title text-dark"><?php echo $list['project_status'];?></h5>
                </div>
                <a href="#" class="w-10 btn btn-secondary ">
                    <i class="mb-5 mt-5 fas fa-chevron-right fa-2x"></i>
                </a>
            </div>
</div>