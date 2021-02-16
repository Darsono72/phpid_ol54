<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="id">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<?php if (empty($title)): ?>
	<title>No Title</title>
	<?php else: ?>
	<title><?= $title ?></title>
	<?php endif ?>

	<link href="<?= base_url('/assets/bootstrap/css/bootstrap.css?r=').rand(); ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('/assets/css/mycss.css?r=').rand(); ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('/assets/jquery/jquery-ui/jquery-ui.css?r=').rand(); ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('/assets/toastr/toastr.min.css'); ?>" rel="stylesheet" type="text/css" />

	<script src="<?php echo base_url('/assets/jquery/jquery-3.5.1.js');?>"></script>
	<script src="<?php echo base_url('/assets/jquery/jquery-ui/jquery-ui.js');?>"></script>
	<script src="<?php echo base_url('/assets/jquery/jquery.validate.min.js');?>"></script>
	<script src="<?php echo base_url('/assets/toastr/toastr.min.js');?>"></script>
	<script src="<?php echo base_url('/assets/toastr/toastr.init.js');?>"></script>
	<script> const url = "<?php echo base_url() ?>"</script>

</head>
<body class="bg">
    <?php $this->load->view($page);?>
</body>
</html>


