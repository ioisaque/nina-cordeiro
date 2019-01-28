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
	<div class="post-element post-element-quote">
		<div class="">
			<?php the_content(); ?>
			<?php $quote_author = rwmb_meta( 'tb_quote_author' );
			if ( !empty( $quote_author ) ) : ?>
				<p class="quote-author"><?php echo $quote_author; ?></p>
			<?php endif; ?>
		</div>		
	</div>
</article><!-- #post-## -->