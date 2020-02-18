<?php
/**
 * Template Name: News-Template
 *
 * @package responsive-documentation
 */
?>
<?php get_header(); ?>

    <div class="row-offcanvas row-offcanvas-left">
      <div class="content_container subpage template_news">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
              <div class="wp_responsive_doc">
                <?php while ( have_posts() ) : the_post(); ?>
                  <h1><?php the_title(); ?></h1>
                  <?php the_content(); ?>
                <?php endwhile; // end of the loop. ?>
                
                <?php
                $news_args = array('post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1);
                $news_loop = new WP_Query($news_args);
              
                while ($news_loop -> have_posts()) : $news_loop->the_post();
                
                  //Variables
                  $news_title = get_the_title($post->ID);
                  $news_date = get_the_time('F j, Y', $post->ID);
                  $news_content = apply_filters('the_content', get_the_content($post->ID));
                  $news_link = get_the_permalink($post->ID);
                  $post_class = get_post_class($post->ID); ?>
                
                  <div class="doc_news_element">
                    <p class="news_publish_date"><?php echo $news_date; ?></p>
                    <h3><a href="<?php echo $news_link; ?>"><?php echo $news_title; ?></a></h3>
                    <div class="news_synopsis"><?php echo $news_content; ?></div>
                  </div>

                <?php endwhile; ?>
                <?php wp_reset_query(); ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sidebar-offcanvas" id="sidebar" role="navigation">
        <nav class="navbar navbar-default" role="navigation">
          <div class="collapse navbar-collapse no-transition" id="bs-example-navbar-collapse-1">
            <?php wp_nav_menu( array('menu' => 'TopNav')); ?>
          </div>
        </nav>
      </div>
      <div class="clearfix"></div>
      <?php get_footer(); ?>
    </div>
    
  </div><!-- #content -->

</div><!-- #page -->

</body>
</html>