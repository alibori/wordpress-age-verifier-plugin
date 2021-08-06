<div class="wrap">
    <h1>Age Verifier Plugin by Alibori</h1>
    <h2>General Settings</h2>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
            settings_fields('age_verifier_options_group');
            do_settings_sections('plugin_age_verifier_alibori');
            submit_button();
        ?>
    </form>
</div>
