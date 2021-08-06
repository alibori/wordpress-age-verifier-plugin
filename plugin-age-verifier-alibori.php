<?php

/**
 * @package PluginAgeVerifierAlibori
 */

/**
 * Plugin Name:       Age Verifier Plugin by Alibori
 * Description:       Check the age of the visitors of your site.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Axel Libori Roch
 * Author URI:        https://axeliboriroch.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       age-verifier-plugin
 */

// If thise files is called directly, abort!
defined('ABSPATH') or die('Hey, what are you doing here?');


// Require once the Composer Autoload
if(file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

// Code for the activation and deactivation of the plugin
function activate_plugin_age_verifier_alibori() {
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_plugin_age_verifier_alibori');

function deactivate_plugin_age_verifier_alibori() {
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_plugin_age_verifier_alibori');

// Initialize all the core classes of the plugin
if(class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}

// Adding Shortcodes
add_shortcode( 'age-verifier-alibori', 'showAgeVerifier' );
function showAgeVerifier() {
    $headingText = get_option('heading_text');

    return $headingText;
}
