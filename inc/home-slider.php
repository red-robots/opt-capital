
<?php
/* Start the Loop */
$wp_query = new WP_Query(array('post_status'=>'private','pagename'=>'homepage'));
if ( have_posts() ) : the_post(); 
	

	if( have_rows('slides')):
	?>
	<div id="slider">
		<div class="flexslider">
			<ul class="slides">
				<?php while(have_rows('slides')):the_row(); 
					$img=get_sub_field('slide_image');
					$title1=get_sub_field('title_1');
					$title2=get_sub_field('title_2');
					$description=get_sub_field('description');
				?>
				<li>
					<div class="slide">
						<img src="<?php echo $img['url']; ?>">
						<div class="message">
							<h2>
								<?php if($title1){echo $title1;}if($title2){echo '<span class="superbold"> '.$title2.'</span>';} ?>
							</h2>
							<?php if($description){ ?>
								<div class="desc"><?php echo $description; ?></div>
							<?php } ?>
						</div>
						
					</div>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>
