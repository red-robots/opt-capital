<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

/* Start the Loop */
$wp_query = new WP_Query(array('post_status'=>'private','pagename'=>'homepage'));
if ( have_posts() ) : the_post(); 
	$video=get_field('video');
	$box1icon=get_field('box_1_icon');
	$box1title=get_field('box_1_title');
	$box1desc=get_field('box_1_description');
	$box1link=get_field('box_1_link');

	$box2icon=get_field('box_2_icon');
	$box2title=get_field('box_2_title');
	$box2desc=get_field('box_2_description');
	$box2link=get_field('box_2_link');

	$box3icon=get_field('box_3_icon');
	$box3title=get_field('box_3_title');
	$box3desc=get_field('box_3_description');
	$box3link=get_field('box_3_link');

	$boxes[] = array('icon'=>$box1icon,'title'=>$box1title,'desc'=>$box1desc,'link'=>$box1link);
	$boxes[] = array('icon'=>$box2icon,'title'=>$box2title,'desc'=>$box2desc,'link'=>$box2link);
	$boxes[] = array('icon'=>$box3icon,'title'=>$box3title,'desc'=>$box3desc,'link'=>$box3link);


    $video_title = get_field('video_title');
    $video_description = get_field('video_description');
 endif; ?>

<div class="wrapper clear">
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<section class="home-middle">
				<section class="video">
					<div class="video-player-wrapper">
						<div class="video-player">
							<?php echo $video; ?>
						</div>
					</div>
					<div class="content">
                        <?php if($video_title) { ?>
                            <h2 class="vtitle"><?php echo $video_title;?></h2>
                        <?php } ?>
						<?php if($video_description) { ?>
                            <div class="vdesc"><?php echo $video_description;?></div>
                        <?php } ?>
					</div>
				</section>
                
                <?php /* STRATEGIES */ ?>
				<section class="strategies">
                    <?php  
                        $args = array(
                                'posts_per_page'   => 1,
                                'orderby'          => 'date',
                                'order'            => 'DESC',
                                'post_type'        => 'post',
                                'post_status'      => 'publish'
                            );
                        $strategy = new WP_Query($args);
                        if ( $strategy->have_posts() ) {  ?>
                            <?php while ( $strategy->have_posts() ) : $strategy->the_post(); 
                        		$p_id = get_the_ID();
                        		$main_title = get_field('main_title',$p_id);
                        		$subtitle = get_field('subtitle',$p_id);
                            	?>
                            	<?php if($main_title) { ?>
                                <h2 class="title"><?php echo $main_title; ?></h2>
                            	<?php } ?>
                            	<?php if($subtitle) { ?>
                                <h3 class="title2"><?php echo $subtitle; ?></h3>
                            	<?php } ?>
                                <?php
                                    $s_content = get_the_content();
                                    $postId = get_the_ID();
                                    $s_excerpt = get_field('strategy_excerpt');
                                    if($s_content || $s_excerpt ) {
                                        if($s_excerpt) {
                                            $strategy_text = $s_excerpt;
                                        } else {
                                            $strategy_text = shortenText($s_content,400);
                                            $strategy_text = wpautop($strategy_text);
                                        }
                                    ?>
                                    <div class="strat-content">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <div class="learnmore swipe">
                                        <div class='insider'></div>
                                        <a href="<?php echo get_permalink($postId);?>">Read More</a>
                                    </div>
                                <?php } ?>
                            <?php endwhile; wp_reset_postdata(); ?>
                        <?php } else { ?>
                            <?php the_field('strategies'); ?>
                        <?php } ?>
				</section>
                
			</section>

			<section class="boxes">
				<?php $j=1; foreach($boxes as $b) { 
					$b_icon = $b['icon'];
					$b_title = $b['title'];
					$b_desc = $b['desc'];
					$b_link = ($b['link']) ? $b['link'] : '#';
					if( $b_title && $b_desc ) { ?>
					<div class="box box<?php echo $j;?>">
						<?php if($b_icon) { ?>
						<div class="icon">
							<img src="<?php echo $b_icon['url'];?>" alt="<?php echo $b_icon['title'];?>" />
						</div>
						<?php } ?>
						<h2><?php echo $b_title; ?></h2>
						<div class="desc"><?php echo $b_desc; ?></div>
						<div class="learnmore swipe">
							<div class='insider'></div>
							<a class="boxlink" href="<?php echo $b_link; ?>">Learn More</a>
						</div>
					</div>
					<?php $j++; } ?>
				<?php } ?>
			</section>
		
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
