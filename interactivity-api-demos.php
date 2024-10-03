<?php
/**
 * Plugin Name:       Interactivity API Demos
 * Description:       A plugin to showcase some demos using the WordPress Interactivity API.
 * Version:           0.1.0
 * Requires at least: 6.6
 * Requires PHP:      7.2
 * Author:            40Q
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       interactivity-api-demos
 *
 * @package           create-block
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_interactivity_api_demos_blocks_init() {
	//Put here every block you want to register
	register_block_type_from_metadata( __DIR__ . '/build/simple-search-posts' );
}
add_action( 'init', 'create_interactivity_api_demos_blocks_init' );
