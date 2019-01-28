<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package law-and-justice
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-element">

		<!-- Featured image -->
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-featured-image">
			<?php the_post_thumbnail();?>
		</div>				
		<?php } ?>
		<!-- / Featured-image -->

		<div class="post-content">
			<!-- .entry header -->
			<header class="entry-header">
				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<span class="entry-meta-content"><?php law_and_justice_posted_on(); ?></span>
				</div><!-- .entry-meta -->
				<div class="post-has-ct"></div>
				<?php
				endif; ?>

				<?php if ( is_single() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} else {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				} ?>
			</header>
			<!-- .entry-header -->

			<!-- .entry-content -->
			<div class="entry-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'law-and-justice' ),
						'after'  => '</div>',
					) );
				?>
			</div>		
			<!-- /.entry-content -->
		</div>		
	</div>	
</article><!-- #page-## -->
