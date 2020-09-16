<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme name to replace
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

	<?php if ( has_post_thumbnail( $post->ID ) ) {
		$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'banner' )[0];
	} else {
		$image_url = get_template_directory_uri() . '/img/banniere-default.jpg';
	} ?>

	<div id="banniere" style="background-image: url(<?php echo $image_url; ?>);">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</div>

	<article id="article">
		<div class="wysiwyg-content">
			<?php the_content(); ?>
		</div>
	</article>

	<?php endwhile; ?>

<?php
get_sidebar();
get_footer();
