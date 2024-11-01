<?php

namespace OSC;

class OSC_Admin {
	public function __construct() {
		// Actions
		add_action( 'admin_menu', [ $this, 'add_options_page' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_assets' ] );
		add_action( 'wp_ajax_osc_update_options', [ $this, 'handle_update_options_request' ] );

		// Filters
		add_filter( 'admin_body_class', [ $this, 'sc_admin_body_classes' ] );
	}

	public function add_options_page() {
		add_submenu_page(
			'options-general.php',
			__( 'Sitemap Configurator', 'sitemap-configurator' ),
			__( 'Sitemap Configurator', 'sitemap-configurator' ),
			'manage_options',
			'sitemap-configurator',
			[ $this, 'options_page_content' ]
		);
	}

	public function options_page_content() {
		global $osc_options;
		require OSC_PATH . '/views/options.php';
	}

	public function enqueue_assets() {
		wp_enqueue_style( 'shared-ui', OSC_URL . '/assets/shared-ui/css/shared-ui.min.css', [], '2.10.6' );
		wp_enqueue_style( 'sui-wp-editor', OSC_URL . '/assets/shared-ui/css/sui-wp-editor.min.css', [], '2.10.6' );
		wp_enqueue_style( 'osc-admin', OSC_URL . '/assets/css/osc-admin.css', [], '0.9.0' );
		wp_enqueue_script( 'shared-ui', OSC_URL . '/assets/shared-ui/js/shared-ui.js', [ 'jquery' ], '0.9.0', true );
		wp_enqueue_script( 'osc-admin', OSC_URL . '/assets/js/osc-admin.js', [ 'jquery' ], '0.9.0', true );
	}

	public function sc_admin_body_classes( $classes ) {
		$classes .= ' sui-2-10-6 ';

		return $classes;
	}

	public function handle_update_options_request() {
		global $osc_options;

		if (
			current_user_can( 'manage_options' ) &&
			isset( $_POST['action'] ) &&
			$_POST['action'] === 'osc_update_options' &&
			isset( $_POST['form_data'] )
		) {
			parse_str( urldecode( $_POST['form_data'] ), $form_data );
			foreach ($form_data['osc_options'] as $key => $value) {
				$osc_options->set( $key, $value );
			}

			echo wp_json_encode([
				'status' => 'success',
				'message' => __( 'Options updated successfully.', 'sitemap-configurator' ),
			]);
			wp_die();
		}
	}
}