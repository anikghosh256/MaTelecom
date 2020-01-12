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
				<h3>Edit social link</h3>
				<hr>
			</div>
			<div class="col s12" >
				<div class="row">
					<?php echo validation_errors(); ?>
				    <?php $fattr = array('class' => 'col s12' ); echo form_open_multipart('admin/editSLink/'.$sLink['id'],$fattr); ?>
				      <div class="row">
				        <div class="input-field col s3">
				          <input id="Title" type="text" class="validate" name="title" value="<?php echo $sLink['title']; ?>">
				          <label for="Title">Title</label>
				        </div>
				        <div class="input-field col s3">
				          <input id="url" type="text" class="validate" name="url" value="<?php echo $sLink['url']; ?>">
				          <label for="url">Url</label>
				        </div>
				        <div class="input-field col s3">
				          <input id="icon" type="text" class="validate" name="icon" value="<?php echo $sLink['icon']; ?>">
				          <label for="icon">FA Icon</label>
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
				              <th>Url</th>
				              <th>Edit</th>
				              <th>Delete</th>
				          </tr>
				        </thead>

				        <tbody>
				        	<?php if (isset($socialLinks) || $socialLinks): ?>

				        		<?php foreach ($socialLinks as $socialLink): ?>
				        			<tr>
							            <td><?php echo $socialLink['id']; ?></td>
							            <td><?php echo $socialLink['title']; ?></td>
							            <td><?php echo $socialLink['url']; ?></td>
							            <td><a class="btn green" href="<?php echo base_url('admin/editSLink/'.$socialLink['id']); ?>">Edit</a></td>
							            <td><a class="btn red" href="<?php echo base_url('admin/deleteSLink/'.$socialLink['id']); ?>">Delete</a></td>
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