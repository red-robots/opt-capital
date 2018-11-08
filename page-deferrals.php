<?php
/**
 * Template Name: Deferrals
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area-intro">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


	<section class="about-meet-our-team">
		<div class="learnmore swipe">
			<div class='insider'></div>
			<a href="<?php echo $sectionlink; ?>">View Video</a>
		</div>
	</section>

	<?php 
	$i = 0;
	if(have_rows('steps')) : ?>
	<section class="steps">
		
		<div class="step-wrap">
			<h2>How Our Deferral Program Works</h2>
		<?php while(have_rows('steps')) : the_row(); $i++;
			$stepTitle = get_sub_field('step_title');
			$stepDesc = get_sub_field('step_description');
		?>
			<div class="step">
				<div class="step-title">
					<div class="step-num">
						<!-- <div class="circle">
							<?php echo $i; ?>
						</div> -->
						<div class="name"><?php echo $i . ' / ' . $stepTitle; ?></div>
						<div class="plus <?php if($i == 1){echo 'active';} ?>">
							<i class="fas fa-plus"></i>
						</div>
					</div>
					
				</div>
				<div class="step-desc entry-content " style="<?php if($i == 1){echo'display: block;';}?>"> 
					<?php echo $stepDesc; ?>
				</div>
			</div>
		<?php endwhile; ?>
		</div>
	</section>
	<?php endif; ?>

	<?php get_template_part('inc/boxes'); ?>

<?php
get_footer();
