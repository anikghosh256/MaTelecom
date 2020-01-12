

  <div id="index-banner" class="parallax-container valign-wrapper showcase-rgb">
    <div class="section no-pad-bot ">
      <div class="container show-text">
        <br><br>
        <h1 class="header center"><?php echo $about['title']; ?></h1>
        <div class="row ">
          <h5 class="header col s12 light center"><?php echo $about['shortDes']; ?></h5>
        </div>
        <div class="row center">
           <?php if($this->session->flashdata('success')): ?>
            <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('success').' <i class="close material-icons">close</i></div>'; ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('error')): ?>
            <?php echo '<div class="chip alertBarS" style="text-align:center">'.$this->session->flashdata('error').' <i class="close material-icons">close</i></div>'; ?>
          <?php endif; ?>
          <a href="<?php echo base_url('about'); ?>" id="download-button" class="btn-large waves-effect waves-purple about-btn">Read More</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="<?php echo base_url(); ?>images/show.jpg" alt="Unsplashed background img 1"></div>
  </div>

  <div class="sr-d">
    <div class="container">
      <div class="section section-text ">
        

        <!--   item Section   -->
        <div class="row ">
          <div class="item-header col s12">
            <h2>Our Popular Services</h2>
            <hr>
          </div>

          <?php if (isset($recentServices) || $recentServices): ?>

            <?php foreach ($recentServices as $recentService): ?>
              <div class="col s12 m4 c-i">

                <div class="card">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="<?php echo base_url('uploads/thumbnail/'). $recentService['serviceImg']; ?>">
                  </div>
                  <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4"><?php echo $recentService['serviceName']; ?><i class="material-icons right">more_vert</i></span>
                  </div>
                  <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?php echo $recentService['serviceName']; ?><i class="material-icons right">close</i></span>
                    <p><?php echo $recentService['serviceDes']; ?></p>
                  </div>
                </div>

              </div>
            <?php endforeach ?>
            
          <?php endif ?>
          

          


          <div class="col s12 center read-more-t">
            <a href="<?php echo base_url('about'); ?>">Read More</a>
          </div>

          
        </div>

      </div>
    </div>
  </div>


  <div class="si-d">
    <div class="container">
      <div class="section  section-text valign-wrapper">

        <!--   item Section   -->
        <div class="row ">
          <div class="item-header col s12">
            <h2>Our Store</h2>
          </div>

          <?php if (isset($recentProducts) || $recentProducts): ?>

            <?php foreach ($recentProducts as $recentProduct): ?>
              <div class="col s12 m4 c-i">

                <div class="card">
                  <div class="card-image">
                    <img src="<?php echo base_url('uploads/thumbnail/'). $recentProduct['productImg']; ?>">
                    
                  </div>
                  <div class="card-content">
                    <span class="card-title" style="font-weight: 600;"><?php echo $recentProduct['productTitle'] ?></span>
                    <hr>
                    <p><?php echo substr($recentProduct['productSD'], 0, 150); ?>...</p>
                  </div>
                  <div class="card-action">
                    <p class="left">৳ <?php echo $recentProduct['productPrice']; ?></p>
                    <p class="right"><a href="<?php echo base_url('product/'.$recentProduct['id']); ?>">See Details</a></p>

                    
                  </div>
                </div>

              </div>
            <?php endforeach ?>
            
          <?php endif ?>
          

          <div class="col s12 center read-more-t">
            <a href="<?php echo base_url('store'); ?>" >See All Item</a>
          </div>

          <div class="col s12 sp-item-r center">
            <h5>If you need some special item then send us message or visit our store ...</h5>
          </div>

          
        </div>

      </div>
    </div>
  </div>





