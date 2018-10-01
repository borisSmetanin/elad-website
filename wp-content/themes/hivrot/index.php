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

<section class="" id="gallery">
  <div class="container">
    <h2 class="text-center text-uppercase">טעימות מהפעילות</h2>
    <hr class="star-dark mb-5">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        TODO add carusel in here!!!!!
        
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