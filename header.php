<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="vi-VN">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="vi-VN">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#" xmlns:fb="http://www.facebook.com/2008/fbml" lang="vi-VN">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta property="fb:admins" content="1780058404" />
<meta name="google-site-verification" content="q3y7rDFgbvhQ_jquGd83eidpqChBsIYbB8x5cvHTfiQ" />
<meta name="robots" content="index, archive, follow" />
<?php //StyleByCat(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<span class="site-description"><?php bloginfo( 'description' ); ?></span>
		</hgroup>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
		<a href="http://muatocroi.com/"><img src="<?php echo headerByTime() ?>" class="header-image" width="960" height="250" alt="Mùa Tóc Rối" /></a>
	</header><!-- #masthead -->
	<div id="main" class="wrapper">
		<div class="clear"></div>
		<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>