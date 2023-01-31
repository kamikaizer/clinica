<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Medical_Care_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-medical-care' ),
				'family'      => esc_html__( 'Font Family', 'vw-medical-care' ),
				'size'        => esc_html__( 'Font Size',   'vw-medical-care' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-medical-care' ),
				'style'       => esc_html__( 'Font Style',  'vw-medical-care' ),
				'line_height' => esc_html__( 'Line Height', 'vw-medical-care' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-medical-care' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-medical-care-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-medical-care-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-medical-care' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-medical-care' ),
        'Acme' => __( 'Acme', 'vw-medical-care' ),
        'Anton' => __( 'Anton', 'vw-medical-care' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-medical-care' ),
        'Arimo' => __( 'Arimo', 'vw-medical-care' ),
        'Arsenal' => __( 'Arsenal', 'vw-medical-care' ),
        'Arvo' => __( 'Arvo', 'vw-medical-care' ),
        'Alegreya' => __( 'Alegreya', 'vw-medical-care' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-medical-care' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-medical-care' ),
        'Bangers' => __( 'Bangers', 'vw-medical-care' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-medical-care' ),
        'Bad Script' => __( 'Bad Script', 'vw-medical-care' ),
        'Bitter' => __( 'Bitter', 'vw-medical-care' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-medical-care' ),
        'BenchNine' => __( 'BenchNine', 'vw-medical-care' ),
        'Cabin' => __( 'Cabin', 'vw-medical-care' ),
        'Cardo' => __( 'Cardo', 'vw-medical-care' ),
        'Courgette' => __( 'Courgette', 'vw-medical-care' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-medical-care' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-medical-care' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-medical-care' ),
        'Cuprum' => __( 'Cuprum', 'vw-medical-care' ),
        'Cookie' => __( 'Cookie', 'vw-medical-care' ),
        'Chewy' => __( 'Chewy', 'vw-medical-care' ),
        'Days One' => __( 'Days One', 'vw-medical-care' ),
        'Dosis' => __( 'Dosis', 'vw-medical-care' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-medical-care' ),
        'Economica' => __( 'Economica', 'vw-medical-care' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-medical-care' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-medical-care' ),
        'Francois One' => __( 'Francois One', 'vw-medical-care' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-medical-care' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-medical-care' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-medical-care' ),
        'Handlee' => __( 'Handlee', 'vw-medical-care' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-medical-care' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-medical-care' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-medical-care' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-medical-care' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-medical-care' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-medical-care' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-medical-care' ),
        'Kanit' => __( 'Kanit', 'vw-medical-care' ),
        'Lobster' => __( 'Lobster', 'vw-medical-care' ),
        'Lato' => __( 'Lato', 'vw-medical-care' ),
        'Lora' => __( 'Lora', 'vw-medical-care' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-medical-care' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-medical-care' ),
        'Merriweather' => __( 'Merriweather', 'vw-medical-care' ),
        'Monda' => __( 'Monda', 'vw-medical-care' ),
        'Montserrat' => __( 'Montserrat', 'vw-medical-care' ),
        'Muli' => __( 'Muli', 'vw-medical-care' ),
        'Marck Script' => __( 'Marck Script', 'vw-medical-care' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-medical-care' ),
        'Open Sans' => __( 'Open Sans', 'vw-medical-care' ),
        'Overpass' => __( 'Overpass', 'vw-medical-care' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-medical-care' ),
        'Oxygen' => __( 'Oxygen', 'vw-medical-care' ),
        'Orbitron' => __( 'Orbitron', 'vw-medical-care' ),
        'Patua One' => __( 'Patua One', 'vw-medical-care' ),
        'Pacifico' => __( 'Pacifico', 'vw-medical-care' ),
        'Padauk' => __( 'Padauk', 'vw-medical-care' ),
        'Playball' => __( 'Playball', 'vw-medical-care' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-medical-care' ),
        'PT Sans' => __( 'PT Sans', 'vw-medical-care' ),
        'Philosopher' => __( 'Philosopher', 'vw-medical-care' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-medical-care' ),
        'Poiret One' => __( 'Poiret One', 'vw-medical-care' ),
        'Quicksand' => __( 'Quicksand', 'vw-medical-care' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-medical-care' ),
        'Raleway' => __( 'Raleway', 'vw-medical-care' ),
        'Rubik' => __( 'Rubik', 'vw-medical-care' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-medical-care' ),
        'Russo One' => __( 'Russo One', 'vw-medical-care' ),
        'Righteous' => __( 'Righteous', 'vw-medical-care' ),
        'Slabo' => __( 'Slabo', 'vw-medical-care' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-medical-care' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-medical-care'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-medical-care' ),
        'Sacramento' => __( 'Sacramento', 'vw-medical-care' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-medical-care' ),
        'Tangerine' => __( 'Tangerine', 'vw-medical-care' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-medical-care' ),
        'VT323' => __( 'VT323', 'vw-medical-care' ),
        'Varela Round' => __( 'Varela Round', 'vw-medical-care' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-medical-care' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-medical-care' ),
        'Volkhov' => __( 'Volkhov', 'vw-medical-care' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-medical-care' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-medical-care' ),
			'100' => esc_html__( 'Thin',       'vw-medical-care' ),
			'300' => esc_html__( 'Light',      'vw-medical-care' ),
			'400' => esc_html__( 'Normal',     'vw-medical-care' ),
			'500' => esc_html__( 'Medium',     'vw-medical-care' ),
			'700' => esc_html__( 'Bold',       'vw-medical-care' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-medical-care' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-medical-care' ),
			'italic'  => esc_html__( 'Italic', 'vw-medical-care' ),
			'oblique' => esc_html__( 'Oblique', 'vw-medical-care' )
		);
	}
}
