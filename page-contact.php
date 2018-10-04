<?php
/**
 * Template Name: Contact
 *
 * @package ACStarter
 */

get_header(); 
global $post;
$post_id = isset($post->ID) ? $post->ID : 0;
$post_thumbnail_id = get_post_thumbnail_id( $post_id );
$img = wp_get_attachment_image_src($post_thumbnail_id,'large');
$image_src = ($img) ? $img[0] : '';
$atts = ($img) ? " style=background-image:url(".$image_src.")" : '';
?>

<div class="subpage-wrapper contactpage clear">
    <div class="full-image-wrap contact-image clear"<?php echo $atts?>>
        <div class="bg-overlay"></div>
    </div>

    <div id="primary" class="content-area contact-content">
        <main id="main" class="site-main clear" role="main">
            <?php  while ( have_posts() ) : the_post(); ?>
                <div class="topContent">
                    <?php the_content(); ?>
                </div>
                
                <div class="contact-form-wrapper clear">
                    <div class="row clear">
                        <div class="formCol column">
                            <div class="inside clear">
                            <?php 
                                $form_shortcode = get_field('contact_form_shortcode');
                                $contact_title = get_field('contact_title_1');
                                $contact_content = get_field('contact_content');
                            ?>
                            <?php if( $form_shortcode &&  do_shortcode($form_shortcode) ) { ?>
                                <h2 class="c_title1"><?php echo $contact_title; ?></h2>
                                <div class="c_text"><?php echo $contact_content; ?></div>
                                <div class="formWrap">
                                    <?php echo do_shortcode($form_shortcode); ?>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                        <div class="addressCol column">
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </main><!-- #main -->
    </div><!-- #primary -->
</div>

<?php
get_footer();
