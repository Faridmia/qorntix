<?php
/**
 * The template for displaying search results pages.
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
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'qorntix' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->

				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'search' );
				endwhile;

				the_posts_navigation(
					array(
						'prev_text' => esc_html__( 'Older results', 'qorntix' ),
						'next_text' => esc_html__( 'Newer results', 'qorntix' ),
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
