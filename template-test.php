<?php
/**
 * Template Name: Test-Template
 *
 * @package responsive-documentation
 */
?>
<?php get_header(); ?>

    <div class="row-offcanvas row-offcanvas-left">
      <div class="content_container subpage">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="wp_responsive_doc">

                <ul class="list-unstyled media_list">
                  <?php
                    
                  $media_args = array('post_type' => 'elements', 'orderby' => 'title', 'order' => 'DESC', 'posts_per_page' => -1);
                  $media_loop = new WP_Query( $media_args );
                
                  while ($media_loop->have_posts() ) : $media_loop->the_post(); ?>
                    <li <?php post_class("media_item"); ?>>
                      <h2><?php the_title(); ?></h2>
                      <?php the_content(); ?>  
                    </li>
                  <?php endwhile; ?>
                  <?php wp_reset_query(); ?>                 
                </ul>
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