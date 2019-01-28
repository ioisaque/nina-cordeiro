<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package law-and-justice
 */

//Layout Variable
$layout_style = get_theme_mod( 'layout_custom', '' );

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php if ( $layout_style != 'no_sidebar' ) : ?>

	<aside id="secondary" class="widget-area sidebar-area" role="complementary">
		
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->

<?php endif; ?>
