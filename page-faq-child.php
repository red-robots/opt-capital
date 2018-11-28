<?php
/**
 * Template Name: FAQ type
 */

get_header(); ?>

	<div id="primary" class="content-area-intro">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
			?>

			<?php $faqs = get_field('faqs'); ?>
			<?php if($faqs) { ?>
			<section class="faqs">
				<?php foreach($faqs as $e) { ?>
				<div class="faqrow">
					<div class="question close">
						<div class="plus-minus-toggle collapsed"></div>
						<span class="q"><?php echo $e['question']?></span>
					</div>
					<div class="answer"><?php echo $e['answer']?></div>
				</div>
				<?php } ?>
			</section>
			<?php } ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
