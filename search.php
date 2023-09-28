<?php
get_header();
global $wp_query;
$s = $_GET['s'];
?>
<section class="searchResults" id="four-o-four">
    <div class="container">
        <h1>Search Results for: "<?php echo $s;?>"</h1>
        <hr>
        <div class="search-items">
            <?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args = array( 's' => $s, 'paged' => $paged, 'posts_per_page' => -1);
                $query = new WP_Query($args);
                if($query->have_posts()):
                    while($query->have_posts()):
                        $query->the_post(); ?>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-5">
                                <a href="<?php echo the_permalink();?>" target="_blank"><?php echo get_the_post_thumbnail();?></a>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-7">
                                <h3 class="search-title">
                                    <a href="<?php echo the_permalink();?>" target="_blank"><?php echo the_title();?></a>
                                </h3>
                                <p>
                                    <?php
                                    echo wp_trim_words(get_the_content(), 15);
                                    ?>
                                </p>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <div class="pagination-link">
                            <?php  echo paginate_links(array( 'total' => $query->max_num_pages, 'prev_next' => false )); ?>           
                        </div>
                <?php wp_reset_query();
            endif; ?>
            </div>
    </div>
</section>
<?php get_footer(); ?>

