<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Lightning_Rebel
 * @since Lightning Rebel 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<div class="site-inner">
	
			<header id="masthead" class="site-header" role="banner">
				<nav class="navbar width-100">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" style="background: black;" class=" navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="/"><?php lightningrebel_the_custom_logo(); ?></a>
						</div>
				
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="navbar-collapse">
							<?php if ( has_nav_menu( 'primary' ) ) : ?>
							
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'nav navbar-nav navbar-right text-uppercase',
									 ) );
								?>
							
							<?php endif; ?>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container -->
				</nav>
			</header><!-- .site-header -->

			<div id="sub-masthead-container" style="color: <?php the_field('header_font_color') ?>;">
				<div class="background-black-transparent-gradient-50 width-100" style="height: 300px; position: absolute; top: 0; z-index: 1000;"></div>

				<div id="header-carousel" class="carousel slide" data-ride="carousel">

				<!-- Indicators -->
				<?php if( have_rows('header_carousel_images') ): $index = 0; ?>
					<ol class="carousel-indicators">

			    	<?php while ( have_rows('header_carousel_images') ) : the_row(); ?>
	
						<li data-target="#header-carousel" data-slide-to="<?php echo $index ?>" <?php if($index == 0) echo 'class="active"' ?>></li>

				    <?php $index++; endwhile; ?>
	
					</ol>
				<?php endif; ?>

				<!-- Carousel Wrapper -->
				<?php if( have_rows('header_carousel_images') ): $index = 0; ?>
					<div class="carousel-inner" role="listbox">

			    	<?php while ( have_rows('header_carousel_images') ) : the_row(); ?>

						<div class="item <?php if($index == 0) echo 'active' ?>">
							<img src="<?php the_sub_field('image') ?>" alt="<?php the_sub_field('image') ?>">
							<div class="carousel-caption">
								<h3><?php the_sub_field('title') ?></h3>
								<?php the_sub_field('caption') ?>
							</div>
						</div>
	
				    <?php $index++; endwhile; ?>
	
					</div>
				<?php endif; ?>


					<!-- Left and right controls -->
					<a class="left carousel-control" href="#header-carousel" role="button" data-slide="prev" style="z-index: 1000;">
						<span class="font-size-250">
							<?php the_field('header_carousel_icon_left') ?>
						</span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#header-carousel" role="button" data-slide="next" style="z-index: 1000;">
						<span class="font-size-250">
							<?php the_field('header_carousel_icon_right') ?>
						</span>
						<span class="sr-only">Next</span>
					</a>
				</div>

				<div class="site-header-main">
					<div class="container">
						<div class="row">
							<div class="col-md-4 col-md-offset-4 text-center">
								<div class="site-branding">
									<img src="<?php header_image(); ?>" style="max-height: 250px; max-width: 250px;"></img>
								</div><!-- .site-branding -->
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-md-offset-4 text-center">
								<div class="buffer-margin-70">
									<?php
									$description = get_bloginfo( 'description', 'display' );
									if ( $description || is_customize_preview() ) : ?>
										<p class="site-description"><?php echo $description; ?></p>
									<?php endif; ?>
								</div>
			
								<div>
									<a class="skip-link screen-reader-text" href="#content" style="color: <?php the_field('header_font_color') ?>;">
										<span class="fa-5x"><?php the_field('header_masthead_icon') ?></span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div><!-- .site-header-main -->
			</div>

			<div id="content" class="site-content">
