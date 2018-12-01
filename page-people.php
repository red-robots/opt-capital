<?php
/**
 * Template Name: People
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper clear">
    <div class="people">
    	<div id="primary" class="content-area-full">
    		<main id="main" class="site-main" role="main">

    			<?php
    			while ( have_posts() ) : the_post();
    				get_template_part( 'template-parts/content', 'page' );
    			endwhile; // End of the loop.
    			?>
                
                <?php
                $team_lists = get_the_teams();
                $display_all = false;
                if($team_lists) { ?>
                <div class="team-wrapper clear">
                    <?php foreach($team_lists as $obj) { 
                    $category = $obj['term_name'];
                    $members = $obj['members']; 
                        if($members) { ?>
                            <section class="people">   
                            <h2 class="team-category"><span><?php echo $category; ?></span></h2>
                            <div class="row clear">
                                <div class="card-wrap">
                                <?php if($members) { ?>
                                    <?php foreach($members as $m) { 
                                        $postId = $m->post_id;
                                        $post_title = $m->post_title;
                                        $img = get_field('team_image',$postId);
                                        $title = get_field('title',$postId);
                                        ?>

                                        <div class="card clickable-box">
                                            <div class="pad clear">
                                                <?php if($img) { ?>
                                                    <div class="image has-image clear">
                                                        <div class="imageDiv" style="background-image:url(<?php echo $img['url']; ?>)"></div>
                                                        <img class="staff-photo" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="image no-image clear">
                                                        <span><i class="fa fa-user"></i></span>
                                                    </div>
                                                <?php } ?>
                                                <h2 class="name"><?php echo $post_title; ?></h2>
                                                <?php if($title) { ?>
                                                    <h3 class="designation"><?php echo $title; ?></h3>
                                                <?php } ?>

                                                <div class="center">
                                                    <div class="learnmore swipe">
                                                        <div class='insider'></div>
                                                        <a href="<?php echo get_the_permalink($postId); ?>">Full Bio</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            </div>    
                        </section>
                        <?php } else {  $display_all[] = 1; } ?>
                    <?php } ?>
                </div>
                <?php } ?>
                
                <?php if($display_all) { ?>
                    <section class="people">
    				    <div class="card-wrap">
                            <?php
                                $wp_query = new WP_Query();
                                $wp_query->query(array(
                                'post_type'=>'team',
                                'posts_per_page' => -1,
                                'paged' => $paged,
                            ));
                            if ($wp_query->have_posts()) : ?>
                            <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 
                                $title=get_field('title');
                                $img=get_field('team_image');
                            ?>
                                <div class="card clickable-box">
                                    <div class="pad clear">
                                        <?php if($img) { ?>
                                            <div class="image has-image clear">
                                                <img class="staff-photo" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                            </div>
                                        <?php } else { ?>
                                            <div class="image no-image clear">
                                                <span><i class="fa fa-user"></i></span>
                                            </div>
                                        <?php } ?>
                                        <h2 class="name"><?php the_title(); ?></h2>
                                        <?php if($title) { ?>
                                            <h3 class="designation"><?php echo $title; ?></h3>
                                        <?php } ?>
                                        <div class="center">
                                            <div class="learnmore swipe">
                                                <div class='insider'></div>
                                                <a href="<?php the_permalink(); ?>">Full Bio</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
    			     </div>
    			</section>	
                <?php } ?>
    		</main><!-- #main -->
    	</div><!-- #primary -->
    </div>
</div>
<?php
get_footer();
