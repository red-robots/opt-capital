<?php
/**
 * Template Name: Case Studies
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

			endwhile; // End of the loop.
			?>

			<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'case_study',
	'posts_per_page' => 10,
	'paged' => $paged,
));
	if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); ?>	
    
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>

<?php endwhile; endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
