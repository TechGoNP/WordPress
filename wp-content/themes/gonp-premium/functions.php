<?php
/**
 * Theme setup for GoNP Premium Homepage.
 */

if (! defined('ABSPATH')) {
    exit;
}

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
    register_nav_menus([
        'primary' => __('Primary Navigation', 'gonp-premium'),
        'footer'  => __('Footer Navigation', 'gonp-premium'),
    ]);
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'gonp-premium-home',
        get_template_directory_uri() . '/assets/css/home.css',
        [],
        '0.1.0'
    );

    wp_enqueue_script(
        'gonp-premium-home',
        get_template_directory_uri() . '/assets/js/home.js',
        [],
        '0.1.0',
        true
    );
});

add_filter('acf/settings/save_json', function ($path) {
    return get_template_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function ($paths) {
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
});

/**
 * Small helper so template can work with or without ACF.
 */
function gonp_field(string $key, $default = '') {
    if (function_exists('get_field')) {
        $value = get_field($key);
        if ($value !== null && $value !== '') {
            return $value;
        }
    }

    return $default;
}
