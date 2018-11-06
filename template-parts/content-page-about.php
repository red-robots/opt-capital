<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
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

	<div class="entry-content">
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->
