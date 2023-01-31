<?php

	/*---------------------------First highlight color-------------------*/

	$vw_medical_care_first_color = get_theme_mod('vw_medical_care_first_color');

	$vw_medical_care_custom_css = '';

	if($vw_medical_care_first_color != false){
		$vw_medical_care_custom_css .='#topbar, .view-more, .info, .location, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .scrollup i, input[type="submit"], .footer .tagcloud a:hover, .footer-2, .pagination span, .pagination a, .sidebar .tagcloud a:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, #comments a.comment-reply-link, .toggle-nav i, .sidebar .widget_price_filter .ui-slider .ui-slider-range, .sidebar .widget_price_filter .ui-slider .ui-slider-handle, .sidebar .woocommerce-product-search button, .footer .widget_price_filter .ui-slider .ui-slider-range, .footer .widget_price_filter .ui-slider .ui-slider-handle, .footer .woocommerce-product-search button, .footer a.custom_read_more, .sidebar a.custom_read_more, .footer .custom-social-icons i:hover, .sidebar .custom-social-icons i:hover, .footer .custom-social-icons i:hover.fab.fa-facebook-f, .sidebar .custom-social-icons i:hover.fab.fa-facebook-f, .footer .custom-social-icons i:hover.fab.fa-twitter, .sidebar .custom-social-icons i:hover.fab.fa-twitter, .footer .custom-social-icons i:hover.fab.fa-google-plus-g, .sidebar .custom-social-icons i:hover.fab.fa-google-plus-g, .footer .custom-social-icons i:hover.fab.fa-linkedin-in, .sidebar .custom-social-icons i:hover.fab.fa-linkedin-in, .footer .custom-social-icons i:hover.fab.fa-pinterest-p, .sidebar .custom-social-icons i:hover.fab.fa-pinterest-p, .footer .custom-social-icons i:hover.fab.fa-tumblr, .sidebar .custom-social-icons i:hover.fab.fa-tumblr, .footer .custom-social-icons i:hover.fab.fa-instagram, .sidebar .custom-social-icons i:hover.fab.fa-instagram, .footer .custom-social-icons i:hover.fab.fa-youtube, .sidebar .custom-social-icons i:hover.fab.fa-youtube, .nav-previous a, .nav-next a, .woocommerce nav.woocommerce-pagination ul li a, .wp-block-button__link, #preloader, .footer .wp-block-search .wp-block-search__button, .sidebar .wp-block-search .wp-block-search__button,.post-categories li a,.bradcrumbs span,.bradcrumbs a:hover{';
			$vw_medical_care_custom_css .='background-color: '.esc_attr($vw_medical_care_first_color).';';
		$vw_medical_care_custom_css .='}';
	}
	if($vw_medical_care_first_color != false){
		$vw_medical_care_custom_css .='#comments input[type="submit"].submit{';
			$vw_medical_care_custom_css .='background-color: '.esc_attr($vw_medical_care_first_color).'!important;';
		$vw_medical_care_custom_css .='}';
	}
	if($vw_medical_care_first_color != false){
		$vw_medical_care_custom_css .='a, .footer li a:hover, .sidebar ul li a, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .footer .custom-social-icons i, .sidebar .custom-social-icons i, .footer .custom-social-icons i.fab.fa-facebook-f, .sidebar .custom-social-icons i.fab.fa-facebook-f, .footer .custom-social-icons i.fab.fa-twitter, .sidebar .custom-social-icons i.fab.fa-twitter, .footer .custom-social-icons i.fab.fa-google-plus-g, .sidebar .custom-social-icons i.fab.fa-google-plus-g, .footer .custom-social-icons i.fab.fa-linkedin-in, .sidebar .custom-social-icons i.fab.fa-linkedin-in, .footer .custom-social-icons i.fab.fa-pinterest-p, .sidebar .custom-social-icons i.fab.fa-pinterest-p, .footer .custom-social-icons i.fab.fa-tumblr, .sidebar .custom-social-icons i.fab.fa-tumblr, .footer .custom-social-icons i.fab.fa-instagram, .sidebar .custom-social-icons i.fab.fa-instagram, .footer .custom-social-icons i.fab.fa-youtube, .sidebar .custom-social-icons i.fab.fa-youtube, .logo .site-title a:hover, #serv-section h2 a:hover, #slider .inner_carousel h1 a:hover{';
			$vw_medical_care_custom_css .='color: '.esc_attr($vw_medical_care_first_color).';';
		$vw_medical_care_custom_css .='}';
	}
	if($vw_medical_care_first_color != false){
		$vw_medical_care_custom_css .='#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .footer .custom-social-icons i, .sidebar .custom-social-icons i, .footer .custom-social-icons i:hover, .sidebar .custom-social-icons i:hover, .footer .custom-social-icons i.fab.fa-facebook-f, .sidebar .custom-social-icons i.fab.fa-facebook-f, .footer .custom-social-icons i:hover.fab.fa-facebook-f, .sidebar .custom-social-icons i:hover.fab.fa-facebook-f, .footer .custom-social-icons i.fab.fa-twitter, .sidebar .custom-social-icons i.fab.fa-twitter, .footer .custom-social-icons i:hover.fab.fa-twitter, .sidebar .custom-social-icons i:hover.fab.fa-twitter, .footer .custom-social-icons i.fab.fa-google-plus-g, .sidebar .custom-social-icons i.fab.fa-google-plus-g, .footer .custom-social-icons i:hover.fab.fa-google-plus-g, .sidebar .custom-social-icons i:hover.fab.fa-google-plus-g, .footer .custom-social-icons i.fab.fa-linkedin-in, .sidebar .custom-social-icons i.fab.fa-linkedin-in, .footer .custom-social-icons i:hover.fab.fa-linkedin-in, .sidebar .custom-social-icons i:hover.fab.fa-linkedin-in, .footer .custom-social-icons i.fab.fa-pinterest-p, .sidebar .custom-social-icons i.fab.fa-pinterest-p, .footer .custom-social-icons i:hover.fab.fa-pinterest-p, .sidebar .custom-social-icons i:hover.fab.fa-pinterest-p, .footer .custom-social-icons i.fab.fa-tumblr, .sidebar .custom-social-icons i.fab.fa-tumblr, .footer .custom-social-icons i:hover.fab.fa-tumblr, .sidebar .custom-social-icons i:hover.fab.fa-tumblr, .footer .custom-social-icons i.fab.fa-instagram, .sidebar .custom-social-icons i.fab.fa-instagram, .footer .custom-social-icons i:hover.fab.fa-instagram, .sidebar .custom-social-icons i:hover.fab.fa-instagram, .footer .custom-social-icons i.fab.fa-youtube, .sidebar .custom-social-icons i.fab.fa-youtube, .footer .custom-social-icons i:hover.fab.fa-youtube, .sidebar .custom-social-icons i:hover.fab.fa-youtube{';
			$vw_medical_care_custom_css .='border-color: '.esc_attr($vw_medical_care_first_color).';';
		$vw_medical_care_custom_css .='}';
	}
	if($vw_medical_care_first_color != false){
		$vw_medical_care_custom_css .='.post-info hr, .main-navigation ul ul{';
			$vw_medical_care_custom_css .='border-top-color: '.esc_attr($vw_medical_care_first_color).';';
		$vw_medical_care_custom_css .='}';
	}
	if($vw_medical_care_first_color != false){
		$vw_medical_care_custom_css .='.main-header, .main-navigation ul ul, .page-template-custom-home-page .header-fixed{';
			$vw_medical_care_custom_css .='border-bottom-color: '.esc_attr($vw_medical_care_first_color).';';
		$vw_medical_care_custom_css .='}';
	}
	if($vw_medical_care_first_color != false){
		$vw_medical_care_custom_css .='.post-main-box, .sidebar .widget{
		box-shadow: 0px 15px 10px -15px '.esc_attr($vw_medical_care_first_color).';
		}';
	}

	/*------------------Width Layout -------------------*/

	$vw_medical_care_theme_lay = get_theme_mod( 'vw_medical_care_width_option','Full Width');
    if($vw_medical_care_theme_lay == 'Boxed'){
		$vw_medical_care_custom_css .='body{';
			$vw_medical_care_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_medical_care_custom_css .='}';
		$vw_medical_care_custom_css .='.scrollup i{';
		  $vw_medical_care_custom_css .='right: 100px;';
		$vw_medical_care_custom_css .='}';
		$vw_medical_care_custom_css .='.scrollup.left i{';
		  $vw_medical_care_custom_css .='left: 100px;';
		$vw_medical_care_custom_css .='}';
	}else if($vw_medical_care_theme_lay == 'Wide Width'){
		$vw_medical_care_custom_css .='body{';
			$vw_medical_care_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_medical_care_custom_css .='}';
		$vw_medical_care_custom_css .='.scrollup i{';
		  $vw_medical_care_custom_css .='right: 30px;';
		$vw_medical_care_custom_css .='}';
		$vw_medical_care_custom_css .='.scrollup.left i{';
		  $vw_medical_care_custom_css .='left: 30px;';
		$vw_medical_care_custom_css .='}';
	}else if($vw_medical_care_theme_lay == 'Full Width'){
		$vw_medical_care_custom_css .='body{';
			$vw_medical_care_custom_css .='max-width: 100%;';
		$vw_medical_care_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_medical_care_theme_lay = get_theme_mod( 'vw_medical_care_slider_opacity_color','0.5');
	if($vw_medical_care_theme_lay == '0'){
		$vw_medical_care_custom_css .='#slider img{';
			$vw_medical_care_custom_css .='opacity:0';
		$vw_medical_care_custom_css .='}';
		}else if($vw_medical_care_theme_lay == '0.1'){
		$vw_medical_care_custom_css .='#slider img{';
			$vw_medical_care_custom_css .='opacity:0.1';
		$vw_medical_care_custom_css .='}';
		}else if($vw_medical_care_theme_lay == '0.2'){
		$vw_medical_care_custom_css .='#slider img{';
			$vw_medical_care_custom_css .='opacity:0.2';
		$vw_medical_care_custom_css .='}';
		}else if($vw_medical_care_theme_lay == '0.3'){
		$vw_medical_care_custom_css .='#slider img{';
			$vw_medical_care_custom_css .='opacity:0.3';
		$vw_medical_care_custom_css .='}';
		}else if($vw_medical_care_theme_lay == '0.4'){
		$vw_medical_care_custom_css .='#slider img{';
			$vw_medical_care_custom_css .='opacity:0.4';
		$vw_medical_care_custom_css .='}';
		}else if($vw_medical_care_theme_lay == '0.5'){
		$vw_medical_care_custom_css .='#slider img{';
			$vw_medical_care_custom_css .='opacity:0.5';
		$vw_medical_care_custom_css .='}';
		}else if($vw_medical_care_theme_lay == '0.6'){
		$vw_medical_care_custom_css .='#slider img{';
			$vw_medical_care_custom_css .='opacity:0.6';
		$vw_medical_care_custom_css .='}';
		}else if($vw_medical_care_theme_lay == '0.7'){
		$vw_medical_care_custom_css .='#slider img{';
			$vw_medical_care_custom_css .='opacity:0.7';
		$vw_medical_care_custom_css .='}';
		}else if($vw_medical_care_theme_lay == '0.8'){
		$vw_medical_care_custom_css .='#slider img{';
			$vw_medical_care_custom_css .='opacity:0.8';
		$vw_medical_care_custom_css .='}';
		}else if($vw_medical_care_theme_lay == '0.9'){
		$vw_medical_care_custom_css .='#slider img{';
			$vw_medical_care_custom_css .='opacity:0.9';
		$vw_medical_care_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$vw_medical_care_slider_image_overlay = get_theme_mod('vw_medical_care_slider_image_overlay', true);
	if($vw_medical_care_slider_image_overlay == false){
		$vw_medical_care_custom_css .='#slider img{';
			$vw_medical_care_custom_css .='opacity:1;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_slider_image_overlay_color = get_theme_mod('vw_medical_care_slider_image_overlay_color', true);
	if($vw_medical_care_slider_image_overlay_color != false){
		$vw_medical_care_custom_css .='#slider{';
			$vw_medical_care_custom_css .='background-color: '.esc_attr($vw_medical_care_slider_image_overlay_color).';';
		$vw_medical_care_custom_css .='}';
	}

	/*-----------------Slider Content Layout -------------------*/

	$vw_medical_care_theme_lay = get_theme_mod( 'vw_medical_care_slider_content_option','Left');
    if($vw_medical_care_theme_lay == 'Left'){
		$vw_medical_care_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_medical_care_custom_css .='text-align:left; left:10%; right:40%;';
		$vw_medical_care_custom_css .='}';
	}else if($vw_medical_care_theme_lay == 'Center'){
		$vw_medical_care_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_medical_care_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_medical_care_custom_css .='}';
	}else if($vw_medical_care_theme_lay == 'Right'){
		$vw_medical_care_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_medical_care_custom_css .='text-align:right; left:40%; right:10%;';
		$vw_medical_care_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$vw_medical_care_slider_content_padding_top_bottom = get_theme_mod('vw_medical_care_slider_content_padding_top_bottom');
	$vw_medical_care_slider_content_padding_left_right = get_theme_mod('vw_medical_care_slider_content_padding_left_right');
	if($vw_medical_care_slider_content_padding_top_bottom != false || $vw_medical_care_slider_content_padding_left_right != false){
		$vw_medical_care_custom_css .='#slider .carousel-caption{';
			$vw_medical_care_custom_css .='top: '.esc_attr($vw_medical_care_slider_content_padding_top_bottom).'; bottom: '.esc_attr($vw_medical_care_slider_content_padding_top_bottom).';left: '.esc_attr($vw_medical_care_slider_content_padding_left_right).';right: '.esc_attr($vw_medical_care_slider_content_padding_left_right).';';
		$vw_medical_care_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_medical_care_slider_height = get_theme_mod('vw_medical_care_slider_height');
	if($vw_medical_care_slider_height != false){
		$vw_medical_care_custom_css .='#slider img{';
			$vw_medical_care_custom_css .='height: '.esc_attr($vw_medical_care_slider_height).';';
		$vw_medical_care_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_medical_care_slider = get_theme_mod('vw_medical_care_slider_hide_show');
	if($vw_medical_care_slider == false){
		$vw_medical_care_custom_css .='#serv-section, #contact-sec{';
			$vw_medical_care_custom_css .='padding: 3% 0;';
		$vw_medical_care_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_medical_care_theme_lay = get_theme_mod( 'vw_medical_care_blog_layout_option','Default');
    if($vw_medical_care_theme_lay == 'Default'){
		$vw_medical_care_custom_css .='.post-main-box{';
			$vw_medical_care_custom_css .='';
		$vw_medical_care_custom_css .='}';
	}else if($vw_medical_care_theme_lay == 'Center'){
		$vw_medical_care_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_medical_care_custom_css .='text-align:center;';
		$vw_medical_care_custom_css .='}';
		$vw_medical_care_custom_css .='.post-info{';
			$vw_medical_care_custom_css .='margin-top:10px;';
		$vw_medical_care_custom_css .='}';
		$vw_medical_care_custom_css .='.post-info hr{';
			$vw_medical_care_custom_css .='margin:15px auto;';
		$vw_medical_care_custom_css .='}';
	}else if($vw_medical_care_theme_lay == 'Left'){
		$vw_medical_care_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_medical_care_custom_css .='text-align:Left;';
		$vw_medical_care_custom_css .='}';
		$vw_medical_care_custom_css .='.post-main-box h2{';
			$vw_medical_care_custom_css .='margin-top:10px;';
		$vw_medical_care_custom_css .='}';
		$vw_medical_care_custom_css .='.post-info hr{';
			$vw_medical_care_custom_css .='margin-bottom:10px;';
		$vw_medical_care_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$vw_medical_care_blog_page_posts_settings = get_theme_mod( 'vw_medical_care_blog_page_posts_settings','Into Blocks');
    if($vw_medical_care_blog_page_posts_settings == 'Without Blocks'){
		$vw_medical_care_custom_css .='.post-main-box{';
			$vw_medical_care_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_medical_care_custom_css .='}';
	}

	// featured image dimention
	$vw_medical_care_blog_post_featured_image_dimension = get_theme_mod('vw_medical_care_blog_post_featured_image_dimension', 'default');
	$vw_medical_care_blog_post_featured_image_custom_width = get_theme_mod('vw_medical_care_blog_post_featured_image_custom_width',250);
	$vw_medical_care_blog_post_featured_image_custom_height = get_theme_mod('vw_medical_care_blog_post_featured_image_custom_height',250);
	if($vw_medical_care_blog_post_featured_image_dimension == 'custom'){
		$vw_medical_care_custom_css .='.box-image img{';
			$vw_medical_care_custom_css .='width: '.esc_attr($vw_medical_care_blog_post_featured_image_custom_width).'; height: '.esc_attr($vw_medical_care_blog_post_featured_image_custom_height).';';
		$vw_medical_care_custom_css .='}';
	}
		$vw_medical_care_featured_img_border_radius = get_theme_mod('vw_medical_care_featured_image_border_radius');
	if($vw_medical_care_featured_img_border_radius != false){
		$vw_medical_care_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$vw_medical_care_custom_css .='border-radius: '.esc_attr($vw_medical_care_featured_img_border_radius).'px;';
		$vw_medical_care_custom_css .='}';
	} 

	/*--------------------Responsive Media -----------------------*/

	$vw_medical_care_resp_topbar = get_theme_mod( 'vw_medical_care_resp_topbar_hide_show',false);
	if($vw_medical_care_resp_topbar == true && get_theme_mod( 'vw_medical_care_topbar_hide_show', false) == false){
    	$vw_medical_care_custom_css .='#topbar{';
			$vw_medical_care_custom_css .='display:none;';
		$vw_medical_care_custom_css .='} ';
	}
    if($vw_medical_care_resp_topbar == true){
    	$vw_medical_care_custom_css .='@media screen and (max-width:575px) {';
		$vw_medical_care_custom_css .='#topbar{';
			$vw_medical_care_custom_css .='display:block;';
		$vw_medical_care_custom_css .='} }';
	}else if($vw_medical_care_resp_topbar == false){
		$vw_medical_care_custom_css .='@media screen and (max-width:575px) {';
		$vw_medical_care_custom_css .='#topbar{';
			$vw_medical_care_custom_css .='display:none;';
		$vw_medical_care_custom_css .='} }';
	}

	$vw_medical_care_resp_stickyheader = get_theme_mod( 'vw_medical_care_stickyheader_hide_show',false);
	if($vw_medical_care_resp_stickyheader == true && get_theme_mod( 'vw_medical_care_sticky_header',false) != true){
    	$vw_medical_care_custom_css .='.header-fixed{';
			$vw_medical_care_custom_css .='position:static;';
		$vw_medical_care_custom_css .='} ';
	}
    if($vw_medical_care_resp_stickyheader == true){
    	$vw_medical_care_custom_css .='@media screen and (max-width:575px) {';
		$vw_medical_care_custom_css .='.header-fixed{';
			$vw_medical_care_custom_css .='position:fixed;';
		$vw_medical_care_custom_css .='} }';
	}else if($vw_medical_care_resp_stickyheader == false){
		$vw_medical_care_custom_css .='@media screen and (max-width:575px){';
		$vw_medical_care_custom_css .='.header-fixed{';
			$vw_medical_care_custom_css .='position:static;';
		$vw_medical_care_custom_css .='} }';
	}

	$vw_medical_care_resp_slider = get_theme_mod( 'vw_medical_care_resp_slider_hide_show',false);
	if($vw_medical_care_resp_slider == true && get_theme_mod( 'vw_medical_care_slider_hide_show', false) == false){
    	$vw_medical_care_custom_css .='#slider{';
			$vw_medical_care_custom_css .='display:none;';
		$vw_medical_care_custom_css .='} ';
	}
    if($vw_medical_care_resp_slider == true){
    	$vw_medical_care_custom_css .='@media screen and (max-width:575px) {';
		$vw_medical_care_custom_css .='#slider{';
			$vw_medical_care_custom_css .='display:block;';
		$vw_medical_care_custom_css .='} }';
	}else if($vw_medical_care_resp_slider == false){
		$vw_medical_care_custom_css .='@media screen and (max-width:575px) {';
		$vw_medical_care_custom_css .='#slider{';
			$vw_medical_care_custom_css .='display:none;';
		$vw_medical_care_custom_css .='} }';
	}

	$vw_medical_care_sidebar = get_theme_mod( 'vw_medical_care_sidebar_hide_show',true);
    if($vw_medical_care_sidebar == true){
    	$vw_medical_care_custom_css .='@media screen and (max-width:575px) {';
		$vw_medical_care_custom_css .='.sidebar{';
			$vw_medical_care_custom_css .='display:block;';
		$vw_medical_care_custom_css .='} }';
	}else if($vw_medical_care_sidebar == false){
		$vw_medical_care_custom_css .='@media screen and (max-width:575px) {';
		$vw_medical_care_custom_css .='.sidebar{';
			$vw_medical_care_custom_css .='display:none;';
		$vw_medical_care_custom_css .='} }';
	}

	$vw_medical_care_resp_scroll_top = get_theme_mod( 'vw_medical_care_resp_scroll_top_hide_show',true);
	if($vw_medical_care_resp_scroll_top == true && get_theme_mod( 'vw_medical_care_hide_show_scroll',true) != true){
    	$vw_medical_care_custom_css .='.scrollup i{';
			$vw_medical_care_custom_css .='visibility:hidden !important;';
		$vw_medical_care_custom_css .='} ';
	}
    if($vw_medical_care_resp_scroll_top == true){
    	$vw_medical_care_custom_css .='@media screen and (max-width:575px) {';
		$vw_medical_care_custom_css .='.scrollup i{';
			$vw_medical_care_custom_css .='visibility:visible !important;';
		$vw_medical_care_custom_css .='} }';
	}else if($vw_medical_care_resp_scroll_top == false){
		$vw_medical_care_custom_css .='@media screen and (max-width:575px){';
		$vw_medical_care_custom_css .='.scrollup i{';
			$vw_medical_care_custom_css .='visibility:hidden !important;';
		$vw_medical_care_custom_css .='} }';
	}

	$vw_medical_care_resp_menu_toggle_btn_bg_color = get_theme_mod('vw_medical_care_resp_menu_toggle_btn_bg_color');
	if($vw_medical_care_resp_menu_toggle_btn_bg_color != false){
		$vw_medical_care_custom_css .='.toggle-nav i{';
			$vw_medical_care_custom_css .='background: '.esc_attr($vw_medical_care_resp_menu_toggle_btn_bg_color).';';
		$vw_medical_care_custom_css .='}';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_medical_care_topbar_padding_top_bottom = get_theme_mod('vw_medical_care_topbar_padding_top_bottom');
	if($vw_medical_care_topbar_padding_top_bottom != false){
		$vw_medical_care_custom_css .='#topbar{';
			$vw_medical_care_custom_css .='padding-top: '.esc_attr($vw_medical_care_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_medical_care_topbar_padding_top_bottom).';';
		$vw_medical_care_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_medical_care_sticky_header_padding = get_theme_mod('vw_medical_care_sticky_header_padding');
	if($vw_medical_care_sticky_header_padding != false){
		$vw_medical_care_custom_css .='.page-template-custom-home-page .header-fixed, .header-fixed{';
			$vw_medical_care_custom_css .='padding: '.esc_attr($vw_medical_care_sticky_header_padding).';';
		$vw_medical_care_custom_css .='}';
	}

	/*-------------- Menus Settings ----------------*/

	$vw_medical_care_navigation_menu_font_size = get_theme_mod('vw_medical_care_navigation_menu_font_size');
	if($vw_medical_care_navigation_menu_font_size != false){
		$vw_medical_care_custom_css .='.main-navigation a{';
			$vw_medical_care_custom_css .='font-size: '.esc_attr($vw_medical_care_navigation_menu_font_size).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_nav_menus_font_weight = get_theme_mod( 'vw_medical_care_navigation_menu_font_weight','Default');
    if($vw_medical_care_nav_menus_font_weight == 'Default'){
		$vw_medical_care_custom_css .='.main-navigation a{';
			$vw_medical_care_custom_css .='';
		$vw_medical_care_custom_css .='}';
	}else if($vw_medical_care_nav_menus_font_weight == 'Normal'){
		$vw_medical_care_custom_css .='.main-navigation a{';
			$vw_medical_care_custom_css .='font-weight: normal;';
		$vw_medical_care_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/

	$vw_medical_care_search_padding_top_bottom = get_theme_mod('vw_medical_care_search_padding_top_bottom');
	$vw_medical_care_search_padding_left_right = get_theme_mod('vw_medical_care_search_padding_left_right');
	$vw_medical_care_search_font_size = get_theme_mod('vw_medical_care_search_font_size');
	$vw_medical_care_search_border_radius = get_theme_mod('vw_medical_care_search_border_radius');
	if($vw_medical_care_search_padding_top_bottom != false || $vw_medical_care_search_padding_left_right != false || $vw_medical_care_search_font_size != false || $vw_medical_care_search_border_radius != false){
		$vw_medical_care_custom_css .='.search-box i{';
			$vw_medical_care_custom_css .='padding-top: '.esc_attr($vw_medical_care_search_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_medical_care_search_padding_top_bottom).';padding-left: '.esc_attr($vw_medical_care_search_padding_left_right).';padding-right: '.esc_attr($vw_medical_care_search_padding_left_right).';font-size: '.esc_attr($vw_medical_care_search_font_size).';border-radius: '.esc_attr($vw_medical_care_search_border_radius).'px;';
		$vw_medical_care_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_medical_care_button_padding_top_bottom = get_theme_mod('vw_medical_care_button_padding_top_bottom');
	$vw_medical_care_button_padding_left_right = get_theme_mod('vw_medical_care_button_padding_left_right');
	if($vw_medical_care_button_padding_top_bottom != false || $vw_medical_care_button_padding_left_right != false){
		$vw_medical_care_custom_css .='.post-main-box .view-more{';
			$vw_medical_care_custom_css .='padding-top: '.esc_attr($vw_medical_care_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_medical_care_button_padding_top_bottom).';padding-left: '.esc_attr($vw_medical_care_button_padding_left_right).';padding-right: '.esc_attr($vw_medical_care_button_padding_left_right).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_button_border_radius = get_theme_mod('vw_medical_care_button_border_radius');
	if($vw_medical_care_button_border_radius != false){
		$vw_medical_care_custom_css .='.post-main-box .view-more{';
			$vw_medical_care_custom_css .='border-radius: '.esc_attr($vw_medical_care_button_border_radius).'px;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_button_font_size = get_theme_mod('vw_medical_care_button_font_size',14);
	$vw_medical_care_custom_css .='.post-main-box a.view-more{';
		$vw_medical_care_custom_css .='font-size: '.esc_attr($vw_medical_care_button_font_size).';';
	$vw_medical_care_custom_css .='}';

	$vw_medical_care_theme_lay = get_theme_mod( 'vw_medical_care_button_text_transform','Uppercase');
	if($vw_medical_care_theme_lay == 'Capitalize'){
		$vw_medical_care_custom_css .='.post-main-box a.view-more{';
			$vw_medical_care_custom_css .='text-transform:Capitalize;';
		$vw_medical_care_custom_css .='}';
	}
	if($vw_medical_care_theme_lay == 'Lowercase'){
		$vw_medical_care_custom_css .='.post-main-box a.view-more{';
			$vw_medical_care_custom_css .='text-transform:Lowercase;';
		$vw_medical_care_custom_css .='}';
	}
	if($vw_medical_care_theme_lay == 'Uppercase'){
		$vw_medical_care_custom_css .='.post-main-box a.view-more{';
			$vw_medical_care_custom_css .='text-transform:Uppercase;';
		$vw_medical_care_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_medical_care_featured_image_border_radius = get_theme_mod('vw_medical_care_featured_image_border_radius', 0);
	if($vw_medical_care_featured_image_border_radius != false){
		$vw_medical_care_custom_css .='.box-image img, .feature-box img{';
			$vw_medical_care_custom_css .='border-radius: '.esc_attr($vw_medical_care_featured_image_border_radius).'px;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_featured_image_box_shadow = get_theme_mod('vw_medical_care_featured_image_box_shadow',0);
	if($vw_medical_care_featured_image_box_shadow != false){
		$vw_medical_care_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$vw_medical_care_custom_css .='box-shadow: '.esc_attr($vw_medical_care_featured_image_box_shadow).'px '.esc_attr($vw_medical_care_featured_image_box_shadow).'px '.esc_attr($vw_medical_care_featured_image_box_shadow).'px #cccccc;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_single_blog_post_navigation_show_hide = get_theme_mod('vw_medical_care_single_blog_post_navigation_show_hide',true);
	if($vw_medical_care_single_blog_post_navigation_show_hide != true){
		$vw_medical_care_custom_css .='.post-navigation{';
			$vw_medical_care_custom_css .='display: none;';
		$vw_medical_care_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_medical_care_footer_background_color = get_theme_mod('vw_medical_care_footer_background_color');
	if($vw_medical_care_footer_background_color != false){
		$vw_medical_care_custom_css .='.footer{';
			$vw_medical_care_custom_css .='background-color: '.esc_attr($vw_medical_care_footer_background_color).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_copyright_font_size = get_theme_mod('vw_medical_care_copyright_font_size');
	if($vw_medical_care_copyright_font_size != false){
		$vw_medical_care_custom_css .='.copyright p{';
			$vw_medical_care_custom_css .='font-size: '.esc_attr($vw_medical_care_copyright_font_size).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_copyright_padding_top_bottom = get_theme_mod('vw_medical_care_copyright_padding_top_bottom');
	if($vw_medical_care_copyright_padding_top_bottom != false){
		$vw_medical_care_custom_css .='.footer-2{';
			$vw_medical_care_custom_css .='padding-top: '.esc_attr($vw_medical_care_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_medical_care_copyright_padding_top_bottom).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_copyright_alignment = get_theme_mod('vw_medical_care_copyright_alignment');
	if($vw_medical_care_copyright_alignment != false){
		$vw_medical_care_custom_css .='.copyright p{';
			$vw_medical_care_custom_css .='text-align: '.esc_attr($vw_medical_care_copyright_alignment).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_footer_widgets_heading = get_theme_mod( 'vw_medical_care_footer_widgets_heading','Left');
    if($vw_medical_care_footer_widgets_heading == 'Left'){
		$vw_medical_care_custom_css .='.footer h3, .footer h3 .wp-block-search .wp-block-search__label{';
		$vw_medical_care_custom_css .='text-align: left;';
		$vw_medical_care_custom_css .='}';
	}else if($vw_medical_care_footer_widgets_heading == 'Center'){
		$vw_medical_care_custom_css .='.footer h3, .footer h3 .wp-block-search .wp-block-search__label{';
			$vw_medical_care_custom_css .='text-align: center;';
		$vw_medical_care_custom_css .='}';
	}else if($vw_medical_care_footer_widgets_heading == 'Right'){
		$vw_medical_care_custom_css .='.footer h3, .footer .wp-block-search .wp-block-search__label{';
			$vw_medical_care_custom_css .='text-align: right;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_footer_widgets_content = get_theme_mod( 'vw_medical_care_footer_widgets_content','Left');
    if($vw_medical_care_footer_widgets_content == 'Left'){
		$vw_medical_care_custom_css .='.footer li{';
		$vw_medical_care_custom_css .='text-align: left;';
		$vw_medical_care_custom_css .='}';
	}else if($vw_medical_care_footer_widgets_content == 'Center'){
		$vw_medical_care_custom_css .='.footer li{';
			$vw_medical_care_custom_css .='text-align: center;';
		$vw_medical_care_custom_css .='}';
	}else if($vw_medical_care_footer_widgets_content == 'Right'){
		$vw_medical_care_custom_css .='.footer li{';
			$vw_medical_care_custom_css .='text-align: right;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_footer_padding = get_theme_mod('vw_medical_care_footer_padding');
	if($vw_medical_care_footer_padding != false){
		$vw_medical_care_custom_css .='.footer{';
			$vw_medical_care_custom_css .='padding: '.esc_attr($vw_medical_care_footer_padding).' 0;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_footer_icon = get_theme_mod('vw_medical_care_footer_icon');
	if($vw_medical_care_footer_icon == false){
		$vw_medical_care_custom_css .='.copyright p{';
			$vw_medical_care_custom_css .='width:100%; text-align:center; float:none;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_footer_background_image = get_theme_mod('vw_medical_care_footer_background_image');
	if($vw_medical_care_footer_background_image != false){
		$vw_medical_care_custom_css .='.footer{';
			$vw_medical_care_custom_css .='background: url('.esc_attr($vw_medical_care_footer_background_image).');';
		$vw_medical_care_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_medical_care_scroll_to_top_font_size = get_theme_mod('vw_medical_care_scroll_to_top_font_size');
	if($vw_medical_care_scroll_to_top_font_size != false){
		$vw_medical_care_custom_css .='.scrollup i{';
			$vw_medical_care_custom_css .='font-size: '.esc_attr($vw_medical_care_scroll_to_top_font_size).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_scroll_to_top_padding = get_theme_mod('vw_medical_care_scroll_to_top_padding');
	$vw_medical_care_scroll_to_top_padding = get_theme_mod('vw_medical_care_scroll_to_top_padding');
	if($vw_medical_care_scroll_to_top_padding != false){
		$vw_medical_care_custom_css .='.scrollup i{';
			$vw_medical_care_custom_css .='padding-top: '.esc_attr($vw_medical_care_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_medical_care_scroll_to_top_padding).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_scroll_to_top_width = get_theme_mod('vw_medical_care_scroll_to_top_width');
	if($vw_medical_care_scroll_to_top_width != false){
		$vw_medical_care_custom_css .='.scrollup i{';
			$vw_medical_care_custom_css .='width: '.esc_attr($vw_medical_care_scroll_to_top_width).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_scroll_to_top_height = get_theme_mod('vw_medical_care_scroll_to_top_height');
	if($vw_medical_care_scroll_to_top_height != false){
		$vw_medical_care_custom_css .='.scrollup i{';
			$vw_medical_care_custom_css .='height: '.esc_attr($vw_medical_care_scroll_to_top_height).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_scroll_to_top_border_radius = get_theme_mod('vw_medical_care_scroll_to_top_border_radius');
	if($vw_medical_care_scroll_to_top_border_radius != false){
		$vw_medical_care_custom_css .='.scrollup i{';
			$vw_medical_care_custom_css .='border-radius: '.esc_attr($vw_medical_care_scroll_to_top_border_radius).'px;';
		$vw_medical_care_custom_css .='}';
	}

	/*---------------- Single Blog Page Settings ------------------*/

	$vw_medical_care_single_blog_comment_title = get_theme_mod('vw_medical_care_single_blog_comment_title', 'Leave a Reply');
	if($vw_medical_care_single_blog_comment_title == ''){
		$vw_medical_care_custom_css .='#comments h2#reply-title {';
			$vw_medical_care_custom_css .='display: none;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_single_blog_comment_button_text = get_theme_mod('vw_medical_care_single_blog_comment_button_text', 'Post Comment');
	if($vw_medical_care_single_blog_comment_button_text == ''){
		$vw_medical_care_custom_css .='#comments p.form-submit {';
			$vw_medical_care_custom_css .='display: none;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_comment_width = get_theme_mod('vw_medical_care_single_blog_comment_width');
	if($vw_medical_care_comment_width != false){
		$vw_medical_care_custom_css .='#comments textarea{';
			$vw_medical_care_custom_css .='width: '.esc_attr($vw_medical_care_comment_width).';';
		$vw_medical_care_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_medical_care_social_icon_font_size = get_theme_mod('vw_medical_care_social_icon_font_size');
	if($vw_medical_care_social_icon_font_size != false){
		$vw_medical_care_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_medical_care_custom_css .='font-size: '.esc_attr($vw_medical_care_social_icon_font_size).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_social_icon_padding = get_theme_mod('vw_medical_care_social_icon_padding');
	if($vw_medical_care_social_icon_padding != false){
		$vw_medical_care_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_medical_care_custom_css .='padding: '.esc_attr($vw_medical_care_social_icon_padding).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_social_icon_width = get_theme_mod('vw_medical_care_social_icon_width');
	if($vw_medical_care_social_icon_width != false){
		$vw_medical_care_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_medical_care_custom_css .='width: '.esc_attr($vw_medical_care_social_icon_width).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_social_icon_height = get_theme_mod('vw_medical_care_social_icon_height');
	if($vw_medical_care_social_icon_height != false){
		$vw_medical_care_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_medical_care_custom_css .='height: '.esc_attr($vw_medical_care_social_icon_height).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_social_icon_border_radius = get_theme_mod('vw_medical_care_social_icon_border_radius');
	if($vw_medical_care_social_icon_border_radius != false){
		$vw_medical_care_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_medical_care_custom_css .='border-radius: '.esc_attr($vw_medical_care_social_icon_border_radius).'px;';
		$vw_medical_care_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_medical_care_products_padding_top_bottom = get_theme_mod('vw_medical_care_products_padding_top_bottom');
	if($vw_medical_care_products_padding_top_bottom != false){
		$vw_medical_care_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_medical_care_custom_css .='padding-top: '.esc_attr($vw_medical_care_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_medical_care_products_padding_top_bottom).'!important;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_products_padding_left_right = get_theme_mod('vw_medical_care_products_padding_left_right');
	if($vw_medical_care_products_padding_left_right != false){
		$vw_medical_care_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_medical_care_custom_css .='padding-left: '.esc_attr($vw_medical_care_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_medical_care_products_padding_left_right).'!important;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_products_box_shadow = get_theme_mod('vw_medical_care_products_box_shadow');
	if($vw_medical_care_products_box_shadow != false){
		$vw_medical_care_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_medical_care_custom_css .='box-shadow: '.esc_attr($vw_medical_care_products_box_shadow).'px '.esc_attr($vw_medical_care_products_box_shadow).'px '.esc_attr($vw_medical_care_products_box_shadow).'px #ddd;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_products_border_radius = get_theme_mod('vw_medical_care_products_border_radius', 0);
	if($vw_medical_care_products_border_radius != false){
		$vw_medical_care_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_medical_care_custom_css .='border-radius: '.esc_attr($vw_medical_care_products_border_radius).'px;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_products_btn_padding_top_bottom = get_theme_mod('vw_medical_care_products_btn_padding_top_bottom');
	if($vw_medical_care_products_btn_padding_top_bottom != false){
		$vw_medical_care_custom_css .='.woocommerce a.button{';
			$vw_medical_care_custom_css .='padding-top: '.esc_attr($vw_medical_care_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vw_medical_care_products_btn_padding_top_bottom).' !important;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_products_btn_padding_left_right = get_theme_mod('vw_medical_care_products_btn_padding_left_right');
	if($vw_medical_care_products_btn_padding_left_right != false){
		$vw_medical_care_custom_css .='.woocommerce a.button{';
			$vw_medical_care_custom_css .='padding-left: '.esc_attr($vw_medical_care_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vw_medical_care_products_btn_padding_left_right).' !important;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_products_button_border_radius = get_theme_mod('vw_medical_care_products_button_border_radius', 0);
	if($vw_medical_care_products_button_border_radius != false){
		$vw_medical_care_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_medical_care_custom_css .='border-radius: '.esc_attr($vw_medical_care_products_button_border_radius).'px;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_woocommerce_sale_position = get_theme_mod( 'vw_medical_care_woocommerce_sale_position','right');
    if($vw_medical_care_woocommerce_sale_position == 'left'){
		$vw_medical_care_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_medical_care_custom_css .='left: -10px; right: auto;';
		$vw_medical_care_custom_css .='}';
	}else if($vw_medical_care_woocommerce_sale_position == 'right'){
		$vw_medical_care_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_medical_care_custom_css .='left: auto; right: 0;';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_woocommerce_sale_font_size = get_theme_mod('vw_medical_care_woocommerce_sale_font_size');
	if($vw_medical_care_woocommerce_sale_font_size != false){
		$vw_medical_care_custom_css .='.woocommerce span.onsale{';
			$vw_medical_care_custom_css .='font-size: '.esc_attr($vw_medical_care_woocommerce_sale_font_size).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_woocommerce_sale_padding_top_bottom = get_theme_mod('vw_medical_care_woocommerce_sale_padding_top_bottom');
	if($vw_medical_care_woocommerce_sale_padding_top_bottom != false){
		$vw_medical_care_custom_css .='.woocommerce span.onsale{';
			$vw_medical_care_custom_css .='padding-top: '.esc_attr($vw_medical_care_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_medical_care_woocommerce_sale_padding_top_bottom).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_woocommerce_sale_padding_left_right = get_theme_mod('vw_medical_care_woocommerce_sale_padding_left_right');
	if($vw_medical_care_woocommerce_sale_padding_left_right != false){
		$vw_medical_care_custom_css .='.woocommerce span.onsale{';
			$vw_medical_care_custom_css .='padding-left: '.esc_attr($vw_medical_care_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($vw_medical_care_woocommerce_sale_padding_left_right).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_woocommerce_sale_border_radius = get_theme_mod('vw_medical_care_woocommerce_sale_border_radius', 0);
	if($vw_medical_care_woocommerce_sale_border_radius != false){
		$vw_medical_care_custom_css .='.woocommerce span.onsale{';
			$vw_medical_care_custom_css .='border-radius: '.esc_attr($vw_medical_care_woocommerce_sale_border_radius).'px;';
		$vw_medical_care_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$vw_medical_care_logo_padding = get_theme_mod('vw_medical_care_logo_padding');
	if($vw_medical_care_logo_padding != false){
		$vw_medical_care_custom_css .='.main-header .logo{';
			$vw_medical_care_custom_css .='padding: '.esc_attr($vw_medical_care_logo_padding).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_logo_margin = get_theme_mod('vw_medical_care_logo_margin');
	if($vw_medical_care_logo_margin != false){
		$vw_medical_care_custom_css .='.main-header .logo{';
			$vw_medical_care_custom_css .='margin: '.esc_attr($vw_medical_care_logo_margin).';';
		$vw_medical_care_custom_css .='}';
	}

	// Site title Font Size
	$vw_medical_care_site_title_font_size = get_theme_mod('vw_medical_care_site_title_font_size');
	if($vw_medical_care_site_title_font_size != false){
		$vw_medical_care_custom_css .='.logo h1, .logo p.site-title{';
			$vw_medical_care_custom_css .='font-size: '.esc_attr($vw_medical_care_site_title_font_size).';';
		$vw_medical_care_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_medical_care_site_tagline_font_size = get_theme_mod('vw_medical_care_site_tagline_font_size');
	if($vw_medical_care_site_tagline_font_size != false){
		$vw_medical_care_custom_css .='.logo p.site-description{';
			$vw_medical_care_custom_css .='font-size: '.esc_attr($vw_medical_care_site_tagline_font_size).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_header_menus_color = get_theme_mod('vw_medical_care_header_menus_color');
	if($vw_medical_care_header_menus_color != false){
		$vw_medical_care_custom_css .='.main-navigation a{';
			$vw_medical_care_custom_css .='color: '.esc_attr($vw_medical_care_header_menus_color).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_header_menus_hover_color = get_theme_mod('vw_medical_care_header_menus_hover_color');
	if($vw_medical_care_header_menus_hover_color != false){
		$vw_medical_care_custom_css .='.main-navigation a:hover{';
			$vw_medical_care_custom_css .='color: '.esc_attr($vw_medical_care_header_menus_hover_color).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_header_submenus_color = get_theme_mod('vw_medical_care_header_submenus_color');
	if($vw_medical_care_header_submenus_color != false){
		$vw_medical_care_custom_css .='.main-navigation ul ul a{';
			$vw_medical_care_custom_css .='color: '.esc_attr($vw_medical_care_header_submenus_color).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_header_submenus_hover_color = get_theme_mod('vw_medical_care_header_submenus_hover_color');
	if($vw_medical_care_header_submenus_hover_color != false){
		$vw_medical_care_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$vw_medical_care_custom_css .='color: '.esc_attr($vw_medical_care_header_submenus_hover_color).';';
		$vw_medical_care_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_medical_care_preloader_bg_color = get_theme_mod('vw_medical_care_preloader_bg_color');
	if($vw_medical_care_preloader_bg_color != false){
		$vw_medical_care_custom_css .='#preloader{';
			$vw_medical_care_custom_css .='background-color: '.esc_attr($vw_medical_care_preloader_bg_color).';';
		$vw_medical_care_custom_css .='}';
	}

	$vw_medical_care_preloader_border_color = get_theme_mod('vw_medical_care_preloader_border_color');
	if($vw_medical_care_preloader_border_color != false){
		$vw_medical_care_custom_css .='.loader-line{';
			$vw_medical_care_custom_css .='border-color: '.esc_attr($vw_medical_care_preloader_border_color).'!important;';
		$vw_medical_care_custom_css .='}';
	}
