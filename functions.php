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
   LOAD TAILWIND IN THE GUTENBERG EDITOR
   ========================================================================== */
function adyton_enqueue_editor_tailwind() {
    ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#D4AF37', // Gold
                        background: '#0F172A', // Dark Navy
                        foreground: '#FFFFFF',
                        border: 'rgba(255,255,255,0.1)',
                        muted: 'rgba(255,255,255,0.05)'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>
    <?php
}
add_action('enqueue_block_editor_assets', 'adyton_enqueue_editor_tailwind');