<?php

namespace Tribe\Widget;

use Tribe\Events\Views\V2\View_Interface;

/**
 * Interface Widget_Interface
 *
 * @since   TBD
 *@package Tribe\Widget
 *
 */
interface Widget_Interface {

	/**
	 * Constructor for V2 Widgets.
	 *
	 * @since TBD
	 *
	 * @param string $id_base         Optional. Base ID for the widget, lowercase and unique. If left empty,
	 *                                a portion of the widget's class name will be used. Has to be unique.
	 * @param string $name            Name for the widget displayed on the configuration page.
	 * @param array<string,mixed>  $widget_options  Optional. Widget options. See wp_register_sidebar_widget() for
	 *                                information on accepted arguments. Default empty array.
	 * @param array  $control_options Optional. Widget control options. See wp_register_widget_control() for
	 *                                information on accepted arguments. Default empty array.
	 */
	public function __construct( $id_base = '', $name = '', $widget_options = [], $control_options = [] );

	/**
	 * Echoes the widget content.
	 *
	 * @since TBD
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance The settings for the particular instance of the widget.
	 */
	public function widget( $args, $instance );

	/**
	 * Updates a particular instance of a widget.
	 *
	 * This function should check that `$new_instance` is set correctly. The newly-calculated
	 * value of `$instance` should be returned. If false is returned, the instance won't be
	 * saved/updated.
	 *
	 * @since TBD
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 *
	 * @return array Settings to save or bool false to cancel saving.
	 */
	public function update( $new_instance, $old_instance );

	/**
	 * Outputs the settings update form.
	 *
	 * @since TBD
	 *
	 * @param array $instance Current settings.
	 *
	 * @return string Default return is 'noform'.
	 */
	public function form( $instance );

	/**
	 * Returns the widget slug that allows the widget to be built via the widget class by slug.
	 *
	 * @since TBD
	 *
	 * @return string The widget slug.
	 */
	public function get_registration_slug();

	/**
	 * Sets the aliased arguments array.
	 *
	 * @see Tribe__Utils__Array::parse_associative_array_alias() The expected format.
	 *
	 * @since TBD
	 *
	 * @param array $alias_map An associative array of aliases: key as alias, value as mapped canonical.
	 *                         Example: [ 'alias' => 'canonical', 'from' => 'to', 'that' => 'becomes_this' ]
	 */
	public function set_aliased_arguments( array $alias_map );

	/**
	 * Gets the aliased arguments array.
	 *
	 * @since TBD
	 *
	 * @return array<string,string> The associative array map of aliases and their canonical arguments.
	 */
	public function get_aliased_arguments();

	/**
	 * Returns the arguments for the widget parsed correctly with defaults applied.
	 *
	 * @since TBD
	 *
	 * @param array $arguments Set of arguments passed to the Widget at hand.
	 *
	 * @return array<string,mixed> The parsed widget arguments map.
	 */
	public function parse_arguments( array $arguments );

	/**
	 * Returns the array of arguments for this widget after applying the validation callbacks.
	 *
	 * @since TBD
	 *
	 * @param array $arguments Set of arguments passed to the Widget at hand.
	 *
	 * @return array<string,mixed> The validated widget arguments map.
	 */
	public function validate_arguments( array $arguments );

	/**
	 * Returns the array of callbacks for this widget's arguments.
	 *
	 * @since TBD
	 *
	 * @return array<string,mixed> A map of the widget arguments that have survived validation.
	 */
	public function get_validated_arguments_map();

	/**
	 * Returns a widget arguments after been parsed.
	 *
	 * @since TBD
	 *
	 * @return array<string,mixed> The widget arguments, as set by the user in the widget string.
	 */
	public function get_arguments();

	/**
	 * Returns a widget arguments after been parsed.
	 *
	 * @since TBD
	 *
	 * @param array  $arguments Current set of arguments.
	 *
	 * @return array<string,mixed> The widget arguments, as set by the user in the widget string.
	 */
	public function filter_arguments( $arguments );

	/**
	 * Returns a widget argument after it has been parsed and filtered.
	 *
	 * @since TBD
	 *
	 * @param array|string $index   Which index we indent to fetch from the arguments.
	 * @param array        $default Default value if it doesn't exist.
	 *
	 * @uses  Tribe__Utils__Array::get For index fetching and Default.
	 *
	 * @return mixed Value for the Index passed as the first argument.
	 */
	public function get_argument( $index, $default = null );

	/**
	 * Filter a widget argument.
	 *
	 * @since TBD
	 *
	 * @param mixed        $argument The argument value.
	 * @param array|string $index    Which index we indent to fetch from the arguments.
	 * @param array        $default  Default value if it doesn't exist.
	 *
	 * @uses  Tribe__Utils__Array::get For index fetching and Default.
	 *
	 * @return mixed Value for the Index passed as the first argument.
	 */
	public function filter_argument( $argument, $index, $default = null );

	/**
	 * Returns a widget default arguments.
	 *
	 * @since TBD
	 *
	 * @return array<string,mixed> The widget default arguments map.
	 */
	public function get_default_arguments();

	/**
	 * Returns a widget default arguments.
	 *
	 * @since TBD
	 *
	 * @param array  $default_arguments Current set of default arguments.
	 *
	 * @return array<string,mixed> The widget default arguments map.
	 */
	public function filter_default_arguments( $default_arguments );

	/**
	 * Returns a widget's HTML.
	 *
	 * @since TBD
	 *
	 * @return string The widget rendered HTML code.
	 */
	public function get_html();

	/**
	 * Sets the template view.
	 *
	 * @since TBD
	 *
	 * @param View_Interface  $view  Which view we are using this template on.
	 */
	public function set_view( View_Interface $view );

	/**
	 * Returns the current template view, either set in the constructor or using the `set_view` method.
	 *
	 * @since TBD
	 *
	 * @return View_Interface The current template view.
	 */
	public function get_view();
}
