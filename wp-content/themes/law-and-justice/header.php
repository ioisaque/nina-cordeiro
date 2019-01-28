<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package law-and-justice
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="body">

<!-- Page Loader
========================================================= -->
<?php if ( true == get_theme_mod( 'loader_check', true ) ) : ?>
<div class="loader-container" id="page-loader"> 
  <div class="loading-wrapper loading-wrapper-hide">
  	<div class="loader-animation" id="loader-animation">
  		<div class="mask-loading">
		  <div class="spinner">
		    <div class="double-bounce1"></div>
		    <div class="double-bounce2"></div>
		  </div>
		</div>
  	</div>    
    <!-- Edit With Your Name -->
    <div class="loader-name" id="loader-name">
		<?php $loader_logo = get_theme_mod( 'loader_logo', '' ); ?>
		<?php if (!empty($loader_logo)): ?>
      		<img src="<?php echo esc_url( $loader_logo ); ?>" alt="Logo">
      	<?php endif; ?>
    </div>
    <!-- /Edit With Your Name -->
  </div>   
</div>
<?php endif; ?>
<!-- /End of Page loader
========================================================= -->

	
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'law-and-justice' ); ?></a>

	<!-- Top bar  -->
	<div id="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <ul class="list-inline">
                    	<?php 
                    		$header_mail = get_theme_mod( 'header_email', '' );
                    		$header_phone = get_theme_mod( 'header_phone', '' );
                    		if ( !empty( $header_mail ) ) : 
                    	?>
                        	<li class="top-bar-item"><a href="mailto:<?php echo esc_html($header_mail); ?> "><i class="fa fa-envelope"></i><?php echo esc_html($header_mail); ?></a></li>
                        <?php 
                        	endif;
                        	if ( !empty( $header_phone ) ) :
                        ?>
                        	<li class="top-bar-item"><i class="fa fa-phone"></i><?php echo esc_html($header_phone); ?></li>
                    	<?php endif; ?>
                    </ul>
                </div>
                <div class="col-md-4 social-icons-wrapper">
                   <!-- social icons -->
        			 <div class="social-icons header-social-icons">
                        <ul class="social-icons list-inline text-right">
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
            </div>
        </div>
    </div>
    <!-- /Top bar -->

	<!-- Header
	================================================== -->	
	<header id="masthead" class="site-header" role="banner">	
	    <!-- Main header -->
		<div class="container">		
			<!-- Navbar Header -->
            <div class="row">

                <!-- Main Navigation -->
                <div class="col-xs-12">

                    <nav class="navbar navbar-default" role="navigation"> 

                    	<div class="row masthead-row">                    		
                    		<!-- col -->
                    		<div class="col-xs-12 masthead-wrapper">
                    			<!-- Brand and toggle get grouped for better mobile display --> 
								<div class="navbar-header"> 
								  	<!-- Mobile Menu Button -->
								    <button id="mobile-menu-button" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
									    <span class="sr-only">Toggle navigation</span> 
									    <span class="icon-bar"></span> 
									    <span class="icon-bar"></span> 
									    <span class="icon-bar"></span> 
								    </button> 
									<!-- /Mobile Menu Button -->

									<!-- Logo -->
									<div class="header-logo">
								    	<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
											the_custom_logo();
										} else { ?>
											<?php
											if ( is_front_page() && is_home() ) : ?>								
												<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
											<?php else : ?>
												<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
											<?php endif;
											$description = get_bloginfo( 'description', 'display' );
											if ( $description || is_customize_preview() ) : ?>
												<!--<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>-->
											<?php endif; ?>
										<?php } ?>
									</div> 
									<!-- /logo -->
								</div> 
								<!-- / Brand and toggle --> 

								<!-- Navigation --> 
								<div class="collapse navbar-collapse navbar-ex1-collapse"> 
									<?php /* Primary navigation */
										wp_nav_menu( array(
											'theme_location'    => 'primary',
											'menu' => '',
											'depth' => 2,
											'container' => false,
											'menu_class' => 'nav navbar-nav',
											'fallback_cb'       => 'bearr_wp_bootstrap_navwalker::fallback',
					                		'walker'            => new bearr_wp_bootstrap_navwalker())
										);
									?>						    
							  	</div>						
								<!-- /navigation -->
                    		</div>
                    		<!-- /col -->                    		
                    	</div>						
					</nav>
                </div>
                <!-- Main Navigation -->
                        			 
			</div> 
			<!-- /Navbar Header -->	 
		</div>
		<!-- /Main header -->
	</header>
	<!-- /Header
	================================================== -->

	<!-- Content
	================================================== -->
	<div id="content" class="site-content">