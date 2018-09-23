<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			$title=get_field('title');
			$img=get_field('team_image');
			$year=get_field('year_joined_company');
			$experience=get_field('previous_experience');
			$education=get_field('education');

			?>
			<div class="single-person">
				<div class="top-wrap">
					<?php if($img) { ?>
						<div class="image">
							<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div>
					<?php } ?>
					<div class="details">
						<h1><?php the_title(); ?></h1>
						<?php if($title) { ?>
							<h3><?php echo $title; ?></h3>
						<?php } ?>
						<?php if($year) { ?>
							<div class="year">Joined: <?php echo $year; ?></div>
						<?php } ?>
						<?php if($experience) { ?>
							<div class="experience"><?php echo $experience; ?></div>
						<?php } ?>
						<?php if($education) { ?>
							<div class="education"><?php echo $education; ?></div>
						<?php } ?>

					</div>
				</div>
				
				<div class="content"><?php the_content(); ?></div>

				<?php if(have_rows('q&a')): ?>
					<section class="q-n-a">
						<?php while(have_rows('q&a')):the_row();
								$question=get_sub_field('question');
								$answer=get_sub_field('answer');
						 ?>
						 	<div class="row">
							 	<div class="questionz"><?php echo $question; ?></div>
							 	<div class="answerz"><?php echo $answer; ?></div>
						 	</div>
						<?php endwhile; ?>
					</section>
				<?php endif; ?>
			</div>

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="widget-area">
<section class="other-team">
<h2>Team Members</h2>
	<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'team',
	'posts_per_page' => -1,
	'paged' => $paged,
	// 'tax_query' => array(
	// 	array(
	// 		'taxonomy' => 'custom_taxonomy', // your custom taxonomy
	// 		'field' => 'slug',
	// 		'terms' => array( 'green', 'blue' ) // the terms (categories) you created
	// 	)
	// )
));
	if ($wp_query->have_posts()) : ?>
	<?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 
		$title=get_field('title');
		$img=get_field('team_image');
	?>
		<div class="side-person">
			<a href="<?php the_permalink(); ?>">
				<div class="sideflex">
				<!-- <div class="img">
					<img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>">
				</div> -->
				<div class="title">
					<h2><?php the_title(); ?></h2>
					<h3><?php echo $title; ?></h3>
				</div>
				<div class="chevron">
					
						<i class="fas fa-chevron-right"></i>
					
				</div>
				</div>
			</a>
		</div>	
	<?php endwhile; endif; ?>
</div>
</section>
<?php
get_footer();
