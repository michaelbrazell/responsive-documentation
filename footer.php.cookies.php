<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package responsive-documentation
 */

?>

  <footer id="footer" class="wp_responsive_doc">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <div class="footer">Problems or questions? Contact Ryan Johnson (x7096)</div>
        </div>
      </div>
    </div>
  </footer>
  
<!-- New Features Modal: START -->
asdf
<?php echo "hi!"; ?>
<?php echo $_SESSION['show_intro_modal']; ?>
<?php if ($_SESSION['show_intro_modal'] == "true") { ?>
  <?php if (is_page(358)) { ?>
    <script>
    $(function() {
      $(window).load(function(){
          $('#new_features_modal').modal('show');
      });
    });    
    </script>
    <div class="modal fade" id="new_features_modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <?php the_field('new_feature_content', 2101); ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
<?php } ?>
<!-- New Features Modal: END -->

<?php wp_footer(); ?>