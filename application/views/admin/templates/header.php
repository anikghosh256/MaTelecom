<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
</head>

<!-- CSS  -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free-5.10.2-web/css/all.css" >
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Courgette|Dancing+Script|Sacramento&display=swap" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  <link href="<?php echo base_url(); ?>assets/hadmin/css/admin.css" type="text/css" rel="stylesheet" media="screen,projection"/>



<body>

	<header>
		<nav class="hide-on-large-only">
			<div class="container">
				<div class="nav-wrapper">
			      <a href="<?php echo base_url('admin'); ?>" class="brand-logo">Dashbord</a>
			      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			      
			    </div>
			</div>
		    
		</nav>


		<ul id="slide-out" class="sidenav sidenav-fixed">
			<li>
				<div class="user-view">
					<div class="background">
						<img src="<?php echo base_url(); ?>images/show.jpg">
					</div>
					<a><img class="circle" src="<?php echo base_url(); ?>images/<?php echo $adminData['adminImg']; ?>"></a>
					<a><span class="white-text name"><?php echo $adminData['fullName']; ?></span></a>
					<a><span class="white-text email"><?php echo $adminData['email']; ?></span></a>
				</div>
			</li>
			<li>
				<a href="<?php echo base_url('admin'); ?>"><i class="material-icons">dashboard</i>Dashbord</a>
			</li>
			<li>
				<ul class="collapsible">
					<li>
						<div class="collapsible-header"><i class="material-icons">shopping_cart</i>Product</div>
						<div class="collapsible-body">
							<ul>
								<li><a href="<?php echo base_url('admin/addProduct'); ?>"><i class="material-icons">add_shopping_cart</i>Add Product</a></li>
								<li><a href="<?php echo base_url('admin/editProduct'); ?>"><i class="material-icons">create</i>Edit Product</a></li>
								<li><a href="<?php echo base_url('admin/deleteProduct'); ?>"><i class="material-icons">delete</i>Delete Product</a></li>
							</ul>
						</div>
						
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">eco</i>Services</div>
						<div class="collapsible-body">
							<ul>
								<li><a href="<?php echo base_url('admin/addService'); ?>"><i class="material-icons">add</i>Add Service</a></li>
								<li><a href="<?php echo base_url('admin/editService'); ?>"><i class="material-icons">create</i>Edit Service</a></li>
								<li><a href="<?php echo base_url('admin/deleteService'); ?>"><i class="material-icons">delete</i>Delete Service</a></li>
							</ul>
						</div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">settings_applications</i>Settngs</div>
						<div class="collapsible-body">
							<ul>
								<li><a href="<?php echo base_url('admin/about'); ?>"><i class="material-icons">create</i>Site About</a></li>
								<li><a href="<?php echo base_url('admin/slaiderImg'); ?>"><i class="material-icons">collections</i>Slider Img</a></li>
								<li><a href="<?php echo base_url('admin/socialLinks'); ?>"><i class="material-icons">people</i>Social Links</a></li>
								<li><a href="<?php echo base_url('admin/inbox'); ?>"><i class="material-icons">inbox</i>inbox</a></li>
							</ul>
						</div>
					</li>
				</ul
			</li>
			<li style="position: absolute;bottom: 60px;">
				<a style="width: 175%;" href="<?php echo base_url('admin/logout');?>"><i class="material-icons">power_settings_new</i>Log Out</a>
			</li>
			
		</ul>
	</header>