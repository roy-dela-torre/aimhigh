<?php $homeUrl = get_home_url(); ?>
</body>
<footer>
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/homepage/footer-logo.png" alt="Aim High">
                        </a>
                        <p>Vorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="menu">
                        <div class="row">
                            <div class="col">
                                <div class="content">
                                    <h5>Quick link</h5>
                                    <div class="row">
                                       <div class="col">
                                            <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">awards & Certification </a>
                                            <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">About us</a>
                                            <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">home</a>
                                            <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">blogs</a>
                                       </div>
                                       <div class="col">
                                        <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">news & events</a>
                                            <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">Privacy Policy</a>
                                            <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">contact us</a>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="content">
                                    <h5>products</h5>
                                    <div class="row">
                                        <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">supplements</a>
                                        <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">vitamins</a>
                                        <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">coffee</a>
                                        <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">juice </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="content">
                                    <h5>services</h5>
                                    <div class="row">
                                        <div class="col">
                                            <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">Fruit and Herbal Powder Spray-Drying</a>
                                            <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">Product Repacking and Shrink Wrapping</a>
                                            <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">Powder Blending and Filling</a>
                                        </div>
                                       <div class="col">
                                            <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">Powder  Capsuling</a>
                                            <a href="<?php echo $homeUrl; ?>" target="_blank" rel="noopener noreferrer">Capsule Blistering</a>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <hr>
                    <p class="copyr-right">Copyright © 2022 - <?php echo date('Y')?> Aim High Tolling Solutions Inc. | <a href="https://seo-hacker.com/seo-philippines/" target="_blank" rel="noopener noreferrer">SEO</a> <a href="https://seo-hacker.com/" target="_blank" rel="noopener noreferrer"> by SEO-Hacker</a>. Optimized and maintained by <a href="https://sean.si/" target="_blank" rel="noopener noreferrer">Sean Si</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php include('script-manager.php')?>
<?php is_front_page() ? "" : wp_footer()?>
</html>