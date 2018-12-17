<?php
/**
 * Template Name: News
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper clear">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php 
	        if(!is_single() ){
	            $str = get_the_title();
	            $count = str_word_count($str);
	            $title = $str;
	            if($count>1) {
	                $pieces = explode(' ', $str);
	                $total_words = count($pieces);
	                $last_word = end($pieces);
	                $title = '';
	                $i=1; foreach($pieces as $word) {
	                    $comma = ($i>1) ? ' ':'';
	                    if($i==$total_words) {
	                        $title .= $comma . '<span class="last-word">'.$word.'</span>';
	                    } else {
	                        $title .= $comma . $word;
	                    }
	                    $i++;
	                }
	                
	            }
	        } else {
	            $title = get_the_title();
	        }
	            
	    ?>
	    <?php if( !has_post_thumbnail() ) { ?>
	    	<header class="entry-header">
	            <h1 class="entry-title styledTitle"><?php echo $title; ?></h1>
	    	</header><!-- .entry-header -->
	    <?php } ?>

			<?php
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'post',
				'posts_per_page' => 10,
				'paged' => $paged,
			));
				if ($wp_query->have_posts()) : ?>
				<section class="news">
				    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				    	<article class="blogpost">
				    		<h1><?php the_title(); ?></h1>
				    		<div class="entry-content">
				    			<?php the_excerpt(); ?>
				    		</div>
				    		<div class="learnmore swipe">
                                <div class='insider'></div>
                                <a href="<?php the_permalink();?>">Read More</a>
                            </div>
				    	</article>
				    <?php endwhile; ?>
				    <?php pagi_posts_nav(); ?>
			    </section>
			<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
