<?php
/**
 * The interface all shortcodes should implement.
 *
 * @since   TBD
 *
 * @package Tribe\Shortcode
 */
namespace Tribe\Shortcode;

/**
 * Interface Shortcode_Interface
 *
 * @since   TBD
 *
 * @package Tribe\Shortcode
 */
interface Shortcode_Interface {

	/**
	 * Returns the shortcode slug.
	 *
	 * The slug should be the one that will allow the shortcode to be built by the shortcode class by slug.
	 *
	 * @since  TBD
	 *
	 * @return string The shortcode slug.
	 */
	public function get_registration_slug();

	/**
	 * Configures the base variables for an instance of shortcode.
	 *
	 * @since  TBD
	 *
	 * @param array  $arguments Set of arguments passed to the Shortcode at hand.
	 * @param string $content   Contents passed to the shortcode, inside of the open and close brackets.
	 *
	 * @return void
	 */
	public function setup( $arguments, $content );

	/**
	 * Returns the arguments for the shortcode parsed correctly with defaults applied.
	 *
	 * @since  TBD
	 *
	 * @param array  $arguments Set of arguments passed to the Shortcode at hand.
	 *
	 * @return array<string,mixed> The parsed shortcode arguments map.
	 */
	public function parse_arguments( $arguments );

	/**
	 * Returns the array of arguments for this shortcode after applying the validation callbacks.
	 *
	 * @since  TBD
	 *
	 * @param array  $arguments Set of arguments passed to the Shortcode at hand.
	 *
	 * @return array<string,mixed> The validated shortcode arguments map.
	 */
	public function validate_arguments( $arguments );

	/**
	 * Returns the array of callbacks for this shortcode's arguments.
	 *
	 * @since  TBD
	 *
	 * @return array<string,mixed> A map of the shortcode arguments that have survived validation.
	 */
	public function get_validate_arguments_map();

	/**
	 * Returns a shortcode default arguments.
	 *
	 * @since  TBD
	 *
	 * @return array
	 */
	public function get_default_arguments();

	/**
	 * Returns a shortcode arguments after been parsed.
	 *
	 * @since  TBD
	 *
	 * @return array<string,mixed> The shortcode arguments, as set by the user in the shortcode string.
	 */
	public function get_arguments();

	/**
	 * Returns a shortcode argument after it has been parsed.
	 *
	 * @uses  Tribe__Utils__Array::get For index fetching and Default.
	 *
	 * @since  TBD
	 *
	 * @param array  $index   Which index we indent to fetch from the arguments.
	 * @param array  $default Default value if it doesnt exist.
	 *
	 * @return array
	 */
	public function get_argument( $index, $default = null );

	/**
	 * Returns a shortcode HTML code.
	 *
	 * @since  TBD
	 *
	 * @return string The shortcode rendered HTML code.
	 */
	public function get_html();
}
