<?php

namespace OSC;

class OSC_Options {
	/**
	 * @var array
	 */
	private $options;

	/**
	 * @var string
	 */
	private $option_name = 'osc_options';

	/**
	 * OSC_Options constructor.
	 */
	public function __construct() {
		$options       = get_option( $this->option_name, [] );
		$this->options = $options;
	}

	/**
	 * Gets the site option for the given name. Returns the default value if the value does not exist.
	 *
	 * @param string $name
	 * @param mixed $default
	 *
	 * @return mixed
	 */
	public function get( $name, $default = null ) {
		if ( array_key_exists( $name, $this->options ) ) {
			return $this->options[ $name ];
		}

		return $default;
	}

	/**
	 * Removes the site option with the given name.
	 *
	 * @param string $name
	 */
	public function remove( $name ) {
		if ( array_key_exists( $name, $this->options ) ) {
			unset($this->options[$name]);
			update_option($this->option_name, $this->options);
			return true;
		}

		return false;
	}

	/**
	 * Sets a site option. Overwrites the existing site option if the name is already in use.
	 *
	 * @param string $name
	 * @param mixed $value
	 */
	public function set( $name, $value ) {
		$this->options[$name] = $value;

		update_option($this->option_name, $this->options);
	}

	// TODO: Add flush method maybe?
}