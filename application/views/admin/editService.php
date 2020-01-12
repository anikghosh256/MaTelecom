<div class="body_content">
	<div class="container ">
		<div class="add_product_div row">
			<div class="add_header col s12">
				<h3>Edit Service</h3>
				<hr>
			</div>
			<div class="col s12" >
				<div class="row">
					<?php echo validation_errors(); ?>
				    <?php $fattr = array('class' => 'col s12' ); echo form_open_multipart('admin/editService/'.$serviceData['id'],$fattr); ?>
				      <div class="row">
				        <div class="input-field col s12">
				          <input id="Service_name" type="text" class="validate" name="serviceName" value="<?php echo $serviceData['serviceName']; ?>">
				          <label for="Service_name">Service Name</label>
				        </div>
				      </div>
				      <div class="row">
				        <div class="input-field col s12">
				          <textarea id="serviceDes" class="materialize-textarea" name="serviceDes"><?php echo $serviceData['serviceDes']; ?></textarea>
				          <label for="serviceDes">Description</label>
				        </div>
				      </div>
				      <div class="row valign-wrapper" style="min-height: auto;">
				        <div class="col s12 m6">
				          Product Img:
				          <div class="input-field inline">
				            <input id="imgIN " type="file" class="validate" onchange="iUrl(event)" name="serviceImg">
				          </div>
				        </div>
				        <div class="col s12 m6">
				        	<div class="img_div">
				        		<img id="imgS" src="<?php echo $serviceData['serviceImg'] == null ? base_url('assets/hadmin/img/dummy.jpg') : base_url('uploads/pImg/'.$serviceData['serviceImg']) ?>">
				        	</div>
				        </div>
				      </div>
				      <div class="row">
				      	<div class="col s6">
				      		<input class="btn" type="submit" name="" value="Submit">
				      	</div>
				      	<div class="col s6 right">
				      		<a class="btn red" href="<?php echo base_url('admin'); ?>">Cancel</a>
				      	</div>
				      </div>
				    </form>
				  </div>
			</div>
		</div>
	</div>
</div>