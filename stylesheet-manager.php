<?php
$bootstrapPath = get_stylesheet_directory_uri().'/assets/bootstrap/';
$globalPath = get_stylesheet_directory_uri().'/inc/css/';
$carouselPath = get_stylesheet_directory_uri().'/assets/carousel/'; ?>
<link rel="stylesheet" href="<?php echo $bootstrapPath;?>bootstrap.min.css">
<link rel="stylesheet" href="<?php echo$globalPath;?>desktop/global.css">
<link rel="stylesheet" media="screen and (max-width: 991px)" href="<?php echo$globalPath;?>mobile-tablet/global-mobile.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php if(is_front_page()){ ?>
    <link rel="stylesheet" href="<?php echo $carouselPath;?>owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $carouselPath;?>owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo $globalPath; ?>desktop/index.css">
    <link rel="stylesheet" media="screen and (max-width: 991px)" href="<?php echo $globalPath; ?>mobile-tablet/index-mobile.css">
<?php }?>