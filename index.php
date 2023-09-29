<?php get_header();
$imgPath = get_stylesheet_directory_uri().'/assets/img/homepage/';
$homeUrl = get_home_url();
?>
<section class="banner p-0">
    <div class="container-fluid">
        <div class="row">
            <div id="bannerCarousel" class="carousel carousel-dark slide p-0 carousel-fade">
                <div class="carousel-inner">
                <?php 
                    $imageCarousel = [ $imgPath . 'banner1.jpg',$imgPath . 'banner2.jpg',$imgPath . 'banner3.jpg',$imgPath . 'banner4.jpg',$imgPath . 'banner5.jpg'];
                    $active = true;
                    foreach ($imageCarousel as $imgSrc) { ?>
                    <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                        <img loading="lazy" src="<?php echo $imgSrc; ?>" class="d-block w-100 lazyload" alt="...">
                        <div class="carousel-caption">
                            <div class="content">
                                <<?php echo $active ? 'h1' : 'h2'; ?>>Horem ipsum dolor sit amet consectetur adipiscing elit</<?php echo $active ? 'h1' : 'h2'; ?>>
                                <p>Qorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                                <div class="group-buttons">
                                    <a href="<?php echo $homeUrl ;?>/products/" target="_blank" rel="noopener noreferrer" class="yellow-btn">View Products</a>
                                    <a href="<?php echo $homeUrl ;?>/service/" target="_blank" rel="noopener noreferrer" class="transparent-btn">view services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $active = false; } ?>
                </div>
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
            </div>
            <div class="bottom-content">
                <div class="col-lg-6 col-md-12">
                    <div class="content">
                        <h3 class="text-center">Dorem ipsum dolor sit amet consectetur adipiscing elit</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="content">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="content">
                                    <p class="number">9</p>
                                    <p>Years Of Experience</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="content">
                                    <p class="number">88</p>
                                    <p>Awards & Recognition</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="content">
                                    <p class="number">721</p>
                                    <p>Client Centered</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="content">
                                    <p class="number">290</p>
                                    <p>Worker Employed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-product">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="header">
                    <h2 class="text-center">Our products</h2>
                </div>
                <div class="products">
                    <div class="row">
                    <?php
                        $args = array(
                            'post_type'        => 'product',
                            'posts_per_page'   => 4,
                            'post_status'      => 'publish',
                            'order'            => 'DESC',
                        );
                        $productLoop = new WP_Query($args);
                        if ($productLoop->have_posts()):
                            while ($productLoop->have_posts()) : $productLoop->the_post();
                            $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                            $product = wc_get_product(get_the_ID()); // Get the product object
                            $short_description = $product->get_short_description();
                            if ($product) {
                                if ($product->is_type('variable')) {
                                    // Get the price range for variable products
                                    $min_variation_price = $product->get_variation_price('min');
                                    $max_variation_price = $product->get_variation_price('max');
                                    $price_range = $min_variation_price . ' - ' . $max_variation_price;
                                    // Display the price range for variable products
                                    $price = $price_range;
                                } 
                                else {
                                    // Display the regular price for simple products
                                    $price = $product->get_price_html();
                                }
                            }
                            ?>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                    <div class="content" onClick="window.open('<?php echo get_permalink();?>');">
                                        <img loading="lazy" src="<?php echo $featured_image_url; ?>" alt="<?php echo get_the_title(); ?>">
                                        <p class="description"><?php echo $short_description; ?></p>
                                        <h5><?php echo get_the_title(); ?></h5>
                                        <a href="<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer" class="yellow-btn">View product</a>
                                    </div>
                                </div>
                            <?php endwhile;
                        endif;
                        wp_reset_postdata();  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="header">
                    <h2>our services</h2>
                    <p>Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
                </div>
                <div class="group-content">
                    <div class="row">
                        <?php
                        $firstBlog = array('post_type' => 'our-service','posts_per_page' => 5,'post_status' => 'publish', 'order' => 'DESC',);
                        $results = new WP_QUERY($firstBlog);
                        $excluded_posts = array();
                        if ($results->have_posts()) : ?>
                            <?php while ($results->have_posts()) : $results->the_post();
                                $blog_id = get_the_ID();
                                $excluded_posts[] = $blog_id; ?>
                                <div class="col-xxl-4 col-lg-6 col-md-12">
                                    <div class="content" onClick="window.open('<?php echo get_permalink();?>');">
                                        <div class="image-container">
                                            <img loading="lazy" src="<?php echo get_the_post_thumbnail_url($blog_id, 'medium'); ?>" alt="<?php echo get_the_title(); ?>">
                                        </div>
                                        <div class="right-content">
                                            <h5><?php echo get_the_title(); ?></h5>
                                            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;
                        endif; ?>
                    </div>
                </div>
                <a href="<?php echo $homeUrl; ?>/service/" target="_blank" rel="noopener noreferrer" class="yellow-btn">Learn More</a>
            </div>
        </div>
    </div>
