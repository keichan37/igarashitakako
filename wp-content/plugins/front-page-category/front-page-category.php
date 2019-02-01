<?php
/**
 * Plugin Name: Front Page Category
 * Version: 3.0
 * Plugin URI: http://wordpress.org/plugins/front-page-category/
 * Description: Select the categories that display on the front page.
 * Author: BinaryMoon
 * Author URI: https://prothemedesign.com/
 * License: GPLv2 or later
 * Text Domain: front-page-category
 *
 * @package front-page-category
 */

/**
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

/**
 * TODO
 * work out an elegant way to move the 'hide_categories' option to a prefixed theme mod so that users current settings don't get lost
 */


/**
 * New Process
 *
 * Change query from category__not_in to category__in so that posts in the ticked categories get displayed. Currently posts in the ticked categories will be hidden if they are also in the unticked categories.
 * In the process I can change the option name
 * Will need to be backwards compatible with the old method.
 */

/**
 * Allow the user to select what categories display on the homepage of their site
 */
class FrontPageCats {


	/**
	 * List of categories to hide
	 * @var array
	 */
	private $hide_categories = array();


	/**
	 * If there are no categories to display then this stops anything from changing.
	 *
	 * @var boolean
	 */
	private $show_all = true;


	/**
	 * Set initial values and add action hooks
	 */
	public function __construct() {

		load_plugin_textdomain( 'front-page-category', false, basename( dirname( __FILE__ ) ) . '/languages/' );

		add_action( 'customize_register', array( &$this, 'customize_register' ) );
		add_action( 'pre_get_posts', array( &$this, 'set_cats_in' ), 1, 1 );

	}


	/**
	 * Add Customizer Controls for editing visible categories
	 *
	 * @param object $wp_customize WP_Customize object.
	 */
	function customize_register( $wp_customize ) {

		include_once( 'class.fpc-category-list.php' );

		// Front Page Category Section.
		$wp_customize->add_section(
			'fpc_settings',
			array(
				'title' => esc_html__( 'Front Page Categories', 'front-page-category' ),
			)
		);

		// Should we show or hide the categories.
		$setting = 'fpc_include_exclude';

		$wp_customize->add_setting(
			$setting,
			array(
				'default' => 'exclude',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'fpc_sanitize_include_exclude'
			)
		);

		$wp_customize->add_control(
			$setting,
			array(
				'label' => esc_html__( 'The front page will', 'front-page-category' ),
				'type' => 'radio',
				'section' => 'fpc_settings',
				'choices' => array(
					'include' => 'include categories',
					'exclude' => 'exclude categories',
				)
			)
		);

		// Categories to hide/ show.
		$setting = 'hide_categories';

		$wp_customize->add_setting(
			$setting,
			array(
				'type' => 'option',
				'default' => '',
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'fpc_sanitize_categories',
			)
		);

		$wp_customize->add_control(
			new FPC_Category_List(
				$wp_customize,
				$setting,
				array(
					'label' => esc_html__( 'Select categories', 'front-page-category' ),
					'section' => 'fpc_settings',
					'description' => esc_html__( 'If no categories are selected then the blog will be displayed as normal.', 'front-page-category' ),
					'type' => 'checkbox',
				)
			)
		);

	}


	/**
	 * Override the category query
	 *
	 * @param object $query Default query parameters.
	 * @return boolean
	 */
	function set_cats_in( &$query ) {

		// Exit if we're not on the homepage.
		if ( ! is_home() ) {
			return true;
		}

		if ( ! $query->is_main_query() ) {
			return true;
		}

		// Load the category visibility.
		if ( $categories = get_option( 'hide_categories' ) ) {

			$this->hide_categories = explode( ',', $categories );
			$this->show_all = false;

		}

		// Escape early if there's nothing to change.
		if ( $this->show_all ) {
			return true;
		}

		// Exit if there's no categories to hide.
		if ( empty( $this->hide_categories ) ) {
			return true;
		}

		$query_type = 'category__not_in';

		if ( 'include' === get_theme_mod( 'fpc_include_exclude', 'exclude' ) ) {
			$query_type = 'category__in';
		}

		// Exclude the categories that should be hidden.
		$query->query_vars[ $query_type ] = $this->hide_categories;

	}

}

new FrontPageCats();


/**
 * Ensure the categories are safe to save
 * TODO: change it to check for just numbers and commas.
 *
 * @param string $categories Comma separated list of category ids.
 * @return type
 */
function fpc_sanitize_categories( $categories ) {

	return esc_html( $categories );

}


/**
 * Make sure the parameter is one of the allowed values.
 *
 * @param string $param Parameter to check.
 * @return string
 */
function fpc_sanitize_include_exclude( $param ) {

	if ( 'include' !== $param && 'exclude' !== $param ) {
		$param = 'exclude';
	}

	return $param;

}
