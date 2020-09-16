<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Theme name to replace
 */

get_header(); ?>

	<?php
		global $wp_query;
		$count = $wp_query->found_posts;
	?>
	
	<?php if ( has_post_thumbnail( $post->ID ) ) {
		$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'banner' )[0];
	} else {
		$image_url = get_template_directory_uri() . '/img/banniere-default.jpg';
	} ?>
	
	<div id="banniere" style="background-image: url(<?php echo $image_url; ?>);">
		<?php if ( have_posts() ) : ?>
			<?php echo $count; ?>
			<?php if ( $count > 1 ): ?>
				<?php _e('résultats pour votre recherche', 'theme_name_to_replace'); ?>
			<?php else: ?>
				<?php _e('résultat pour votre recherche', 'theme_name_to_replace'); ?>
			<?php endif; ?>

			<?php if ( get_search_query() ): ?>
				<span>« <?php echo get_search_query(); ?> »</span>
			<?php endif; ?>
		<?php else: ?>
			<h1 class="page-title"><?php _e('Aucun résultat ne correspond à votre recherche', 'theme_name_to_replace'); ?></h1>
		<?php endif; ?>
	</div>

	<?php if ( have_posts() ) : ?>
		<div class="search-list">
			<?php while ( have_posts() ): the_post();

				get_template_part( 'template-parts/preview', 'search' );

			endwhile; ?>

			<?php if ( paginate_links() ): ?>
				<div class="search-pagination">
					<?php echo paginate_links(array(
						'prev_text' => '<span class="icon icon-arrow-short-left"></span>',
						'next_text' => '<span class="icon icon-arrow-short-right"></span>'
					)); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php
get_sidebar();
get_footer();
