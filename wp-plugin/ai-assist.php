<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/bogdansharp
 * @since             1.0.0
 * @package           Ai_Assist
 *
 * @wordpress-plugin
 * Plugin Name:       AI Assistant
 * Plugin URI:        https://github.com/bogdansharp
 * Description:       AI Assistant is a WordPress plugin that adds an AI-powered chat assistant to your site. It enhances the LLM's capabilities using the Retrieval-Augmented Generation (RAG) technique, allowing it to access a user-defined knowledge base. The plugin employs vector search to retrieve documents relevant to user prompts and relies on vector storage for efficient querying. A Python backend, powered by the LangChain framework, handles document processing, including chunking and vectorization.
 * Version:           1.0.0
 * Author:            Bogdan Bondarenko
 * Author URI:        https://github.com/bogdansharp/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ai-assist
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AI_ASSIST_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ai-assist-activator.php
 */
function activate_ai_assist() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ai-assist-activator.php';
	Ai_Assist_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ai-assist-deactivator.php
 */
function deactivate_ai_assist() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ai-assist-deactivator.php';
	Ai_Assist_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ai_assist' );
register_deactivation_hook( __FILE__, 'deactivate_ai_assist' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ai-assist.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ai_assist() {

	$plugin = new Ai_Assist();
	$plugin->run();

}
run_ai_assist();
