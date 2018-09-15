<?php
/**
 * Template Name: People
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
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

			<section class="people">
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
					$year=get_field('year_joined_company');
					$experience=get_field('previous_experience');
					$education=get_field('education');
				?>
					<div class="person">
						<?php if($img) { ?>
							<div class="image">
								<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
							</div>
						<?php } ?>
						<h2><?php the_title(); ?></h2>
						<?php if($title) { ?>
							<h3><?php echo $title; ?></h3>
						<?php } ?>
						<?php if($year) { ?>
							<div class="year"><?php echo $year; ?></div>
						<?php } ?>
						<?php if($experience) { ?>
							<div class="experience"><?php echo $experience; ?></div>
						<?php } ?>
						<?php if($education) { ?>
							<div class="education"><?php echo $education; ?></div>
						<?php } ?>
						<div class="learnmore swipe">
							<div class='insider'></div>
							<a href="<?php the_permalink(); ?>">Read More</a>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
			</section>	

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
