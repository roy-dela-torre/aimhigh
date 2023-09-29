<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo wp_title(); ?></title>
    <?php include 'stylesheet-manager.php';?>
    <?php is_front_page() ? "" : wp_head()?>
    <!-- <link rel="icon" href="<?php //echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/logo-icon.png" sizes="32x32" /> -->
</head>
<body <?php body_class(); ?>>
<div class="hellowbar sticky-top">
  <div class="container-fluid">
    <div class="wrapper">
      <div class="row">
        <div class="mainwrapper">
          <div class="row">
            <div class="col-lg-3">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Horem ipsum dolor sit </h5>
                <button id="rotateButton" class="d-lg-none"><i class="fa fa-angle-up rotate"></i></button>
              </div>
            </div>
            <div class="col-lg-9">
              <?php echo do_shortcode('[contact-form-7 id="69400e5" title="header form"]')?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-xxl bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand pt-0 pb-0" href="<?php echo get_home_url(); ?>">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/navlogo.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php wp_nav_menu(array('Primary Menu' => 'Primary','menu_class' => 'navMenu navbar-nav me-auto mb-2 mb-lg-0','container' => false,));?>
        <form class="d-flex m-0" role="search">
            <div class="input-group d-flex">
                <form role="search" method="get" class="d-flex searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                  <div class="form-outline">
                    <input class="form-control me-2 mb-0 p-0" type="search" placeholder="Search Here..." aria-label="Search" value="<?php echo get_search_query(); ?>" name="s" id="s">
                  </div>
                  <button type="submit" class="btn btn-primary p-0">
                      <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
                </form>
            </div>
        </form>
    </div>
  </div>
</nav>