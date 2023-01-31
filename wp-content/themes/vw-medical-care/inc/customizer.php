<?php
/**
 * VW Medical Care Theme Customizer
 *
 * @package VW Medical Care
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_medical_care_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_medical_care_custom_controls' );

function vw_medical_care_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'vw_medical_care_customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'vw_medical_care_customize_partial_blogdescription',
	));

	//add home page setting pannel
	$VWMedicalCareParentPanel = new VW_Medical_Care_WP_Customize_Panel( $wp_customize, 'vw_medical_care_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-medical-care' ),
		'priority' => 10,
	));
	$wp_customize->add_panel( $VWMedicalCareParentPanel );

	$HomePageParentPanel = new VW_Medical_Care_WP_Customize_Panel( $wp_customize, 'vw_medical_care_homepage_panel', array(
		'title' => __( 'Homepage Settings', 'vw-medical-care' ),
		'panel' => 'vw_medical_care_panel_id',
	));

	$wp_customize->add_panel( $HomePageParentPanel );

	//Topbar
	$wp_customize->add_section( 'vw_medical_care_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-medical-care' ),
		'panel' => 'vw_medical_care_homepage_panel'
	) );

	$wp_customize->add_setting( 'vw_medical_care_topbar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_topbar_hide_show',array(
		'label' => esc_html__( 'Show / Hide Topbar','vw-medical-care' ),
		'section' => 'vw_medical_care_topbar'
    )));

    $wp_customize->add_setting('vw_medical_care_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_medical_care_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-medical-care' ),
        'section' => 'vw_medical_care_topbar'
    )));

    $wp_customize->add_setting('vw_medical_care_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_navigation_menu_font_weight',array(
        'default' => 'Default',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_medical_care_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-medical-care'),
        'section' => 'vw_medical_care_topbar',
        'choices' => array(
        	'Default' => __('Default','vw-medical-care'),
            'Normal' => __('Normal','vw-medical-care')
        ),
	) );

	$wp_customize->add_setting('vw_medical_care_header_menus_color', array(
		'default'           => '#2f3241',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_medical_care_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-medical-care'),
		'section'  => 'vw_medical_care_topbar',
	)));

	$wp_customize->add_setting('vw_medical_care_header_menus_hover_color', array(
		'default'           => '#3fa4f6',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_medical_care_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-medical-care'),
		'section'  => 'vw_medical_care_topbar',
	)));

	$wp_customize->add_setting('vw_medical_care_header_submenus_color', array(
		'default'           => '#2f3241',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_medical_care_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-medical-care'),
		'section'  => 'vw_medical_care_topbar',
	)));

	$wp_customize->add_setting('vw_medical_care_header_submenus_hover_color', array(
		'default'           => '#3fa4f6',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_medical_care_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-medical-care'),
		'section'  => 'vw_medical_care_topbar',
	)));

	$wp_customize->add_setting( 'vw_medical_care_header_search',
       array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_header_search',
       array(
      'label' => esc_html__( 'Show / Hide Search','vw-medical-care' ),
      'section' => 'vw_medical_care_topbar'
    )));

    $wp_customize->add_setting('vw_medical_care_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_search_icon',array(
		'label'	=> __('Add Search Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_topbar',
		'setting'	=> 'vw_medical_care_search_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_medical_care_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_search_close_icon',array(
		'label'	=> __('Add Search Close Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_topbar',
		'setting'	=> 'vw_medical_care_search_close_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('vw_medical_care_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_search_font_size',array(
		'label'	=> __('Search Font Size','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_medical_care_search_border_radius', array(
		'default'              => "",
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_medical_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_medical_care_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','vw-medical-care' ),
		'section'     => 'vw_medical_care_topbar',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_medical_care_header_text', array(
		'selector' => '#topbar p',
		'render_callback' => 'vw_medical_care_customize_partial_vw_medical_care_header_text',
	));

	$wp_customize->add_setting('vw_medical_care_header_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_header_text',array(
		'label'	=> __('Add Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Do you have any question?', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_topbar',
		'type'=> 'text'
	));

    //Social
	$wp_customize->add_section(
		'vw_medical_care_social_links', array(
			'title'		=>	__('Social Links', 'vw-medical-care'),
			'priority'	=>	null,
			'panel'		=>	'vw_medical_care_homepage_panel'
		)
	);

	$wp_customize->add_setting('vw_medical_care_social_icons',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_social_icons',array(
		'label' =>  __('Steps to setup social icons','vw-medical-care'),
		'description' => __('<p>1. Go to Dashboard >> Appearance >> Widgets</p>
			<p>2. Add Vw Social Icon Widget in Top Bar Social Media area.</p>
			<p>3. Add social icons url and save.</p>','vw-medical-care'),
		'section'=> 'vw_medical_care_social_links',
		'type'=> 'hidden'
	));
	$wp_customize->add_setting('vw_medical_care_social_icon_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_social_icon_btn',array(
		'description' => "<a target='_blank' href='". admin_url('widgets.php') ." '>Setup Social Icons</a>",
		'section'=> 'vw_medical_care_social_links',
		'type'=> 'hidden'
	));

	//Slider
	$wp_customize->add_section( 'vw_medical_care_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-medical-care' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/medical-wordpress-theme/">GO PRO</a>','vw-medical-care'),
		'panel' => 'vw_medical_care_homepage_panel'
	) );

	$wp_customize->add_setting( 'vw_medical_care_slider_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_slider_hide_show',
       array(
      'label' => esc_html__( 'Show / Hide Slider','vw-medical-care' ),
      'section' => 'vw_medical_care_slidersettings'
    )));

     $wp_customize->add_setting('vw_medical_care_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	) );
	$wp_customize->add_control('vw_medical_care_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','vw-medical-care'),
        'section' => 'vw_medical_care_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','vw-medical-care'),
            'Advance slider' => __('Advance slider','vw-medical-care'),
        ),
	));

	$wp_customize->add_setting('vw_medical_care_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','vw-medical-care'),
		'section'=> 'vw_medical_care_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_medical_care_advance_slider'
	));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_medical_care_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_medical_care_customize_partial_vw_medical_care_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'vw_medical_care_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_medical_care_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_medical_care_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-medical-care' ),
			'description' => __('Slider image size (1500 x 590)','vw-medical-care'),
			'section'  => 'vw_medical_care_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'vw_medical_care_default_slider'
		) );
	}

	$wp_customize->add_setting( 'vw_medical_care_slider_title_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_slider_title_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Title','vw-medical-care' ),
		'section' => 'vw_medical_care_slidersettings',
		'active_callback' => 'vw_medical_care_default_slider'
    )));

	$wp_customize->add_setting( 'vw_medical_care_slider_content_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_slider_content_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Content','vw-medical-care' ),
		'section' => 'vw_medical_care_slidersettings',
		'active_callback' => 'vw_medical_care_default_slider'
    )));

	$wp_customize->add_setting('vw_medical_care_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_medical_care_default_slider'
	));

	$wp_customize->add_setting('vw_medical_care_slider_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_slider_button_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_slidersettings',
		'setting'	=> 'vw_medical_care_slider_button_icon',
		'type'		=> 'icon',
		'active_callback' => 'vw_medical_care_default_slider'
	)));

	//content layout
	$wp_customize->add_setting('vw_medical_care_slider_content_option',array(
        'default' => 'Center',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Medical_Care_Image_Radio_Control($wp_customize, 'vw_medical_care_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-medical-care'),
        'section' => 'vw_medical_care_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),
    	'active_callback' => 'vw_medical_care_default_slider'
    )));

    //Slider content padding
    $wp_customize->add_setting('vw_medical_care_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','vw-medical-care'),
		'description'	=> __('Enter a value in %. Example:20%','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_medical_care_default_slider'
	));

	$wp_customize->add_setting('vw_medical_care_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','vw-medical-care'),
		'description'	=> __('Enter a value in %. Example:20%','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_medical_care_default_slider'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_medical_care_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_medical_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_medical_care_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-medical-care' ),
		'section'     => 'vw_medical_care_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_medical_care_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'vw_medical_care_default_slider'
	) );

	//Opacity
	$wp_customize->add_setting('vw_medical_care_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_medical_care_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-medical-care' ),
	'section'     => 'vw_medical_care_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_medical_care_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-medical-care'),
      '0.1' =>  esc_attr('0.1','vw-medical-care'),
      '0.2' =>  esc_attr('0.2','vw-medical-care'),
      '0.3' =>  esc_attr('0.3','vw-medical-care'),
      '0.4' =>  esc_attr('0.4','vw-medical-care'),
      '0.5' =>  esc_attr('0.5','vw-medical-care'),
      '0.6' =>  esc_attr('0.6','vw-medical-care'),
      '0.7' =>  esc_attr('0.7','vw-medical-care'),
      '0.8' =>  esc_attr('0.8','vw-medical-care'),
      '0.9' =>  esc_attr('0.9','vw-medical-care')
	),'active_callback' => 'vw_medical_care_default_slider'
	));

	$wp_customize->add_setting( 'vw_medical_care_slider_image_overlay',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_medical_care_switch_sanitization'
   ));
   $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_slider_image_overlay',array(
      	'label' => esc_html__( 'Slider Image Overlay','vw-medical-care' ),
      	'section' => 'vw_medical_care_slidersettings',
      	'active_callback' => 'vw_medical_care_default_slider'
   )));

   $wp_customize->add_setting('vw_medical_care_slider_image_overlay_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_medical_care_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'vw-medical-care'),
		'section'  => 'vw_medical_care_slidersettings',
		'active_callback' => 'vw_medical_care_default_slider'
	)));

	//Slider height
	$wp_customize->add_setting('vw_medical_care_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_slider_height',array(
		'label'	=> __('Slider Height','vw-medical-care'),
		'description'	=> __('Specify the slider height (px).','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_medical_care_default_slider'
	));

	$wp_customize->add_setting( 'vw_medical_care_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'vw_medical_care_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_medical_care_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-medical-care'),
		'section' => 'vw_medical_care_slidersettings',
		'type'  => 'number',
		'active_callback' => 'vw_medical_care_default_slider'
	) );

	//Contact us
	$wp_customize->add_section( 'vw_medical_care_contact', array(
    	'title'      => __( 'Contact us', 'vw-medical-care' ),
    	'description' => __('For more options of the contact section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/medical-wordpress-theme/">GO PRO</a>','vw-medical-care'),
		'panel' => 'vw_medical_care_homepage_panel'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_medical_care_call_text', array(
		'selector' => '.info span',
		'render_callback' => 'vw_medical_care_customize_partial_vw_medical_care_call_text',
	));

	$wp_customize->add_setting('vw_medical_care_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_phone_icon',array(
		'label'	=> __('Add Phone Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_contact',
		'setting'	=> 'vw_medical_care_phone_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_medical_care_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_call_text',array(
		'label'	=> __('Add Call Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Phone No.', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_medical_care_sanitize_phone_number'
	));
	$wp_customize->add_control('vw_medical_care_call',array(
		'label'	=> __('Add Phone No.','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '+00 987 654 1230', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_location_icon',array(
		'label'	=> __('Add Location Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_contact',
		'setting'	=> 'vw_medical_care_location_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_medical_care_address_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_address_text',array(
		'label'	=> __('Add Location Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Hospital Address', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_address',array(
		'label'	=> __('Add Location','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '123 dummy street opp to dummy appartment, DUMMY', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_email_address_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_email_address_icon',array(
		'label'	=> __('Add Email Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_contact',
		'setting'	=> 'vw_medical_care_email_address_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_medical_care_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_email_text',array(
		'label'	=> __('Add Email Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Email Address', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('vw_medical_care_email',array(
		'label'	=> __('Add Email','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_contact',
		'type'=> 'text'
	));

	//Facilities section
	$wp_customize->add_section( 'vw_medical_care_facilities_section' , array(
    	'title'      => __( 'Our Facilities Section', 'vw-medical-care' ),
    	'description' => __('For more options of the our facilities section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/medical-wordpress-theme/">GO PRO</a>','vw-medical-care'),
		'priority'   => null,
		'panel' => 'vw_medical_care_homepage_panel'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_medical_care_facilities', array(
		'selector' => '.serv-box h2',
		'render_callback' => 'vw_medical_care_customize_partial_vw_medical_care_facilities',
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_medical_care_facilities',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_medical_care_sanitize_choices',
	));
	$wp_customize->add_control('vw_medical_care_facilities',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display facilities','vw-medical-care'),
		'description' => __('Image Size (250 x 250)','vw-medical-care'),
		'section' => 'vw_medical_care_facilities_section',
	));

	//Facilities excerpt
	$wp_customize->add_setting( 'vw_medical_care_facilities_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_medical_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_medical_care_facilities_excerpt_number', array(
		'label'       => esc_html__( 'Facilities Excerpt length','vw-medical-care' ),
		'section'     => 'vw_medical_care_facilities_section',
		'type'        => 'range',
		'settings'    => 'vw_medical_care_facilities_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//About Us Section
	$wp_customize->add_section('vw_medical_care_about_us', array(
		'title'       => __('About Us Section', 'vw-medical-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-medical-care'),
		'priority'    => null,
		'panel'       => 'vw_medical_care_homepage_panel',
	));

	$wp_customize->add_setting('vw_medical_care_about_us_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_about_us_text',array(
		'description' => __('<p>1. More options for about us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for about us section.</p>','vw-medical-care'),
		'section'=> 'vw_medical_care_about_us',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_medical_care_about_us_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_about_us_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_medical_care_guide') ." '>More Info</a>",
		'section'=> 'vw_medical_care_about_us',
		'type'=> 'hidden'
	));

	//Our Department Section
	$wp_customize->add_section('vw_medical_care_our_department', array(
		'title'       => __('Our Department Section', 'vw-medical-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-medical-care'),
		'priority'    => null,
		'panel'       => 'vw_medical_care_homepage_panel',
	));

	$wp_customize->add_setting('vw_medical_care_our_department_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_our_department_text',array(
		'description' => __('<p>1. More options for our department section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our department section.</p>','vw-medical-care'),
		'section'=> 'vw_medical_care_our_department',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_medical_care_our_department_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_our_department_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_medical_care_guide') ." '>More Info</a>",
		'section'=> 'vw_medical_care_our_department',
		'type'=> 'hidden'
	));

	//Services Section
	$wp_customize->add_section('vw_medical_care_services', array(
		'title'       => __('Services Section', 'vw-medical-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-medical-care'),
		'priority'    => null,
		'panel'       => 'vw_medical_care_homepage_panel',
	));

	$wp_customize->add_setting('vw_medical_care_services_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_services_text',array(
		'description' => __('<p>1. More options for service section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for service section.</p>','vw-medical-care'),
		'section'=> 'vw_medical_care_services',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_medical_care_services_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_services_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_medical_care_guide') ." '>More Info</a>",
		'section'=> 'vw_medical_care_services',
		'type'=> 'hidden'
	));

	//Pricing Plan Section
	$wp_customize->add_section('vw_medical_care_pricing_plan', array(
		'title'       => __('Pricing Plan Section', 'vw-medical-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-medical-care'),
		'priority'    => null,
		'panel'       => 'vw_medical_care_homepage_panel',
	));

	$wp_customize->add_setting('vw_medical_care_pricing_plan_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_pricing_plan_text',array(
		'description' => __('<p>1. More options for pricing plan section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for pricing plan section.</p>','vw-medical-care'),
		'section'=> 'vw_medical_care_pricing_plan',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_medical_care_pricing_plan_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_pricing_plan_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_medical_care_guide') ." '>More Info</a>",
		'section'=> 'vw_medical_care_pricing_plan',
		'type'=> 'hidden'
	));

	//Gallery Section
	$wp_customize->add_section('vw_medical_care_gallery', array(
		'title'       => __('Gallery Section', 'vw-medical-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-medical-care'),
		'priority'    => null,
		'panel'       => 'vw_medical_care_homepage_panel',
	));

	$wp_customize->add_setting('vw_medical_care_gallery_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_gallery_text',array(
		'description' => __('<p>1. More options for gallery section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for gallery section.</p>','vw-medical-care'),
		'section'=> 'vw_medical_care_gallery',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_medical_care_gallery_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_gallery_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_medical_care_guide') ." '>More Info</a>",
		'section'=> 'vw_medical_care_gallery',
		'type'=> 'hidden'
	));

	//Our Doctors Section
	$wp_customize->add_section('vw_medical_care_our_doctors', array(
		'title'       => __('Our Doctors Section', 'vw-medical-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-medical-care'),
		'priority'    => null,
		'panel'       => 'vw_medical_care_homepage_panel',
	));

	$wp_customize->add_setting('vw_medical_care_our_doctors_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_our_doctors_text',array(
		'description' => __('<p>1. More options for our doctors section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our doctors section.</p>','vw-medical-care'),
		'section'=> 'vw_medical_care_our_doctors',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_medical_care_our_doctors_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_our_doctors_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_medical_care_guide') ." '>More Info</a>",
		'section'=> 'vw_medical_care_our_doctors',
		'type'=> 'hidden'
	));

	//Happy Clients Section
	$wp_customize->add_section('vw_medical_care_happy_clients', array(
		'title'       => __('Happy Client Section', 'vw-medical-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-medical-care'),
		'priority'    => null,
		'panel'       => 'vw_medical_care_homepage_panel',
	));

	$wp_customize->add_setting('vw_medical_care_happy_clients_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_happy_clients_text',array(
		'description' => __('<p>1. More options for happy clients section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for happy clients section.</p>','vw-medical-care'),
		'section'=> 'vw_medical_care_happy_clients',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_medical_care_happy_clients_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_happy_clients_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_medical_care_guide') ." '>More Info</a>",
		'section'=> 'vw_medical_care_happy_clients',
		'type'=> 'hidden'
	));

	//Fun Fact Section
	$wp_customize->add_section('vw_medical_care_fun_fact', array(
		'title'       => __('Fun Fact Section', 'vw-medical-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-medical-care'),
		'priority'    => null,
		'panel'       => 'vw_medical_care_homepage_panel',
	));

	$wp_customize->add_setting('vw_medical_care_fun_fact_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_fun_fact_text',array(
		'description' => __('<p>1. More options for fun fact section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for fun fact section.</p>','vw-medical-care'),
		'section'=> 'vw_medical_care_fun_fact',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_medical_care_fun_fact_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_fun_fact_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_medical_care_guide') ." '>More Info</a>",
		'section'=> 'vw_medical_care_fun_fact',
		'type'=> 'hidden'
	));

	//Product Section
	$wp_customize->add_section('vw_medical_care_product', array(
		'title'       => __('Product Section', 'vw-medical-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-medical-care'),
		'priority'    => null,
		'panel'       => 'vw_medical_care_homepage_panel',
	));

	$wp_customize->add_setting('vw_medical_care_product_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_product_text',array(
		'description' => __('<p>1. More options for product section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for product section.</p>','vw-medical-care'),
		'section'=> 'vw_medical_care_product',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_medical_care_product_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_product_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_medical_care_guide') ." '>More Info</a>",
		'section'=> 'vw_medical_care_product',
		'type'=> 'hidden'
	));

	//Our Partners Section
	$wp_customize->add_section('vw_medical_care_our_partners', array(
		'title'       => __('Our Partner Section', 'vw-medical-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-medical-care'),
		'priority'    => null,
		'panel'       => 'vw_medical_care_homepage_panel',
	));

	$wp_customize->add_setting('vw_medical_care_our_partners_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_our_partners_text',array(
		'description' => __('<p>1. More options for our partners section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our partners section.</p>','vw-medical-care'),
		'section'=> 'vw_medical_care_our_partners',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_medical_care_our_partners_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_our_partners_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_medical_care_guide') ." '>More Info</a>",
		'section'=> 'vw_medical_care_our_partners',
		'type'=> 'hidden'
	));

	//FAQ Section
	$wp_customize->add_section('vw_medical_care_our-faqs', array(
		'title'       => __('Our Faqs Section', 'vw-medical-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-medical-care'),
		'priority'    => null,
		'panel'       => 'vw_medical_care_homepage_panel',
	));

	$wp_customize->add_setting('vw_medical_care_our-faqs_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_our-faqs_text',array(
		'description' => __('<p>1. More options for our faq section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our faq section.</p>','vw-medical-care'),
		'section'=> 'vw_medical_care_our-faqs',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_medical_care_our-faqs_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_our-faqs_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_medical_care_guide') ." '>More Info</a>",
		'section'=> 'vw_medical_care_our-faqs',
		'type'=> 'hidden'
	));

	//Appointment Section
	$wp_customize->add_section('vw_medical_care_appointment', array(
		'title'       => __('Appointment Section', 'vw-medical-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-medical-care'),
		'priority'    => null,
		'panel'       => 'vw_medical_care_homepage_panel',
	));

	$wp_customize->add_setting('vw_medical_care_appointment_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_appointment_text',array(
		'description' => __('<p>1. More options for appointment section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for appointment section.</p>','vw-medical-care'),
		'section'=> 'vw_medical_care_appointment',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_medical_care_appointment_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_appointment_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_medical_care_guide') ." '>More Info</a>",
		'section'=> 'vw_medical_care_appointment',
		'type'=> 'hidden'
	));

	//Health News Section
	$wp_customize->add_section('vw_medical_care_health_news', array(
		'title'       => __('Health News Section', 'vw-medical-care'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-medical-care'),
		'priority'    => null,
		'panel'       => 'vw_medical_care_homepage_panel',
	));

	$wp_customize->add_setting('vw_medical_care_health_news_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_health_news_text',array(
		'description' => __('<p>1. More options for health news section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for health news section.</p>','vw-medical-care'),
		'section'=> 'vw_medical_care_health_news',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_medical_care_health_news_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_health_news_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_medical_care_guide') ." '>More Info</a>",
		'section'=> 'vw_medical_care_health_news',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('vw_medical_care_footer',array(
		'title'	=> __('Footer','vw-medical-care'),
		'description' => __('For more options of the footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/medical-wordpress-theme/">GO PRO</a>','vw-medical-care'),
		'panel' => 'vw_medical_care_homepage_panel',
	));

	$wp_customize->add_setting('vw_medical_care_footer_background_color', array(
		'default'           => '#2f3241',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_medical_care_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-medical-care'),
		'section'  => 'vw_medical_care_footer',
	)));

	$wp_customize->add_setting('vw_medical_care_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_medical_care_footer_background_image',array(
        'label' => __('Footer Background Image','vw-medical-care'),
        'section' => 'vw_medical_care_footer'
	)));

	// footer padding
	$wp_customize->add_setting('vw_medical_care_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-medical-care' ),
    ),
		'section'=> 'vw_medical_care_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_medical_care_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','vw-medical-care'),
        'section' => 'vw_medical_care_footer',
        'choices' => array(
        	'Left' => __('Left','vw-medical-care'),
            'Center' => __('Center','vw-medical-care'),
            'Right' => __('Right','vw-medical-care')
        ),
	) );

	$wp_customize->add_setting('vw_medical_care_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_medical_care_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','vw-medical-care'),
        'section' => 'vw_medical_care_footer',
        'choices' => array(
        	'Left' => __('Left','vw-medical-care'),
            'Center' => __('Center','vw-medical-care'),
            'Right' => __('Right','vw-medical-care')
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_medical_care_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'vw_medical_care_customize_partial_vw_medical_care_footer_text',
	));

	$wp_customize->add_setting('vw_medical_care_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_footer_text',array(
		'label'	=> __('Copyright Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Medical_Care_Image_Radio_Control($wp_customize, 'vw_medical_care_copyright_alignment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-medical-care'),
        'section' => 'vw_medical_care_footer',
        'settings' => 'vw_medical_care_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    // footer social icon
  	$wp_customize->add_setting( 'vw_medical_care_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_footer_icon',array(
		'label' => esc_html__( 'Footer Social Icon','vw-medical-care' ),
		'section' => 'vw_medical_care_footer'
    )));

	$wp_customize->add_setting( 'vw_medical_care_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-medical-care' ),
      	'section' => 'vw_medical_care_footer'
    )));

     //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_medical_care_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'vw_medical_care_customize_partial_vw_medical_care_scroll_to_top_icon',
	));

    $wp_customize->add_setting('vw_medical_care_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_footer',
		'setting'	=> 'vw_medical_care_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_medical_care_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-medical-care'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_medical_care_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_medical_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_medical_care_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-medical-care' ),
		'section'     => 'vw_medical_care_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_medical_care_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Medical_Care_Image_Radio_Control($wp_customize, 'vw_medical_care_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-medical-care'),
        'section' => 'vw_medical_care_footer',
        'settings' => 'vw_medical_care_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	//Blog Post
	$wp_customize->add_panel( $VWMedicalCareParentPanel );

	$BlogPostParentPanel = new VW_Medical_Care_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-medical-care' ),
		'panel' => 'vw_medical_care_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_medical_care_post_settings', array(
		'title' => __( 'Post Settings', 'vw-medical-care' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_medical_care_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'vw_medical_care_customize_partial_vw_medical_care_toggle_postdate',
	));

	$wp_customize->add_setting( 'vw_medical_care_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-medical-care' ),
        'section' => 'vw_medical_care_post_settings'
    )));

    $wp_customize->add_setting( 'vw_medical_care_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_toggle_author',array(
		'label' => esc_html__( 'Author','vw-medical-care' ),
		'section' => 'vw_medical_care_post_settings'
    )));

    $wp_customize->add_setting( 'vw_medical_care_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-medical-care' ),
		'section' => 'vw_medical_care_post_settings'
    )));

    $wp_customize->add_setting( 'vw_medical_care_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_toggle_time',array(
		'label' => esc_html__( 'Time','vw-medical-care' ),
		'section' => 'vw_medical_care_post_settings'
    )));

    $wp_customize->add_setting( 'vw_medical_care_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','vw-medical-care' ),
		'section' => 'vw_medical_care_post_settings'
    )));

    $wp_customize->add_setting( 'vw_medical_care_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_medical_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_medical_care_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-medical-care' ),
		'section'     => 'vw_medical_care_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_medical_care_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_medical_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_medical_care_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-medical-care' ),
		'section'     => 'vw_medical_care_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting( 'vw_medical_care_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_medical_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_medical_care_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-medical-care' ),
		'section'     => 'vw_medical_care_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_medical_care_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_medical_care_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-medical-care'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-medical-care'),
		'section'=> 'vw_medical_care_post_settings',
		'type'=> 'text'
	));

	//Featured Image
	$wp_customize->add_setting('vw_medical_care_blog_post_featured_image_dimension',array(
	       'default' => 'default',
	       'sanitize_callback'	=> 'vw_medical_care_sanitize_choices'
	));
  	$wp_customize->add_control('vw_medical_care_blog_post_featured_image_dimension',array(
     'type' => 'select',
     'label'	=> __('Blog Post Featured Image Dimension','vw-medical-care'),
     'section'	=> 'vw_medical_care_post_settings',
     'choices' => array(
          'default' => __('Default','vw-medical-care'),
          'custom' => __('Custom Image Size','vw-medical-care'),
      ),
  	));

	$wp_customize->add_setting('vw_medical_care_blog_post_featured_image_custom_width',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('vw_medical_care_blog_post_featured_image_custom_width',array(
			'label'	=> __('Featured Image Custom Width','vw-medical-care'),
			'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
			'input_attrs' => array(
	    'placeholder' => __( '10px', 'vw-medical-care' ),),
			'section'=> 'vw_medical_care_post_settings',
			'type'=> 'text',
			'active_callback' => 'vw_medical_care_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('vw_medical_care_blog_post_featured_image_custom_height',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_blog_post_featured_image_custom_height',array(
			'label'	=> __('Featured Image Custom Height','vw-medical-care'),
			'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
			'input_attrs' => array(
	    'placeholder' => __( '10px', 'vw-medical-care' ),),
			'section'=> 'vw_medical_care_post_settings',
			'type'=> 'text',
			'active_callback' => 'vw_medical_care_blog_post_featured_image_dimension'
	));

	//Blog layout
    $wp_customize->add_setting('vw_medical_care_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Medical_Care_Image_Radio_Control($wp_customize, 'vw_medical_care_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-medical-care'),
        'section' => 'vw_medical_care_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

   $wp_customize->add_setting('vw_medical_care_blog_page_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_medical_care_blog_page_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Blog Page posts','vw-medical-care'),
        'section' => 'vw_medical_care_post_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','vw-medical-care'),
            'Without Blocks' => __('Without Blocks','vw-medical-care')
        ),
	) );

    $wp_customize->add_setting('vw_medical_care_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_medical_care_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-medical-care'),
        'section' => 'vw_medical_care_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-medical-care'),
            'Excerpt' => __('Excerpt','vw-medical-care'),
            'No Content' => __('No Content','vw-medical-care')
        ),
	) );

	$wp_customize->add_setting('vw_medical_care_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_medical_care_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-medical-care' ),
      'section' => 'vw_medical_care_post_settings'
    )));

	$wp_customize->add_setting( 'vw_medical_care_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_medical_care_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_medical_care_blog_pagination_type', array(
        'section' => 'vw_medical_care_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-medical-care' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-medical-care' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-medical-care' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_medical_care_button_settings', array(
		'title' => __( 'Button Settings', 'vw-medical-care' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_medical_care_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_medical_care_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_medical_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_medical_care_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-medical-care' ),
		'section'     => 'vw_medical_care_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// font size button
	$wp_customize->add_setting('vw_medical_care_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_button_font_size',array(
		'label'	=> __('Button Font Size','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-medical-care' ),
    ),
    'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_medical_care_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('vw_medical_care_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_medical_care_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vw-medical-care'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-medical-care'),
            'Capitalize' => __('Capitalize','vw-medical-care'),
            'Lowercase' => __('Lowercase','vw-medical-care'),
        ),
		'section'=> 'vw_medical_care_button_settings',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_medical_care_button_text', array(
		'selector' => '.post-main-box .content-bttn a',
		'render_callback' => 'vw_medical_care_customize_partial_vw_medical_care_button_text',
	));

    $wp_customize->add_setting('vw_medical_care_button_text',array(
		'default'=> __( 'Read More', 'vw-medical-care' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_button_text',array(
		'label'	=> __('Add Button Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_blog_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_button_settings',
		'setting'	=> 'vw_medical_care_blog_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_medical_care_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-medical-care' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_medical_care_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'vw_medical_care_customize_partial_vw_medical_care_related_post_title',
	));

    $wp_customize->add_setting( 'vw_medical_care_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_related_post',array(
		'label' => esc_html__( 'Related Post','vw-medical-care' ),
		'section' => 'vw_medical_care_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_medical_care_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_medical_care_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_medical_care_sanitize_float'
	));
	$wp_customize->add_control('vw_medical_care_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'vw_medical_care_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_medical_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_medical_care_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','vw-medical-care' ),
		'section'     => 'vw_medical_care_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'vw_medical_care_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) ); 

	// Single Posts Settings
	$wp_customize->add_section( 'vw_medical_care_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-medical-care' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_medical_care_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_single_post_breadcrumb',array(
		'label' => esc_html__( 'Single Post Breadcrumb','vw-medical-care' ),
		'section' => 'vw_medical_care_single_blog_settings'
    )));

    // Single Posts Category
  	$wp_customize->add_setting( 'vw_medical_care_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_single_post_category',array(
		'label' => esc_html__( 'Single Post Category','vw-medical-care' ),
		'section' => 'vw_medical_care_single_blog_settings'
    )));

 	$wp_customize->add_setting( 'vw_medical_care_single_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_medical_care_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_single_postdate',array(
	    'label' => esc_html__( 'Date','vw-medical-care' ),
	   'section' => 'vw_medical_care_single_blog_settings'
	)));

    $wp_customize->add_setting( 'vw_medical_care_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_medical_care_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_single_author',array(
	    'label' => esc_html__( 'Author','vw-medical-care' ),
	    'section' => 'vw_medical_care_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_medical_care_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_medical_care_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_single_comments',array(
	    'label' => esc_html__( 'Comments','vw-medical-care' ),
	    'section' => 'vw_medical_care_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_medical_care_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_medical_care_switch_sanitization'
	) );

	$wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_single_time',array(
	    'label' => esc_html__( 'Time','vw-medical-care' ),
	    'section' => 'vw_medical_care_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_medical_care_toggle_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_medical_care_switch_sanitization'
	) );

	$wp_customize->add_setting( 'vw_medical_care_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-medical-care' ),
		'section' => 'vw_medical_care_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_medical_care_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-medical-care' ),
		'section' => 'vw_medical_care_single_blog_settings'
    )));

	$wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_toggle_time',array(
	    'label' => esc_html__( 'Time','vw-medical-care' ),
	    'section' => 'vw_medical_care_single_blog_settings'
	)));

	$wp_customize->add_setting('vw_medical_care_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-medical-care'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-medical-care'),
		'section'=> 'vw_medical_care_single_blog_settings',
		'type'=> 'text'
	));

	//navigation text
	$wp_customize->add_setting('vw_medical_care_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_medical_care_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_medical_care_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-medical-care'),
		'description'	=> __('Enter a value in %. Example:50%','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_single_blog_settings',
		'type'=> 'text'
	));

	// Grid layout setting
	$wp_customize->add_section( 'vw_medical_care_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vw-medical-care' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_medical_care_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_grid_postdate',array(
        'label' => esc_html__( 'Post Date','vw-medical-care' ),
        'section' => 'vw_medical_care_grid_layout_settings'
    )));

    $wp_customize->add_setting( 'vw_medical_care_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_grid_author',array(
		'label' => esc_html__( 'Author','vw-medical-care' ),
		'section' => 'vw_medical_care_grid_layout_settings'
    )));

    $wp_customize->add_setting( 'vw_medical_care_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_grid_comments',array(
		'label' => esc_html__( 'Comments','vw-medical-care' ),
		'section' => 'vw_medical_care_grid_layout_settings'
    )));

	//Others Settings
  	$OtherParentPanel = new VW_Medical_Care_WP_Customize_Panel( $wp_customize, 'vw_medical_care_others_panel', array(
		'title' => __( 'Others Settings', 'vw-medical-care' ),
		'panel' => 'vw_medical_care_panel_id',
	));

	$wp_customize->add_panel( $OtherParentPanel );

	// Layout
	$wp_customize->add_section( 'vw_medical_care_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-medical-care' ),
		'panel' => 'vw_medical_care_others_panel'
	) );

	$wp_customize->add_setting('vw_medical_care_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Medical_Care_Image_Radio_Control($wp_customize, 'vw_medical_care_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-medical-care'),
        'description' => __('Here you can change the width layout of Website.','vw-medical-care'),
        'section' => 'vw_medical_care_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_medical_care_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	) );
	$wp_customize->add_control('vw_medical_care_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-medical-care'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-medical-care'),
        'section' => 'vw_medical_care_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-medical-care'),
            'Right Sidebar' => __('Right Sidebar','vw-medical-care'),
            'One Column' => __('One Column','vw-medical-care'),
            'Three Columns' => __('Three Columns','vw-medical-care'),
            'Four Columns' => __('Four Columns','vw-medical-care'),
            'Grid Layout' => __('Grid Layout','vw-medical-care')
        ),
	));

	$wp_customize->add_setting('vw_medical_care_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_medical_care_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-medical-care'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-medical-care'),
        'section' => 'vw_medical_care_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-medical-care'),
            'Right Sidebar' => __('Right Sidebar','vw-medical-care'),
            'One Column' => __('One Column','vw-medical-care')
        ),
	) );

	$wp_customize->add_setting( 'vw_medical_care_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new vw_medical_care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_single_page_breadcrumb',array(
		'label' => esc_html__( 'Single Page Breadcrumb','vw-medical-care' ),
		'section' => 'vw_medical_care_left_right'
    )));

    //Featured Image
	$wp_customize->add_setting( 'vw_medical_care_featured_image_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_medical_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_medical_care_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-medical-care' ),
		'section'     => 'vw_medical_care_left_right',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Wow Animation
	$wp_customize->add_setting( 'vw_medical_care_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_animation',array(
        'label' => esc_html__( 'Animation ','vw-medical-care' ),
        'description' => __('Here you can disable overall site animation effect','vw-medical-care'),
        'section' => 'vw_medical_care_left_right'
    )));

    $wp_customize->add_setting('vw_medical_care_reset_all_settings',array(
      'sanitize_callback'	=> 'sanitize_text_field',
   	));
   	$wp_customize->add_control(new VW_Medical_Care_Reset_Custom_Control($wp_customize, 'vw_medical_care_reset_all_settings',array(
      'type' => 'reset_control',
      'label' => __('Reset All Settings', 'vw-medical-care'),
      'description' => 'vw_medical_care_reset_all_settings',
      'section' => 'vw_medical_care_left_right'
   	)));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_medical_care_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-medical-care' ),
        'section' => 'vw_medical_care_left_right'
    )));

	$wp_customize->add_setting('vw_medical_care_preloader_bg_color', array(
		'default'           => '#3fa4f6',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_medical_care_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-medical-care'),
		'section'  => 'vw_medical_care_left_right',
	)));

	$wp_customize->add_setting('vw_medical_care_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_medical_care_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-medical-care'),
		'section'  => 'vw_medical_care_left_right',
	)));

     //404 Page Setting
	$wp_customize->add_section('vw_medical_care_404_page',array(
		'title'	=> __('404 Page Settings','vw-medical-care'),
		'panel' => 'vw_medical_care_others_panel',
	));

	$wp_customize->add_setting('vw_medical_care_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_medical_care_404_page_title',array(
		'label'	=> __('Add Title','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_medical_care_404_page_content',array(
		'label'	=> __('Add Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_404_page_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_404_page',
		'setting'	=> 'vw_medical_care_404_page_button_icon',
		'type'		=> 'icon'
	)));

	//No Result Page Setting
	$wp_customize->add_section('vw_medical_care_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-medical-care'),
		'panel' => 'vw_medical_care',
	));

	$wp_customize->add_setting('vw_medical_care_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_medical_care_no_results_page_title',array(
		'label'	=> __('Add Title','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_medical_care_no_results_page_content',array(
		'label'	=> __('Add Text','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_medical_care_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-medical-care'),
		'panel' => 'vw_medical_care_others_panel',
	));

	$wp_customize->add_setting('vw_medical_care_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_social_icon_width',array(
		'label'	=> __('Icon Width','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_social_icon_height',array(
		'label'	=> __('Icon Height','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_medical_care_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_medical_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_medical_care_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-medical-care' ),
		'section'     => 'vw_medical_care_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_medical_care_responsive_media',array(
		'title'	=> __('Responsive Media','vw-medical-care'),
		'panel' => 'vw_medical_care_others_panel',
	));

	$wp_customize->add_setting( 'vw_medical_care_resp_topbar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-medical-care' ),
      'section' => 'vw_medical_care_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_medical_care_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-medical-care' ),
      'section' => 'vw_medical_care_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_medical_care_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-medical-care' ),
      'section' => 'vw_medical_care_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_medical_care_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-medical-care' ),
      'section' => 'vw_medical_care_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_medical_care_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-medical-care' ),
      'section' => 'vw_medical_care_responsive_media'
    )));

     $wp_customize->add_setting('vw_medical_care_res_open_menu_icon',array(
	'default'	=> 'fas fa-bars',
	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_responsive_media',
		'setting'	=> 'vw_medical_care_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_medical_care_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_medical_care_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-medical-care'),
		'transport' => 'refresh',
		'section'	=> 'vw_medical_care_responsive_media',
		'setting'	=> 'vw_medical_care_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_medical_care_resp_menu_toggle_btn_bg_color', array(
		'default'           => '#3fa4f6',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_medical_care_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-medical-care'),
		'section'  => 'vw_medical_care_responsive_media',
	)));

    //Woocommerce settings
	$wp_customize->add_section('vw_medical_care_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-medical-care'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_medical_care_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product .sidebar',
		'render_callback' => 'vw_medical_care_customize_partial_vw_medical_care_woocommerce_shop_page_sidebar', ) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_medical_care_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-medical-care' ),
		'section' => 'vw_medical_care_woocommerce_section'
    )));

    $wp_customize->add_setting('vw_medical_care_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_medical_care_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','vw-medical-care'),
        'section' => 'vw_medical_care_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-medical-care'),
            'Right Sidebar' => __('Right Sidebar','vw-medical-care'),
        ),
	) );

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_medical_care_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product .sidebar',
		'render_callback' => 'vw_medical_care_customize_partial_vw_medical_care_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_medical_care_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_medical_care_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Medical_Care_Toggle_Switch_Custom_Control( $wp_customize, 'vw_medical_care_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-medical-care' ),
		'section' => 'vw_medical_care_woocommerce_section'
    )));

   $wp_customize->add_setting('vw_medical_care_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_medical_care_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','vw-medical-care'),
        'section' => 'vw_medical_care_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-medical-care'),
            'Right Sidebar' => __('Right Sidebar','vw-medical-care'),
        ),
	) );

    //Products per page
    $wp_customize->add_setting('vw_medical_care_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_medical_care_sanitize_float'
	));
	$wp_customize->add_control('vw_medical_care_products_per_page',array(
		'label'	=> __('Products Per Page','vw-medical-care'),
		'description' => __('Display on shop page','vw-medical-care'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_medical_care_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_medical_care_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_medical_care_products_per_row',array(
		'label'	=> __('Products Per Row','vw-medical-care'),
		'description' => __('Display on shop page','vw-medical-care'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_medical_care_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_medical_care_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_medical_care_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_medical_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_medical_care_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-medical-care' ),
		'section'     => 'vw_medical_care_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_medical_care_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_medical_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_medical_care_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-medical-care' ),
		'section'     => 'vw_medical_care_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_medical_care_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_medical_care_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_medical_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_medical_care_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-medical-care' ),
		'section'     => 'vw_medical_care_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('vw_medical_care_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'vw_medical_care_sanitize_choices'
	));
	$wp_customize->add_control('vw_medical_care_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-medical-care'),
        'section' => 'vw_medical_care_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-medical-care'),
            'right' => __('Right','vw-medical-care'),
        ),
	) );

	$wp_customize->add_setting('vw_medical_care_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_medical_care_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_medical_care_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','vw-medical-care'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-medical-care'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-medical-care' ),
        ),
		'section'=> 'vw_medical_care_woocommerce_section',
		'type'=> 'text'
	));


	$wp_customize->add_setting( 'vw_medical_care_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_medical_care_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_medical_care_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-medical-care' ),
		'section'     => 'vw_medical_care_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Medical_Care_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Medical_Care_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_medical_care_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Medical_Care_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_medical_care_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Medical_Care_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_medical_care_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_medical_care_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_medical_care_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Medical_Care_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Medical_Care_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Medical_Care_Customize_Section_Pro($manager,'vw_medical_care_upgrade_pro_link',array(
				'priority'   => 1,
				'title'    => esc_html__( 'VW Medical Care', 'vw-medical-care' ),
				'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-medical-care' ),
				'pro_url'  => esc_url('https://www.vwthemes.com/themes/medical-wordpress-theme/'),
			)));

		// Register sections.
		$manager->add_section(new VW_Medical_Care_Customize_Section_Pro($manager,'vw_medical_care_get_started_link',array(
				'priority'   => 1,
				'title'    => esc_html__( 'DOCUMENTATION', 'vw-medical-care' ),
				'pro_text' => esc_html__( 'DOCS', 'vw-medical-care' ),
				'pro_url'  => esc_url('https://www.vwthemesdemo.com/docs/free-vw-medical-care/'),
			)));
	}


	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-medical-care-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-medical-care-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );

		wp_localize_script(
		'vw-medical-care-customize-controls',
		'vw_medical_care_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		));
	}
}

// Doing this customizer thang!
VW_Medical_Care_Customize::get_instance();
