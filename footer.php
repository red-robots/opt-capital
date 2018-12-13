<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */
$linkedin=get_field('linkedin_link', 'option');
$email=get_field('email', 'option');
$antispam=antispambot($email);
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<div class="left-footer">
				<?php if(have_rows('links', 'option')): ?>
					<ul>
						<?php while(have_rows('links', 'option')):the_row(); 
							$post_id = get_sub_field('link', false, false);
							$footer_title = get_sub_field('footer_title', false, false);?>
						<li>
							<a href="<?php echo get_the_permalink($post_id); ?>">
								<?php echo ($footer_title) ? $footer_title : get_the_title($post_id); ?>
							</a>
						</li>
						<?php endwhile; ?>
						<li>
                            <?php 
                                $social_links = ge_social_fields(); /* functions.php */
                            ?>
							<div class="icons">
                                <?php foreach($social_links as $s) { 
                                    $link = get_field( $s['field'], 'option' );
                                    $icon = $s['icon'];
                                    $att = ( isset($s['att']) && $s['att'] ) ? $s['att'] : '';
                                    $href_val = ($att) ? $att . ':' . $link : $link; ?>
                                    
                                    <?php if($link) { ?>
                                        <a href="<?php echo $href_val; ?>" target="_blank">
                                            <i class="<?php echo $icon?>"></i>
                                        </a>
                                    <?php } ?>
                                
                                <?php } ?>
								
							</div>
						</li>
					</ul>
				<?php endif; ?>
			</div><!-- .site-info -->
			<div class="right-footer">
				<div class="footer-logo">
					<img src="<?php bloginfo('template_url'); ?>/images/footer-logo.png" alt="OptCapital">
				</div>
				<div class="copyright">
					&copy; OPTCAPITAL, LLC  <?php date('Y'); ?><br>
					ALL RIGHTS RESERVED
				</div>
			</div><!-- .site-info -->
	</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html><?php 

// vars
$post_id = get_field('url', false, false);

// check 
if( $post_id ): ?>

<?php endif; ?>
