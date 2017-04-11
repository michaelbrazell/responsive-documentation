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
                <p><small>The content is presented in a Bootstrap 12-column grid, but you can change the grid using the dropdowns below. The mobile view is always presented full-width. The query paramters are added to the URL so you can link to this page using a pre-set conlumn configuration.</small></p>
                <form action="<?php the_permalink(); ?>?subcomponent=<?php echo $_GET['subcomponent']; ?>" method="get">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="breakpoint_lg">Desktop Large</label>
                      <select name="breakpoint_lg" class="form-control" id="breakpoint_lg">
                        <option value="">-- select one --</option>
                        <option value="col-lg-12" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-lg-12")) { echo "selected=\"selected\""; } ?>>col-lg-12</option>
                        <option value="col-lg-11" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-lg-11")) { echo "selected=\"selected\""; } ?>>col-lg-11</option>
                        <option value="col-lg-10" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-lg-10")) { echo "selected=\"selected\""; } ?>>col-lg-10</option>
                        <option value="col-lg-9" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-lg-9")) { echo "selected=\"selected\""; } ?>>col-lg-9</option>
                        <option value="col-lg-8" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-lg-8")) { echo "selected=\"selected\""; } ?>>col-lg-8</option>
                        <option value="col-lg-7" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-lg-7")) { echo "selected=\"selected\""; } ?>>col-lg-7</option>
                        <option value="col-lg-6" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-lg-6")) { echo "selected=\"selected\""; } ?>>col-lg-6</option>
                        <option value="col-lg-5" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-lg-5")) { echo "selected=\"selected\""; } ?>>col-lg-5</option>
                        <option value="col-lg-4" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-lg-4")) { echo "selected=\"selected\""; } ?>>col-lg-4</option>
                        <option value="col-lg-3" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-lg-3")) { echo "selected=\"selected\""; } ?>>col-lg-3</option>
                        <option value="col-lg-2" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-lg-2")) { echo "selected=\"selected\""; } ?>>col-lg-2</option>
                        <option value="col-lg-1" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-lg-1")) { echo "selected=\"selected\""; } ?>>col-lg-1</option>
                      </select>
                    </div>                    
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="breakpoint_md">Desktop Small</label>
                      <select name="breakpoint_md" class="form-control" id="breakpoint_md">
                        <option value="">-- select one --</option>
                        <option value="col-md-12" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-md-12")) { echo "selected=\"selected\""; } ?>>col-md-12</option>
                        <option value="col-md-11" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-md-11")) { echo "selected=\"selected\""; } ?>>col-md-11</option>
                        <option value="col-md-10" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-md-10")) { echo "selected=\"selected\""; } ?>>col-md-10</option>
                        <option value="col-md-9" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-md-9")) { echo "selected=\"selected\""; } ?>>col-md-9</option>
                        <option value="col-md-8" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-md-8")) { echo "selected=\"selected\""; } ?>>col-md-8</option>
                        <option value="col-md-7" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-md-7")) { echo "selected=\"selected\""; } ?>>col-md-7</option>
                        <option value="col-md-6" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-md-6")) { echo "selected=\"selected\""; } ?>>col-md-6</option>
                        <option value="col-md-5" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-md-5")) { echo "selected=\"selected\""; } ?>>col-md-5</option>
                        <option value="col-md-4" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-md-4")) { echo "selected=\"selected\""; } ?>>col-md-4</option>
                        <option value="col-md-3" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-md-3")) { echo "selected=\"selected\""; } ?>>col-md-3</option>
                        <option value="col-md-2" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-md-2")) { echo "selected=\"selected\""; } ?>>col-md-2</option>
                        <option value="col-md-1" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-md-1")) { echo "selected=\"selected\""; } ?>>col-md-1</option>
                      </select>
                    </div>                       
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="breakpoint_sm">Tablet</label>
                      <select name="breakpoint_sm" class="form-control" id="breakpoint_sm">
                        <option value="">-- select one --</option>
                        <option value="col-sm-12" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-sm-12")) { echo "selected=\"selected\""; } ?>>col-sm-12</option>
                        <option value="col-sm-11" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-sm-11")) { echo "selected=\"selected\""; } ?>>col-sm-11</option>
                        <option value="col-sm-10" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-sm-10")) { echo "selected=\"selected\""; } ?>>col-sm-10</option>
                        <option value="col-sm-9" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-sm-9")) { echo "selected=\"selected\""; } ?>>col-sm-9</option>
                        <option value="col-sm-8" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-sm-8")) { echo "selected=\"selected\""; } ?>>col-sm-8</option>
                        <option value="col-sm-7" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-sm-7")) { echo "selected=\"selected\""; } ?>>col-sm-7</option>
                        <option value="col-sm-6" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-sm-6")) { echo "selected=\"selected\""; } ?>>col-sm-6</option>
                        <option value="col-sm-5" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-sm-5")) { echo "selected=\"selected\""; } ?>>col-sm-5</option>
                        <option value="col-sm-4" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-sm-4")) { echo "selected=\"selected\""; } ?>>col-sm-4</option>
                        <option value="col-sm-3" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-sm-3")) { echo "selected=\"selected\""; } ?>>col-sm-3</option>
                        <option value="col-sm-2" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-sm-2")) { echo "selected=\"selected\""; } ?>>col-sm-2</option>
                        <option value="col-sm-1" <?php if ((isset ($warning_message)) && ($_POST['state'] == "col-sm-1")) { echo "selected=\"selected\""; } ?>>col-sm-1</option>
                      </select>
                    </div>                     
                  </div>
                  <div class="col-sm-3">
                    <button type="submit" id="submit" class="btn btn_color_blue">Go!</button>
                  </div>
                </div>
                </form>
                <div class="breakpoint_indicator visible-lg">Desktop Large Breakpoint <span class="breakpoint_code">lg</span></div>
                <div class="breakpoint_indicator visible-md">Desktop Small Breakpoint <span class="breakpoint_code">md</span></div>
                <div class="breakpoint_indicator visible-sm">Tablet Breakpoint <span class="breakpoint_code">sm</span></div>
                <div class="breakpoint_indicator visible-xs">Mobile Breakpoint <span class="breakpoint_code">xs</span></div>
              </div>

              <!-- Component: Associated Elements: START -->
              <h2 class="wp_responsive_doc" id="element_<?php echo get_the_ID(); ?>"><!--Component Type: --><span class="component_type"><?php the_field('component_variation_name'); ?></span></h2>
              <div class="row">
                <div class="col-xs-12<?php if ($_GET['breakpoint_lg']) { echo " " . $_GET['breakpoint_lg']; } if ($_GET['breakpoint_md']) { echo " " . $_GET['breakpoint_md']; } if ($_GET['breakpoint_sm']) { echo " " . $_GET['breakpoint_sm']; } ?>">
                  <?php $component_sample_counter = 1; ?>
                  <?php while (have_rows('component_markup')) : the_row(); ?>               
                    <?php if (get_sub_field('component_interactive_markup_title')) { ?>
                      <h4 class="wp_responsive_doc"><?php the_sub_field('component_interactive_markup_title'); ?></h4>
                    <?php } ?>                                                
                    <?php the_sub_field('component_interactive_markup'); ?>
                    <?php $component_sample_counter++; ?>
                    <div class="clearfix add_margin_30"></div>
                  <?php endwhile; ?>
                </div>
              </div>
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