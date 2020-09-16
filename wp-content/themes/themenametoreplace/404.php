<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Theme name to replace
 */

get_header(); ?>

	<?php $image_url = get_template_directory_uri() . '/img/banniere-default.jpg'; ?>
	
	<div id="banniere" style="background-image: url(<?php echo $image_url; ?>);">
		<h1 class="page-title"><?php _e('Erreur 404', 'theme_name_to_replace'); ?></h1>
	</div>

	<section class="error-404">
		<header class="page-header">
			<h2 class="subtitle"><?php _e( 'Oups ! Cette pas n\'a pas pu être trouvée.', 'theme_name_to_replace' ); ?></h2>
		</header>

		<div class="page-content">
			<p><?php _e( 'Il semblerait que rien ne corresponde à cette adresse.', 'theme_name_to_replace' ); ?></p>

			<?php get_search_form(); ?>
		</div>
	</section>

<?php
get_footer();
