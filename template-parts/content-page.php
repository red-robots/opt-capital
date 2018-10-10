<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php 
            $str = get_the_title();
            $count = str_word_count($str);
            $title = $str;
            if($count>1) {
                $pieces = explode(' ', $str);
                $last_word = end($pieces);
                $title = '';
                $i=1; foreach($pieces as $word) {
                    $comma = ($i>1) ? ' ':'';
                    if($i==$count) {
                        $title .= $comma . '<span class="last-word">'.$word.'</span>';
                    } else {
                        $title .= $comma . $word;
                    }
                    $i++;
                }
            }
    ?>
	<header class="entry-header">
        <h1 class="entry-title styledTitle"><?php echo $title; ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->
