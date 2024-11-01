<?php

namespace OSC;

class OSC_Activator {
	/**
	 * @var string
	 */
	private $options_name = 'osc_options';

	private $default_options = [
		'enable_posts' => '1',
		'enable_pages' => '1',
		'enable_users' => '1',
		'enable_tags' => '1',
		'enable_categories' => '1',
		// 'enable_attachments' => '0',
	];

	public function __construct() {
		// Set options to default if does not exist
		$options = get_option( $this->options_name, null );
		if ( null === $options ) {
			update_option($this->options_name, $this->default_options);
		}
	}
}