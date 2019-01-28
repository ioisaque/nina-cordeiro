<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <!--  Page Heading -->

		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- col -->				
				<div class="<?php echo esc_html($layout_content_class); ?>">
					<?php
					while ( have_posts() ) : the_post(); ?>
					<!-- main -->
					<main id="main" class="site-main" role="main">						

						<?php get_template_part( 'template-parts/content', 'page' ); ?>											

					</main>
					<!-- /main -->

					<!-- Comments -->
					
					<?php // If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) : ?>
						<?php comments_template(); ?>
					<?php endif;	?>	
					<!-- /comments -->

					<?php endwhile; // End of the loop. ?>
				</div>
				<!-- /col -->
				<!-- col -->
				<div class="<?php echo esc_html($layout_sidebar_class); ?>">
					<?php get_sidebar(); ?>
				</div>
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>		
	</div>
	<!-- == /CONTENT AREA == -->

<?php get_footer(); ?>