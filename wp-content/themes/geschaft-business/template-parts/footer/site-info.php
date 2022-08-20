<?php
/**
 * Displays footer site info
 *
 * @subpackage Geschaft Business
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info">

    <?php
        echo esc_html( get_theme_mod( 'geschaft_business_footer_text' ) );
        printf(
            /* translators: %s: Business WordPress Theme. */
            '<a href="' . esc_attr__( 'https://www.ovationthemes.com/wordpress/free-business-wordpress-theme/', 'geschaft-business' ) . '"> %s</a>',
            esc_html__( 'Business WordPress Theme', 'geschaft-business' )
        );
    ?>

</div>