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

			<?php if(have_rows('q&a')): ?>
				<section class="q-n-a">
					<?php while(have_rows('q&a')):the_row();
							$question=get_sub_field('question');
							$answer=get_sub_field('answer');
					 ?>
					 	<div class="question"><?php echo $question; ?></div>
					 	<div class="answer"><?php echo $answer; ?></div>
					<?php endwhile; ?>
				</section>
			<?php endif; ?>

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
