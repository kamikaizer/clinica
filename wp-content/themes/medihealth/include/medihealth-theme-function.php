<?php
/**
 * Extra Theme Function
 *
 * @package MediHealth Premium WordPress theme
 */

/**
 * Get sticky main menu class name.
 *
 * @return string
 */
function medihealth_sticky_main_menu_class() {
	$sticky_main_menu = get_theme_mod( 'medihealth_sticky_header', 1 );

	if ( $sticky_main_menu == 1 ) {
		return 'site-menu-content--sticky';
	}

	return '';
}

?>