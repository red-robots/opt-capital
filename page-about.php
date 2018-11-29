<?php
/**
 * Template Name: About
 *
 * @package ACStarter
 */

get_header(); 
$sectionlink = get_field('section_link');
$sectiontext = get_field('section_text');
?>
<div class="wrapper clear">
	<div id="primary" class="full-content-area clear">
		<main id="main" class="content-area" role="main">
			<?php while ( have_posts() ) : the_post();
				if( get_the_content() ) {
					get_template_part( 'template-parts/content', 'page' );
				}
			endwhile;  ?>

			<div class="full-content-area">
				<?php if(have_rows('bullets')) : ?>
					<section class="bullets">
						<?php while(have_rows('bullets')) : the_row(); ?>
							<div class="bullet entry-content">
								<?php the_sub_field('bullet'); ?>
							</div>
						<?php endwhile; ?>
					</section>
				<?php endif; ?>

				<div class="story entry-content">
					<?php the_field('story'); ?>
				</div>
				
				<section class="meet-team-link">
					<div class="learnmore swipe">
						<div class='insider'></div>
						<a href="<?php echo $sectionlink; ?>"><?php echo $sectiontext; ?></a>
					</div>
				</section>
			</div>
		</main><!-- #main -->
		<!-- #primary -->

		<div class="widget-area timeline">
		    <section class="stats">
			<?php 
				$stat_title = get_field('timeline_section_title');
		        $statsArrs = get_field('stats');
		        $stats_total = ($statsArrs) ? count($statsArrs) : 0;
		        $prevClass = '';
		        if(have_rows('stats')) : ?>
		        <?php if($stat_title) { ?><h3 class="timeline-title"><?php echo $stat_title; ?></h3><?php } ?>
				<?php  $i=1; while(have_rows('stats')) : the_row(); 
					$thought=get_sub_field('stat');
		            $h_option = get_sub_field('highlight');
		            $is_highlight = ( isset($h_option[0]) ) ? 'yes' : 'no';                
		            $highlight = ($is_highlight=='yes') ? ' highlight':'';
		            $last = ($stats_total==$i) ? ' last':'';

				?>
				<div id="tlrow<?php echo $i;?>" class="timeline-info<?php echo $highlight . $prevClass . $last; ?>">
					<div class="text"><?php echo $thought; ?></div>
		            <div class="pointer">
		                <span class="circle"></span>
		                <span class="tail"><span></span></span>
		            </div>
				</div>
			<?php $i++; endwhile; endif; ?>
			</section>
		</div>
	</div>
</div>
<?php
get_footer();
