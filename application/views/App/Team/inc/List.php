<style>
        .test {
            height: 100px;
            width: 100px;
            margin:2px;
            margin-top:14px
        }
        .my-auto {
            margin-top: auto;
            margin-bottom: auto;
        }
    </style>
<div class="w-50 column">
<?php foreach($teamlist as $list): ?>
    <div class="flex-row card padding-card bg-white">
        <div class="test d-flex justify-content-center ">
                <img class="test rounded-circle" src="<?php echo isset($list['image'])?base_url('assets/images/user/'.$list['image']):base_url('assets/images/userUnknown1.jpg') ?>">
        </div>
        <div class="card-body border-top border-left border-warning">
            <h5 class="card-title font-weight-bold text-dark"><?php echo str_replace("''","'",$list['username']); ?></h5>
            <h5 class="card-title text-dark"><?php echo str_replace("''","'",$list['fullname']); ?></h5>
            <a href="<?php echo base_url('index.php/AddTeam/'.$list['id_user']); ?>"  class="btn btn-dark <?php echo ($list['id_list_friend_status']==1 || $list['id_list_friend_status']==3 )?'disabled':' '; ?>"><?php echo ($list['id_list_friend_status'])?$list['list_friend_status']:'Follow'; ?></a> 
        </div>
        <a href="<?php echo base_url('index.php/ProfileTeam/'.$list['id_user']); ?>" class="btn btn-secondary ">
          <i class="mb-5 mt-5 fas fa-chevron-right fa-2x"></i>
            <!-- <p class="mb-5 mt-5">View Profile</p> -->
        </a>
    </div>
<?php endforeach;?>
</div>
