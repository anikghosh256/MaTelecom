  <div class="single_item_wrapper">
    <div class="container">
      
      <div class="row">
        <div class="col s12 single_header">
          <h1>
           <?php echo $product['productTitle']; ?>
          </h1>
        </div>
        <div class="col s12">
          <div class="row  valign-wrapper">
            <div class="col s12 m6">
              
              <div class="item_img">
                <img class="materialboxed item_i" src="<?php echo base_url('uploads/pImg/'). $product['productImg']; ?>">
              </div>

            </div>
            <div class="col s12 m6">
              <div class="product_name">
                <h2><?php echo $product['productName']; ?></h2>
              </div>
              <div class="product_s_d">
                <p>Price&nbsp;&nbsp;&nbsp;: <strong>৳ <?php echo $product['productPrice']; ?></strong></p>
                <p>Status : <span><span class="c-icon"><i class="fas fa-check"></i></span>Available</span></p>
                <br>
                <p class="short_des">
                  <?php echo $product['productSD']; ?>
                </p>
              </div>
            </div>
            
          </div>
        </div>
        <br><br>
        <div class="col s12">
          <?php echo $product['productDes']; ?>
        </div>
      </div>

    </div>
  </div>
