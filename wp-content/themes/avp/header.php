<?php
session_start();
$is = $_SESSION['is_sent'];

function avp_page_featured_image() {
    $id = get_queried_object_id ();
    if (has_post_thumbnail($id)) {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full');
        $url = $image[0];
    } else { $url = 'undefined'; }
    return $url;
} ?>

<?php
function avp_page_featured_alt() {
    $id = get_queried_object_id ();
    if (has_post_thumbnail($id)) {
        $alt = get_post_meta(get_post_thumbnail_id($id), '_wp_attachment_image_alt', true); 
    } else { $alt = 'undefined'; }
    return $alt;
}

$theme = get_template_directory_uri();
$url = home_url("/");
$title = get_bloginfo("name");
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta name="theme-color" content="#66807F">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="" />
  <meta name="keywords" content="<? echo $title; ?>, appartements">
  <title>
    <?php echo $title; ?>
  </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?php echo $theme; ?>/js/avp-functions.js"></script>
  <link rel="shortcut icon" href="<?php echo $theme; ?>/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo $theme; ?>/favicon.ico" type="image/x-icon">
  <script src="<?php echo $theme; ?>/js/seek-and-show.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo $theme; ?>/main.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $theme; ?>/style.css">
  <?php wp_head(); ?>
  <style>
  html {
    margin-top: 0 !important;
  }
  </style>

</head>

<?php include("assets/functions.php"); ?>

<body>
  <header class="active">
    <div>
      <a href="<?php echo $url; ?>" class="logo">
        <img src="<?php echo $theme; ?>/imgs/logo.svg" alt="<? echo $title; ?>" title="<? echo $title; ?>">
      </a>
      <?php wp_nav_menu("main-menu"); ?>
    </div>
  </header>

  <div id="overflow-all"></div>

  <?php menuBtn(); ?>

  <script>
  $("#menu-btn").click(function() {
    $("header .menu").toggleClass("active-menu");
    $("header").toggleClass("active-menu");
    $("#menu-btn").toggleClass("active");
    $("#overflow-all").toggleClass("active");
  });
  $("header .menu a").click(function() {
    $("header .menu").toggleClass("active");
  });
  $("#close-info").click(function() {
    $("#succes").addClass("hidden");
  });
  </script>