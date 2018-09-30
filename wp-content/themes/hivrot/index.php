<?php
function hivrot_debug($arg) {
  echo '<pre>';
  var_dump($arg);
  echo '<pre />';
  die;    
}

 // hivrot_debug(get_option('siteurl'));

//hivrot_debug(get_hivrot_menue_pages());
//print_r(get_hivrot_menue_pages());

//hivrot_debug(get_hivrot_menue_pages());
// foreach(get_all_page_ids() as $page_id) {
//   echo $page_id.' : ' .get_the_title($page_id).' <br />'; 
// }

//hivrot_debug(test());
get_header();
if (is_front_page()):
?>
 <!-- Portfolio Grid Section -->
 <section class="portfolio" id="portfolio">
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">קצת עלינו</h2>
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
<?php
endif;
?>

<?php
get_footer();
?>