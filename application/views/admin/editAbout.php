<div class="body_content">
	<div class="container ">
		<div class="add_product_div row">
			<div class="add_header col s12">
				<h3><?php echo $title; ?></h3>
				<hr>
			</div>
			<div class="col s12" >
				<div class="row">
					<?php echo validation_errors(); ?>
				    <?php $fattr = array('class' => 'col s12' ); echo form_open_multipart('admin/editAbout',$fattr); ?>
				      <div class="row">
				        <div class="input-field col s12">
				          <input id="siteName" type="text" class="validate" name="siteName" value="<?php echo $about['siteName'] ?>">
				          <label for="siteName">Site Name</label>
				        </div>
				      </div>
				      <div class="row">
				        <div class="input-field col s12">
				          <input id="siteTitle" type="text" class="validate" name="title" value="<?php echo $about['title'] ?>">
				          <label for="siteTitle">Title</label>
				        </div>
				      </div>
				      <div class="row">
				        <div class="input-field col s12">
				          <textarea id="shortDes" class="materialize-textarea" name="shortDes"><?php echo $about['shortDes'] ?></textarea>
				          <label for="shortDes">Short Description</label>
				        </div>
				      </div>
				      <div class="row">
				        <div class="input-field col s12">
				          <textarea id="des" class="materialize-textarea" placeholder="Description" name="description"><?php echo $about['description'] ?></textarea>
				        </div>
				      </div>
				      <div class="row valign-wrapper" style="min-height: auto;">
				        <div class="col s12 m6">
				          Product Img:
				          <div class="input-field inline">
				            <input id="imgIN " type="file" class="validate" onchange="iUrl(event)" name="Img">
				          </div>
				        </div>
				        <div class="col s12 m6">
				        	<div class="img_div">
				        		<img id="imgS" src="<?php echo $about['img'] == null ? base_url('assets/hadmin/img/dummy.jpg') : base_url('uploads/pImg/'.$about['img']) ?>">
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

	<!-- js  -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/hadmin/tinymce/tinymce.min.js"></script>
 	<script src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>assets/hadmin/js/init.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>assets/hadmin/js/admin.js"></script>
 	<script type="text/javascript">
 		tinymce.init({
		  selector: '#des',
		  height: 300,
		  menubar: false,
		  plugins: [
		    'advlist autolink lists link image charmap print preview anchor',
		    'searchreplace visualblocks code fullscreen',
		    'insertdatetime media table paste code help wordcount'
		  ],
		  toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
		  
		});
 	</script>

</body>
</html>