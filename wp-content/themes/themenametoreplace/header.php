<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme name to replace
 */

?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<header id="header">
			<div class="site-branding">
				<?php if ( is_front_page() ) : ?>
					<h1 id="logo"><?php theme_name_to_replace_the_custom_logo(); ?></h1>
				<?php else : ?>
					<div id="logo"><?php theme_name_to_replace_the_custom_logo(); ?></div>
				<?php endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->

			<button type="button" id="menu-burger" class="mobile-only" aria-controls="primary-menu">Menu</button>

			<nav id="nav" class="main-navigation" role="navigation">
				<?php wp_nav_menu(array(
					'container' => false,
					'menu_class' => '',
					'theme_location' => 'primary',
					'depth' => 0,
				)); ?>

				<button type="button" id="menu-close" class="mobile-only">Fermer</button>
			</nav><!-- #nav -->
		</header><!-- #header -->

		<div id="content" class="site-content">
