<?php

add_action( 'admin_menu', 'geschaft_business_gettingstarted' );
function geschaft_business_gettingstarted() {    	
	add_theme_page( esc_html__('Theme Documentation', 'geschaft-business'), esc_html__('Theme Documentation', 'geschaft-business'), 'edit_theme_options', 'geschaft-business-guide-page', 'geschaft_business_guide');   
}

function geschaft_business_admin_theme_style() {
   wp_enqueue_style('geschaft-business-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/dashboard.css');
}
add_action('admin_enqueue_scripts', 'geschaft_business_admin_theme_style');

if ( ! defined( 'GESCHAFT_BUSINESS_SUPPORT' ) ) {
define('GESCHAFT_BUSINESS_SUPPORT',__('https://wordpress.org/support/theme/geschaft-business','geschaft-business'));
}
if ( ! defined( 'GESCHAFT_BUSINESS_REVIEW' ) ) {
define('GESCHAFT_BUSINESS_REVIEW',__('https://wordpress.org/support/theme/geschaft-business/reviews/#new-post','geschaft-business'));
}
if ( ! defined( 'GESCHAFT_BUSINESS_LIVE_DEMO' ) ) {
define('GESCHAFT_BUSINESS_LIVE_DEMO',__('https://www.ovationthemes.com/demos/ovation-geschaft-pro/','geschaft-business'));
}
if ( ! defined( 'GESCHAFT_BUSINESS_BUY_PRO' ) ) {
define('GESCHAFT_BUSINESS_BUY_PRO',__('https://www.ovationthemes.com/wordpress/business-wordpress-theme/','geschaft-business'));
}
if ( ! defined( 'GESCHAFT_BUSINESS_PRO_DOC' ) ) {
define('GESCHAFT_BUSINESS_PRO_DOC',__('https://www.ovationthemes.com/docs/ot-geschaft-business-pro/','geschaft-business'));
}
if ( ! defined( 'GESCHAFT_BUSINESS_THEME_NAME' ) ) {
define('GESCHAFT_BUSINESS_THEME_NAME',__('Premium Business Theme','geschaft-business'));
}

/**
 * Theme Info Page
 */
function geschaft_business_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( '' ); ?>

	<div class="getting-started__header">
		<div class="col-md-10">
			<h2><?php echo esc_html( $theme ); ?></h2>
			<p><?php esc_html_e('Version: ', 'geschaft-business'); ?><?php echo esc_html($theme['Version']);?></p>
		</div>
		<div class="col-md-2">
			<div class="btn_box">
				<a class="button-primary" href="<?php echo esc_url( GESCHAFT_BUSINESS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'geschaft-business'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( GESCHAFT_BUSINESS_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'geschaft-business'); ?></a>
			</div>
		</div>
	</div>

	<div class="wrap getting-started">
		<div class="container">
			<div class="col-md-9">
				<div class="leftbox">
					<h3><?php esc_html_e('Documentation','geschaft-business'); ?></h3>
					<p><?php esc_html_e('To step the business theme follow the below steps.','geschaft-business'); ?></p>

					<h4><?php esc_html_e('1. Setup Logo','geschaft-business'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Site Identity >> Upload your logo or Add site title and site description.','geschaft-business'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','geschaft-business'); ?></a>

					<h4><?php esc_html_e('2. Setup Menus','geschaft-business'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Menus >> Create Menus >> Add pages, post or custom link then save it.','geschaft-business'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Add Menus','geschaft-business'); ?></a>

					<h4><?php esc_html_e('3. Setup Footer','geschaft-business'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Widgets >> Add widgets in footer 1, footer 2, footer 3, footer 4. >> ','geschaft-business'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','geschaft-business'); ?></a>

					<h4><?php esc_html_e('4. Setup Footer Text','geschaft-business'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Footer Text >> Add copyright text. >> ','geschaft-business'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=geschaft_business_footer_copyright') ); ?>" target="_blank"><?php esc_html_e('Footer Text','geschaft-business'); ?></a>

					<h3><?php esc_html_e('Setup Home Page','geschaft-business'); ?></h3>
					<p><?php esc_html_e('To step the home page follow the below steps.','geschaft-business'); ?></p>

					<h4><?php esc_html_e('1. Setup Page','geschaft-business'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Pages >> Add New Page >> Select "Custom Home Page" from templates. >> Publish it.','geschaft-business'); ?></p>
					<a class="dashboard_add_new_page button-primary"><?php esc_html_e('Add New Page','geschaft-business'); ?></a>

					<h4><?php esc_html_e('2. Setup Slider','geschaft-business'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Page >> Add New Page >> Add title, content and featured image >> Publish it.','geschaft-business'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Top Banner >> Select page.','geschaft-business'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=geschaft_business_top_banner') ); ?>" target="_blank"><?php esc_html_e('Add Top Banner','geschaft-business'); ?></a>

					<h4><?php esc_html_e('3. Setup Services','geschaft-business'); ?></h4>
					<p><?php esc_html_e('Go to dashboard >> Post >> Add New Post >> Add title, content and featured image >> Publish it.','geschaft-business'); ?></p>
					<p><?php esc_html_e('Go to dashboard >> Appearance >> Customize >> Services Settings >> Select post','geschaft-business'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=geschaft_business_service') ); ?>" target="_blank"><?php esc_html_e('Add Services Post','geschaft-business'); ?></a>
				</div>
          	</div>
			<div class="col-md-3">
				<h3><?php echo esc_html(GESCHAFT_BUSINESS_THEME_NAME); ?></h3>
				<img class="geschaft_business_img_responsive" style="width: 100%;" src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
				<div class="pro-links">
					<hr>
			    	<a class="button-primary livedemo" href="<?php echo esc_url( GESCHAFT_BUSINESS_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'geschaft-business'); ?></a>
					<a class="button-primary buynow" href="<?php echo esc_url( GESCHAFT_BUSINESS_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'geschaft-business'); ?></a>
					<a class="button-primary docs" href="<?php echo esc_url( GESCHAFT_BUSINESS_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'geschaft-business'); ?></a>
					<hr>
				</div>
				<ul style="padding-top:10px">
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'geschaft-business');?> </li>
                    <li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'geschaft-business');?> </li>
                   	<li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'geschaft-business');?> </li>
                   	<li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'geschaft-business');?> </li>
                   	<li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'geschaft-business');?> </li>
                   	<li class="upsell-geschaft_business"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'geschaft-business');?> </li>
                </ul>
        	</div>
		</div>
	</div>

<?php }?>
