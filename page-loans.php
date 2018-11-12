<?php
/**
 * Template Name: Loans
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
<?php 
$box1title = get_field('box_1_title');
$box2title = get_field('box_2_title');
$box3title = get_field('box_3_title');

$box1desc = get_field('box_1_description');
$box1link = get_field('box_1_link');

$box2desc = get_field('box_2_description');
$box2link = get_field('box_2_link');

$box3desc = get_field('box_3_description');
$box3link = get_field('box_3_link');
 ?>
 <section class="bott-page">
	

	<section class="boxes">
		<div class="box box1">
			<h2><?php echo $box1title; ?></h2>
			<div class="desc"><?php echo $box1desc; ?></div>
			<div class="learnmore swipe">
				<div class='insider'></div>
				<a href="<?php echo $box1link['url']; ?>">Learn More</a>
			</div>
		</div>
		<div class="box box2">
			<h2><?php echo $box2title; ?></h2>
			<div class="desc"><?php echo $box2desc; ?></div>
			<div class="learnmore swipe">
				<div class='insider'></div>
				<a href="<?php echo $box2link['url']; ?>">Learn More</a>
			</div>
		</div>
		<div class="box box3">
			<h2><?php echo $box3title; ?></h2>
			<div class="desc"><?php echo $box3desc; ?></div>
			<div class="learnmore swipe">
				<div class='insider'></div>
				<a href="<?php echo $box3link['url']; ?>">Learn More</a>
			</div>
		</div>
	</section>
</section>
<?php
get_footer();

