<?php
global $ocart;
load_theme_textdomain('ocart', get_stylesheet_directory().'/lang/');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta name="viewport" content="width=device-width; initial-scale=1.0">
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<?php ocart_seo(); ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php do_action('ocart_after_body_start'); ?>

<div id="toTop"><?php _e('Back to Top','ocart'); ?></div>

<div id="wrapper">