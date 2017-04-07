<?php
/**
 * Template Name: Component NEW-Template
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
              <!-- WP Editor: START -->
              <section class="wp_responsive_doc add_margin_30">
                <h1><?php the_title(); ?></h1>
                <?php while ( have_posts() ) : the_post(); ?>
                  <?php the_content(); ?>
                <?php endwhile; // end of the loop. ?>

                <!-- Working Examples: START -->
                <?php if(have_rows('working_examples')) { ?>
                  <h3>Working Examples</h3>
                  <ul>
                    <?php while (have_rows('working_examples')) : the_row(); ?>
                      <li><a href="<?php the_sub_field('working_example_link'); ?>" target="_blank"><?php the_sub_field('working_example_title'); ?></a></li>
                    <?php endwhile; ?>
                  </ul>
                <?php } ?>
                <!-- Working Examples: END -->

                <!-- Related Components: START -->
                <?php $related_components = get_field('related_components'); ?>
                <?php if ($related_components) { ?>
                  <h3>Related Components</h3>
                  <ul>
                    <?php foreach( $related_components as $post): ?>
                      <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                  <?php wp_reset_postdata(); ?>
                <?php } ?>
                <!-- Related Components: END -->                                 
                
              </section>
              <!-- WP Editor: END -->
              
              
              <!-- WYSIWYG Content: START -->
              <section class="wp_responsive_doc add_margin_60">
                <?php if (get_field('wysiwyg_content')) { ?>
                  <?php the_field('wysiwyg_content'); ?>
                <?php } ?>              
              </section>
              <!-- WYSIWYG Content: START -->


              <!-- Elements Content: START -->
              <?php $component_elements = get_field('component_elements'); ?>
              <?php if ($component_elements) { ?>
                  <?php foreach($component_elements as $post): ?>

                    <h2 class="wp_responsive_doc" id="element_<?php echo get_the_ID(); ?>"><!--Component Type: --><span class="component_type"><?php the_field('component_variation_name'); ?></span></h2>
                    <?php
                      //Determine how many HTML examples there are
                      $interactive_example_count = count(get_field('component_markup'));
                      
                      if (get_field('component_interactive_markup_grid')) {
                      
                        $interactive_example_requested_grid = (get_field('component_interactive_markup_grid'));
                        $interactive_example_grid = "col-xs-12 col-md-" . $interactive_example_requested_grid . "\"";
                        
                      } else { 
                      
                        if ($interactive_example_count == 1) {
                          $interactive_example_grid = "col-xs-12";
                        } elseif ($interactive_example_count == 2) {                    
                          $interactive_example_grid = "col-xs-12 col-md-6";
                        } elseif ($interactive_example_count >= 3) {                      
                          $interactive_example_grid = "col-xs-12 col-md-4";
                        }
                        
                      }
                    ?>
                    <div class="row add_margin_30">
                      <?php $component_sample_counter = 1; ?>
                      <?php while (have_rows('component_markup')) : the_row(); ?>               
                        <div class="<?php echo $interactive_example_grid; ?>">
                          <?php if ($interactive_example_count > 1) { ?>
                            <div class="doc_key"><?php echo $component_sample_counter; ?></div>
                            <div class="clearfix"></div>
                            
                          <?php } ?> 
                          <?php if (get_sub_field('component_interactive_markup_title')) { ?>
                            <h4 class="wp_responsive_doc"><?php the_sub_field('component_interactive_markup_title'); ?></h4>
                          <?php } ?>                                                
                          <?php the_sub_field('component_interactive_markup'); ?>
                        </div>
                        <?php if ($interactive_example_requested_grid) { ?>
                          <?php if ($interactive_example_requested_grid == 12) { ?>
                            <div class="clearfix"></div>
                          <?php } ?>
                          <?php if (($interactive_example_requested_grid == 6) && ($component_sample_counter % 2 == 0)) { ?>
                            <div class="clearfix"></div>
                          <?php } ?>
                          <?php if (($interactive_example_requested_grid == 4) && ($component_sample_counter % 3 == 0)) { ?>
                            <div class="clearfix"></div>
                          <?php } ?>  
                          <?php if (($interactive_example_requested_grid == 3) && ($component_sample_counter % 4 == 0)) { ?>
                            <div class="clearfix"></div>
                          <?php } ?>                       
                        <?php } else { ?>
                          <?php if (($interactive_example_count == 4) && ($component_sample_counter == 3)) { ?>
                            <div class="clearfix"></div>
                          <?php } ?>                                                  
                        <?php } ?>
                        <?php $component_sample_counter++; ?>
                      <?php endwhile; ?>
                    </div>

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
                          <?php if ((get_field('component_options')) || (get_sub_field('component_options_html'))) { ?>
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

                  <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
              <?php } ?>
              <!-- Elements Content: END -->










             
              
              <?php if (have_rows('component_types')) { ?>
              <!-- Component Types: START -->
                
                <!-- Individual Component: START -->
                <?php $individual_component_counter = 1; ?>
                <?php while (have_rows('component_types')) : the_row(); ?>                   
                
                  <h2 class="wp_responsive_doc" id="<?php the_sub_field('component_variation_id'); ?>"><!--Component Type: --><span class="component_type"><?php the_sub_field('component_variation_name'); ?></span></h2>
                  <?php
                    //Determine how many HTML examples there are
                    $interactive_example_count = count(get_sub_field('component_markup'));
                    
                    if (get_sub_field('component_interactive_markup_grid')) {
                    
                      $interactive_example_requested_grid = (get_sub_field('component_interactive_markup_grid'));
                      $interactive_example_grid = "col-xs-12 col-md-" . $interactive_example_requested_grid . "\"";
                      
                    } else { 
                    
                      if ($interactive_example_count == 1) {
                        $interactive_example_grid = "col-xs-12";
                      } elseif ($interactive_example_count == 2) {                    
                        $interactive_example_grid = "col-xs-12 col-md-6";
                      } elseif ($interactive_example_count >= 3) {                      
                        $interactive_example_grid = "col-xs-12 col-md-4";
                      }
                      
                    }
                  ?>                  
                  <div class="row add_margin_30">
                    <?php $component_sample_counter = 1; ?>
                    <?php while (have_rows('component_markup')) : the_row(); ?>               
                      <div class="<?php echo $interactive_example_grid; ?>">
                        <?php if ($interactive_example_count > 1) { ?>
                          <div class="doc_key"><?php echo $component_sample_counter; ?></div>
                          <div class="clearfix"></div>
                          
                        <?php } ?> 
                        <?php if (get_sub_field('component_interactive_markup_title')) { ?>
                          <h4 class="wp_responsive_doc"><?php the_sub_field('component_interactive_markup_title'); ?></h4>
                        <?php } ?>                                                
                        <?php the_sub_field('component_interactive_markup'); ?>
                      </div>
                      <?php if ($interactive_example_requested_grid) { ?>
                        <?php if ($interactive_example_requested_grid == 12) { ?>
                          <div class="clearfix"></div>
                        <?php } ?>
                        <?php if (($interactive_example_requested_grid == 6) && ($component_sample_counter % 2 == 0)) { ?>
                          <div class="clearfix"></div>
                        <?php } ?>
                        <?php if (($interactive_example_requested_grid == 4) && ($component_sample_counter % 3 == 0)) { ?>
                          <div class="clearfix"></div>
                        <?php } ?>  
                        <?php if (($interactive_example_requested_grid == 3) && ($component_sample_counter % 4 == 0)) { ?>
                          <div class="clearfix"></div>
                        <?php } ?>                       
                      <?php } else { ?>
                        <?php if (($interactive_example_count == 4) && ($component_sample_counter == 3)) { ?>
                          <div class="clearfix"></div>
                        <?php } ?>                                                  
                      <?php } ?>
                      <?php $component_sample_counter++; ?>
                    <?php endwhile; ?>
                  </div>
                  <section class="wp_responsive_doc add_margin_60">
                    <button class="btn btn_secondary collapsed" role="button" data-toggle="collapse" href="#individual_component_detail_<?php echo $individual_component_counter; ?>" aria-expanded="false" aria-controls="individual_component_detail_<?php echo $individual_component_counter; ?>">Detailed Configuration Information for <?php the_sub_field('component_variation_name'); ?></button>                
                    <div class="panel panel-default collapse" id="individual_component_detail_<?php echo $individual_component_counter; ?>" aria-expanded="false">
                      <div class="panel-body">
                        <?php if (get_sub_field('component_description')) { ?>
                          <h3>Description</h3>
                          <?php the_sub_field('component_description'); ?>
                        <?php } ?>
                        <?php if (get_sub_field('component_use')) { ?>
                          <h3>Usage Guidelines</h3>
                          <?php the_sub_field('component_use'); ?>
                        <?php } ?> 
                        <?php if ((get_sub_field('component_options')) || (get_sub_field('component_options_html'))) { ?>
                          <h3>Design and Implementation Options</h3>
                          <?php if (get_sub_field('component_options_html')) { ?>
                            <?php the_sub_field('component_options_html'); ?>
                          <?php } else { ?>
                            <?php the_sub_field('component_options'); ?>
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
                        <?php if (get_sub_field('component_additional_markup')) { ?>
                          <?php the_sub_field('component_additional_markup'); ?>
                        <?php } ?>                          
                      </div>
                    </div>
                    <div class="clearfix add_margin_30"></div>
                  </section>
                  <?php $individual_component_counter++; ?>
                <?php endwhile; ?>
                <!-- Individual Component: END -->
              <!-- Component Types: END -->                            
              <?php } ?>
              
              <?php if (have_rows('addon_types')) { ?>
              <!-- Add-On Types: START -->
                
                <!-- Individual Add-On: START -->
                <?php $individual_addon_counter = 1; ?>
                
                <?php $component_name = get_the_title(); ?>
                <?php $component_name = rtrim($component_name, "s"); ?>
                <h2 class="wp_responsive_doc">Additional <?php echo $component_name; ?> Options</h2>
                
                <?php while (have_rows('addon_types')) : the_row(); ?>                   
                
                  <h3 class="wp_responsive_doc add_margin_20"><span class="component_type"><?php the_sub_field('addon_variation_name'); ?></span></h3>
                  <?php
                    //Determine how many HTML examples there are
                    $interactive_example_count = count(get_sub_field('addon_markup'));
                    
                    if (get_sub_field('addon_interactive_markup_grid')) {
                    
                      $interactive_example_requested_grid = (get_sub_field('addon_interactive_markup_grid'));
                      $interactive_example_grid = "col-xs-12 col-md-" . $interactive_example_requested_grid . "\"";
                      
                    } else { 
                    
                      if ($interactive_example_count == 1) {
                        $interactive_example_grid = "col-xs-12";
                      } elseif ($interactive_example_count == 2) {                    
                        $interactive_example_grid = "col-xs-12 col-md-6";
                      } elseif ($interactive_example_count >= 3) {                      
                        $interactive_example_grid = "col-xs-12 col-md-4";
                      }
                      
                    }
                  ?>
                  <div class="row add_margin_30">
                    <?php $addon_sample_counter = 1; ?>
                    <?php while (have_rows('addon_markup')) : the_row(); ?>               
                      <div class="<?php echo $interactive_example_grid; ?>">
                        <?php if ($interactive_example_count > 1) { ?>
                          <div class="doc_key"><?php echo $addon_sample_counter; ?></div>
                          <div class="clearfix"></div>
                        <?php } ?>
                        <?php if (get_sub_field('addon_interactive_markup_title')) { ?>
                          <h4 class="wp_responsive_doc"><?php the_sub_field('addon_interactive_markup_title'); ?></h4>
                        <?php } ?>                                                
                        <?php the_sub_field('addon_interactive_markup'); ?>
                      </div>
                      <?php if ($interactive_example_requested_grid) { ?>
                        <?php if ($interactive_example_requested_grid == 12) { ?>
                          <div class="clearfix"></div>
                        <?php } ?>
                        <?php if (($interactive_example_requested_grid == 6) && ($addon_sample_counter % 2 == 0)) { ?>
                          <div class="clearfix"></div>
                        <?php } ?>
                        <?php if (($interactive_example_requested_grid == 4) && ($addon_sample_counter % 3 == 0)) { ?>
                          <div class="clearfix"></div>
                        <?php } ?>  
                        <?php if (($interactive_example_requested_grid == 3) && ($addon_sample_counter % 4 == 0)) { ?>
                          <div class="clearfix"></div>
                        <?php } ?>                       
                      <?php } else { ?>
                        <?php if (($interactive_example_count == 4) && ($addon_sample_counter == 3)) { ?>
                          <div class="clearfix"></div>
                        <?php } ?>                                                  
                      <?php } ?>                      
                      <?php $addon_sample_counter++; ?>
                    <?php endwhile; ?>
                  </div>
                  <section class="wp_responsive_doc add_margin_60">
                    <button class="btn btn_secondary collapsed" role="button" data-toggle="collapse" href="#individual_addon_detail_<?php echo $individual_addon_counter; ?>" aria-expanded="false" aria-controls="individual_addon_detail_<?php echo $individual_addon_counter; ?>">Detailed Configuration Information for <?php the_sub_field('addon_variation_name'); ?></button>                
                    <div class="panel panel-default collapse" id="individual_addon_detail_<?php echo $individual_addon_counter; ?>" aria-expanded="false">
                      <div class="panel-body">
                        <?php if (get_sub_field('addon_description')) { ?>
                          <h3>Description</h3>
                          <?php the_sub_field('addon_description'); ?>
                        <?php } ?>
                        <?php if (get_sub_field('addon_use')) { ?>
                          <h3>Usage Guidelines</h3>
                          <?php the_sub_field('addon_use'); ?>
                        <?php } ?> 
                        <?php if ((get_sub_field('addon_options')) || (get_sub_field('addon_options_html'))) { ?>
                          <h3>Design and Implementation Options</h3>
                          <?php if (get_sub_field('addon_options_html')) { ?>
                            <?php the_sub_field('addon_options_html'); ?>
                          <?php } else { ?>
                            <?php the_sub_field('addon_options'); ?>
                          <?php } ?>
                        <?php } ?>                         
                        <?php if (have_rows('addon_markup')) { ?>
                          <h3>Markup</h3>
                          <?php $addon_markup_counter = 1; ?>
                          <?php while (have_rows('addon_markup')) : the_row(); ?>               
                            <?php if ($interactive_example_count > 1) { ?>
                              <div class="doc_key"><?php echo $addon_markup_counter; ?></div>
                            <?php } ?>
<pre>
<?php the_sub_field('addon_sample_markup'); ?>
</pre>
                            <?php $addon_markup_counter++; ?>
                          <?php endwhile; ?>
                        <?php } ?>
                        <?php if (get_sub_field('addon_additional_markup')) { ?>
                          <?php the_sub_field('addon_additional_markup'); ?>
                        <?php } ?>                          
                      </div>
                    </div>
                    <div class="clearfix add_margin_30"></div>
                  </section>
                  <?php $individual_addon_counter++; ?>
                <?php endwhile; ?>
                <!-- Individual Add-On: END -->
              <!-- Add-On Types: END -->                            
              <?php } ?>              
              
            </div>
          </div>
        </div>
        <?php if (comments_open($post_id)) { ?>
          <div class="clearfix"></div>
          <div class="comments_container">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <?php
                  while ( have_posts() ) : the_post();
              
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                      comments_template();
                    endif;
              
                  endwhile; // End of the loop.
                  ?>  
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        <?php } ?>
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