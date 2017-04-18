<?php
/**
 * Template Name: Web Component-Template
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
                <div class="row">
                  <div class="col-xs-12 col-sm-8 col-md-9">
                    <h1><?php the_title(); ?></h1>
                    <?php while ( have_posts() ) : the_post(); ?>
                      <?php the_content(); ?>
                    <?php endwhile; // end of the loop. ?>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="wp_responsive_doc wp_responsive_doc_toc">
                      <h2>Table of Contents</h2>
                      <?php $associated_elements = get_field('associated_elements'); ?>
                      <?php if ($associated_elements) { ?>
                        <ul class="list-unstyled">
                          <?php foreach($associated_elements as $post): ?>
                            <li><a href="#element_<?php echo get_the_ID(); ?>"><?php the_field('component_variation_name'); ?></a></li>
                          <?php endforeach; ?>
                        </ul>
                      <?php wp_reset_postdata(); ?>
                      <?php } ?>

                      <?php $associated_elements_addons = get_field('associated_elements_addons'); ?>
                      <?php if ($associated_elements_addons) { ?>
                        <h3 class="wp_responsive_doc">Additional Component Options</h3>
                        <ul class="list-unstyled">
                          <?php foreach($associated_elements_addons as $post): ?>
                            <li><a href="#element_<?php echo get_the_ID(); ?>"><?php the_field('component_variation_name'); ?></a></li>
                          <?php endforeach; ?>
                        </ul>
                      <?php wp_reset_postdata(); ?>
                      <?php } ?>
                    </div>                                                                
                  </div>
                </div>


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
              <?php if (get_field('wysiwyg_content')) { ?>
                <section class="wp_responsive_doc add_margin_60">
                  <?php the_field('wysiwyg_content'); ?>
                </section>
              <?php } ?> 
              <!-- WYSIWYG Content: START -->


              <!-- Component: Associated Elements: START -->
              <?php $associated_elements = get_field('associated_elements'); ?>
              <?php if ($associated_elements) { ?>
                <?php foreach($associated_elements as $post): ?>

                  <h2 class="wp_responsive_doc" id="element_<?php echo get_the_ID(); ?>"><!--Component Type: --><span class="component_type"><?php the_field('component_variation_name'); ?></span></h2>
                  <?php
                    //Determine how many HTML examples there are
                    $interactive_example_count = count(get_field('component_markup'));
                    
                    if (get_field('component_interactive_markup_grid')) {
                    
                      $interactive_example_requested_grid = (get_field('component_interactive_markup_grid'));
                      $interactive_example_grid = "col-xs-12 col-sm-6 col-md-" . $interactive_example_requested_grid . "\"";
                      
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
                  <div class="row">
                    <?php $component_sample_counter = 1; ?>
                    <?php while (have_rows('component_markup')) : the_row(); ?>               
                      <div class="<?php echo $interactive_example_grid; ?>">
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
                      <div class="clearfix add_margin_30 visible-xs"></div>
                      <?php if ($component_sample_counter % 2 == 0) { ?>
                        <div class="clearfix add_margin_30 visible-sm"></div>
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
              <!-- Component: Associated Elements: END -->


              <!-- Component: Associated Elements Add-Ons: START -->
              <?php $associated_elements_addons = get_field('associated_elements_addons'); ?>
              <?php if ($associated_elements_addons) { ?>

                <h2 class="wp_responsive_doc">Additional <?php the_title(); ?> Options</h2>

                <?php foreach($associated_elements_addons as $post): ?>

                  <h3 class="wp_responsive_doc add_margin_20" id="element_<?php echo get_the_ID(); ?>"><!--Component Type: --><span class="component_type"><?php the_field('component_variation_name'); ?></span></h3>
                  <?php
                    //Determine how many HTML examples there are
                    $interactive_example_count = count(get_field('component_markup'));
                    
                    if (get_field('component_interactive_markup_grid')) {
                    
                      $interactive_example_requested_grid = (get_field('component_interactive_markup_grid'));
                      $interactive_example_grid = "col-xs-12 col-sm-6 col-md-" . $interactive_example_requested_grid . "\"";
                      
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
                  <div class="row">
                    <?php $component_sample_counter = 1; ?>
                    <?php while (have_rows('component_markup')) : the_row(); ?>               
                      <div class="<?php echo $interactive_example_grid; ?>">
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
                      <div class="clearfix add_margin_30 visible-xs"></div>
                      <?php if ($component_sample_counter % 2 == 0) { ?>
                        <div class="clearfix add_margin_30 visible-sm"></div>
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
              <!-- Component: Associated Elements Add-Ons: END -->
              
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


<!-- Code Modal: START -->
<div class="modal fade" id="component_markup_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content wp_responsive_doc">
      <div class="modal-header">
        <h3 class="modal_title"></h3>
        <h4 class="modal_subtitle"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <pre class="modal_markup"></pre>
        <p class="add_margin_0"><small class="small_70">Check the Detailed Configuration Information for this component for more implementation options.</small></p>
      </div>
    </div>
  </div>
</div>                    
<!-- Code Modal: END -->

<script>  
(function($) {

$('#component_markup_modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var recipient_title = button.data('title'); // Extract info from data-* attributes
  var recipient_subtitle = button.data('subtitle'); // Extract info from data-* attributes
  var recipient_markup = decodeURIComponent(button.data('markup')); // Extract info from data-* attributes
  recipient_markup = decodeURIComponent((recipient_markup+'').replace(/\+/g, '%20'));
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal_title').text(recipient_title);
  modal.find('.modal_subtitle').text(recipient_subtitle);
  modal.find('.modal_markup').html(recipient_markup);
})                
  
})(jQuery); 
</script>     

</body>
</html>