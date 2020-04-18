<?php if($this->session->flashdata('notif')){ ?>
<p class='alert alert-warning'><?php echo $this->session->flashdata('notif')?></p>
<?php } ?>
<form action="<?php echo base_url();?>index.php/UpdateProfile" method="POST" class="user">
    <style>
        .test {
            height: 250px;
            width: 250px
        }
    </style>
    <h1 class="h3 mb-3 d-flex justify-content-center text-gray-800">My Profile</h1>
    <div class="row align-content-center ">
        <div class=" w-50 column">
            <div class="w-100  d-flex justify-content-center">
                <img class="test rounded-circle" src="<?php echo isset($list['image'])?base_url('assets/images/user/'.$list['image']):base_url('assets/images/userUnknown1.jpg') ?>">
            </div>
            <div class="d-flex justify-content-center">
                <a class="m-2 btn btn-warning btn-sm" data-toggle="modal" data-target="#ChangePicture" href="" style="text-decoration: none;">Change Picture</a>
            </div>
        </div>
        <div class="w-50 flex-column align-content-center">
          Username
            <input type="input" class="w-50 m-2 form-control" id="username" name="username" placeholder="<?php echo $username; ?>" value="<?php echo $username; ?>" disabled>
          Fullname
            <input type="input" class="w-50 m-2 form-control" id="fullname" name="fullname" placeholder="<?php echo $fullname; ?>" value="<?php echo $fullname; ?>" required>
          Gender
            <input type="input" class="w-50 m-2 form-control" id="gender" name="gender" placeholder="<?php echo $gender; ?>" value="<?php echo $gender; ?>" disabled>
          Phone
            <input type="input" class="w-50 m-2 form-control" id="phone" name="phone" placeholder="<?php echo $phone; ?>" value="<?php echo $phone; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
          E-Mail
            <input type="input" class="w-50 m-2 form-control" id="mail" name="mail" placeholder="<?php echo $user_mail; ?>" value="<?php echo $user_mail; ?>" required>
          Address
            <textarea class="w-50 m-2 form-control" id="address" name="address" cols="30" rows="4" placeholder="<?php echo $address; ?>"><?php echo $address; ?></textarea>
            <input class="m-2 btn btn-primary btn-sm" type="submit" name="simpan" value="Save changes">
        </div>
    </div>
</form>
   <!-- Delete Modal-->
   <div class="modal fade" id="ChangePicture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Drag your picture</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php include('DragProfile.php');?>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>