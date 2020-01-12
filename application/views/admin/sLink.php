<div class="body_content">
		<div class="container ">
			<div class="add_product_div row">
				<div class="add_header col s12" style="margin-bottom: 30px;">
					<h3><?php echo $title; ?></h3>
					<hr>
				</div>
				<div class="row valign-wrapper cyan lighten-5" style="min-height: calc(100vh - 185px); margin-top: 30px; border-radius: 15px;" >
					<div class="col s12 center">
						<h2><?php echo $sLink['title']; ?></h2>
						<p><?php echo $sLink['url']; ?></p>
						<br><hr>

						<h3 class="red-text">Are you sure ?</h3>
						<p>You want to delete this Link.. </p>

						<div class="row">
							<div class="col s6 left">
								<a class="btn green" href="<?php echo base_url('admin'); ?>">Cancel</a>
							</div>
							<div class="col s6 right">
								<a class="btn red" href="<?php echo base_url('admin/deleteL/'.$sLink['id']); ?>">Delete</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>