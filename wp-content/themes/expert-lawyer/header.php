<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage expert-lawyer
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'expert-lawyer' ) ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'expert-lawyer' ); ?></a>

	<div id="top_bar">
		<div id="top-header">
			<div class="container">
				<div class="row m-0">
					<div class="offset-lg-4 col-lg-4 offset-md-2 col-md-4">
						<div class="time">
							<?php if( get_theme_mod('expert_lawyer_time') != ''){ ?>
								<span class="col-org"><i class="far fa-clock"></i><?php echo esc_html( get_theme_mod('expert_lawyer_time','') ); ?></span>
							<?php } ?>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="social-icons">
							<?php if( get_theme_mod( 'expert_lawyer_facebook_url') != '') { ?>
						      <a href="<?php echo esc_url( get_theme_mod( 'expert_lawyer_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
						    <?php } ?>
						    <?php if( get_theme_mod( 'expert_lawyer_twitter_url') != '') { ?>
						      <a href="<?php echo esc_url( get_theme_mod( 'expert_lawyer_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
						    <?php } ?>
						    <?php if( get_theme_mod( 'expert_lawyer_linkedin_url') != '') { ?>
						      <a href="<?php echo esc_url( get_theme_mod( 'expert_lawyer_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i></a>
						    <?php } ?>	  
						    <?php if( get_theme_mod( 'expert_lawyer_insta_url') != '') { ?>
						      <a href="<?php echo esc_url( get_theme_mod( 'expert_lawyer_insta_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
						    <?php } ?>
						    <?php if( get_theme_mod( 'expert_lawyer_you_tube_url') != '') { ?>
						      <a href="<?php echo esc_url( get_theme_mod( 'expert_lawyer_you_tube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
						    <?php } ?>
						    <?php if( get_theme_mod( 'expert_lawyer_pinterest_url') != '') { ?>
						      <a href="<?php echo esc_url( get_theme_mod( 'expert_lawyer_pinterest_url','' ) ); ?>"><i class="fab fa-pinterest-p"></i></a>
						    <?php } ?>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<div id="contact-section">
			<div class="container">
				<div class="row m-0">
					<div class="col-lg-3 col-md-12 ">
						<div class="logo">
					        <?php if( has_custom_logo() ){ expert_lawyer_the_custom_logo();
					           }else{ ?>
					          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					          <?php $description = get_bloginfo( 'description', 'display' );
					          if ( $description || is_customize_preview() ) : ?> 
					            <p class="site-description"><?php echo esc_html($description); ?></p>
					        <?php endif; }?>
					    </div>
					</div>
					<div class="offset-lg-2 col-lg-7 col-md-12">
						<div class="row">
							<div class="col-lg-4 col-md-4">
								<?php if( get_theme_mod( 'expert_lawyer_call') != '' || get_theme_mod( 'expert_lawyer_call1' )) { ?>
									<div class="contact-details">
										<div class="row">
											<div class="col-lg-2 col-md-2 p-0">
												<i class="fas fa-phone"></i>
											</div>
											<div class="col-lg-10 col-md-10">
												<p class="para-color"><?php echo esc_html( get_theme_mod('expert_lawyer_call','') ); ?></p>
												<p class="col-org"><?php echo esc_html( get_theme_mod('expert_lawyer_call1','') ); ?></p>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
							<div class="col-lg-4 col-md-4">
								<?php if( get_theme_mod( 'expert_lawyer_mail') != '' || get_theme_mod( 'expert_lawyer_mail1' )) { ?>
									<div class="contact-details">
										<div class="row">
											<div class="col-lg-2 col-md-2 p-0">
												<i class="fas fa-envelope"></i>
											</div>
											<div class="col-lg-10 col-md-10">
												<p class="para-color"><?php echo esc_html( get_theme_mod('expert_lawyer_mail','') ); ?></p>
												<p class="col-org"><?php echo esc_html( get_theme_mod('expert_lawyer_mail1','') ); ?></p>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
							<div class="col-lg-4 col-md-4 pl-0">
								<?php if ( get_theme_mod('expert_lawyer_btn_text','') != "" ) {?>
								   	<div class="app-btn">            
								     <a href="<?php echo esc_url( get_theme_mod('expert_lawyer_btn_link','') ); ?>"><?php echo esc_html( get_theme_mod('expert_lawyer_btn_text','') ); ?></a>    
								    </div>   
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<header id="header" role="banner">
		<div class="container">
			<div class="menu-section">
				<div class="toggle-menu responsive-menu">
		            <button onclick="resMenu_open()" role="tab"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','expert-lawyer'); ?></span></button>
		        </div>
				<div id="sidelong-menu" class="nav sidenav">
	                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'expert-lawyer' ); ?>">
	                  <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="resMenu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','expert-lawyer'); ?></span></a>
	                  <?php 
	                    wp_nav_menu( array( 
	                      'theme_location' => 'primary',
	                      'container_class' => 'main-menu-navigation clearfix' ,
	                      'menu_class' => 'clearfix',
	                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
	                      'fallback_cb' => 'wp_page_menu',
	                    ) ); 
	                  ?>
	                </nav>
	            </div>
			</div>
		</div>
	</header>

	<div class="site-content-contain">
		<div id="content" class="site-content">