<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

/* Start the Loop */
$wp_query = new WP_Query(array('post_status'=>'private','pagename'=>'homepage'));
if ( have_posts() ) : the_post(); 
	$video=get_field('video');
	$box1title=get_field('box_1_title');
	$box1desc=get_field('box_1_description');
	$box1link=get_field('box_1_link');
	$box2title=get_field('box_2_title');
	$box2desc=get_field('box_2_description');
	$box2link=get_field('box_2_link');
	$box3title=get_field('box_3_title');
	$box3desc=get_field('box_3_description');
	$box3link=get_field('box_3_link');
 endif; ?>
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<section class="home-middle">
				<section class="video">
					<div class="video-player-wrapper">
						<div class="video-player">
							<?php echo $video; ?>
						</div>
					</div>
					<div class="content">
						<h2></h2>
					</div>
				</section>
				<section class="strategies">
					<?php the_field('strategies'); ?>
					<div class="learnmore swipe">
						<div class='insider'></div>
						<a href="">Read More</a>
					</div>
				</section>
			</section>
			<section class="boxes">
				<div class="box box1">
					<div class="icon">
						<img src="<?php bloginfo('template_url'); ?>/images/deferrals.png">
					</div>
					<h2><?php echo $box1title; ?></h2>
					<div class="desc"><?php echo $box1desc; ?></div>
					<div class="learnmore swipe">
						<div class='insider'></div>
						<a href="<?php echo $box1link; ?>">Learn More</a>
					</div>
				</div>
				<div class="box box2">
					<div class="icon">
						<img src="<?php bloginfo('template_url'); ?>/images/better-loans.png">
					</div>
					<h2><?php echo $box2title; ?></h2>
					<div class="desc"><?php echo $box2desc; ?></div>
					<div class="learnmore swipe">
						<div class='insider'></div>
						<a href="<?php echo $box2link; ?>">Learn More</a>
					</div>
				</div>
				<div class="box box3">
					<div class="icon">
						<img src="<?php bloginfo('template_url'); ?>/images/financial-advisor.png">
					</div>
					<h2><?php echo $box3title; ?></h2>
					<div class="desc"><?php echo $box3desc; ?></div>
					<div class="learnmore swipe">
						<div class='insider'></div>
						<a href="<?php echo $box3link; ?>">Learn More</a>
					</div>
				</div>
			</section>
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
