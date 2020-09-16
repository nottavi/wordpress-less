<?php
/**
 * Template part for displaying post preview.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme name to replace
 */

?>

<article <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>" class="img" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' )[0]; ?>);"></a>

	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>
	</header>

	<p class="date"><?php echo get_the_date(); ?></p>

	<?php if ( get_the_excerpt() ): ?>
		<div class="excerpt">
			<?php the_excerpt(); ?>
		</div>
	<?php endif; ?>
</article>
