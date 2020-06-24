<div class="column">
    <style>
        .w-15 {
            width: 20%;
        }
        .w-10 {
            width: 8%;
        }
    </style>
            <div class="flex-row card padding-card bg-white">
                <div class="card-body border font-weight-bold">
                    Author of <?php echo $list['project_name']  ;?>
                    <h5 class="card-title font-weight-bold text-dark"><?php echo $list['fullname'];?></h5>
                    Fee
                    <h5 class="card-title text-dark"><?php echo Formatcurrency($list['project_fee']);?></h5> Deadline
                    <h5 class="card-title text-dark"><?php echo $list['project_deadline'];?> Days</h5>
                </div>
                <div class="w-15 card-body border font-weight-bold">
                    Start From
                    <h5 class="card-title text-dark"><?php echo FormatDate($list['project_start']);?></h5> Finished
                    <h5 class="card-title text-dark"><?php echo FormatDate($list['project_end']);?></h5> Status
                    <h5 class="card-title text-dark"><?php echo $list['project_status'];?></h5>
                <a href="<?php echo base_url('index.php/Mytask/'.$list['id_project'])?>" class="btn btn-secondary ">
                    View MyTask
                </a>
                </div>

            </div>
</div>