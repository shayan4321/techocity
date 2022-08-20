<?php
/**
 * LZ Software Company: Customizer
 *
 * @subpackage LZ Software Company
 * @since 1.0
 */

use WPTRT\Customize\Section\LZ_Software_Company_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( LZ_Software_Company_Button::class );

	$manager->add_section(
		new LZ_Software_Company_Button( $manager, 'lz_software_company_pro', [
			'title'       => __( 'Software Company Pro', 'lz-software-company' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'lz-software-company' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/products/software-company-wordpress-theme/', 'lz-software-company')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'lz-software-company-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'lz-software-company-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function lz_software_company_customize_register( $wp_customize ) {

	$wp_customize->add_setting('lz_software_company_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('lz_software_company_logo_padding',array(
		'label' => __('Logo Padding','lz-software-company'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('lz_software_company_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'lz_software_company_sanitize_float'
	));
	$wp_customize->add_control('lz_software_company_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','lz-software-company'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('lz_software_company_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'lz_software_company_sanitize_float'
	));
	$wp_customize->add_control('lz_software_company_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','lz-software-company'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('lz_software_company_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'lz_software_company_sanitize_float'
	));
	$wp_customize->add_control('lz_software_company_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','lz-software-company'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('lz_software_company_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'lz_software_company_sanitize_float'
	));
	$wp_customize->add_control('lz_software_company_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','lz-software-company'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('lz_software_company_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'lz_software_company_sanitize_checkbox'
	));
	$wp_customize->add_control('lz_software_company_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','lz-software-company'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('lz_software_company_site_title_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'lz_software_company_sanitize_float'
	));
	$wp_customize->add_control('lz_software_company_site_title_font_size',array(
		'type' => 'number',
		'label' => __('Site Title Font Size','lz-software-company'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('lz_software_company_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'lz_software_company_sanitize_checkbox'
	));
	$wp_customize->add_control('lz_software_company_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','lz-software-company'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('lz_software_company_site_tagline_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'lz_software_company_sanitize_float'
	));
	$wp_customize->add_control('lz_software_company_site_tagline_font_size',array(
		'type' => 'number',
		'label' => __('Site Tagline Font Size','lz-software-company'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_panel( 'lz_software_company_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'lz-software-company' ),
		'description' => __( 'Description of what this panel does.', 'lz-software-company' ),
	) );

	$wp_customize->add_section( 'lz_software_company_theme_options_section', array(
    	'title'      => __( 'General Settings', 'lz-software-company' ),
		'priority'   => 30,
		'panel' => 'lz_software_company_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('lz_software_company_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'lz_software_company_sanitize_choices'	        
	));

	$wp_customize->add_control('lz_software_company_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','lz-software-company'),
        'section' => 'lz_software_company_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','lz-software-company'),
            'Right Sidebar' => __('Right Sidebar','lz-software-company'),
            'One Column' => __('One Column','lz-software-company'),
            'Three Columns' => __('Three Columns','lz-software-company'),
            'Four Columns' => __('Four Columns','lz-software-company'),
            'Grid Layout' => __('Grid Layout','lz-software-company')
        ),
	));

	//home page slider
	$wp_customize->add_section( 'lz_software_company_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'lz-software-company' ),
		'priority'   => null,
		'panel' => 'lz_software_company_panel_id'
	) );

	$wp_customize->add_setting('lz_software_company_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lz_software_company_slider_hide_show',array(
   	'type' => 'checkbox',
   	'label' => __('Show / Hide slider','lz-software-company'),
   	'description' => __('Image Size ( 1400px x 510px )','lz-software-company'),
   	'section' => 'lz_software_company_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'lz_software_company_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'lz_software_company_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'lz_software_company_slider' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'lz-software-company' ),
			'section'  => 'lz_software_company_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	// Our Services 
	$wp_customize->add_section('lz_software_company_services_section',array(
		'title'	=> __('Our Services','lz-software-company'),
		'description'=> __('This section will appear below the Slider section.','lz-software-company'),
		'panel' => 'lz_software_company_panel_id',
	));
	
	$wp_customize->add_setting('lz_software_company_services_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_software_company_services_title',array(
		'label'	=> __('Section Title','lz-software-company'),
		'section'	=> 'lz_software_company_services_section',
		'setting'	=> 'lz_software_company_services_title',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst4[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst4[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('lz_software_company_services_cat',array(
		'default'	=> 'select',
		'sanitize_callback' => 'lz_software_company_sanitize_choices',
	));
	$wp_customize->add_control('lz_software_company_services_cat',array(
		'type'    => 'select',
		'choices' => $cat_pst4,
		'label' => __('Select Category to display Services Posts','lz-software-company'),
		'section' => 'lz_software_company_services_section',
	));

	$wp_customize->add_setting('lz_software_company_service_section_padding',array(
      'default' => '',
      'sanitize_callback'	=> 'lz_software_company_sanitize_float'
   ));
   $wp_customize->add_control('lz_software_company_service_section_padding',array(
      'type' => 'number',
      'label' => __('Section Top Bottom Padding','lz-software-company'),
      'section' => 'lz_software_company_services_section',
   ));

	//Footer
    $wp_customize->add_section( 'lz_software_company_footer', array(
    	'title'      => __( 'Footer Text', 'lz-software-company' ),
		'priority'   => null,
		'panel' => 'lz_software_company_panel_id'
	) );

	$wp_customize->add_setting('lz_software_company_show_back_totop',array(
 		'default' => true,
   	'sanitize_callback'	=> 'lz_software_company_sanitize_checkbox'
	));
	$wp_customize->add_control('lz_software_company_show_back_totop',array(
   	'type' => 'checkbox',
   	'label' => __('Show / Hide Back to Top','lz-software-company'),
   	'section' => 'lz_software_company_footer'
	));

 	$wp_customize->add_setting('lz_software_company_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_software_company_footer_copy',array(
		'label'	=> __('Footer Text','lz-software-company'),
		'section'	=> 'lz_software_company_footer',
		'setting'	=> 'lz_software_company_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'lz_software_company_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'lz_software_company_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'lz_software_company_customize_register' );

function lz_software_company_customize_partial_blogname() {
	bloginfo( 'name' );
}

function lz_software_company_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function lz_software_company_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function lz_software_company_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}