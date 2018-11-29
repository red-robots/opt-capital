<?php
/**
 * Template Name: Case Studies
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper clear">
	<div id="primary" class="content-area-full clear">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();
				if( get_the_content() ) {
					get_template_part( 'template-parts/content', 'page' );
				}
			endwhile; // End of the loop.
			?>

<?php
	$i=0;
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'case_study',
	'posts_per_page' => 10,
	'paged' => $paged,
));
	if ($wp_query->have_posts()) : ?>
		<section class="case-study">
		    <?php while ($wp_query->have_posts()) : ?>
		        
		    <?php $wp_query->the_post(); $i++; 
		    		if( $i == 2 ) {
		    			$divClass = 'even';
		    			$i = 0;
		    		} else {
		    			$divClass = 'odd';
		    		}

		    ?>	
		    
		    <div class="case">
				<div class="pointer <?php echo $divClass; ?>">
		    		<div class="circle <?php echo $divClass; ?>">
		    		<img src="<?php bloginfo('template_url'); ?>/images/circle.jpg">
		    		</div>
		    		<div class="line <?php echo $divClass; ?>"></div>
		    	</div>
		    	<div class="case-content <?php echo $divClass; ?>">
		    		<h1><?php the_title(); ?></h1>
		    		<?php the_content(); ?>
		    	</div>
		    </div>
		    

			<?php endwhile; ?>
		</section>
	<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
