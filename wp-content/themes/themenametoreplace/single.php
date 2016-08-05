<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Theme name to replace
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>
    
    <h1 class="page-title"><?php the_title(); ?></h1>

	<article id="article">
    	<div class="wysiwyg-content">
	        <?php the_content(); ?>
    	</div>
	</article>

	<?php endwhile; ?>

<?php
get_sidebar();
get_footer();
