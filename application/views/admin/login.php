<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
</head>

<!-- CSS  -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free-5.10.2-web/css/all.css" >
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Courgette|Dancing+Script|Sacramento&display=swap" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>assets/hadmin/css/admin.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<body>

	<div class="valign-wrapper">
		<div class="container">
			<?php if($this->session->flashdata('user_registered')): ?>
              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('user_registered').' <i class="close material-icons">close</i></div>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('user_loggedout')): ?>
              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('user_loggedout').' <i class="close material-icons">close</i></div>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('login_failed')): ?>
              <?php echo '<div class="chip alertBarD" style="text-align:center">'.$this->session->flashdata('login_failed').' <i class="close material-icons">close</i></div>'; ?>
            <?php endif; ?>
			<div class="row ">
			    <?php $fattr = array('class' => 'col s12 m6  offset-m3' ); echo form_open_multipart('admin/login',$fattr); ?>
			    	
			    	<div class="row">
			    		<div class="login-header center col s12">
				    		<h5>admin login</h5>
				    	</div>
				    	<?php echo validation_errors(); ?>
			    	</div>

					<div class="row">

						<div class="input-field col s12">
						  <input id="username" type="text" name="username" class="validate" autofocus="autofocus">
						  <label for="username">username or email</label>
						</div>
						<div class="input-field col s12">
						  <input id="password" type="password" name="password" class="validate" autofocus="autofocus">
						  <label for="password">password</label>
						</div>
					</div>

					<div class="row">
						<div class="col s16 left">
							<input class="btn waves-effect" type="submit" name="" value="login">
						</div>
						<div class="col s16 right">
							<a  class="btn waves-effect" href="<?php echo base_url('admin/register'); ?>">Or Register Here</a>
						</div>
					</div>

			      
			     
			    </form>
			 </div>
		</div>
		  
	</div>



	<!-- js  -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
 	<script src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
</body>
</html>