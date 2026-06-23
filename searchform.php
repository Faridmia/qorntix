<?php
/**
 * Custom search form template.
 *
 * @package Qorntix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$qorntix_unique_id = wp_unique_id( 'search-form-' );
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $qorntix_unique_id ); ?>">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'qorntix' ); ?></span>
	</label>
	<input type="search"
		id="<?php echo esc_attr( $qorntix_unique_id ); ?>"
		class="search-field"
		placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'qorntix' ); ?>"
		value="<?php echo get_search_query(); ?>"
		name="s" />
	<button type="submit" class="search-submit">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'qorntix' ); ?></span>
	</button>
</form>
