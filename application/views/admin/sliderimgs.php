<div class="body_content">
	<div class="container ">
	            <?php if($this->session->flashdata('success')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('success').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>
	            <?php if($this->session->flashdata('error')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('error').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>
		<div class="add_product_div row">
			<div class="add_header col s12">
				<h3><?php echo $title; ?></h3>
				<hr>
			</div>
			<div class="col s12" >
				<div class="row">
					<?php echo validation_errors(); ?>
				    <?php $fattr = array('class' => 'col s12' ); echo form_open_multipart('admin/slaiderImg/',$fattr); ?>
				      <div class="row">
				        <div class="input-field col s3">
				          <input id="Title" type="text" class="validate" name="title">
				          <label for="Title">Title</label>
				        </div>
				        <div class="col s12 m3">
				          Product Img:
				          <div class="input-field inline">
				            <input id="imgIN " type="file" class="validate" onchange="iUrl(event)" name="Img">
				          </div>
				        </div>
				        <div class="input-field col s3">
				          <img id="imgS" style="width: 100px;" src="<?php echo base_url(); ?>assets/hadmin/img/dummy.jpg">
				        </div>
				        <div class="col input-field s2">
				      		<input class="btn green" type="submit" name="" value="Submit">
				      	</div>
				      </div>

				    </form>
				</div>

				<br><hr>
				<div class="row">
					<table>
				        <thead>
				          <tr>
				              <th>ID</th>
				              <th>Title</th>
				              <th>Img</th>
				              <th>Delete</th>
				          </tr>
				        </thead>

				        <tbody>
				        	<?php if (isset($sliderimgs) || $sliderimgs): ?>

				        		<?php foreach ($sliderimgs as $sliderimg): ?>
				        			<tr>
							            <td><?php echo $sliderimg['id']; ?></td>
							            <td><?php echo $sliderimg['title']; ?></td>
							            <td><img style="max-width: 300px;" src="<?php echo base_url('uploads/slider/'. $sliderimg['img']); ?>"></td>
							            <td><a class="btn red" href="<?php echo base_url('admin/deleteSI/'.$sliderimg['id']); ?>">Delete</a></td>
							        </tr>
				        		<?php endforeach ?>
				        		
				        	<?php endif ?>
				          
				        </tbody>

				    </table>
				</div>
			</div>
		</div>
	</div>
</div>