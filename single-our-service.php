<?php
get_header(); ?>

<style>
	blockquote{
		padding-left: 30px;
		border-left: 2px solid #094074;
		margin-left: 30px !important;
	}
	blockquote *{
		font-style: italic !important;
	}
</style>

<?php
$theTitle = "";
        // Start the loop.
while (have_posts()) : the_post();

// GATHER DATA (DEFAULT VALUE FROM WORDPRESS)

  $blog_id = get_the_ID();
  $blog_title = get_the_title();
  $blog_link = get_permalink();
  $blog_content = get_the_content();
  $blog_date = get_the_date();


  $singlePosts[] = $post->ID;
?>
    <section class="blogSingle">
        <div class="container-fluid">
            <div class="wrapper">
                <div class="row">
                <h1><?php echo $blog_title;?></h1>
                <p class="date text-center"><?php echo get_the_date('m/d/Y'); ?></p>
                <div class="image-container" style="margin-bottom:50px">
                    <?php echo get_the_post_thumbnail(); ?>
                </div>
                <div class="col-md-10">
                    <div class="content-container">
                        <?php echo the_content(); ?>
                    </div>
                </div>
                </div>
                <div class="col-md-10 m-auto">
                    <div class="d-flex soc-med col-md-11">
                        <span>Share on</span>
                        <a href="https://www.facebook.com/sharer.php?u=<?php echo get_home_url().get_post_field('post_name', get_the_ID()); ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog-single/Facebook.png" alt=""></a>
                        <!-- <a href="https://www.instagram.com/share?url=<?php echo get_home_url().get_post_field('post_name', get_the_ID()); ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog-single/Instagram.png" alt=""></a> -->
                        <a href="https://twitter.com/share?url=<?php echo get_home_url().get_post_field('post_name', get_the_ID()); ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blog-single/Twitter.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        endwhile;
    ?>

<section class="moreBlogs">
        <div class="container-fluid">
            <div class="wrapper">
                <div class="col-md-12">
                    <h2 class="text-center red">MORE BLOGS</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12 blogs-main row p-0">
                    <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $custom_args = array(
                          'paged'            => $paged,
                          'post_type'        => 'our-service', //  post_type
                          'post__not_in' =>   array($blog_id),
                          'posts_per_page'   => 3,
                          'post_status' 	   => 'publish',
                        'order' => 'DESC',
                         
                        );
                        $results = new WP_QUERY($custom_args);
                    ?>
                                    <?php if ($results->have_posts()) : ?>
                              <?php while ($results->have_posts()) : $results->the_post();
                                 $blog_id = get_the_ID();
                              ?>

                                  <?php
                                      // GATHER DATA (DEFAULT VALUE FROM WORDPRESS)
                                      $blog_title = get_the_title();
                                      $blog_link = get_permalink();
                                      $excerpt = get_the_excerpt();
                                      $blog_content = substr($excerpt, 0, 70);
                                      $blog_date = get_the_date();
                                      if (has_post_thumbnail()) {
                                          $blog_img = get_the_post_thumbnail_url($blog_id, 'full');
                                      } else {
                                          $blog_img = '';
                                      }
                                  ?>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="content-container" style="cursor:pointer;" onClick="window.open('<?php echo $blog_link; ?>','_blank')">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                            <div class="content">
                                <h3><?php substr(the_title(),11)?></h3>
                                <p class="date"><?php echo get_the_date('m/d/Y'); ?></p>
                                <p><?php echo wp_trim_words(get_the_excerpt(),20);?></p>
                                <a href="<?php echo get_permalink();?>" target="_blank" rel="noopener noreferrer" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif;?>       
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();?>
<script>
$(document).ready(function() {
    var h3Elements = $('section.moreBlogs h3');
    var tallestHeight = 0;
    h3Elements.each(function() {
        var height = $(this).height();
        if (height > tallestHeight) {   
            tallestHeight = height;
        }
    });
    $('section.moreBlogs h3').css('height',tallestHeight)
});
</script>