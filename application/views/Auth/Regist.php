<?php if($this->session->flashdata('notif')){ ?>
	<a data-toggle="modal" id="buttonklick" data-target="#notifModal"></a>
<?php } ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link href="<?php echo base_url();?>assets/images/icons/favicon.ico" rel="icon" type="image/png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
<!--===============================================================================================-->
<style>
	.text{
	font-family: Poppins-Medium;
  font-size: 15px;
  line-height: 1.5;
  color: #666666;

  display: block;
  width: 100%;
  background: #e6e6e6;
  height: 50px;
  border-radius: 25px;
  padding: 0 20px 0 20px;
}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url();?>assets/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="<?php echo base_url();?>index.php/Auth/Regist/check_username">
					<span class="login100-form-title">
                    Register to myProject
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="text" type="email" name="mail" placeholder="email" value="" required > 
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="text" type="text" name="username" placeholder="Username" value="" required>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required" >
						<input class="text" type="password" name="pass" placeholder="Password" value="" required>
						
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="text" type="password" name="cpass" placeholder="Confirm password" value="" required>
			
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" >
							Next
						</button>
					</div>

			

					<div class="text-center p-t-136">
						<a class="txt2" href="<?php echo base_url();?>index.php/Auth/Login">
							Have account?
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<div class="modal fade" id="notifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Information</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><?php echo $this->session->flashdata('notif')?></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>
<!--===============================================================================================-->	
	<script src="<?php echo base_url();?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<?php if($this->session->flashdata('notif')){ ?>
	<script type="text/javascript">
		document.getElementById("buttonklick").click()
	</script>
	<?php } ?>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>