<?php
/**
 * Template Name: Home-Template
 *
 * @package responsive-documentation
 */
?>
<?php get_header(); ?>

    <div class="row-offcanvas row-offcanvas-left active">
      <div class="content_container template_home">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12">
              <!-- WP Editor: START -->
              <section class="wp_responsive_doc add_margin_30">
                <?php while ( have_posts() ) : the_post(); ?>
                  <?php the_content(); ?>
                <?php endwhile; // end of the loop. ?>
              </section>
              <!-- WP Editor: END -->

              <div class="row add_margin_30">
                <div class="col-xs-12">
                  <section class="wp_responsive_doc">
                    <?php 
                      $alpha_components = get_field('alpha_components');
                      $alpha_component_count = count ($alpha_components);
                      $alpha_component_col_count = ($alpha_component_count / 4);
                      $alpha_component_col_count_round = round($alpha_component_col_count);

                      //Alpha sort the list (Only IDs provided)
                      $component_ids = get_field('alpha_components', false, false);

                      $component_args = array('post_type' => 'page', 'post__in' => $component_ids, 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1);
                      $component_loop = new WP_Query($component_args);

                    ?>


                    <h3>Component Browser</h3>
                    <p class="add_margin_30"><a href="/component-visualizer/">Component Visualizer</a></p>                      

                    <h3>Component List</h3>
                    <div class="component_list">                      
                      <?php
                        if ($alpha_components) {
                          
                          $result_count = 1;
                          $result_group_count = 1;

                          echo '<ul class="list-unstyled">';

                          while ($component_loop->have_posts() ) : $component_loop->the_post(); ?>

                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                            <?php

                            if (($result_group_count < 4) && ($result_count == $alpha_component_col_count_round)) {

                              echo '</ul><div class="clearfix alpha_components_clearfix alpha_components_clearfix_' . $result_group_count. '"></div><ul class="list-unstyled">';

                              $result_count = 1;
                              $result_group_count++;


                            } else {

                              $result_count++;

                            }
                          endwhile;
                        }
                      ?>
                      </ul>
                    </div>

                    <div class="clearfix"></div>
                    <h4>Component Count: <?php echo $alpha_component_count; ?></h4>  
                  </section>
                </div>
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
