<?php
/**
 * Template Name: FAQ's
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 
global $post;
$post_id = $post->ID;
$args = array(
    'post_parent' => $post_id,
    'post_type'   => 'any', 
    'numberposts' => -1,
    'post_status' => 'publish', 
    'order' => 'ASC',
    'orderby' => 'menu_order'
);
$children = get_children( $args );
?>

	<div id="primary" class="content-area faq-content">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
			?>

            <?php if($children) { ?>
                <ul class="faq-types">
                    <?php foreach($children as $c) { 
                        $id = $c->ID;
                        $name = $c->post_title;
                    ?>
                    <li><a href="<?php echo get_permalink($id)?>"><?php echo $name?></a></li>
                    <?php } ?> 
                </ul>
            <?php } ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();