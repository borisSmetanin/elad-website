<?php
get_header();
?>
 <!-- Portfolio Grid Section -->
 <section class="portfolio" id="portfolio">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Portfolio</h2>
        <hr class="star-dark mb-5">

        <div class="row">
          <?php
            foreach(get_hivrot_menue_pages() as $page_obj){
          ?>
              <div class="col-md-6 col-lg-4">
                <a class="portfolio-item d-block mx-auto" href="<?=get_option('siteurl').'/'.$page_obj->post_name ?>">
                  <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                    <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                      <i class="fas fa-search-plus fa-3x"></i>
                    </div>
                  </div>
                  <h2><?=$page_obj->post_title?> </h2>
                  <!-- <img class="img-fluid" src="wp-content/themes/hivrot/assets/img/portfolio/cabin.png" alt=""> -->
                </a>
              </div>

          <?php
            }
          ?>

      </div>
</section>

<?php
get_footer();
?>