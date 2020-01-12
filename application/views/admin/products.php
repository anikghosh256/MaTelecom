<div class="container">
	<div class="products_header">
		<h3><?php echo $title; ?></h3>
		<hr>
	</div>
	<div class="row">
			<?php if (isset($recentProducts) && $recentProducts): ?>

				<?php foreach ($recentProducts as $recentProduct): ?>

					<div class="col s12 m4 c-i">

			            <div class="card">
			              <div class="card-image">
			                <img src="<?php echo base_url('uploads/thumbnail/'). $recentProduct['productImg']; ?>">
			                
			              </div>
			              <div class="card-content">
			              	<span class="card-title" style="color: black !important; font-weight: 900;"><?php echo $recentProduct['productName']; ?></span>
			              	<hr>
			                <p><?php echo substr($recentProduct['productSD'], 0, 150); ?>...</p>
			              </div>
			              <div class="card-action">
			                <p class="left"><a  class="btn red" href="<?php echo base_url('admin/deleteProduct/').$recentProduct['id']; ?>">Delete</a></p>
			                <p class="right"><a class="btn green"  href="<?php echo base_url('admin/editProduct/').$recentProduct['id']; ?>">Edit</a></p>

			                
			              </div>
			            </div>

			        </div>
					
				<?php endforeach ?>
				
			<?php endif ?>
		
	</div>
</div>