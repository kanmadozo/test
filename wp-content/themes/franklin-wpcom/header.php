<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Franklin
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

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'franklin' ); ?></a>
	<header id="masthead" class="site-header" role="banner">

		<div class="site-header-top">
			<div class="inner">
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>

				<form id="header-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="search" class="search-field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" />
					<button type="submit" class="search-button"><?php esc_html_e( 'Search', 'franklin' ); ?></button>
				</form><!-- #header-search -->

				<?php if ( has_nav_menu( 'secondary' ) ) : ?>
					<nav id="secondary-navigation" role="navigation">
						<?php
							// // Secondary navigation menu.
							wp_nav_menu( array(
								'theme_location' => 'secondary',
								'menu_id'        => 'secondary-menu',
								'container'      => false,
								'depth'          => 1,
							) );
						?>
					</nav><!-- #secondary-navigation -->
				<?php endif; ?>

			</div><!-- .inner -->
		</div><!-- .site-header-top -->

		<div class="site-header-main">
			<div class="inner">
				<div class="site-branding">
					<?php franklin_the_site_logo(); ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				</div><!-- .site-branding -->

				<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" data-close-label="<?php esc_attr_e( 'Close', 'franklin' ); ?>"><?php esc_html_e( 'Menu', 'franklin' ); ?></button>
					<?php
						// Primary navigation menu.
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'container'      => false,
						) );
					?>
				</nav><!-- #site-navigation -->
				<?php endif; ?>
			</div><!-- .inner -->
		</div><!-- .site-header-main -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">