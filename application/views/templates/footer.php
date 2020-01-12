  <div class="parallax-container valign-wrapper bottom-p-c-s">
    <div class="section no-pad-bot ">
      <div class="container">
        <div class="row ">

          <div class="col s12 m8 cm">
            <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=daragram%2C%20shaturia%20%2Cmanikganj%20&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.utilitysavingexpert.com">Utility Saving Expert</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
          </div>

          <div class="col s12 m4 cf">
            <div class="contact-form row">

              <div class="contact-form-header center col s12">
                <h4>Contact Us</h4>
              </div>

              <?php $fattr = array('class' => 'col s12' ); echo form_open_multipart('pages/msg',$fattr); ?>
                <div class="input-field">
                  <input id="name-field" type="text" name="Name" required="required">
                  <label for="name-field">Enter Your Name</label>
                </div>

                <div class="input-field">
                  <input id="email-field" type="text" name="Email" required="required">
                  <label for="email-field">Enter Your Email</label>
                </div>

                <div class="input-field">
                  <textarea id="text-field" class="materialize-textarea" type="text" name="Msg" required="required"></textarea>
                  <label for="text-field">Enter Your Message</label>
                </div>

                <div class="sub-btn">
                  <button class="btn waves-effect " style="width: 100%;" type="submit">Submit</button>
                </div>

              </form>



            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="parallax"><img src="<?php echo base_url(); ?>images/f.jpg" alt="Unsplashed background img 3"></div>
  </div>

  <footer class="page-footer ">
    <div class="f-art" style="background-image: url('<?php echo base_url(); ?>images/f-i.png');">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text"><?php echo $about['siteName'] ?></h5>
            <p class="grey-text text-lighten-4">
              <?php echo $about['shortDes'] ?>
            </p>


          </div>
          <div class="col l6 s12  right-align">
            <ul class="f-social">
              <?php if (isset($socialLinks) || $socialLinks): ?>

                <?php foreach ($socialLinks as $socialLink): ?>
                  <li><a  href="<?php echo $socialLink['url'] ?>" title="<?php echo $socialLink['title'] ?>"><i class="<?php echo $socialLink['icon'] ?>"></i></a></li>
                <?php endforeach ?>
                
              <?php endif ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        Made by <a class="brown-text text-lighten-3" href="http://github.com/anikghosh356">Anik Ghosh</a>
        </div>
      </div>
    </div>
    
  </footer>


  <!--  Scripts-->
  <script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/init.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/style.js"></script>

  </body>
</html>