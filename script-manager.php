<?php $bootsrapPath = get_stylesheet_directory_uri().'/assets/bootstrap/'; ?>
<?php $carouselPath = get_stylesheet_directory_uri().'/assets/carousel/'; ?>
<script src="<?php echo $bootsrapPath; ?>bootstrap.bundle.min.js"> </script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/inc/js/jquery.min.js"></script>
<?php if(is_front_page()){ ?>
    <script src="<?php echo $carouselPath; ?>owl.carousel.min.js"></script>
<?php }?>
<script>
    $(document).ready(function(){
        // homepage script
        <?php if(is_front_page()):?>
            var dropdownIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="10" height="11" viewBox="0 0 10 11" fill="none"> <path d="M4.99997 8.35018C4.82075 8.35018 4.64155 8.28175 4.50492 8.14518L0.205141 3.84536C-0.0683805 3.57184 -0.0683805 3.12837 0.205141 2.85496C0.478552 2.58155 0.921933 2.58155 1.19548 2.85496L4.99997 6.65968L8.80449 2.85509C9.07801 2.58168 9.52135 2.58168 9.79474 2.85509C10.0684 3.1285 10.0684 3.57197 9.79474 3.84549L5.49503 8.14531C5.35832 8.28191 5.17913 8.35018 4.99997 8.35018Z" fill="#2A2D32"/></svg>`
            $('form.wpcf7-form.init p br').remove()

            $('ul#menu-navmenu li:lt(3) a').after(dropdownIcon)
            var bottomContentHeight = $('.bottom-content').outerHeight();
            $('section.banner .bottom-content').css('bottom',-((bottomContentHeight/2)+40))
            $("section.banner.p-0").css("height",($("section.banner.p-0").height()+((bottomContentHeight/2)+40)))
            $("div#facilities").owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            })
            $("div#logo-carousel").owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                animateOut: 'fadeOut', 
                animateIn: 'fadeIn',   
                responsive: {
                    0: {
                        items: 2
                    },
                    767: {
                        items: 2
                    },
                    991: {
                        items: 3
                    },
                    1200: {
                        items: 5
                    },
                    1366: {
                        items: 6
                    }
                }
            });
            $("div#our-client-say").owlCarousel({
                loop:true,
                margin:30,
                nav:false,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                responsive:{
                    0:{
                        items:1
                    },
                    991:{
                        items:2
                    },
                    1200:{
                        items:3
                    }
                }
            })
            $('.map img').hover(async function(){
                const $this = $(this);
                const $iframe = $('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.330800482519!2d121.04152507585658!3d14.350257883155292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d72d9af9e485%3A0x68f0aa9275337b13!2sd01%2C%2044%20San%20Vicente%20Rd%2C%20San%20Pedro%2C%204023%20Laguna!5e0!3m2!1sen!2sph!4v1695709625098!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>');
                await new Promise((resolve) => {
                    $this.replaceWith($iframe);
                    resolve();
                });
            });
            // product section p
            var h3Elements = $('section.our-product p');
            var tallestHeight = 0;
            h3Elements.each(function() {
                var height = $(this).height();
                if (height > tallestHeight) {   
                    tallestHeight = height;
                }
            });
            $('section.our-product p').css('height',tallestHeight)
            // product section h5
            var h3Elements = $('section.our-product h5');
            var tallestHeight = 0;
            h3Elements.each(function() {
                var height = $(this).height();
                if (height > tallestHeight) {   
                    tallestHeight = height;
                }
            });
            $('section.our-product h5').css('height',tallestHeight)


            // blogs section p
            var blogsh5 = $('section.latest-blogs  p.description');
            var blogh5 = 0;
            blogsh5.each(function() {
                var height = $(this).height();
                if (height > blogh5) {   
                    blogh5 = height;
                }
            });
            $('section.latest-blogs  p.description').css('height',blogh5)
            // blogs section h5
            var blogsh5 = $('section.latest-blogs  h5');
            var blogh5 = 0;
            blogsh5.each(function() {
                var height = $(this).height();
                if (height > blogh5) {   
                    blogh5 = height;
                }
            });
            $('section.latest-blogs  h5').css('height',blogh5)

            $("button#rotateButton").click(function() {
                $('button#rotateButton i').toggleClass("down");
                $(".hellowbar").toggleClass("expanded");
            });

        // About us script
        <?php elseif(is_page('about-us')):?>

        <?php endif; ?>
    })
</script>