</section>

<section class="facility">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="header">
                    <h2 class="text-center">Our Facilities</h2>
                </div>
                <div class="owl-carousel" id="facilities">
                    <div class="owl-carousel-item active">
                        <div class="row">
                            <img loading="lazy" src="<?php echo $imgPath; ?>San Pedro MFG Plant.jpg" class="d-block w-100 lazyload" alt="San Pedro MFG Plant">
                            <div class="content">
                                <h3>San Pedro MFG Plant</h3>
                                <p>Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                                <a href="<?php echo $homeUrl ;?>" target="_blank" rel="noopener noreferrer" class="yellow-btn">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel-item">
                        <div class="row">
                            <img loading="lazy" src="<?php echo $imgPath; ?>Tanza Cavite Mfg Plant.jpg" class="d-block w-100 lazyload" alt="Tanza Cavite Mfg Plant">
                            <div class="content">
                                <h3>Tanza Cavite Mfg Plant</h3>
                                <p>Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                                <a href="<?php echo $homeUrl ;?>" target="_blank" rel="noopener noreferrer" class="yellow-btn">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel-item">
                        <div class="row">
                        <img loading="lazy" src="<?php echo $imgPath; ?>Tayabas Quezon Buying Station and Farm Gate Processing.jpg" class="d-block w-100 lazyload" alt="Tayabas Quezon Buying Station and Farm Gate Processing">
                            <div class="content">
                                <h3>Tayabas Quezon Buying Station and Farm Gate Processing</h3>
                                <p>Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                                <a href="<?php echo $homeUrl ;?>" target="_blank" rel="noopener noreferrer" class="yellow-btn">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel-item">
                        <div class="row">
                            <img loading="lazy" src="<?php echo $imgPath; ?>Blending Machine.jpg" class="d-block w-100 lazyload" alt="Blending Machine">
                            <div class="content">
                                <h3>Blending Machine</h3>
                                <p>Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                                <a href="<?php echo $homeUrl ;?>" target="_blank" rel="noopener noreferrer" class="yellow-btn">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel-item">
                        <div class="row">
                        <img loading="lazy" src="<?php echo $imgPath; ?>Sachet Powder Machines.jpg" class="d-block w-100 lazyload" alt="Sachet Powder Machines">
                            <div class="content">
                                <h3>Sachet Powder Machines</h3>
                                <p>Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                                <a href="<?php echo $homeUrl ;?>" target="_blank" rel="noopener noreferrer" class="yellow-btn">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel-item">
                        <div class="row">
                        <img loading="lazy" src="<?php echo $imgPath; ?>Repacking Production Facility.jpg" class="d-block w-100 lazyload" alt="Repacking / Production Facility">
                            <div class="content">
                                <h3>Repacking / Production Facility</h3>
                                <p>Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                                <a href="<?php echo $homeUrl ;?>" target="_blank" rel="noopener noreferrer" class="yellow-btn">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="owl-carousel-item">
                        <div class="row">
                        <img loading="lazy" src="<?php echo $imgPath; ?>Spray-Drying Facility.jpg" class="d-block w-100 lazyload" alt="Spray-Drying Facility">
                            <div class="content">
                                <h3>Spray-Drying Facility</h3>
                                <p>Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                                <a href="<?php echo $homeUrl ;?>" target="_blank" rel="noopener noreferrer" class="yellow-btn">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="why-choose-us">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="header">
                    <h2 class="text-center">why choose us</h2>
                    <p>Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
                </div>
                <div class="group-icon">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="content">
                                <img loading="lazy" src="<?php echo $imgPath;?>Lorem Ipsum Dolor.png" alt="">
                                <h4>Lorem Ipsum Dolor</h4>
                                <p>Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="content">
                                <img loading="lazy" src="<?php echo $imgPath;?>Holo Wromem.png" alt="">
                                <h4>Holo Wromem</h4>
                                <p>Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="content">
                                <img loading="lazy" src="<?php echo $imgPath;?>Diliri Ipsum.png" alt="">
                                <h4>Diliri Ipsum</h4>
                                <p>Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="content">
                                <img loading="lazy" src="<?php echo $imgPath;?>Lorem Ipsum.png" alt="">
                                <h4>Lorem Ipsum</h4>
                                <p>Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-us p-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block ps-0">
                <div class="image-container">
                    <img loading="lazy" src="<?php echo $imgPath;?>about us.jpg" alt="about us">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="content">
                    <h2>about us</h2>
                    <img loading="lazy" src="<?php echo $imgPath;?>about us.jpg" alt="about us" class="d-block d-lg-none">
                    <p>Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
                    <a href="<?php echo $homeUrl ;?>" target="_blank" rel="noopener noreferrer" class="yellow-btn">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="local-clients carousel-template">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="header">
                    <h2 class="text-center">local clients</h2>
                    <p class="text-center">Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
                </div>
                <div class="owl-carousel" id="logo-carousel">
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>local clients/logo1.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>local clients/logo2.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>local clients/logo3.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>local clients/logo4.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>local clients/logo5.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>local clients/logo6.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>local clients/logo7.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>local clients/logo8.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>local clients/logo9.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>local clients/logo10.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>local clients/logo11.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>local clients/logo12.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>local clients/logo13.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>local clients/logo14.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="foreign-clients carousel-template">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="header">
                    <h2 class="text-center">foreign clients</h2>
                    <p class="text-center">Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
                </div>
                <div class="owl-carousel" id="logo-carousel">
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>foreign clients/logo1.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>foreign clients/logo2.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>foreign clients/logo3.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>foreign clients/logo4.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>foreign clients/logo5.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>foreign clients/logo6.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>foreign clients/logo7.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>foreign clients/logo8.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>foreign clients/logo9.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-partner carousel-template">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="header">
                    <h2 class="text-center">our Partners</h2>
                    <p class="text-center">Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
                </div>
                <div class="owl-carousel" id="logo-carousel">
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our partners/logo1.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our partners/logo2.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our partners/logo3.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our partners/logo4.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our partners/logo5.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our partners/logo6.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our partners/logo7.png" alt="">
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our partners/logo8.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="latest-blogs">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="header">
                        <h2>Latest Blogs</h2>
                        <p>Horem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="<?php echo $homeUrl ;?>/blogs/" target="_blank" rel="noopener noreferrer" class="yellow-btn">view more</a>
                    </div>
                </div>
                <?php
                $firstBlog = array('post_type' => 'post','posts_per_page' => 2,'post_status' => 'publish','order' => 'DESC',);
                $results = new WP_QUERY($firstBlog);
                $excluded_posts = array(); 
                ?>
                <?php if ($results->have_posts()) :
                    while ($results->have_posts()) : $results->the_post();
                        $blog_id = get_the_ID();
                        $excluded_posts[] = $blog_id;
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="content" onClick="window.open('<?php echo get_permalink(); ?>','_blank')">
                                <img loading="lazy" src="<?php echo get_the_post_thumbnail_url($blog_id, 'medium'); ?>" alt="">
                                <p class="date"><?php echo get_the_date(); ?></p>
                                <h5><?php echo get_the_title(); ?></h5>
                                <p class="description"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                <a href="<?php echo get_permalink(); ?>" target="_blank" rel="noopener noreferrer" class="read-more">read more<svg xmlns="http://www.w3.org/2000/svg" width="10" height="24" viewBox="0 0 10 24" fill="none"><path d="M3 18L7 13.5L3 9" stroke="#194887" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                            </div>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="featured-news-and-events">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="header">
                    <h2>Featured news and events</h2>
                    <p class="text-center">Horem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <?php $firstBlog = array('post_type' => 'news-events','posts_per_page' => 1,'post_status' => 'publish','order' => 'DESC');
                $results = new WP_Query($firstBlog);
                $excluded_posts = array();
                if ($results->have_posts()) :
                    while ($results->have_posts()) : $results->the_post();
                        $blog_id = get_the_ID();
                        $excluded_posts[] = $blog_id; ?>
                        <div class="col-lg-6 col-md-12">
                            <div class="feature-news" onClick="window.open('<?php echo get_permalink();?>');">
                                <img loading="lazy" src="<?php echo get_the_post_thumbnail_url($blog_id, 'medium'); ?>" alt="">
                                <div class="content">
                                    <p class="date"><?php echo get_the_date(); ?></p>
                                    <h4>Porem ipsum dolor sit amet consectetur elitara sit amet Porem ipsum... </h4>
                                    <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                    <a href="<?php echo the_permalink(); ?>" target="_blank" rel="noopener noreferrer" class="read-more">read more<svg xmlns="<?php echo $homeUrl; ?>www.w3.org/2000/svg" width="10" height="24" viewBox="0 0 10 24" fill="none"><path d="M3 18L7 13.5L3 9" stroke="#194887" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                endif; ?>
                <div class="col-lg-5 col-md-12">
                    <div class="row">
                        <?php $remainingBlogs = array('post_type' => 'news-events','posts_per_page' => 3,'post_status' => 'publish','order' => 'DESC','post__not_in' => $excluded_posts);
                        $results = new WP_Query($remainingBlogs);
                        if ($results->have_posts()) :
                            while ($results->have_posts()) : $results->the_post();
                                $blog_id = get_the_ID(); ?>
                                <div class="col-md-12">
                                    <div class="content" onClick="window.open('<?php echo get_permalink();?>');">
                                        <img loading="lazy" src="<?php echo get_the_post_thumbnail_url($blog_id, 'medium'); ?>" alt="">
                                        <div class="contents">
                                            <p class="date">august 30, 2023</p>
                                            <h5>Porem ipsum...</h5>
                                            <p><?php echo wp_trim_words(get_the_excerpt(), 5); ?></p>
                                            <a href="<?php echo the_permalink(); ?>" target="_blank" rel="noopener noreferrer" class="read-more">read more<svg xmlns="<?php echo $homeUrl; ?>www.w3.org/2000/svg" width="10" height="24" viewBox="0 0 10 24" fill="none"><path d="M3 18L7 13.5L3 9" stroke="#194887" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="our-client-says">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="heaer">
                    <h2 class="text-center">what our client says about us</h2>
                </div>
                <div class="owl-carousel" id="our-client-say">
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our-client-says1.jpg"></img>
                        <div class="content">
                            <div class="rate">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                            </div>
                            <p class="comment">Norem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <p class="name">-Norem ipsum dolor </p>
                        </div>
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our-client-says2.jpg"></img>
                        <div class="content">
                            <div class="rate">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                            </div>
                            <p class="comment">Norem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <p class="name">-Norem ipsum dolor </p>
                        </div>
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our-client-says3.jpg"></img>
                        <div class="content">
                            <div class="rate">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                            </div>
                            <p class="comment">Norem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <p class="name">-Norem ipsum dolor </p>
                        </div>
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our-client-says1.jpg"></img>
                        <div class="content">
                            <div class="rate">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                            </div>
                            <p class="comment">Norem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <p class="name">-Norem ipsum dolor </p>
                        </div>
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our-client-says2.jpg"></img>
                        <div class="content">
                            <div class="rate">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                            </div>
                            <p class="comment">Norem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <p class="name">-Norem ipsum dolor </p>
                        </div>
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our-client-says3.jpg"></img>
                        <div class="content">
                            <div class="rate">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                            </div>
                            <p class="comment">Norem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <p class="name">-Norem ipsum dolor </p>
                        </div>
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our-client-says1.jpg"></img>
                        <div class="content">
                            <div class="rate">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                            </div>
                            <p class="comment">Norem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <p class="name">-Norem ipsum dolor </p>
                        </div>
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our-client-says2.jpg"></img>
                        <div class="content">
                            <div class="rate">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                            </div>
                            <p class="comment">Norem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <p class="name">-Norem ipsum dolor </p>
                        </div>
                    </div>
                    <div class="item">
                        <img loading="lazy" src="<?php echo $imgPath; ?>our-client-says3.jpg"></img>
                        <div class="content">
                            <div class="rate">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                                <img loading="lazy" src="<?php echo $imgPath; ?>star.png" alt="">
                            </div>
                            <p class="comment">Norem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <p class="name">-Norem ipsum dolor </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="inuire-now">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="form">
                        <h2>inquire now</h2>
                        <?php echo do_shortcode('[contact-form-7 id="67874c5" title="Inquire Now"]')?>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="contact-detail">
                        <h5>Contact details</h5>
                        <div class="detail">
                            <div class="row">
                                <div class="col-md-5 col-sm-12">
                                    <a href="tel:+63 2 877 4178"><img loading="lazy" src="<?php echo $imgPath; ?>tel.png" alt="">+63 2 877 4178</a>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    <a href="mailto:ahtsisales@gmail.com"><img loading="lazy" src="<?php echo $imgPath; ?>email.png" alt="">ahtsisales@gmail.com</a>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <a href="<?php echo $homeUrl ;?>" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="<?php echo $imgPath; ?>fb.png" alt="">Aim High Tolling Solutions Inc.</a>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    <a href="https://maps.app.goo.gl/aN9EaLE1gTpLvVNv8" target="_blank" rel="noopener noreferrer"><img loading="lazy" src="<?php echo $imgPath; ?>location.png" alt="">D01, 44 San Vicente Rd, San Pedro, 4023 Laguna</a>
                                </div>
                            </div>
                        </div>
                        <div class="map">
                            <img loading="lazy" src="<?php echo $imgPath; ?>maps.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer();?>