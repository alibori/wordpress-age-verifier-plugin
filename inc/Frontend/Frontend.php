<?php

/**
 * @package PluginAgeVerifierAlibori
 */

namespace Inc\Frontend;

// require_once WP_PLUGIN_DIR . '/plugin-age-verifier-alibori/assets/js/main.js' ;

class Frontend {

    private $plugin_url;

    public function __construct() {
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));
    }

	public function register() {
        wp_enqueue_script('ageverifieraliboriscripts', $this->plugin_url.'assets/js/main.js');

        wp_enqueue_style('ageverifieraliborystyles', $this->plugin_url.'assets/css/styles.css');

        add_action( 'wp_footer', function (){

            if (get_option('heading_text') !== null){
                $heading = get_option('heading_text');
            }else {
                exit();
            }

            if (get_option('body_text') !== null){
                $body = get_option('body_text');
            }else{
                exit();
            }

            if (get_option('confirm_button') !== null){
                $confirm = get_option('confirm_button');
            }else{
                exit();
            }

            if (get_option('negation_button') !== null){
                $negation = get_option('negation_button');
            }else{
                exit();
            }

            if (get_theme_mod( 'custom_logo' )){
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                $logo = $image[0];
            }

            echo '
                <div id="age-verifier-popup">
                        <div id="age-verifier-popup-content">
                             <img src="'.$logo.'" />
                             <h2>'.$heading.'</h2>
                             <p>'.$body.'</p>
                             <p><button class="confirm" onclick="ageVerifierConfirm()">'.$confirm.'</button><button class="negation" onclick="ageVerifierNegation()">'.$negation.'</button></p>
                        </div>
                </div>
                <script type="text/javascript">
                if (localStorage.centralDistrictAge !== "granted"){
                runAgeVerifier();
                }
                </script>
            ';
        } );
    }

}