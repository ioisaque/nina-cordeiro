<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package law-and-justice
 */

?>

	</div>
	<!-- /Content
	================================================== -->


	<!-- Footer
	================================================== -->
	<footer id="colophon" class="site-footer">
		<?php if ( is_active_sidebar( 'widgets-footer-1' ) || is_active_sidebar( 'widgets-footer-2' ) || is_active_sidebar( 'widgets-footer-3' ) || is_active_sidebar( 'widgets-footer-4' ) ){ ?>
		<!-- footer top -->
		<div class="footer-top">
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- col -->
					<div class="col-sm-3">
						<?php if ( ! is_active_sidebar( 'footer-1' ) ) : ?>
							<?php dynamic_sidebar( 'footer-1' ); ?>
						<?php endif; ?>
					</div>
					<!-- /col -->
					<!-- col -->
					<div class="col-sm-3">
						<?php if ( ! is_active_sidebar( 'footer-2' ) ) : ?>
							<?php dynamic_sidebar( 'footer-2' ); ?>
						<?php endif; ?>
					</div>
					<!-- /col -->
					<!-- col -->
					<div class="col-sm-3">
						<?php if ( ! is_active_sidebar( 'footer-3' ) ) : ?>
							<?php dynamic_sidebar( 'footer-3' ); ?>
						<?php endif; ?>
					</div>
					<!-- /col -->
					<!-- col -->
					<div class="col-sm-3">
						<?php if ( ! is_active_sidebar( 'footer-4' ) ) : ?>
							<?php dynamic_sidebar( 'footer-4' ); ?>
						<?php endif; ?>
					</div>
					<!-- /col -->
				</div>
				<!-- /row -->
			</div>
		</div>
		<?php } ?>
		<!-- /footer top -->
		<!-- footer bottom -->
		<div class="footer-bottom">
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- col -->
					<div class="col-sm-8">
						<!-- Site Info -->
						<div class="site-quote">
							<p>
								<?php $url='http://www.sige.pro.br/padraoWeb/divulgacao_online/'; ?>
								<?=file_get_contents($url.'rodape_light.html');?>
							</p>
						</div>
						<!-- /Site info -->
					</div>
					<!-- /col -->
					<!-- col -->
					<div class="col-sm-4">
						<!-- social icons -->
            			<div class="social-icons footer-social-icons">
                            <ul class="social-icons-list text-right">
                            	<?php if ( true == get_theme_mod( 'facebook_check', true ) ) : ?>
									<li><a href="<?php echo esc_url( get_theme_mod( 'facebook' ) ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<?php endif; ?>
								<?php if ( true == get_theme_mod( 'twitter_check', true ) ) : ?>
									<li><a href="<?php echo esc_url( get_theme_mod( 'twitter' ) ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<?php endif; ?>
                                <?php if ( true == get_theme_mod( 'instagram_check', true ) ) : ?>
									<li><a href="<?php echo esc_url( get_theme_mod( 'instagram' ) ); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<?php endif; ?>
                                <?php if ( true == get_theme_mod( 'youtube_check', true ) ) : ?>
									<li><a href="<?php echo esc_url( get_theme_mod( 'youtube' ) ); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
								<?php endif; ?>
								<?php if ( true == get_theme_mod( 'gplus_check', true ) ) : ?>
									<li><a href="<?php echo esc_url( get_theme_mod( 'gplus' ) ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
								<?php endif; ?>
                            </ul>
                        </div>
            			<!-- /social icons -->    
					</div>
					<!-- /col -->
				</div>
				<!-- /row -->				
			</div>
		</div>
		<!-- /footer bottom -->		
	</footer>
	<!-- /Footer
	================================================== -->
	
</div><!-- #page -->

<!-- Back to Top Button -->
<div id="back-to-top" class="back-to-top back-to-top-hide"><i class="fa fa-angle-up"></i></div>
<!-- /Back to Top Button -->

<?php wp_footer(); ?>
</body>
</html>
