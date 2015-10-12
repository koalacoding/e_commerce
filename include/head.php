<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Strict//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>style.css">
		<title><?php echo $title; ?></title>

		<!--**************************************
		******************************************
		****************TOOLTIPSTER***************
		******************************************
		***************************************-->

	    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script type="text/javascript" src="<?php echo $path; ?>tipped-4.4.2-light/js/tipped/tipped.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>tipped-4.4.2-light/css/tipped/tipped.css"/>

<script type="text/javascript">
  $(document).ready(function() {
    Tipped.create('.simple-tooltip');
  });
</script>
	</head>