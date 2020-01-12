<div class="body_content">
		<div class="container ">
			<div class="add_product_div row">
				<div class="add_header col s12" style="margin-bottom: 30px;">
					<h3><?php echo $title; ?></h3>
					<hr>
				</div>
				<div class="row valign-wrapper cyan lighten-5" style="min-height: calc(100vh - 185px); margin-top: 30px; border-radius: 15px; padding:20px;" >
					<div class="col s12 center">
						
						<div class="row">
							<div class="col s12">
								<h4><?php echo $about['title']; ?></h4>
								<hr>
							</div>
							<div class="col s8">
								<p style="text-align: justify;"><?php echo $about['shortDes']; ?></p>
							</div>
							<div class="col s4">
								<img width="100%;" src="<?php echo $about['img'] == null ? base_url('assets/hadmin/img/dummy.jpg') : base_url('uploads/pImg/'.$about['img']) ?>">
							</div>
						</div>

						<div class="row">
							<div class="col s12" style="text-align: justify;">
								<p><?php echo $about['description']; ?></p>
							</div>
						</div>

						<div class="row">
							<div class="col s12 center">
								<a class="btn green" href="<?php echo base_url('admin/editAbout'); ?>">edit</a>
							</div>
						</div>	

					</div>
				</div>
			</div>
		</div>
	</div>