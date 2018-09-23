<?php
/**
 * Template Name: About
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );


			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<div class="widget-area">
<section class="stats">
	<?php if(have_rows('stats')) : ?>
		<?php while(have_rows('stats')) : the_row(); 
			$thought=get_sub_field('stat');
		?>
		<div class="speech-bubble">
			<?php echo $thought; ?>
		</div>
	<?php endwhile; endif; ?>
	</section>
</div>
<?php
get_footer();
