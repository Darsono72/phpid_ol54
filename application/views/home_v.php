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

</head>
<body>
	<div id="container">
		<center>
		<h1>Berhasil Login</h1>';
		<a href="<?php echo base_url();?>" class="btn btn-primary">HOME</a>;

		</center>
	</div>
</body>
</html>