<?php
/**
 * The template for displaying all single Element posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package responsive-documentation
 */
?>
<?php get_header(); ?>

    <div class="row-offcanvas row-offcanvas-left">
      <div class="content_container subpage component_template">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="wp_responsive_doc">
                <h1>Responsive Component Tester</h1>
                <p>The selected component will be presented in a variety of scenarios, adjust the width of your browser to view the inherent responsive behavior and interaction.</p>
                <div class="breakpoint_indicator visible-lg">Desktop Large Breakpoint<br><small>(lg)</small></div>
                <div class="breakpoint_indicator visible-md">Desktop Small Breakpoint<br><small>(md)</small></div>
                <div class="breakpoint_indicator visible-sm">Tablet Breakpoint<br><small>(md)</small></div>
                <div class="breakpoint_indicator visible-xs">Mobile Breakpoint<br><small>(xs)</small></div>
              </div>

              <!-- Component: Associated Elements: START -->
              <h2 class="wp_responsive_doc" id="element_<?php echo get_the_ID(); ?>"><!--Component Type: --><span class="component_type"><?php the_field('component_variation_name'); ?></span></h2>
              <?php $component_sample_counter = 1; ?>
              <?php while (have_rows('component_markup')) : the_row(); ?>               
                <?php if (get_sub_field('component_interactive_markup_title')) { ?>
                  <h4 class="wp_responsive_doc"><?php the_sub_field('component_interactive_markup_title'); ?></h4>
                <?php } ?>                                                
                <?php the_sub_field('component_interactive_markup'); ?>
                <?php $component_sample_counter++; ?>
                <div class="clearfix add_margin_30"></div>
              <?php endwhile; ?>
              <!-- Component: Associated Elements: END -->              
              
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