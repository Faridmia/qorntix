<?php
/**
 * Custom template tags for this theme.
 *
 * @package Qorntix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'qorntix_posted_on' ) ) :
	/**
	 * Print HTML with meta information for the current post date.
	 *
	 * @return void
	 */
	function qorntix_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on"><a href="%1$s" rel="bookmark">%2$s</a></span>',
			esc_url( get_permalink() ),
			$time_string // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above.
		);
	}
endif;

if ( ! function_exists( 'qorntix_posted_by' ) ) :
	/**
	 * Print HTML with meta information for the current author.
	 *
	 * @return void
	 */
	function qorntix_posted_by() {
		printf(
			'<span class="byline">%1$s <span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span></span>',
			esc_html_x( 'by', 'post author', 'qorntix' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'qorntix_entry_footer' ) ) :
	/**
	 * Print HTML with meta information for categories, tags and comments.
	 *
	 * @return void
	 */
	function qorntix_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			$categories_list = get_the_category_list( esc_html__( ', ', 'qorntix' ) );
			if ( $categories_list ) {
				printf(
					'<span class="cat-links">%1$s %2$s</span>',
					esc_html__( 'Posted in', 'qorntix' ),
					$categories_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Core escapes.
				);
			}

			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'qorntix' ) );
			if ( $tags_list ) {
				printf(
					'<span class="tags-links">%1$s %2$s</span>',
					esc_html__( 'Tagged', 'qorntix' ),
					$tags_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Core escapes.
				);
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				esc_html__( 'Leave a comment', 'qorntix' ),
				esc_html__( '1 Comment', 'qorntix' ),
				esc_html__( '% Comments', 'qorntix' )
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post. */
				esc_html__( 'Edit %s', 'qorntix' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'qorntix_post_thumbnail' ) ) :
	/**
	 * Display an optional post thumbnail, linked on archive views.
	 *
	 * @return void
	 */
	function qorntix_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail( 'large' ); ?>
			</div>
			<?php
		else :
			?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute( array( 'echo' => false ) ),
					)
				);
				?>
			</a>
			<?php
		endif;
	}
endif;

if ( ! function_exists( 'qorntix_post_navigation' ) ) :
	/**
	 * Output previous/next post navigation on single posts.
	 *
	 * @return void
	 */
	function qorntix_post_navigation() {
		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'qorntix' ) . '</span> <span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'qorntix' ) . '</span> <span class="nav-title">%title</span>',
			)
		);
	}
endif;
