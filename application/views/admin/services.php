<div class="container">
	<div class="products_header">
		<h3><?php echo $title; ?></h3>
		<hr>
	</div>
	<div class="row">
			<?php if (isset($recentServices) && $recentServices): ?>

				<?php foreach ($recentServices as $recentService): ?>

					<div class="col s12 m4 c-i">

			            <div class="card">
			              <div class="card-image">
			                <img src="<?php echo base_url('uploads/thumbnail/'). $recentService['serviceImg']; ?>">
			                
			              </div>
			              <div class="card-content">
			              	<span class="card-title" style="color: black !important; font-weight: 900;"><?php echo $recentService['serviceName']; ?></span>
			              	<hr>
			                <p><?php echo substr($recentService['serviceDes'], 0, 150); ?>...</p>
			              </div>
			              <div class="card-action">
			                <p class="left"><a  class="btn red" href="<?php echo base_url('admin/deleteService/').$recentService['id']; ?>">Delete</a></p>
			                <p class="right"><a class="btn green"  href="<?php echo base_url('admin/editService/').$recentService['id']; ?>">Edit</a></p>

			                
			              </div>
			            </div>

			        </div>
					
				<?php endforeach ?>
				
			<?php endif ?>
	</div>
</div>