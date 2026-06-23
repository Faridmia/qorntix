<?php
/**
 * The template for displaying 404 (not found) pages.
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
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'qorntix' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'qorntix' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #primary -->

	</div><!-- .content-area-wrap -->
</div><!-- .container -->

<?php
get_footer();
