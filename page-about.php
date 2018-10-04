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
	<?php 
        $statsArrs = get_field('stats');
        $stats_total = ($statsArrs) ? count($statsArrs) : 0;
        if(have_rows('stats')) : ?>
        <h3 class="timeline-title">Timeline</h3>
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
<?php
get_footer();
