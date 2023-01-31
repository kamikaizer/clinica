<?php
//about theme info
add_action( 'admin_menu', 'vw_medical_care_gettingstarted' );
function vw_medical_care_gettingstarted() {
	add_theme_page( esc_html__('About VW Medical Care', 'vw-medical-care'), esc_html__('About VW Medical Care', 'vw-medical-care'), 'edit_theme_options', 'vw_medical_care_guide', 'vw_medical_care_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function vw_medical_care_admin_theme_style() {
   wp_enqueue_style('vw-medical-care-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-medical-care-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_medical_care_admin_theme_style');

//guidline for about theme
function vw_medical_care_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-medical-care' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Medical Care Theme', 'vw-medical-care' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-medical-care'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Medical Care at 20% Discount','vw-medical-care'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-medical-care'); ?> ( <span><?php esc_html_e('vwpro20','vw-medical-care'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_MEDICAL_CARE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-medical-care' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_medical_care_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-medical-care' ); ?></button>
			<button class="tablinks" onclick="vw_medical_care_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-medical-care' ); ?></button>
			<button class="tablinks" onclick="vw_medical_care_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-medical-care' ); ?></button>
			<button class="tablinks" onclick="vw_medical_care_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vw-medical-care' ); ?></button>
		  	<button class="tablinks" onclick="vw_medical_care_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-medical-care' ); ?></button>
		  	<button class="tablinks" onclick="vw_medical_care_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-medical-care' ); ?></button>
		</div>

		<!-- Tab content -->
		<?php
			$vw_medical_care_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_medical_care_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Medical_Care_Plugin_Activation_Settings::get_instance();
				$vw_medical_care_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-medical-care-recommended-plugins">
				    <div class="vw-medical-care-action-list">
				        <?php if ($vw_medical_care_actions): foreach ($vw_medical_care_actions as $key => $vw_medical_care_actionValue): ?>
				                <div class="vw-medical-care-action" id="<?php echo esc_attr($vw_medical_care_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_medical_care_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_medical_care_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_medical_care_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-medical-care'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_medical_care_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-medical-care' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('VW Medical Care is a sophisticated, competent, clean and resourceful health and medical WordPress theme to effortlessly craft out a personal or commercial website in a matter of minutes. It is developed to give skin to websites for hospitals, clinics, nursing homes, veterinary clinics, medical stores, ambulance services, pharmaceuticals, physiotherapy centres and spa and massage centres. It can be used as a blog by health consultants, nutritionists, health coaches and bloggers from similar niche. It well suits personal portfolios of surgeon, vet doctor, paediatrician etc. It is integrated with WooCommerce plugin to start online drug store or sell medical equipment, all displayed in beautiful shop layouts. This medical WordPress theme is fully responsive, cross-browser compatible, translation ready and social media integrated. Its welcoming homepage slider is impactful to gain visitors trust to opt your services. Its SEO is sure to improve sites search engine rank. VW Medical Care is based on the latest WordPress version and offers many ways for customization. It does not require any previous coding knowledge and can be handled by a novice like a pro. ','vw-medical-care'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-medical-care' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-medical-care' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_MEDICAL_CARE_FREE_THEME_DOC); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-medical-care' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-medical-care'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-medical-care'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-medical-care'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-medical-care'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-medical-care'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_MEDICAL_CARE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-medical-care'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-medical-care'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-medical-care'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_MEDICAL_CARE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-medical-care'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-medical-care' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-medical-care'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Settings','vw-medical-care'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Section','vw-medical-care'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-medical-care'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-medical-care'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=vw_medical_care_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','vw-medical-care'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-medical-care'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-medical-care'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-medical-care'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-medical-care'); ?></a>
								</div> 
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-medical-care'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-medical-care'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-medical-care'); ?></span><?php esc_html_e(' Go to ','vw-medical-care'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-medical-care'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-medical-care'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-medical-care'); ?></span><?php esc_html_e(' Go to ','vw-medical-care'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-medical-care'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-medical-care'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-medical-care'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-medical-care/" target="_blank"><?php esc_html_e('Documentation','vw-medical-care'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Medical_Care_Plugin_Activation_Settings::get_instance();
				$vw_medical_care_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-medical-care-recommended-plugins">
				    <div class="vw-medical-care-action-list">
				        <?php if ($vw_medical_care_actions): foreach ($vw_medical_care_actions as $key => $vw_medical_care_actionValue): ?>
				                <div class="vw-medical-care-action" id="<?php echo esc_attr($vw_medical_care_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_medical_care_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_medical_care_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_medical_care_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-medical-care'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_medical_care_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-medical-care' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-medical-care'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-medical-care'); ?></span></b></p>
	              	<div class="vw-medical-care-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-medical-care'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />	
	            </div>

	            <div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-medical-care' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-medical-care'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-medical-care'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-medical-care'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-medical-care'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-medical-care'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-medical-care'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-medical-care'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-medical-care'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Medical_Care_Plugin_Activation_Settings::get_instance();
			$vw_medical_care_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-medical-care-recommended-plugins">
				    <div class="vw-medical-care-action-list">
				        <?php if ($vw_medical_care_actions): foreach ($vw_medical_care_actions as $key => $vw_medical_care_actionValue): ?>
				                <div class="vw-medical-care-action" id="<?php echo esc_attr($vw_medical_care_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_medical_care_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_medical_care_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_medical_care_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-medical-care' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-medical-care-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-medical-care'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-medical-care' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-medical-care'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-medical-care'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-medical-care'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-medical-care'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-medical-care'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-medical-care'); ?></a>
							</div> 
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_medical_care_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-medical-care'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-medical-care'); ?></a>
							</div> 
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = VW_Medical_Care_Plugin_Activation_Woo_Products::get_instance();
				$vw_medical_care_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-medical-care-recommended-plugins">
					    <div class="vw-medical-care-action-list">
					        <?php if ($vw_medical_care_actions): foreach ($vw_medical_care_actions as $key => $vw_medical_care_actionValue): ?>
					                <div class="vw-medical-care-action" id="<?php echo esc_attr($vw_medical_care_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($vw_medical_care_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($vw_medical_care_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($vw_medical_care_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vw-medical-care' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-medical-care-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','vw-medical-care'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','vw-medical-care'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','vw-medical-care'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','vw-medical-care'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','vw-medical-care'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','vw-medical-care'); ?></span></b></p>
	              	<div class="vw-medical-care-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vw-medical-care'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','vw-medical-care'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-medical-care' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('It is not just enough to make a website but it should be powerful, efficient and well-groomed to fulfil all your business needs to claim the online space and make the most of it. This medical WordPress theme offers you all this and much more at such an affordable price that you will always pat your back for making such a great deal. It is loaded with amazing features and good quality tools to use them whichever way you want to craft out an outstanding website that is personalized according to your needs. This medical WordPress theme suits everything concerned with health and medical be it hospital, veterinary clinic, drug store, ambulance service, Ayurveda cure centre, physiotherapy centre, spa and massage parlour, health consultant and any other related website and business. It is elegant, versatile, visually appealing and modern to impress visitors at the very first look and convince them to take your services.','vw-medical-care'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_MEDICAL_CARE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-medical-care'); ?></a>
					<a href="<?php echo esc_url( VW_MEDICAL_CARE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-medical-care'); ?></a>
					<a href="<?php echo esc_url( VW_MEDICAL_CARE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-medical-care'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-medical-care' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-medical-care'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-medical-care'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-medical-care'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-medical-care'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-medical-care'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-medical-care'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-medical-care'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-medical-care'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-medical-care'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-medical-care'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-medical-care'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-medical-care'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-medical-care'); ?></td>
								<td class="table-img"><?php esc_html_e('17', 'vw-medical-care'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-medical-care'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-medical-care'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-medical-care'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-medical-care'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-medical-care'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-medical-care'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-medical-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_MEDICAL_CARE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-medical-care'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-medical-care'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-medical-care'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_MEDICAL_CARE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-medical-care'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-medical-care'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-medical-care'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_MEDICAL_CARE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-medical-care'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-medical-care'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-medical-care'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_MEDICAL_CARE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-medical-care'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-medical-care'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-medical-care'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_MEDICAL_CARE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-medical-care'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-medical-care'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-medical-care'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_MEDICAL_CARE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-medical-care'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>