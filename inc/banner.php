<?php if( !is_page('contact-us') ) :?>
<?php if( has_post_thumbnail() ) : ?>
	<section class="banner">
		<?php the_post_thumbnail(); ?>
		<div class="title">
			<h1><?php the_title(); ?></h1>
		</div>
	</section>
<?php 
endif; 

$subtitle = get_field('sub_title'); 

if( $subtitle ) {
	echo '<div class="subtitle">'. $subtitle . '</div>';
}
endif;
?>