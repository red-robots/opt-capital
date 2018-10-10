<?php
/**
 * Template Name: FAQ's
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area faq-content">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
            
            <?php  
                $faq_fields = array('loan','deferral');  
                $subFields[] = array('question','answer');
                $subFields[] = array('question_1','answer_2');
            ?>
            
            <div class="faq-wrapper clear">
                <div class="row clear">
                <?php $i=0; foreach($faq_fields as $f) {  
                    $field_faqs = $f . '_faqs';
                    $field_title = $f . '_title'; 
                    $sub =  $subFields[$i];
            
                    ?>
                    <?php if(have_rows($field_faqs)) { ?>
                    <section data-type="<?php echo $f;?>" id="<?php echo $f;?>_faqs" class="faqs faqcol">
                        <div class="inner">
                            <?php if( $faq_title= get_field($field_title) ) { ?>
                                <div class="titlewrap clear">
                                    <h2 class="title"><?php echo $faq_title; ?></h2>
                                </div>
                            <?php } ?>
                            
        
                            <?php while(have_rows($field_faqs)): the_row();       
                                $question = get_sub_field( $sub[0] );
                                $answer = get_sub_field( $sub[1] );  ?>
                                <div class="faqrow">

                                    <?php if($question) { ?>
                                    <div class="question">
                                        <div class="plus-minus-toggle collapsed"></div>
                                        <span class="q"><?php echo $question; ?></span>
                                    </div>

                                    <div class="answer"><?php echo $answer; ?></div>
                                    <?php } ?>

                                </div><!-- faqrow -->
                            <?php endwhile; ?>
                        </div>
                    </section>
                    <?php } ?>
                <?php $i++; } ?>
                </div>
            </div>    

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();