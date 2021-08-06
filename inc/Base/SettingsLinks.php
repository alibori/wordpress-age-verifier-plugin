<?php

/**
 * @package PluginAgeVerifierAlibori
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class SettingsLinks extends BaseController
{
    public function register() {
        add_filter("plugin_action_links_$this->plugin_name", array($this, 'settings_link'));
    }

    public function settings_link($links) {
        $settings_link = '<a href="admin.php?page=plugin_age_verifier_alibori">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}
