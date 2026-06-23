<?php
/**
 * The template for displaying all single pages.
 *
 * @package Qorntix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="container">
	<div class="content-area-wrap layout-no-sidebar">

		<main id="primary" class="site-main">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile;
			?>
		</main><!-- #primary -->

	</div><!-- .content-area-wrap -->
</div><!-- .container -->

<?php
get_footer();
