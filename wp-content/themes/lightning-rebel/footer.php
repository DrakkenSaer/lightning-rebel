<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Lightning_Rebel
 * @since Lightning Rebel 1.0
 */
?>

		</div><!-- .site-content -->

		<style>
			.footer-menu-header {
				color: <?php the_field('footer_header_color', 'option'); ?>;
			}
			
			.footer-menu * {
				color: <?php the_field('footer_item_color', 'option'); ?>;
			}
		</style>

		<footer id="colophon" class="site-footer text-center-sm" role="contentinfo" style="background: grey;">
			<div class="container-fluid buffer-padding-50">
				<div class="row">
					<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<div class="col-md-2 col-md-offset-2 col-xs-5 col-xs-offset-1">
						<nav class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Links Menu', 'lightningrebel' ); ?>">
							<?php
								$menu = get_menu_by_location('primary');
	
								echo "<h4 class='footer-menu-header'>".esc_html($menu->name)."</h4>";
	
								wp_nav_menu( array(
									'theme_location' => 'primary',
									'menu_class'     => 'list-unstyled text-uppercase footer-menu text-decoration-none',
								 ) );
							?>
						</nav>
					</div>
					<?php endif; ?>

					<?php if ( has_nav_menu( 'social' ) ) : ?>
					<div class="col-md-2 col-xs-5">
						<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'lightningrebel' ); ?>">
							<?php
								$menu = get_menu_by_location('social');
	
								echo "<h4 class='footer-menu-header'>".esc_html($menu->name)."</h4>";
	
								wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_class'     => 'list-unstyled text-uppercase social-links-menu footer-menu text-decoration-none',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
								) );
							?>
						</nav>
					</div>
					<?php endif; ?>
				</div>
				
				<div class="row">
					<div class="site-info">
						<?php
							/**
							 * Fires before the lightningrebel footer text for footer customization.
							 *
							 * @since Lightning Rebel 1.0
							 */
							do_action( 'lightningrebel_credits' );
						?>

						<div class="col-md-4 col-md-offset-2 col-sm-5 col-xs-10 col-xs-offset-1 buffer-padding-20">
							<span class="site-title"><?php bloginfo( 'name' ); ?> &copy; <?php echo date("Y"); ?></span>
						</div>
	
						<div class="col-md-4 col-md-offset-2 col-sm-5 col-xs-12 buffer-padding-20">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php the_field('footer_logo', 'option'); ?>" width="300"></img>
							</a>
						</div>
					</div><!-- .site-info -->
				</div>
			</div>
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
