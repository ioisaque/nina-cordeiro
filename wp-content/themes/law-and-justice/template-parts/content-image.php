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
	<div class="post-element">

		<!-- Featured image -->
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-featured-image">
			<?php $image_feat = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<a href="<?php echo esc_url( $image_feat[0] ); ?>" class="lightbox-image">
				<?php the_post_thumbnail();?>
			</a>
		</div>				
		<?php } ?>
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

						<?php the_content();?>							
				
				<?php } ?>
				
			</div><!-- .entry-content -->
		</div>
		<!-- /Post Content -->		
	</div>	
</article><!-- #post-## -->