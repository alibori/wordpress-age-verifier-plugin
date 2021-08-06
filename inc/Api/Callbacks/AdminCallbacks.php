<?php

/**
 * @package PluginAgeVerifierAlibori
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function adminAdvanced()
    {
        return require_once("$this->plugin_path/templates/admin_advanced.php");
    }

    public function ageVerifierOptionsGroup($input)
    {
        return $input;
    }

    public function ageVerifierAdminSection()
    {
        echo 'Here you can set the general settings';
    }

    public function ageVerifierHeadingText()
    {
        $value = esc_attr(get_option('heading_text'));

        echo '<input type="text" class="regular-text" name="heading_text" value="'.$value.'" placeholder="Write the heading here" />';
    }

    public function ageVerifierBodyText()
    {
        $value = esc_attr(get_option('body_text'));

        echo '<textarea name="body_text" rows="10" cols="50">'.$value.'</textarea>';
    }

    public function ageVerifierConfirmButtonText()
    {
        $value = esc_attr(get_option('confirm_button'));

        echo '<input type="text" class="regular-text" name="confirm_button" value="'.$value.'" placeholder="Write the text here" />';
    }

    public function ageVerifierNegationButtonText()
    {
        $value = esc_attr(get_option('negation_button'));

        echo '<input type="text" class="regular-text" name="negation_button" value="'.$value.'" placeholder="Write the text here" />';
    }
}