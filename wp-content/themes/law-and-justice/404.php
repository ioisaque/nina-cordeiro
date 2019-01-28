<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
				<div class="<?php echo esc_attr($layout_content_class); ?>">
					<!-- main -->
					<main id="main" class="site-main" role="main">
						
						<!-- ERROR 404 -->
						<section class="error-404 not-found">

							<div class="post-element">
								<div class="post-content">
									<!-- Page Header -->
									<header class="">
										<h1 class=""><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'law-and-justice' ); ?></h1>
									</header>
									<!-- /Page Header -->

									<!-- Content -->
									<div class="page-content">
										<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'law-and-justice' ); ?></p>

										<?php
											get_search_form();
											
										?>

									</div>
									<!-- /Content -->

									<footer class="entry-footer">
										
									</footer><!-- .entry-footer -->
								</div>				
							</div>						

						</section>
						<!-- / ERROR 404 -->

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

