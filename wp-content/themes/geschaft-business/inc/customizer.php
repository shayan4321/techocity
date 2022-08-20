<?php
/**
 * Geschaft Business: Customizer
 *
 * @subpackage Geschaft Business
 * @since 1.0
 */

function geschaft_business_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', get_template_directory_uri() . '/assets/css/customizer.css');

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/customize/customize_toggle.php' );

	// Register the custom control type.
	$wp_customize->register_control_type( 'Geschaft_Business_Toggle_Control' );

	$wp_customize->add_section( 'geschaft_business_typography_settings', array(
		'title'       => __( 'Typography', 'geschaft-business' ),
		'priority'       => 24,
	) );

	$font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'geschaft_business_headings_text', array(
		'sanitize_callback' => 'geschaft_business_sanitize_fonts',
	));
	$wp_customize->add_control( 'geschaft_business_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'geschaft-business'),
		'section' => 'geschaft_business_typography_settings',
		'choices' => $font_choices		
	));

	$wp_customize->add_setting( 'geschaft_business_body_text', array(
		'sanitize_callback' => 'geschaft_business_sanitize_fonts'
	));
	$wp_customize->add_control( 'geschaft_business_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'geschaft-business' ),
		'section' => 'geschaft_business_typography_settings',
		'choices' => $font_choices
	) );

 	$wp_customize->add_section('geschaft_business_pro', array(
        'title'    => __('UPGRADE BUSINESS PREMIUM', 'geschaft-business'),
        'priority' => 1,
    ));

    $wp_customize->add_setting('geschaft_business_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Geschaft_Business_Pro_Control($wp_customize, 'geschaft_business_pro', array(
        'label'    => __('BUSINESS PREMIUM', 'geschaft-business'),
        'section'  => 'geschaft_business_pro',
        'settings' => 'geschaft_business_pro',
        'priority' => 1,
    )));

	// Theme General Settings
    $wp_customize->add_section('geschaft_business_theme_settings',array(
        'title' => __('Theme General Settings', 'geschaft-business'),
    ) );

    $wp_customize->add_setting( 'geschaft_business_sticky_header', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'geschaft_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Geschaft_Business_Toggle_Control( $wp_customize, 'geschaft_business_sticky_header', array(
		'label'       => esc_html__( 'Show Sticky Header', 'geschaft-business' ),
		'section'     => 'geschaft_business_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'geschaft_business_sticky_header',
	) ) );

    $wp_customize->add_setting( 'geschaft_business_theme_loader', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'geschaft_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Geschaft_Business_Toggle_Control( $wp_customize, 'geschaft_business_theme_loader', array(
		'label'       => esc_html__( 'Show Site Loader', 'geschaft-business' ),
		'section'     => 'geschaft_business_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'geschaft_business_theme_loader',
	) ) );

	$wp_customize->add_setting( 'geschaft_business_scroll_enable', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'geschaft_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Geschaft_Business_Toggle_Control( $wp_customize, 'geschaft_business_scroll_enable', array(
		'label'       => esc_html__( 'Show Scroll Top', 'geschaft-business' ),
		'section'     => 'geschaft_business_theme_settings',
		'type'        => 'toggle',
		'settings'    => 'geschaft_business_scroll_enable',
	) ) );

	$wp_customize->add_setting('geschaft_business_scroll_options',array(
        'default' => 'right_align',
        'sanitize_callback' => 'geschaft_business_sanitize_choices'
	));
	$wp_customize->add_control('geschaft_business_scroll_options',array(
        'type' => 'select',
        'label' => __('Scroll Top Alignment','geschaft-business'),
        'section' => 'geschaft_business_theme_settings',
        'choices' => array(
            'right_align' => __('Right Align','geschaft-business'),
            'center_align' => __('Center Align','geschaft-business'),
            'left_align' => __('Left Align','geschaft-business'),
        ),
	) );


    // Post Layouts
    $wp_customize->add_section('geschaft_business_layout',array(
        'title' => __('Post Layout', 'geschaft-business'),
        'description' => __( 'Change the post layout from below options', 'geschaft-business' ),
    ) );

	$wp_customize->add_setting( 'geschaft_business_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'geschaft_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Geschaft_Business_Toggle_Control( $wp_customize, 'geschaft_business_post_sidebar', array(
		'label'       => esc_html__( 'Show Fullwidth', 'geschaft-business' ),
		'section'     => 'geschaft_business_layout',
		'type'        => 'toggle',
		'settings'    => 'geschaft_business_post_sidebar',
	) ) );

	$wp_customize->add_setting( 'geschaft_business_single_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'geschaft_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Geschaft_Business_Toggle_Control( $wp_customize, 'geschaft_business_single_post_sidebar', array(
		'label'       => esc_html__( 'Show Single Post Fullwidth', 'geschaft-business' ),
		'section'     => 'geschaft_business_layout',
		'type'        => 'toggle',
		'settings'    => 'geschaft_business_single_post_sidebar',
	) ) );

    $wp_customize->add_setting('geschaft_business_post_option',array(
		'default' => 'simple_post',
		'sanitize_callback' => 'geschaft_business_sanitize_select'
	));
	$wp_customize->add_control('geschaft_business_post_option',array(
		'label' => esc_html__('Select Layout','geschaft-business'),
		'section' => 'geschaft_business_layout',
		'setting' => 'geschaft_business_post_option',
		'type' => 'radio',
        'choices' => array(
            'simple_post' => __('Simple Post','geschaft-business'),
            'grid_post' => __('Grid Post','geschaft-business'),
        ),
	));

    $wp_customize->add_setting('geschaft_business_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'geschaft_business_sanitize_select'
	));
	$wp_customize->add_control('geschaft_business_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','geschaft-business'),
		'section' => 'geschaft_business_layout',
		'setting' => 'geschaft_business_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','geschaft-business'),
            '2_column' => __('2','geschaft-business'),
            '3_column' => __('3','geschaft-business'),
            '4_column' => __('4','geschaft-business'),
            '5_column' => __('6','geschaft-business'),
        ),
	));

	// Top Banner
    $wp_customize->add_section('geschaft_business_top_banner',array(
        'title' => __('Top Banner', 'geschaft-business'),
        'description'   => __('Banner Image Size (1420x567)','geschaft-business'),   
    ) );
    
    $wp_customize->add_setting('geschaft_business_banner',array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'geschaft_business_sanitize_dropdown_pages'
    ));    
    $wp_customize->add_control('geschaft_business_banner',array(
        'type'  => 'dropdown-pages',
        'label' => __('Select page for banner','geschaft-business'),
        'section'   => 'geschaft_business_top_banner'
    )); 

	// OUR Services
	$wp_customize->add_section('geschaft_business_service',array(
		'title' => esc_html__('Our Services','geschaft-business'),		
	));

	$wp_customize->add_setting('geschaft_business_our_services_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('geschaft_business_our_services_title',array(
		'label' => esc_html__('Section Title','geschaft-business'),
		'section' => 'geschaft_business_service',
		'setting' => 'geschaft_business_our_services_title',
		'type'    => 'text'
	));

	$wp_customize->add_setting('geschaft_business_our_services_subtitle',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('geschaft_business_our_services_subtitle',array(
		'label' => esc_html__('Section Sub-title','geschaft-business'),
		'section' => 'geschaft_business_service',
		'setting' => 'geschaft_business_our_services_subtitle',
		'type'    => 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('geschaft_business_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'geschaft_business_sanitize_select',
	));
	$wp_customize->add_control('geschaft_business_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display Post','geschaft-business'),
		'section' => 'geschaft_business_service',
	));

	//Footer
    $wp_customize->add_section( 'geschaft_business_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'geschaft-business' ),
	) );

    $wp_customize->add_setting('geschaft_business_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('geschaft_business_footer_text',array(
		'label'	=> esc_html__('Copyright Text','geschaft-business'),
		'section'	=> 'geschaft_business_footer_copyright',
		'type'		=> 'text'
	));

	//Logo
    $wp_customize->add_setting( 'geschaft_business_logo_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'geschaft_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Geschaft_Business_Toggle_Control( $wp_customize, 'geschaft_business_logo_title', array(
		'label'       => esc_html__( 'Show Site Title', 'geschaft-business' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'geschaft_business_logo_title',
	) ) );

    $wp_customize->add_setting( 'geschaft_business_logo_text', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'geschaft_business_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Geschaft_Business_Toggle_Control( $wp_customize, 'geschaft_business_logo_text', array(
		'label'       => esc_html__( 'Show Site Tagline', 'geschaft-business' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'geschaft_business_logo_text',
	) ) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'geschaft_business_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'geschaft_business_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'geschaft_business_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'geschaft_business_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'geschaft-business' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'geschaft-business' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'geschaft_business_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'geschaft_business_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'geschaft_business_customize_register' );

