<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package responsive-documentation
 */
?>

<style>
.entry-footer { display:none; }
</style>

<?php get_header(); ?>

    <div class="row-offcanvas row-offcanvas-left">
      <div class="content_container subpage component_template">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">

              <section class="wp_responsive_doc add_margin_30">
                <?php
                if ( have_posts() ) : ?>
            
                  <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'responsive-documentation' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
            
                  <?php
                  /* Start the Loop */
                  while ( have_posts() ) : the_post();
            
                    /**
                     * Run the loop for the search to output the results.
                     * If you want to overload this in a child theme then include a file
                     * called content-search.php and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', 'search' );
            
                  endwhile;
            
                  the_posts_navigation();
            
                else :
            
                  get_template_part( 'template-parts/content', 'none' );
            
                endif; ?>
              </section>

            </div>
          </div>
        </div>
      </div>
      <div class="sidebar-offcanvas" id="sidebar" role="navigation">
        <nav class="navbar navbar-default" role="navigation">
          <div class="collapse navbar-collapse no-transition" id="bs-example-navbar-collapse-1">
            <form role="search" method="get" class="search-form add_margin_20" action="http://web_standards.insidelabs.mathworks.com/">
              <div class="input-group">
                <input type="search" id="search-field" class="search-field form-control" placeholder="Search …" value="" name="s" title="Search for:">
                <span class="input-group-btn">
                  <input type="submit" class="search-submit btn btn-primary" value="Go!">
                </span>
              </div>
            </form>          
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
