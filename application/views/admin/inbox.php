<div class="body_content">
	<div class="container ">
		<div class="add_product_div row">
			<div class="add_header col s12">
				<h3>Inbox</h3>
				<hr>
			</div>
			<div class="col s12" >
				<div class="row">
					<?php if (isset($msgs) || $msgs): ?>

						<?php foreach ($msgs as $msg): ?>
							<div class="col s12 ">
						      <div class="card grey darken-3">
						        <div class="card-content white-text">
						          <span class="card-title"><?php echo $msg['senderName']; ?></span>
						          <hr>
						          <p><?php echo $msg['senderMsg']; ?></p>
						        </div>
						        <div class="card-action">
						          <strong><?php echo $msg['senderMail'] ?></strong>
						        </div>
						      </div>
						    </div>
						<?php endforeach ?>
						
					<?php endif ?>
					
				</div>
			</div>
		</div>
	</div>
</div>