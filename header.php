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
<?php session_start(); ?>
<?php
  if ($_GET['bs5'] == "true") {
    $_SESSION['bs5'] = "true";
  } elseif ($_GET['bs5_only'] == "true") {
    $_SESSION['bs5_only'] = "true";
  }
?>

<?php
// Set the track to pull all includes_content files from
$ic_track = get_field('release_track', 102);
$ic_track_mini = ltrim($ic_track, "https:/\/\www");
$ic_track_mini = ltrim($ic_track_mini, "-");
$ic_track_mini = rtrim($ic_track_mini, ".mathworks.com");
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>><head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
  <?php 
    //Dynamically Remove CSS Caching
    $css_gb_file = 'responsive_doc.css';

    $theme_path = get_template_directory_uri();
    $theme_css_path = $theme_path . '/css/';

    $css_gb = $theme_css_path . $css_gb_file;

    $filetime_path = strpos($theme_css_path, 'wp-content');
    $filetime_path = substr($theme_css_path, $filetime_path);

    $css_gb_filetime = $filetime_path . $css_gb_file;

    $css_gb = $css_gb . '?' . date("YmdHis", filemtime($css_gb_filetime));
  ?>
<link href="<?php echo $css_gb; ?>" rel="stylesheet" type="text/css">
<?php if (($_SESSION['bs5'] == "true") || ($_SESSION['bs5_only'] == "true")) { ?>
  <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">  
<?php } ?>
<?php if ($_SESSION['bs5_only'] == "true") { ?>
<?php } else { ?>
<link href="<?php echo $ic_track; ?>/includes_content/responsive/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
<?php } ?>
<link href="<?php echo $ic_track; ?>/includes_content/responsive/css/site7.css" rel="stylesheet" type="text/css">
<link href="<?php echo $ic_track; ?>/includes_content/responsive/css/site7_lg.css" rel="stylesheet" media="screen and (min-width: 1200px)">
<link href="<?php echo $ic_track; ?>/includes_content/responsive/css/site7_md.css" rel="stylesheet" media="screen and (min-width: 992px) and (max-width: 1199px)">
<link href="<?php echo $ic_track; ?>/includes_content/responsive/css/site7_sm+xs.css" rel="stylesheet" media="screen and (max-width: 991px)">
<link href="<?php echo $ic_track; ?>/includes_content/responsive/css/site7_sm.css" rel="stylesheet" media="screen and (min-width: 768px) and (max-width: 991px)">
<link href="<?php echo $ic_track; ?>/includes_content/responsive/css/site7_xs.css" rel="stylesheet" media="screen and (max-width: 767px)">
<script src="<?php echo $ic_track; ?>/includes_content/responsive/scripts/jquery/jquery-latest.js"></script>
<script src="<?php echo $ic_track; ?>/includes_content/responsive/scripts/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo $ic_track; ?>/includes_content/responsive/scripts/global.js"></script>
<script src="<?php echo $ic_track; ?>/includes_content/responsive/scripts/anchor.js"></script>
<script src="<?php echo $ic_track; ?>/includes_content/responsive/scripts/bootstrap/responsive-tabs.js"></script>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700italic' rel='stylesheet' type='text/css'>
<link href="<?php echo $css_gb; ?>" rel="stylesheet" type="text/css">
<script src="<?php echo get_template_directory_uri(); ?>/js/responsive_doc.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/offcanvas.js"></script>
<!-- BEGIN Adobe DTM -->
<script src="//assets.adobedtm.com/d0cc0600946eb3957f703b9fe43c3590597a8c2c/satelliteLib-e8d23c2e444abadc572df06537e2def59c01db09.js" async></script>
<!-- END Adobe DTM -->
<link href="https://use.typekit.net/xvy5baa.css" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
  <div class="navbar navbar-fixed-top navbar-default sticky_header_container">
    <div class="topnav_container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-8">
            <div class="nav_control">
              <button type="button" class="navbar-toggle" data-toggle="offcanvas" id="nav_toggle" data-target="#bs-example-navbar-collapse-1">
                <span class="icon-menu-reverse icon_32"></span>
                <span class="nav-control-label">menu</span>
              </button>
            </div>
            <div class="navbar-header">
              <a class="navbar-brand" href="<?php echo site_url(); ?>">MathWorks Web Standards</a>
              <span class="includes_contract_track">inclues_content track: <?php echo $ic_track_mini; ?></span>
            </div>
          </div>
          <div class="col-sm-4 hidden-xs">
            <form role="search" method="get" class="search-form navbar-form navbar-right" action="<?php echo site_url(); ?>">
              <div class="input-group">
                <input type="search" id="search-field" class="search-field form-control" placeholder="Search …" value="" name="s" title="Search for:">
                <span class="input-group-btn">
                <input type="submit" class="search-submit btn btn-primary" value="Go!">
                </span> </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

	<div id="content" class="site-content">

  <?php if ($_SESSION['bs5'] == "true") { ?>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="alert alert-warning"> <span class="alert_icon icon-alert-warning"></span>
            <p class="alert_heading"><strong>Bootstrap 5 + Bootstrap 3 are being loaded on this page</strong></p>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($_SESSION['bs5_only'] == "true") { ?>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="alert alert-warning"> <span class="alert_icon icon-alert-warning"></span>
            <p class="alert_heading"><strong>ONLY Bootstrap 5 is being loaded on this page</strong></p>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>  

