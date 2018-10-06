<?php
get_header();
$hivrot_page = get_post();
if (is_front_page()){
?>

 <section class="bg-primary text-white mb-0 hivrot-page" id="about">
      <div class="container">
        <h2 class="text-center text-uppercase text-white"><?=$hivrot_page->post_title?></h2>
        <hr class="star-light mb-5">
        <div class="row">
            <div class="col-md-12 col-lg-12 hivrot-page-content">
                <?= apply_filters('the_content', $hivrot_page->post_content); ?>
            </div>
        </div>
      </div>
  </section>

 <!-- Portfolio Grid Section -->
 <section class="portfolio" id="portfolio">
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">קיראו עוד</h2>
        <hr class="star-dark mb-5">

        <div class="row">
          <?php
            foreach(get_hivrot_page_items() as $hivrot_page_item){
          ?>
              <div class="col-md-6 col-lg-4">
                <a class="hivrot-page-item d-block mx-auto" href="<?=$hivrot_page_item['page_url'] ?>">
                  <h2><?=$hivrot_page_item['post_title']?> </h2>
                  <p class="page-post"><?= $hivrot_page_item['page_trimmed_content']?> <span class="read-more bold">(קיראו עוד)</span> </p>
                </a>
              </div>

          <?php
            }
          ?>
          <!-- end of row -->
        </div> 
      <!-- end of portfolio container -->
    </div>
    <!-- end of portfolio section -->
</section>

<section class="" id="activity-gallery">
  <div class="container">
    <h2 class="text-center text-uppercase">טעימות מהפעילות</h2>
    <hr class="star-dark mb-5">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <?php
          $main_page_gallery = get_main_page_gallery();
        ?>
        <div id="hivrot-main-page-gallery" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">

            <?php
              foreach($main_page_gallery as $i => $main_page_gallery_image){
            ?>
              <li data-target="#hivrot-main-page-gallery" data-slide-to="0" <?= $i ===0 ? 'class="active"' : ''?>></li>
            <?php
              }
            ?>
          </ol>
          <div class="carousel-inner">
            <?php
              foreach($main_page_gallery as $i => $main_page_gallery_image){
            ?>
            <div class="carousel-item <?= $i ===0 ? 'active' : ''?>">
              <img class="d-block w-100" src="<?=$main_page_gallery_image['guid']?>" alt="<?=$main_page_gallery_image['post_excerpt']?>">
            </div>
          <?php
              }
            ?>
          </div>
          <a class="carousel-control-prev" href="#hivrot-main-page-gallery" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#hivrot-main-page-gallery" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div><!-- End of column -->
    
    </div><!-- End of row -->
        
  </div><!-- End of container -->
      
</section><!-- End of section -->
<?php
} else {
?>
  <section class="hivrot-page" id="hivrot-page">
      <div class="container">
          <h2 class="text-center text-uppercase text-secondary mb-0"><?=$hivrot_page->post_title?></h2>
          <hr class="star-dark mb-5">
          <div class="row">
            <div class="col-md-12 col-lg-12 hivrot-page-content">
                <?= apply_filters('the_content', $hivrot_page->post_content); ?>
            </div>

        <!-- end of portfolio container -->
      </div>
      <!-- end of portfolio section -->
  </section>

<?php
}
?>
<?php
get_footer();
?>