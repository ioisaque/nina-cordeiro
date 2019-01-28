<?php
/*template name: Homepage */
/**
 * The template for displaying Homepage
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