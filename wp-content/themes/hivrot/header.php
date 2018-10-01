<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>חיברות</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= get_option('siteurl') ?>/wp-content/themes/hivrot/assets/lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- assets main root wp-content/themes/hivrot/assets -->
    <!-- Custom fonts for this template -->
    <link href="<?= get_option('siteurl') ?>/wp-content/themes/hivrot/assets/lib/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Heebo" rel="stylesheet">

    <!-- Plugin CSS -->
    <link href="<?= get_option('siteurl') ?>/wp-content/themes/hivrot/assets/lib/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for freelancer template -->
    <link href="<?= get_option('siteurl') ?>/wp-content/themes/hivrot/assets/css/freelancer.css" rel="stylesheet">
    <!--  Custom styles for hivrote (this site) template -->
    <link href="<?= get_option('siteurl') ?>/wp-content/themes/hivrot/style.css" rel="stylesheet">
    <!-- TODO use wp_head() in here-->

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">

        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          תפריט
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
              <?php
                foreach(get_hivrot_page_link_items() as $hivrote_page_link_item) {

                    // echo '<pre>';
                    // print_r($hivrote_page_link_item);
                    // echo '</pre>';
                    // die;
              ?>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded <?= isset($hivrote_page_link_item['class']) ?$hivrote_page_link_item['class'] : '' ?>" href="<?= $hivrote_page_link_item['link_herf']?>">
                            <?= $hivrote_page_link_item['title']?>
                        </a>
                    </li>
              <?php
                }
              ?>
          </ul>
        </div>

        <a class="navbar-brand js-scroll-trigger" href="<?= get_option('siteurl') ?>">חיברות</a>

      </div>
    </nav>