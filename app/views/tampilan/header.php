<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Bantuan</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $settingUrl->baseUrl(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $settingUrl->baseUrl(); ?>assets/css/blog-home.css" rel="stylesheet">   
	
	<!-- Link Datepicker -->
    <link href="<?php echo $settingUrl->baseUrl(); ?>assets/ui-lightness/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo $settingUrl->baseUrl(); ?>assets/css/chosen.css" rel="stylesheet">
    <link href="<?php echo $settingUrl->baseUrl(); ?>assets/ui-lightness/jquery.ui.theme.css" rel="stylesheet">
	<script src="<?php echo $settingUrl->baseUrl(); ?>assets/js/jquery-min.js"></script>
	<script src="<?php echo $settingUrl->baseUrl(); ?>assets/js/jquery.form.js"></script>
	<script src="<?php echo $settingUrl->baseUrl(); ?>assets/js/jquery-ui.min.js"></script>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Bantuan Korban Bencana Alam</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo $settingUrl->siteUrl('home/index'); ?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
			<li class="nav-item">
			  <?php if($this->session->getValue('isLogin')==TRUE) { ?>
              <a class="nav-link" href="<?php echo $settingUrl->siteUrl('home/logout'); ?>">Keluar</a>
			  <?php } else { ?>
			   <a class="nav-link" href="<?php echo $settingUrl->siteUrl('login'); ?>">Masuk</a>  
			  <?php } ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>