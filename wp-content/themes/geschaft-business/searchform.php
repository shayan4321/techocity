<?php
/**
 * Template for displaying search forms in Geschaft Business
 * @subpackage Geschaft Business
 * @since 1.0
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'geschaft-business' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo esc_html( 'Search', 'submit button', 'geschaft-business' ); ?></button>
</form>