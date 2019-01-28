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
	<div class="post-element post-element-video">

		<!-- Featured image -->
		<?php $video = rwmb_meta( 'tb_video');
		if ( !empty( $video ) ) : ?>
		<div class="post-featured-image">
			<?php echo apply_filters( 'the_content', $video); ?>
		</div>
		<?php elseif ( has_post_thumbnail() ) : ?>
		<div class="post-featured-image">
			<?php the_post_thumbnail();?>
		</div>		
		<?php endif; ?>
		<!-- / Featured-image -->

		<!-- Post Content -->
		<div class="post-content">

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
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php if ( is_single() ) { ?>

					<?php
						the_content( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'law-and-justice' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'law-and-justice' ),
							'after'  => '</div>',
						) );
					?>

				<?php	} else { ?>

						<?php the_excerpt();?>

						<a href="<?php the_permalink(); ?>" class="primary-btn with-bg"><?php esc_html_e( 'read more', 'law-and-justice' ); ?></a>
				
				<?php } ?>
				
			</div><!-- .entry-content -->

			<!-- entry-footer -->
			<footer class="entry-footer">
				<?php law_and_justice_entry_footer(); ?>
			</footer>
			<!-- /entry-footer -->

		</div>
		<!-- /Post-Content -->
		
	</div>	
</article><!-- #post-## -->