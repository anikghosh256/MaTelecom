<!-- chart area code  -->
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  60,       110],
          ['2008',  574,       85],
          ['2009',  85,       1120],
          ['2010',  660,       574],
          ['2011',  885,      845]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>



	<div class="body_content">
		<div class="top_chart">
			<div class="container">

				<?php if($this->session->flashdata('user_loggedin')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('user_loggedin').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>
	            <?php if($this->session->flashdata('success')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('success').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>
	            <?php if($this->session->flashdata('postCreated')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('postCreated').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>
	            <?php if($this->session->flashdata('error')): ?>
	              <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('error').' <i class="close material-icons">close</i></div>'; ?>
	            <?php endif; ?>
	            <h2>chart not complete</h2>
				<div id="curve_chart" style="width: 100%; height: 500px; margin:0 auto;"></div>
			</div>
		</div>


		<div class="recent_products_wrapper">
			<div class="container">
				<div class="recent_products row">
					<div class="recent_products_header col s12">
						<h4>Recent Added Products</h4>
					</div>

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
					                <p class="left">৳ <?php echo $recentProduct['productPrice']; ?></p>
					                <p class="right"><a href="#">See Details</a></p>

					                
					              </div>
					            </div>

					        </div>
							
						<?php endforeach ?>
						
					<?php endif ?>

					
			        
				</div>
			</div>

		</div>

		<div class="recent_products_wrapper">
			<div class="container">
				<div class="recent_products row">
					<div class="recent_products_header col s12">
						<h4>Recent Added Services</h4>
					</div>


					<?php if (isset($recentServices) && $recentServices): ?>

						<?php foreach ($recentServices as $recentService): ?>

							<div class="col s12 m4 c-i">

					            <div class="card">
					              <div class="card-image">
					                <img src="<?php echo base_url('uploads/thumbnail/'). $recentService['serviceImg']; ?>">
					                <span class="card-title"><?php echo $recentService['serviceName']; ?></span>
					              </div>
					              <div class="card-content">
					                <p><?php echo $recentService['serviceDes']; ?></p>
					              </div>
					            </div>

					        </div>
							
						<?php endforeach ?>
						
					<?php endif ?>
			        
				</div>
			</div>

		</div>




	</div>
	

	
  
        




	


