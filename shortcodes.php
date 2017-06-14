<?php

// Roca News Feed Shortcode
//// Manually pass in Number of Results

function news_feed_shortcode($atts) {

	// Attributes
	$atts = shortcode_atts (
		array(
			'post_count' => '',
		),
		$atts,
		'news_feed'
	);
  

  // Determine the number of posts to display
  if (isset($atts['post_count'])) {
    $post_count = $atts['post_count'];
  } else {
    $post_count = 2;   
  }


  $news_feed_content = '
  <div class="doc_news_feature">
    <h3>Latest News</h3>';

    $news_count = 0;
      
    $news_args = array('post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => $post_count);
    $news_loop = new WP_Query($news_args);
  
    while ($news_loop -> have_posts()) : $news_loop->the_post();
    
      //Variables
      $news_title = get_the_title($post->ID);
      $news_date = get_the_time('F j, Y', $post->ID);
      $news_content = apply_filters('the_content', get_the_content($post->ID));
      $news_link = get_the_permalink($post->ID);
      $post_class = get_post_class($post->ID);
    
      $news_feed_content .= '
      <div class="doc_news_element ' . $post_class[5] . '">
        <p class="news_publish_date">' . $news_date . '</p>
        <h3><a href="' . $news_link . '">' . $news_title . '</a></h3>
        <div class="news_synopsis">' . $news_content . '</div>
        <!-- <p class="news_permalink"><a href="' . $news_external_source_link . '" target="_blank">read more</a></p> -->
      </div>';
      
      $news_count++;

    endwhile;
    wp_reset_query();                 
  
  $news_feed_content .= '
    <div class="doc_news_feature_footer">
      <a href="/news">See all News</a>
    </div>
  </div>';
  
  return $news_feed_content;


}
add_shortcode('news_feed', 'news_feed_shortcode');

