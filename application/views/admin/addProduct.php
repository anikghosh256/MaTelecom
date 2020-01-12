	<div class="body_content">
		<div class="container ">
			<div class="add_product_div row">
				<div class="add_header col s12">
					<h3>Add New Product</h3>
					<hr>
				</div>
				<div class="col s12" >
					<div class="row">
						<?php echo validation_errors(); ?>
					    <?php $fattr = array('class' => 'col s12' ); echo form_open_multipart('admin/addProduct',$fattr); ?>
					      <div class="row">
					        <div class="input-field col s12">
					          <input id="product_title" type="text" class="validate" name="productTitle">
					          <label for="product_title">Product title</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s6">
					          <input id="product_name" type="text" class="validate" name="productName">
					          <label for="product_name">Product Name</label>
					        </div>
					        <div class="input-field col s6">
					          <input id="product_price" type="number" class="validate" name="productPrice">
					          <label for="product_price">Product Price</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s12">
					          <textarea id="short_des" class="materialize-textarea" name="productSD"></textarea>
					          <label for="short_des">Short Description</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s12">
					          <textarea id="des" class="materialize-textarea" placeholder="Description" name="productDes"></textarea>
					        </div>
					      </div>
					      <div class="row valign-wrapper" style="min-height: auto;">
					        <div class="col s12 m6">
					          Product Img:
					          <div class="input-field inline">
					            <input id="imgIN " type="file" class="validate" onchange="iUrl(event)" name="productImg">
					          </div>
					        </div>
					        <div class="col s12 m6">
					        	<div class="img_div">
					        		<img id="imgS" src="<?php echo base_url(); ?>assets/hadmin/img/dummy.jpg">
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