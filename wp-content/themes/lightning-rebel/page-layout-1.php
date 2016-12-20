<?php
/**
 * Template Name: Page Layout 1

 * @package WordPress
 * @subpackage Lightning_Rebel
 * @since Lightning Rebel 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<?php if( have_rows('section_layout') ): ?>
		<div class="container-fluid">
	    <?php while ( have_rows('section_layout') ) : the_row(); ?>
			<section class="row <?php the_sub_field('section_class'); ?>" id="<?php the_sub_field('section_id'); ?>" style="background-color: <?php the_sub_field('section_background_color'); ?>;">

			<?php if( get_sub_field('section_title') ): ?>
				<div class="container-fluid">
					<div class="row">
						<div class="<?php the_sub_field('section_title_container_class'); ?>">
							<h2 class="<?php the_sub_field('section_title_class'); ?>"><?php the_sub_field('section_title'); ?></h2>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if( have_rows('section_carousel') ): $has_carousel = true; ?>
				<div class="container-fluid section-carousel">
			    	<?php while ( have_rows('section_carousel') ) : the_row(); $carousel_height = get_sub_field('carousel_height'); $carousel_id = get_sub_field('carousel_id'); $row_count = count( get_sub_field('carousel_slide') ); ?>

					<div id="<?php echo $carousel_id; ?>" class="carousel slide" data-ride="carousel" style="min-height: <?php echo $carousel_height; ?>;">
						<div class="row">
							<?php $index = 0; while ( have_rows('carousel_slide') ) : the_row(); ?>
	
							<?php if( get_sub_field('active_indicator_styles') || get_sub_field('hover_indicator_styles') ) : $button_id = $carousel_id.'-button-'.$index; ?>
							<style>
								<?php echo('#'.$button_id); ?>.active {
									<?php the_sub_field('active_indicator_styles', false, false); ?>
									width: <?php echo(100/$row_count) ?>%;
								}

								<?php echo('#'.$button_id); ?>:not(.active):hover {
									<?php the_sub_field('hover_indicator_styles', false, false); ?>
								}
							</style>
							<?php endif; ?>

							<?php $index++; endwhile; ?>
							<div class="carousel-indicators text-center">
								<?php $index = 0; while ( have_rows('carousel_slide') ) : the_row(); ?>

								<button data-target="#<?php echo $carousel_id; ?>" data-slide-to="<?php echo $index ?>" class="<?php echo 'col-sm-'.(round(12/$row_count)).' col-xs-12'; echo ($index == 0) ? ' active ' : ' '; get_sub_field('indicator_class') ? the_sub_field('indicator_class') : ''; ?>" id="<?php echo($button_id); ?>">
									<?php the_sub_field('indicator_title'); ?>
								</button>

								<?php $index++; endwhile; ?>
							</div>
						</div>
						<div class="row">
							<div class="carousel-inner" role="listbox">
								<?php $index = 0; while ( have_rows('carousel_slide') ) : the_row(); ?>
						
								<div class="item <?php echo ($index == 0) ? 'active ' : ''; the_sub_field('slide_class'); ?>"  style="min-height: <?php echo $carousel_height; ?>;">
									<?php the_sub_field('slide_content', false, false); ?>
								</div>

								<?php $index++; endwhile; ?>
							</div>
						</div>
					</div>

				    <?php endwhile; ?>
				</div>
			<?php endif; ?>

			<?php if( have_rows('section_content') && $has_carousel != true ): ?>
				<div class="container-fluid">
					<div class="row">

			    	<?php while ( have_rows('section_content') ) : the_row(); ?>

						<div class="<?php the_sub_field('container_class'); ?>">
							<h3 class="<?php the_sub_field('content_title_class'); ?>"><?php the_sub_field('content_title'); ?></h3>
							
							<div class="<?php the_sub_field('content_body_class'); ?>">
								<?php the_sub_field('content_body'); ?>
							</div>
						</div>

				    <?php endwhile; ?>

					</div>
				</div>
			<?php endif; ?>

			</section>
	    <?php endwhile; ?>
		</div>
	<?php endif; ?>

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>