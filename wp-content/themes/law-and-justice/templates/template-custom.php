<?php
/*template name: Page Builder */
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
	<!-- == CONTENT AREA == -->
	<div id="primary" class="content-area">
        <!--  Page Heading -->
        <div class="page-heading no-margin">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                       	<h1 class="page-title"><?php the_title(); ?></h1>                    	
                    </div>
                </div>
            </div>
        </div>
        <!--  Page Heading -->

		<!-- Page Content -->
        <div class="page-content-fluid">
        	<?php while ( have_posts() ) : the_post(); ?>
        		<?php the_content(); ?>
        	<?php endwhile; // End of the loop. ?>
        </div>
        <!-- /page Content -->

		
	</div>
	<!-- == /CONTENT AREA == -->

<?php get_footer(); ?>