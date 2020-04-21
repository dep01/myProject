<style>
    .test {
        height: 250px;
        width: 250px
    }
</style>
<h1 class="h3 mr-5 d-flex justify-content-center text-gray-800">Team Profile</h1>
<div class="row h3 mb-3 d-flex">
<a href="<?php echo base_url('index.php/AddTeam/'.$teamlist['id_user']); ?>"  class="ml-auto btn btn-dark d-flex <?php echo ($idteamstatus==1|| $idteamstatus==3)?'disabled':' '; ?>"><?php echo ($idteamstatus)?$teamstatus:'Follow'; ?></a> 
</div>

<div class="row align-content-center ">
    <div class=" w-50 column">
        <div class="w-100  d-flex justify-content-center">
            <img class="test rounded-circle" src="<?php echo isset($teamlist['image'])?base_url('assets/images/user/'.$teamlist['image']):base_url('assets/images/userUnknown1.jpg') ?>">
        </div>
    </div>
    <div class="w-50 flex-column align-content-center text-dark">
            <?php include('Detail_project.php') ?>
      Username
        <input type="text" class="w-50 m-2 form-control bg-white text-dark" value="<?php echo str_replace("''","'",$teamlist['username']); ?>" disabled>
      Fullname
        <input type="text" class="w-50 m-2 form-control bg-white text-dark" value="<?php echo str_replace("''","'",$teamlist['fullname']); ?>" disabled>
      Phone
        <input type="text" class="w-50 m-2 form-control bg-white text-dark" value="<?php echo $teamlist['phone']; ?>" disabled>
      E-mail
        <input type="text" class="w-50 m-2 form-control bg-white text-dark" value="<?php echo str_replace("''","'",$teamlist['user_mail']); ?>" disabled>

    </div>
    
</div>
