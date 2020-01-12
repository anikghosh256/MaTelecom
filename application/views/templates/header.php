<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?php echo $title; ?></title>

  <!-- CSS  -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free-5.10.2-web/css/all.css" >
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Courgette|Dancing+Script|Sacramento&display=swap" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>assets/css/about.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>assets/css/single.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
</head>
<body>
  <nav class="main-nav" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="<?php echo base_url(); ?>" class="brand-logo left"><?php echo $about['siteName']; ?></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo base_url('store'); ?>">Store</a></li>
        <li><a href="<?php echo base_url('about'); ?>">About</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo base_url('store'); ?>">Store</a></li>
        <li><a href="<?php echo base_url('about'); ?>">About</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
    </div>
  </nav>

 