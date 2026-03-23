<?php
function adyton_theme_setup() {
    // Let WordPress manage the <title> tag for SEO
    add_theme_support('title-tag');
    
    // Enable Featured Images on pages and posts
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'adyton_theme_setup');

function adyton_enqueue_scripts() {
    // Load your main style.css file
    wp_enqueue_style('adyton-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'adyton_enqueue_scripts');

/* ==========================================================================
   REGISTER ACF BLOCKS
   ========================================================================== */
add_action('init', 'adyton_register_acf_blocks');
function adyton_register_acf_blocks() {
    // Only run if ACF is installed and active
    if (function_exists('register_block_type')) {
        register_block_type(__DIR__ . '/blocks/hero');
        // We will add more blocks here later! (e.g., register_block_type(__DIR__ . '/blocks/metrics');)
    }
}