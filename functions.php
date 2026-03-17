<?php
/* ==========================================================================
   INITIALIZE THEME ASSETS
   ========================================================================== */
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

/* ==========================================================================
   AUTO-CREATE WORDPRESS PAGES FOR REACT ROUTER
   ========================================================================== */
function adyton_auto_create_react_pages() {
    // We set an option in the database so this only runs once and doesn't slow down your site
    if (get_option('adyton_react_pages_created')) {
        return;
    }

    // A list of all your React pages from src/pages
    // 'slug' => 'Page Title'
    $react_pages = array(
        'about'             => 'About',
        'contact'           => 'Contact',
        'feni-island'       => 'Feni Island',
        'fergusson-island'  => 'Fergusson Island',
        'investors'         => 'Investors',
        'news'              => 'News',
        'projects'          => 'Projects',
        'why-adyton'        => 'Why Adyton',
        'why-png'           => 'Why PNG'
    );

    foreach ($react_pages as $slug => $title) {
        // Check if the page already exists in WordPress
        $page_check = get_page_by_path($slug);
        
        if (!isset($page_check->ID)) {
            // If it doesn't exist, create it programmatically
            $new_page = array(
                'post_type'    => 'page',
                'post_title'   => $title,
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_author'  => 1, // Assigns the page to the default admin user
            );
            wp_insert_post($new_page);
        }
    }

    // Flag that the script has run successfully so it doesn't run again
    update_option('adyton_react_pages_created', true);
}

// Hook this to run when you load the WordPress admin dashboard
add_action('admin_init', 'adyton_auto_create_react_pages');

/* ==========================================================================
   REACT COMPONENT SHORTCODE BRIDGE
   ========================================================================== */
function adyton_react_shortcode($atts) {
    // Extract the component name from the shortcode
    $attributes = shortcode_atts(array(
        'name' => '',
    ), $atts);
    
    // If no component name is provided, output nothing
    if (empty($attributes['name'])) {
        return '';
    }
    
    // Output the empty mounting div for React to find later
    return '<div class="adyton-react-mount" data-component="' . esc_attr($attributes['name']) . '"></div>';
}

// Register the shortcode [react_component]
add_shortcode('react_component', 'adyton_react_shortcode');