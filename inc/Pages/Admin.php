<?php

/**
 * @package PluginAgeVerifierAlibori
 */

namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;
    public $callbacks;
    public $pages = array();
    public $subpages = array();

    public function register() {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubpages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage('General')->addSubPages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(    
                'page_title' => 'Age Verifier',
                'menu_title' => 'Age Verifier',
                'capability' => 'manage_options',
                'menu_slug' => 'plugin_age_verifier_alibori',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-hidden',
                'position' => 110
            )
        );
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'plugin_age_verifier_alibori',
                'page_title' => 'Advanced',
                'menu_title' => 'Advanced',
                'capability' => 'manage_options',
                'menu_slug' => 'plugin_age_verifier_alibori_advanced',
                'callback' => array($this->callbacks, 'adminAdvanced')
            )
        );
    }

    public function setSettings()
    {
        $args = array(
            [
                "option_group" => "age_verifier_options_group",
                "option_name" => "heading_text",
                "callback" => array($this->callbacks, 'ageVerifierOptionsGroup')
            ],
            [
                "option_group" => "age_verifier_options_group",
                "option_name" => "body_text",
                "callback" => array($this->callbacks, 'ageVerifierOptionsGroup')
            ],
            [
                "option_group" => "age_verifier_options_group",
                "option_name" => "confirm_button",
                "callback" => array($this->callbacks, 'ageVerifierOptionsGroup')
            ],
            [
                "option_group" => "age_verifier_options_group",
                "option_name" => "negation_button",
                "callback" => array($this->callbacks, 'ageVerifierOptionsGroup')
            ]
        );

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            "id" => "age_verifier_admin_index",
            "title" => "General Settings",
            "callback" => array($this->callbacks, 'ageVerifierAdminSection'),
            "page" => "plugin_age_verifier_alibori"
        );

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array(
            [
                "id" => "heading_text",
                "title" => "Heading Text",
                "callback" => array($this->callbacks, 'ageVerifierHeadingText'),
                "page" => "plugin_age_verifier_alibori",
                "section" => "age_verifier_admin_index",
                "args" => array(
                    "label_for" => "heading_text",
                    "class" => "example-class"
                )
            ],
            [
                "id" => "body_text",
                "title" => "Body Text",
                "callback" => array($this->callbacks, 'ageVerifierBodyText'),
                "page" => "plugin_age_verifier_alibori",
                "section" => "age_verifier_admin_index",
                "args" => array(
                    "label_for" => "body_text",
                    "class" => "example-class"
                )
            ],
            [
                "id" => "confirm_button",
                "title" => "Confirm Button Text",
                "callback" => array($this->callbacks, 'ageVerifierConfirmButtonText'),
                "page" => "plugin_age_verifier_alibori",
                "section" => "age_verifier_admin_index",
                "args" => array(
                    "label_for" => "confirm_button",
                    "class" => "example-class"
                )
            ],
            [
                "id" => "negation_button",
                "title" => "Negation Button Text",
                "callback" => array($this->callbacks, 'ageVerifierNegationButtonText'),
                "page" => "plugin_age_verifier_alibori",
                "section" => "age_verifier_admin_index",
                "args" => array(
                    "label_for" => "negation_button",
                    "class" => "example-class"
                )
            ]
        );

        $this->settings->setFields($args);
    }
}