<?php

namespace App;

use function Roots\asset;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);

    $wp_customize->add_section('metras_settings_scheme', array(
        'title'    => __('Metras Config', 'sage'),
        'description' => '',
        'priority' => 120,
    ));

    //  =============================
    //  = SOUNDCLOUD                =
    //  =============================
    $wp_customize->add_setting('metras_settings_option[soundcloud_client_id]', array(
        'default'        => 'uzhloVwKlWX9bzQ5F1mrqQdjYxKEqDRM',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('metras_soundcloud_client_id', array(
        'label'      => __('SounudCloud client ID', 'sage'),
        'section'    => 'metras_settings_scheme',
        'settings'   => 'metras_settings_option[soundcloud_client_id]',
    ));

    $wp_customize->add_setting('metras_settings_option[soundcloud_resolve_url]', array(
        'default'        => 'https://api-v2.soundcloud.com/resolve',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
    $wp_customize->add_control('metras_soundcloud_resolve_url', array(
        'label'      => __('SounudCloud Resolve URL', 'sage'),
        'section'    => 'metras_settings_scheme',
        'settings'   => 'metras_settings_option[soundcloud_resolve_url]',
    ));

    $wp_customize->add_setting('metras_settings_option[corona_link]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
    $wp_customize->add_control('metras_corona_link', array(
        'label'      => __('Corona Page Link', 'sage'),
        'section'    => 'metras_settings_scheme',
    'settings'   => 'metras_settings_option[corona_link]',
    ));
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset('scripts/customizer.js'), ['customize-preview'], null, true);
});
