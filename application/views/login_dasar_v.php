<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>

	<link href="<?= base_url('/assets/bootstrap/css/bootstrap.css?r=').rand(); ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('/assets/css/mycss.css?r=').rand(); ?>" rel="stylesheet" type="text/css" />

</head>
<body>
	<div id="container">
		<div class="text-primary"><h1><?php echo $title; ?></h1></div>
		<hr>
		
		<center>
			<?php echo form_open("login_dasar/verifylogin"); ?>
			<div class="row login-box">
				<div class="col-md-12 col-lg-12">
					<input class="form-control" type="text" id="user_name" name="user_name" placeholder="Username" 
					autocomplete="off" autofocus>
				</div>
				<div class="col-md-12 col-lg-12">
					<input class="form-control" type="password" id="user_pass" name="user_pass" placeholder="Password">
				</div>
				<div class="col-md-12 col-lg-12" style="margin: 10px;">
					<input type="submit" class="btn-primary" value="LOGIN" style="padding:5px;">
				</div>

				<span style="color:red; font-weight:bold;"><?php echo validation_errors(); ?></span>
				<div  style="padding: 10px;">
					<i>
						Note: <br>
						user : admin_1<br>
						pass : 12345<br>
					</i>
				</div>

			</div>			
		</form>			
	</center>



</div>
</body>
</html>