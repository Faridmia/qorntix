<?php
/**
 * The template for displaying archive pages.
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
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;

				the_posts_navigation(
					array(
						'prev_text' => esc_html__( 'Older posts', 'qorntix' ),
						'next_text' => esc_html__( 'Newer posts', 'qorntix' ),
					)
				);

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</main><!-- #primary -->

		<?php if ( 'right-sidebar' === $qorntix_sidebar ) { get_sidebar(); } ?>

	</div><!-- .content-area-wrap -->
</div><!-- .container -->

<?php
get_footer();
