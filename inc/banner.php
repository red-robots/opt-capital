<?php 
global $post;
$post_id = ( isset($post->ID) ) ? $post->ID : 0;
if( !is_page('contact-us') ) :?>
<?php if( has_post_thumbnail() ) : 
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
$thumbnail_id = get_post_thumbnail_id($post_id);
$img = wp_get_attachment_image_src($thumbnail_id,'large');
?>
	<section class="banner sub">
       <!--  <div class="imageDiv" style="background-image:url('<?php echo $img[0]?>');"></div> -->
		<?php the_post_thumbnail(); ?>
		<div class="title">
			<header class="entry-header">
				<h1 class="entry-title styledTitle"><?php echo $title; ?></h1>
			</header>
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