function geschaft_business_customize_partial_blogname() {
	bloginfo( 'name' );
}

function geschaft_business_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


function geschaft_business_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function geschaft_business_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('GESCHAFT_BUSINESS_PRO_LINK',__('https://www.ovationthemes.com/wordpress/business-wordpress-theme/','geschaft-business'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Geschaft_Business_Pro_Control')):
    class Geschaft_Business_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md-2 col-sm-6 upsell-btn">
                <a href="<?php echo esc_url( GESCHAFT_BUSINESS_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE BUSINESS PREMIUM','geschaft-business');?> </a>
	        </div>
            <div class="col-md-4 col-sm-6">
                <img class="geschaft_business_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md-3 col-sm-6">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('BUSINESS PREMIUM - Features', 'geschaft-business'); ?></h3>
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
		    <div class="col-md-2 col-sm-6 upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( GESCHAFT_BUSINESS_PRO_LINK ); ?>" target="_blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE BUSINESS PREMIUM','geschaft-business');?> </a>
		    </div>
			<p><?php printf(__('Please review us if you love our product on %1$sWordPress.org%2$s. </br></br>  Thank You', 'geschaft-business'), '<a target="_blank" href="https://wordpress.org/support/theme/geschaft-business/reviews/">', '</a>');
            ?></p>
        </label>
    <?php } }
endif;