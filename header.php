<?php
/**
 * @package WordPress
 * @subpackage Roland
 * @since Roland 1.0
 */

/**
 * Prevent switching to Twenty Fifteen on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Roland 1.0
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content">
		<?php _e( 'Skip to content', 'roland' ); ?>
	</a>

	<div id="sidebar" class="sidebar">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php
					roland_the_custom_logo();

					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>
							</a>
						</h1>
					<?php else : ?>
						<p class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>
							</a>
						</p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif;
				?>
				<button class="secondary-toggle"> 
					<!-- has inc/ custom-hearder -->
					<?php _e( 'Menu and widgets', 'roland' ); ?>
					
				</button> 
				<!--
				<div id="toggle">
					<img src="http://rolandbuechler.com/wp-content/themes/roland-child/images/menu.png" alt="Show" />
					<div id="popout">
						
					</div>

				</div>
				-->
				<?php 
						//wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'nav-menu')); 
					?>	
			</div><!-- .site-branding -->

		</header><!-- .site-header -->

		<?php  get_sidebar(); ?>
	</div><!-- .sidebar -->

	<div id="content" class="site-content">
