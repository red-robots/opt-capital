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
                                <div class="c-title-wrap">
                                    <h2 class="c_title1"><?php echo $contact_title; ?></h2>
                                    <span class="mail-icon">
                                        <svg enable-background="new 0 0 55.5 31.1" version="1.1" viewBox="0 0 55.5 31.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                            <path class="st00" d="M11.4,0.9h41.3c1.1,0,2,0.9,2,2v25.5c0,1.1-0.9,2-2,2H11.4"/>
                                            <path class="st11" d="M17.3,6.1L32,16.8c0.7,0.5,1.7,0.5,2.4,0L48.7,6.1"/>
                                            <line class="st11" x1="41.5" x2="50.8" y1="16.5" y2="26.1"/>
                                            <line class="st11" x2="13.6" y1="9.2" y2="9.2"/>
                                            <line class="st11" x1="4.6" x2="18.2" y1="15.5" y2="15.5"/>
                                            <line class="st11" x1="10" x2="23.6" y1="22.3" y2="22.3"/>
                                        </svg>
                                    </span>
                                </div>
                                
                                <div class="c_text"><?php echo $contact_content; ?></div>
                                
                                <div class="formWrap clear">
                                    <?php echo do_shortcode($form_shortcode); ?>
                                    <a id="formSubmitBtn">
                                        <span>
                                            <svg enable-background="new 0 0 31.8 26.4" version="1.1" viewBox="0 0 31.8 26.4" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                            <polygon class="st0" points="1.5 12.4 31 0.9 25.8 25.5 14.7 17.1"/>
                                            <polyline class="st0" points="31 0.9 14.7 17.1 14.7 24.9 19.2 20.5"/>
                                            </svg>
                                        </span>
                                    </a> 
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                        <div class="addressCol column">
                            <div class="a_inside clear">
                                <h3 class="a-title">Our Contacts</h3>
                                <?php 
                                    $address = get_field('physical_address', 'option'); 
                                    $contact_numbers = get_field('contact_numbers', 'option'); 
                                    $email = get_field('email', 'option'); 
                                    $whiteLogo = get_field('white_logo', 'option'); 
                                ?>
                                <?php if($address) { ?>
                                <div class="a-info clear">
                                    <span class="icon marker">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    <div class="txt"><?php echo $address; ?></div>
                                </div>
                                <?php } ?>
                                
                                <?php if($contact_numbers) { ?>
                                <div class="a-info clear">
                                    <span class="icon phone">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </span>
                                    <div class="txt"><?php echo nl2br($contact_numbers); ?></div>
                                </div>
                                <?php } ?>
                                
                                <?php if($email) { ?>
                                <div class="a-info clear">
                                    <span class="icon email">
                                        <i class="fas fa-envelope" aria-hidden="true"></i>
                                    </span>
                                    <div class="txt"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
                                </div>
                                <?php } ?>
                                
                                <?php if($whiteLogo) { ?>
                                <div class="trans-logo">
                                    <img src="<?php echo $whiteLogo?>" alt="" />
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </main><!-- #main -->
    </div><!-- #primary -->
</div>

<?php
get_footer();
