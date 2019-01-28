<?php
/**
 * Template part for displaying posts on tb_blog_grid shortcode.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package law-and-justice
 */

?>
<div class="col-md-6">
	<div class="news-item">
	    <a href="<?php the_permalink(); ?>">
	        <article class="row">

	            <!-- News Date -->
	            <div class="col-sm-3">
	                <div class="news-date">
	                    <span class="time"><?php the_date('M d'); ?></span>
	                </div>
	            </div>
	            <!-- News Date -->

	            <!-- News Content -->
	            <div class="col-sm-9">
	                <h3 class="news-title"><?php the_title(); ?></h3>
	               
	                <p class="news-text"> <?php if(function_exists('excerpt')){
					    echo esc_html( excerpt(15) );
					} ?></p>
	                <p class="read-more"><?php esc_html('READ MORE &gt;&gt;', 'law-and-justice'); ?></p>
	            </div>
	            <!-- News Content -->

	        </article>
	    </a>
	</div>
</div>
