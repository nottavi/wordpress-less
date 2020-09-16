<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme name to replace
 */

get_header(); ?>

	<?php $taxonomy = get_queried_object(); ?>

	<?php $image_url = get_template_directory_uri() . '/img/banniere-default.jpg'; ?>

	<div id="banniere" style="background-image: url(<?php echo $image_url; ?>);">
		<h1 class="page-title"><?php echo $taxonomy->name; ?></h1>
	</div>

	<?php if ( category_description() ): ?>
		<div class="category-description">
			<div class="wysiwyg-content">
				<?php echo category_description(); ?>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ): the_post(); ?>
			
			<?php get_template_part( 'template-parts/preview', get_post_type() ); ?>

		<?php endwhile; ?>
	<?php endif; ?>

<?php
get_sidebar();
get_footer();
