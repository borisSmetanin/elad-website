    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">צרו קשר</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <form name="sentMessage" id="contactForm" novalidate="novalidate">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>שם</label>
                  <input class="form-control" id="name" type="text" placeholder="שם" required="required" data-validation-required-message="אנא הזינו שם">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>אימייל</label>
                  <input class="form-control" id="email" type="email" placeholder="אימייל" required="required" data-validation-required-message="אנא רישמו את כתובת האימייל שלכם">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>טלפון</label>
                  <input class="form-control" id="phone" type="tel" placeholder="מספר טלפון" required="required" data-validation-required-message="אנא הכניסו את מספר הטלפון שלכם">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>תוכן ההודעה </label>
                  <textarea class="form-control" id="message" rows="5" placeholder="תוכן ההודעה" required="required" data-validation-required-message="אנא כיתבו תוכן"></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">שליחה</button>
              </div>
              <input type="hidden" name="action" value="contact_form">
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        
          <div class="col-md-12 mb-12 mb-lg-12">
            <h4 class="text-uppercase mb-4">צרו קשר גם ברשתות החברתיות</h4>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" target="_blank" href="https://www.facebook.com/elad.baram.5">
                  <i class="fab fa-fw fa-facebook-f"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; Your Website 2018</small>
      </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>
    <!-- Global defines-->  
    <script>
        var FORM_URL = '<?= esc_url( admin_url('admin-post.php') );?>';
    </script>
        <!-- Bootstrap core JavaScript -->
    <script src="<?=get_option('siteurl')?>/wp-content/themes/hivrot/assets/lib/jquery/jquery.min.js"></script>
    <script src="<?=get_option('siteurl')?>/wp-content/themes/hivrot/assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?=get_option('siteurl')?>/wp-content/themes/hivrot/assets/lib/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?=get_option('siteurl')?>/wp-content/themes/hivrot/assets/lib/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?=get_option('siteurl')?>/wp-content/themes/hivrot/assets/js/jqBootstrapValidation.js"></script>
    <script src="<?=get_option('siteurl')?>/wp-content/themes/hivrot/assets/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?=get_option('siteurl')?>/wp-content/themes/hivrot/assets/js/freelancer.min.js"></script>
  </body>

</html>