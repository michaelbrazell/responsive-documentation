<?php
session_start();

if (!(is_page(71))) {
  if (isset($_COOKIE['standards_cookie'])) {
    if ($_COOKIE['standards_cookie'] < 5) {
      $standards_cookie_value = $_COOKIE['standards_cookie'];
      $standards_cookie_value++;
      setcookie("standards_cookie", $standards_cookie_value);
      $_SESSION['show_intro_modal'] = "true";
      echo $show_intro_modal;
      echo $standards_cookie_value;
    } else {
      $standards_cookie_value = $_COOKIE['standards_cookie'];
      $_SESSION['show_intro_modal'] = "false";
      echo $show_intro_modal;
      echo $standards_cookie_value;
    }
  } else {
    $standards_cookie_value = 1;
    setcookie("standards_cookie", $standards_cookie_value, time()+31536000);
    $_SESSION['show_intro_modal'] = "true";
    echo "setting cookie!";
  }
}
?>
<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package responsive-documentation
 */

?>
<?php
// Set the track to pull all includes_content files from
$ic_track = get_field('release_track', 102);
$ic_track_mini = ltrim($ic_track, "http:/\/\www");
$ic_track_mini = ltrim($ic_track_mini, "-");
$ic_track_mini = rtrim($ic_track_mini, ".mathworks.com");
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>><head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<link href="<?php echo $ic_track; ?>/includes_content/responsive/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $ic_track; ?>/includes_content/responsive/css/site6.css?201507" rel="stylesheet" type="text/css">
<link href="<?php echo $ic_track; ?>/includes_content/responsive/css/site6_lg.css" rel="stylesheet" media="screen and (min-width: 1200px)">
<link href="<?php echo $ic_track; ?>/includes_content/responsive/css/site6_md.css" rel="stylesheet" media="screen and (min-width: 992px) and (max-width: 1199px)">
<link href="<?php echo $ic_track; ?>/includes_content/responsive/css/site6_sm+xs.css" rel="stylesheet" media="screen and (max-width: 991px)">
<link href="<?php echo $ic_track; ?>/includes_content/responsive/css/site6_sm.css" rel="stylesheet" media="screen and (min-width: 768px) and (max-width: 991px)">
<link href="<?php echo $ic_track; ?>/includes_content/responsive/css/site6_xs.css" rel="stylesheet" media="screen and (max-width: 767px)">
<script src="<?php echo $ic_track; ?>/includes_content/responsive/scripts/jquery/jquery-latest.js"></script>
<script src="<?php echo $ic_track; ?>/includes_content/responsive/scripts/jquery/jquery.mobile.custom.min.js"></script>
<script src="<?php echo $ic_track; ?>/includes_content/responsive/scripts/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo $ic_track; ?>/includes_content/responsive/scripts/global.js"></script>
<script src="<?php echo $ic_track; ?>/includes_content/responsive/scripts/anchor.js"></script>
<script src="<?php echo $ic_track; ?>/includes_content/responsive/scripts/bootstrap/responsive-tabs.js"></script>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700italic' rel='stylesheet' type='text/css'>
<link href="<?php echo get_template_directory_uri(); ?>/css/responsive_doc.css" rel="stylesheet" type="text/css">
<script src="<?php echo get_template_directory_uri(); ?>/js/responsive_doc.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/offcanvas.js"></script>
<script src="https://fonts.mathworks.com/xvy5baa.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
  <div class="topnav_container">
    <div class="navbar navbar-fixed-top navbar-default">
      <div class="nav_control">
        <button type="button" class="navbar-toggle" data-toggle="offcanvas" id="nav_toggle" data-target="#bs-example-navbar-collapse-1"> <span class="icon-menu-reverse icon_32"></span> </button>
      </div>
      <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo home_url(); ?>">MathWorks Web Standards Documentation</a>
        <span class="includes_contract_track">inclues_content track: <?php echo $ic_track_mini; ?></span>
      </div>
    </div>
  </div>

	<div id="content" class="site-content">
