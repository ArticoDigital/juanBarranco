<div class="wrap">
    <h1><?= esc_html(get_admin_page_title()); ?></h1>
    <form action="options.php" method="post">
        <?php
        // output security fields for the registered setting "wporg_options"
        settings_fields('WPOrg Options');
        // output setting sections and their fields
        // (sections are registered for "wporg", each field is registered to a specific section)
        do_settings_sections('WPOrg');
        // output save settings button
        submit_button('Nuevo');
        ?>
    </form>
</div>