<?php
/**
 * Template Name: Deferrals
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 
$vidLink = get_field('video_link'); 
$the_steps = get_field('steps');
$step_count = 0;
if($the_steps){ 
$step_count = count($the_steps); ?>
<style type="text/css">
<?php $j=1; foreach($the_steps as $a) { 
$color = $a['step_text_color'];
if($color) { ?>
#stepno_<?php echo $j;?> .numtext,
#stepno_<?php echo $j;?> .name,
#stepno_<?php echo $j;?> .plus,
#stepno_<?php echo $j;?> .step-desc {
	color:<?php echo $color;?>!important;
}
<?php } ?>
<?php $j++; } ?>
</style>
<?php }
?>

	<div id="primary" class="content-area-intro">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->


	<section class="about-meet-our-team">
		<div class="learnmore swipe">
			<div class='insider'></div>
			<a href="<?php echo $vidLink; ?>">View Video</a>
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
			
			<div id="stepno_<?php echo $i;?>" class="step<?php echo($i==$step_count) ? ' last':'';?>">
				<div class="numtext"><?php echo $i;?></div>
				<div class="step-title">
					<div class="step-num">
						<div class="name">
							<div class="midwrap"><?php echo $stepTitle; ?>
								<div class="plus">
									<span class="icon1"><i class="fas fa-caret-down"></i></span>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<div class="step-desc entry-content clear"> 
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
