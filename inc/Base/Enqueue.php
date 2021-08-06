<?php

/**
 * @package PluginAgeVerifierAlibori
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    public function enqueue() {
        wp_enqueue_style('ageverifieraliboristyles', $this->plugin_url.'assets/css/styles.css');

        wp_enqueue_script('ageverifieraliboriscripts', $this->plugin_url.'assets/js/main.js');
    }
}
