<?php
/**
 * The template for displaying all single posts.
 *
 * @package Qorntix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$qorntix_sidebar = qorntix_get_sidebar_position();
?>

<div class="container">
	<div class="content-area-wrap layout-<?php echo esc_attr( $qorntix_sidebar ); ?>">

		<?php if ( 'left-sidebar' === $qorntix_sidebar ) { get_sidebar(); } ?>

		<main id="primary" class="site-main">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'single' );

				qorntix_post_navigation();

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile;
			?>
		</main><!-- #primary -->

		<?php if ( 'right-sidebar' === $qorntix_sidebar ) { get_sidebar(); } ?>

	</div><!-- .content-area-wrap -->
</div><!-- .container -->

<?php
get_footer();
