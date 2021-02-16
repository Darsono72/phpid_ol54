<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<link href="<?= base_url('/assets/bootstrap/css/bootstrap.css?r=').rand(); ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('/assets/css/mycss.css?r=').rand(); ?>" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url('/assets/jquery/jquery-3.5.1.js');?>"></script>

</head>
<body>
	<div id="container">
		<center>
			<img class="img-responsive" src="<?php echo base_url();?>/assets/img/bg.png">	
		</center>
		<hr>
		<div class="row text-center">
			<a href="login_dasar" target="_blank" class="btn btn-primary">Login Dasar</a>
			<a href="login" class="btn btn-success">Login Lanjut</a>
			<a href="cust_master" class="btn btn-info">Customer Master</a>
		</div>
		<hr>
		Bahan Pendukung:<br>
		<ul>
			<li><a href="http://codeigniter.com/download" target="blank">CodeIgniter 3.1.11 </li>
			<li><a href="https://getbootstrap.com/docs/3.4/" target="blank">bootstrap 3.4 </li>
			<li><a href="https://code.jquery.com/jquery-3.5.1.js" target="blank">jquery-3.5.1</li>
			<li><a href="https://jqueryui.com/" target="blank">jquery-ui-1.12.1</li>
			<li><a href="https://jqueryvalidation.org/" target="blank">jquery.validate.min.js</li>
			<li><a href="" target="blank">toastr.min.js</li>
		</ul>


	</div>
</body>
</html>