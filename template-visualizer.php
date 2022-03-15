<?php
/**
 * Template Name: Visualizer-Template
 *
 * @package responsive-documentation
 */
?>
<?php get_header(); ?>

    <div class="row-offcanvas row-offcanvas-left">
      <div class="content_container template_visualizer" id="content_container">
        <div class="container">
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
      
                    <?php 
                      $alpha_elements = get_field('alpha_elements');
                      $element_ids = get_field('alpha_elements', false, false);

                      foreach ($element_ids as $element_id) { 

                        $element_args = array('post_type' => 'element', 'p' => $element_id, 'posts_per_page' => -1);
                        $element_loop = new WP_Query($element_args);

                        while ($element_loop->have_posts()) : $element_loop->the_post();

                          //Query the associated_elements Relationship field for the Element ID
                          $pages_args = array('post_type' => 'page', 'meta_query' => array(array('key' => 'associated_elements', 'value' => '"' . $element_id . '"', 'compare' => 'LIKE')), 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1);
                          $pages_loop = new WP_Query($pages_args);

                          while ($pages_loop->have_posts()) : $pages_loop->the_post();

                            $page_title = get_the_title();
                            $page_link = get_the_permalink();

                          endwhile;
                          $element_loop->reset_postdata();

                    ?>

                      <!-- Component: Associated Elements: START -->
                      <h2 class="wp_responsive_doc" id="element_<?php echo get_the_ID(); ?>">
                        <a href="<?php echo $page_link ?>"><?php the_field('component_variation_name'); ?></a>
                      </h2>

                      <?php if (get_the_content()) { ?>
                        <section class="wp_responsive_doc">
                          <?php the_content(); ?>
                        </section>
                      <?php } ?>

                      <?php
                        //Determine how many HTML examples there are
                        $interactive_example_count = count(get_field('component_markup'));
                        
                        if (get_field('component_interactive_markup_grid')) {
                        
                          $interactive_example_requested_grid = (get_field('component_interactive_markup_grid'));

                          if ($interactive_example_requested_grid == 12) { 
                            $interactive_example_grid = "col-xs-12";
                          } else { 
                            $interactive_example_grid = "col-xs-12 col-sm-6 col-md-" . $interactive_example_requested_grid;
                          }
                          
                        } else { 

                          if ($interactive_example_count == 1) {
                            $interactive_example_grid = "col-xs-12";
                          } elseif ($interactive_example_count == 2) {                    
                            $interactive_example_grid = "col-xs-12 col-sm-6";
                          } elseif ($interactive_example_count >= 3) {                      
                            $interactive_example_grid = "col-xs-12 col-sm-6 col-md-4";
                          }
                          
                        }
                      ?>

                      <?php if (!(get_the_content())) { ?>
                        <div class="row">
                          <?php $component_sample_counter = 1; ?>
                          <?php while (have_rows('component_markup')) : the_row(); ?>               
                            <div class="<?php echo $interactive_example_grid; ?>">
                              <?php /*
                              //Code and Responsive Tester Buttons
                              <?php if ($interactive_example_count > 1) { ?>
                                <div class="doc_key_container">
                                  <div class="doc_key"><?php echo $component_sample_counter; ?></div>
                                  <div class="doc_key reference_key">
                                    <a href="#" data-toggle="modal" data-target="#component_markup_modal" data-title="<?php the_field('component_variation_name'); ?>" data-subtitle="<?php the_sub_field('component_interactive_markup_title'); ?>" data-component="<?php echo get_the_ID(); ?>" data-subcomponent="<?php echo $component_sample_counter; ?>" data-markup="<?php echo urlencode(get_sub_field('component_sample_markup')); ?>">&lt;/&gt;</a>
                                  </div>
                                  <div class="doc_key reference_key"><a href="<?php the_permalink(); ?>?subcomponent=<?php echo $component_sample_counter; ?>" target="_blank"><span class="icon-mobile icon_16"></span></a></div>
                                </div>
                                <div class="clearfix"></div>
                              <?php } elseif ($interactive_example_count >= 1) { ?>
                                <div class="doc_key_container">
                                  <div class="doc_key reference_key">
                                    <a href="#" data-toggle="modal" data-target="#component_markup_modal" data-title="<?php the_field('component_variation_name'); ?>" data-subtitle="<?php the_sub_field('component_interactive_markup_title'); ?>" data-component="<?php echo get_the_ID(); ?>" data-subcomponent="<?php echo $component_sample_counter; ?>" data-markup="<?php echo urlencode(get_sub_field('component_sample_markup')); ?>">&lt;/&gt;</a>
                                  </div>
                                  <div class="doc_key reference_key"><a href="<?php the_permalink(); ?>?subcomponent=<?php echo $component_sample_counter; ?>" target="_blank"><span class="icon-mobile icon_16"></span></a></div>
                                </div>
                                <div class="clearfix"></div>
                              <?php } ?>
                              */ ?>
                              <?php if (get_sub_field('component_interactive_markup_title')) { ?>
                                <h4 class="wp_responsive_doc"><?php the_sub_field('component_interactive_markup_title'); ?></h4>
                              <?php } ?>                                                
                              <?php the_sub_field('component_interactive_markup'); ?>
                            </div>
                            <?php if ($interactive_example_requested_grid) { ?>
                              <?php if ($interactive_example_requested_grid == 12) { ?>
                                <div class="clearfix add_margin_30 hidden-xs"></div>
                              <?php } ?>
                              <?php if ((($interactive_example_requested_grid == 6) && ($component_sample_counter % 2 == 0))  || (($interactive_example_requested_grid == 6) && ($interactive_example_count == $component_sample_counter))) { ?>
                                <div class="clearfix add_margin_30 hidden-xs"></div>
                              <?php } ?>
                              <?php if ((($interactive_example_requested_grid == 4) && ($component_sample_counter % 3 == 0)) || (($interactive_example_requested_grid == 4) && ($interactive_example_count == $component_sample_counter))) { ?>
                                <div class="clearfix add_margin_30 hidden-xs"></div>
                              <?php } ?>  
                              <?php if ((($interactive_example_requested_grid == 3) && ($component_sample_counter % 4 == 0)) || (($interactive_example_requested_grid == 3) && ($interactive_example_count == $component_sample_counter))) { ?>
                                <div class="clearfix add_margin_30 hidden-xs"></div>
                              <?php } ?>                       
                            <?php } else { ?>
                              <?php if (($interactive_example_count == 4) && ($component_sample_counter == 3)) { ?>
                                <div class="clearfix add_margin_30 hidden-xs"></div>
                              <?php } ?>                                                  
                            <?php } ?>
                            <?php if ($component_sample_counter % 2 == 0) { ?>
                              <?php if (!(($interactive_example_requested_grid == 12) || ($interactive_example_requested_grid == 6))) { ?>
                                <div class="clearfix add_margin_30 visible-sm"></div>
                              <?php } ?>
                            <?php } ?>
                            <div class="clearfix add_margin_30 visible-xs"></div>
                            <?php $component_sample_counter++; ?>

                          <?php endwhile; ?>
                        </div>

                        <?php /*
                        //Detailed Configuration Information
                        <section class="wp_responsive_doc add_margin_60">
                          <button class="btn btn_secondary collapsed" role="button" data-toggle="collapse" href="#individual_component_detail_<?php echo get_the_ID(); ?>" aria-expanded="false" aria-controls="individual_component_detail_<?php echo get_the_ID(); ?>">Detailed Configuration Information for <?php the_field('component_variation_name'); ?></button>                
                          <div class="panel panel-default collapse" id="individual_component_detail_<?php echo get_the_ID(); ?>" aria-expanded="false">
                            <div class="panel-body">
                              <?php if (get_field('component_description')) { ?>
                                <h3>Description</h3>
                                <?php the_field('component_description'); ?>
                              <?php } ?>
                              <?php if (get_field('component_use')) { ?>
                                <h3>Usage Guidelines</h3>
                                <?php the_field('component_use'); ?>
                              <?php } ?> 
                              <?php if ((get_field('component_options')) || (get_field('component_options_html'))) { ?>
                                <h3>Design and Implementation Options</h3>
                                <?php if (get_field('component_options_html')) { ?>
                                  <?php the_field('component_options_html'); ?>
                                <?php } else { ?>
                                  <?php the_field('component_options'); ?>
                                <?php } ?>
                              <?php } ?>  
                              <?php if (have_rows('component_markup')) { ?>
                                <h3>Markup</h3>
                                <?php $component_markup_counter = 1; ?>
                                <?php while (have_rows('component_markup')) : the_row(); ?>
                                  <?php $component_sample_markup = get_sub_field('component_sample_markup'); ?>         
                                  <?php if ($interactive_example_count > 1) { ?>
                                    <div class="doc_key"><?php echo $component_markup_counter; ?></div>
                                  <?php } ?>
<pre>
<?php the_sub_field('component_sample_markup'); ?> 
</pre>
                                  <?php $component_markup_counter++; ?>
                                <?php endwhile; ?>
                              <?php } ?>
                              <?php if (get_field('component_additional_markup')) { ?>
                                <?php the_field('component_additional_markup'); ?>
                              <?php } ?>                          
                            </div>
                          </div>
                          <div class="clearfix add_margin_30"></div>
                        </section>
                        */ ?>
                      <?php } ?>

                      <?php if (get_the_content()) { ?>
                        <div class="clearfix add_margin_60"></div>
                      <?php } ?>                  
                      <!-- Component: Associated Elements: END -->

                    <?php endwhile; ?>
                  <?php } ?>
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
