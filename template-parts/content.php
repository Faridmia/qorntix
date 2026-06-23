<?php
/**
 * Template part for displaying posts in archive / blog views.
 *
 * @package Qorntix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php qorntix_post_thumbnail(); ?>

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				qorntix_posted_on();
				qorntix_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<a class="read-more" href="<?php the_permalink(); ?>">
			<?php
			/* translators: %s: post title (hidden, for screen readers). */
			printf( esc_html__( 'Read more %s', 'qorntix' ), '<span class="screen-reader-text">' . esc_html( get_the_title() ) . '</span>' );
			?>
		</a>
		<?php qorntix_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
