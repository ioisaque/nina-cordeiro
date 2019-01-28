<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package law-and-justice
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-element post-element-aside">
		<div class="post-content">
			<?php the_content(); ?>
		</div>			
	</div>
</article><!-- #post-## -->