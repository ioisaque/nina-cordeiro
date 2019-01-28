<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package law-and-justice
 */

get_header(); ?>

<?php //Layout Variables
$layout_style = get_theme_mod( 'layout_custom', 'sidebar_right' );

if ( $layout_style == 'sidebar_right' ) : 
	$layout_content_class = 'col-sm-8';
	$layout_sidebar_class = 'col-sm-4';


elseif ( $layout_style == 'sidebar_left' ) :

	$layout_content_class = 'col-sm-8 col-sm-push-4';
	$layout_sidebar_class = 'col-sm-4 col-sm-pull-8';

elseif ( $layout_style == 'no_sidebar' ) :
	$layout_content_class = '';
	$layout_sidebar_class = 'no-sidebar';
endif; ?>

	<!-- == CONTENT AREA == -->
	<div id="primary" class="content-area">

		<!--  Page Heading -->
        <div class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                       	<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
                    	<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
                    </div>
                </div>
            </div>
        </div>
        <!--  Page Heading -->

		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- col -->
				<div class="<?php echo esc_attr( $layout_content_class ); ?>">
					<!-- main -->
					<main id="main" class="site-main" role="main">
						<?php
						if ( have_posts() ) : ?>
							

							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>

					</main>
					<!-- /main -->
				</div>
				<!-- /col -->
				<!-- col -->
				<div class="<?php echo esc_attr($layout_sidebar_class); ?>">
					<?php get_sidebar(); ?>
				</div>
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>		
	</div>
	<!-- == /CONTENT AREA == -->

<?php get_footer(); ?>