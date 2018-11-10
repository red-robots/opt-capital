<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

				<article class="blogpost">
		    		<h1><?php the_title(); ?></h1>
		    		<div class="entry-content">
		    			<?php the_excerpt(); ?>
		    		</div>
		    		<div class="learnmore swipe">
                        <div class='insider'></div>
                        <a href="<?php the_permalink();?>">Read More</a>
                    </div>
		    	</article>

			<?php endwhile;

			pagi_posts_nav();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
