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
		<?php $link_url = rwmb_meta( 'tb_link_url' ); ?>
		<a href="<?php esc_url( $link_url );  ?>" class="post-element post-element-link" target="_blank">
			<h2 class="post-link-title"><?php the_title(); ?></h2> 
			<p><?php esc_url( $link_url );  ?></p>
		</a>
	
</article><!-- #post-## -->