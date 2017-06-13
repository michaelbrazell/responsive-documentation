<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package responsive-documentation
 */
?>
<?php get_header(); ?>

    <div class="row-offcanvas row-offcanvas-left">
      <div class="content_container subpage">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1">
              <div class="wp_responsive_doc">
                <?php while ( have_posts() ) : the_post(); ?>
                  <?php $news_date = get_the_time('F j, Y', $post->ID); ?>
                  <p class="news_publish_date add_margin_5"><?php echo $news_date; ?></p>
                  <h1><?php the_title(); ?></h1>
                  <?php the_content(); ?>
                <?php endwhile; // end of the loop. ?>
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
