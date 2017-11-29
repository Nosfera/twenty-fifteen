<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header(); ?>
	<?php /* echo post_class($style)*/ ?>
	
	<script>
		function grabIt(){
  			var thisImageSrc = this.css();
  			console.log(thisImageSrc)
	}
	$('img').mouseover(grabIt);
		// $("p:has(img)").css("box-shadow", "inset 0px 0px 10px rgba(0,0,0,0.9)");
		$("p:has(img)").css("box-shadow", "inset 0px 0px 10px rgba(0,0,0,0.9)");
		$("img").css("z-index", "-2");

	</script>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
	
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			<?php if ( is_home() ) : ?>
				<p> Pepe no title </p>
			<?php
				endif;
			?>

			</header>
			<!-- .page-header -->

			<?php
			// Start the Loop.
			if ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				/* get_template_part( 'content', get_post_format() );*/
				?>
				<article class="post type-post status-publish format-standard hentry category-tiles" id="nopad">
				<?php

				the_category_wp_tiles( 'content', get_post_format() );
				?>
				</article>
				<?php

			// End the loop.
			endif;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'roland' ),
				'next_text'          => __( 'Next page', 'roland' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'roland' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
