<div class="about-warpper">
    <div class="about row container">
      <div class="about-hedding">
        <h2>about</h2>
      </div>
      
      <div class="col s12 m8">
        <p><?php echo $about['shortDes']; ?></p>
      </div>
      <div class="col s12 m4">
        <div class="about-main-img">
          <img class="materialboxed ab-img" src="<?php echo $about['img'] == null ? base_url('assets/hadmin/img/dummy.jpg') : base_url('uploads/pImg/'.$about['img']) ?>">

        </div>
      </div>

      <div class="col s12">
        <?php echo $about['description']; ?>
      </div>


      <div class="photo-c col s12">
          
          <div class="carousel carousel-slider" style="height: 630px !important;">
            <?php if (isset($sliderimgs) || $sliderimgs): ?>

              <?php foreach ($sliderimgs as $sliderimg): ?>
                <a class="carousel-item" ><img class="" src="<?php echo base_url('uploads/slider/'.$sliderimg['img']); ?>"></a>
              <?php endforeach ?>
              
            <?php endif ?>
          </div>


      </div>  

    </div>
  </div>