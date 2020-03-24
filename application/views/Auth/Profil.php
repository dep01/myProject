

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Profile</title>
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
.text-area{
 font-family: Poppins-Medium;
  font-size: 15px;
  line-height: 1.5;
  color: #666666;

  display: block;
  width: 100%;
  height:100%;
  background: #e6e6e6;
  border-radius: 25px;
  padding: 20px 20px 20px 20px;
}
.wrap-area{
	position: relative;
	  width: 100%;
	  height:100px;
  	margin-bottom: 10px;
}
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

				<form class="login100-form validate-form" method="POST" action="<?php echo base_url();?>index.php/Auth/Regist/save_profile">
					<span class="login100-form-title">
                    Last step, Please complete your profile
					</span>
					<div class="wrap-input100 validate-input" >
						<input class="text"type="text" name="fullname" placeholder="Fullname" value="" required >	 
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="text"type="number" name="phone" placeholder="Phone number" value="" required >	 
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="text"type="date" name="birthday" placeholder="Birthday" required >	 
					</div>
					<div class="wrap-input100 validate-input">
							<select class="text" name="gender">
  							<option selected>Gender</option>
  							<option value="1">Male</option>
  							<option value="2">Female</option>
							</select>
					</div>
					<div class="wrap-area" >
						<textarea class="text-area" type="text" name="address" placeholder="Address" value="" required></textarea>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" >
							complete
						</button>
						<input type="hidden" value="<?php echo $id_user ?>" name="id">
					</div>



					<div class="text-center p-t-136">
						<a class="txt2" >
						
						</a>
					</div>
				</form>
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
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>