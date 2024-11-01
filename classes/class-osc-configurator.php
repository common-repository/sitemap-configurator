<?php

namespace OSC;

class OSC_Configurator {
	public function __construct() {
		add_filter( 'wp_sitemaps_post_types', [ $this, 'filter_post_types' ] );
		add_filter( 'wp_sitemaps_taxonomies', [ $this, 'filter_taxonomies' ] );
		add_filter( 'wp_sitemaps_add_provider', [ $this, 'provider' ], 10, 2 );
	}

	/**
	 * Filter post types
	 *
	 * @param $post_types
	 *
	 * @since 0.9.0
	 */
	public function filter_post_types( $post_types ) {
		global $osc_options;

		// Check posts
		$enable_posts = $osc_options->get( 'enable_posts', 0 );
		if ( 1 != $enable_posts ) {
			unset( $post_types['post'] );
		}

		// Check pages
		$enable_pages = $osc_options->get( 'enable_pages', 0 );
		if ( 1 != $enable_pages ) {
			unset( $post_types['page'] );
		}

		// Check attachments
		// $enable_attachments = $osc_options->get( 'enable_attachments', 0 );
		// if (1 == $enable_attachments) {
		// 	$attachmentType = get_post_type_object('attachment');
		// 	$post_types['attachment'] = $attachmentType;
		// }

		return $post_types;
	}

	/**
	 * Filter post types
	 *
	 * @param $taxonomies
	 *
	 * @since 0.9.0
	 */
	public function filter_taxonomies( $taxonomies ) {
		global $osc_options;

		// Check posts
		$enable_tags = $osc_options->get( 'enable_tags', 0 );
		if ( 1 != $enable_tags ) {
			unset( $taxonomies['post_tag'] );
		}

		// Check pages
		$enable_categories = $osc_options->get( 'enable_categories', 0 );
		if ( 1 != $enable_categories ) {
			unset( $taxonomies['category'] );
		}

		return $taxonomies;
	}

	/**
	 * @param $provider
	 * @param $name
	 *
	 * @since 0.9.0
	 */
	public function provider( $provider, $name ) {
		global $osc_options;

		if ( $name === 'users' ) {
			$enable_users = $osc_options->get( 'enable_users', 0 );
			if ( 1 != $enable_users ) {
				return false;
			}
		}

		return $provider;
	}
}