  <div class="store-wrapper">
    <div class="store container">
      
      <div class="row">
        <div class="item-header col s12">
          <h2>Our Store</h2>
          <hr>
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
       

        
      </div>


      

    </div>
  </div>