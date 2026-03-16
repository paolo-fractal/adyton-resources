<?php
function adyton_enqueue_lovable_assets() {
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    // Find the compiled CSS file
    $css_files = glob($theme_dir . '/dist/assets/*.css');
    if (!empty($css_files)) {
        $css_file = basename($css_files[0]);
        wp_enqueue_style('adyton-style', $theme_uri . '/dist/assets/' . $css_file, array(), null);
    }

    // Find the compiled JS file
    $js_files = glob($theme_dir . '/dist/assets/*.js');
    if (!empty($js_files)) {
        $js_file = basename($js_files[0]);
        wp_enqueue_script('adyton-script', $theme_uri . '/dist/assets/' . $js_file, array(), null, true);
    }
}
add_action('wp_enqueue_scripts', 'adyton_enqueue_lovable_assets');