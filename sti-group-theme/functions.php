<?php
/**
 * STI Group Theme Functions
 *
 * @package STI_Group
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function sti_group_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    add_image_size('sti-hero', 1920, 1080, true);
    add_image_size('sti-product', 800, 600, true);
    add_image_size('sti-card', 600, 450, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'sti-group'),
        'footer'  => esc_html__('Footer Menu', 'sti-group'),
    ));

    // Switch default core markup for various elements to HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add support for custom background
    add_theme_support('custom-background');

    // Add support for custom header
    add_theme_support('custom-header', array(
        'default-image'      => '',
        'width'              => 1920,
        'height'             => 1080,
        'flex-width'         => true,
        'flex-height'        => true,
    ));

    // Add support for align wide blocks
    add_theme_support('align-wide');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for editor styles
    add_theme_support('editor-styles');

    // Add custom editor color palette
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => esc_html__('Indigo', 'sti-group'),
            'slug'  => 'indigo',
            'color' => '#6366f1',
        ),
        array(
            'name'  => esc_html__('Purple', 'sti-group'),
            'slug'  => 'purple',
            'color' => '#8b5cf6',
        ),
        array(
            'name'  => esc_html__('Pink', 'sti-group'),
            'slug'  => 'pink',
            'color' => '#ec4899',
        ),
        array(
            'name'  => esc_html__('Dark', 'sti-group'),
            'slug'  => 'dark',
            'color' => '#0f0f1e',
        ),
    ));
}
add_action('after_setup_theme', 'sti_group_setup');

/**
 * Enqueue scripts and styles
 */
function sti_group_scripts() {
    // Google Fonts
    wp_enqueue_style('sti-group-google-fonts', 
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=SF+Pro+Display:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Tailwind CSS CDN (for development - compile for production)
    wp_enqueue_script('tailwindcss', 
        'https://cdn.tailwindcss.com',
        array(),
        '3.4.0',
        false
    );

    // Main stylesheet
    wp_enqueue_style('sti-group-style', 
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );

    // Main JavaScript
    wp_enqueue_script('sti-group-main', 
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );

    // Localize script for AJAX
    wp_localize_script('sti-group-main', 'stiGroupAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('sti_group_nonce'),
    ));

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'sti_group_scripts');

/**
 * Register widget areas
 */
function sti_group_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'sti-group'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'sti-group'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer', 'sti-group'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add footer widgets here.', 'sti-group'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'sti_group_widgets_init');

/**
 * Custom excerpt length
 */
function sti_group_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'sti_group_excerpt_length');

/**
 * Custom excerpt more
 */
function sti_group_excerpt_more($more) {
    return '…';
}
add_filter('excerpt_more', 'sti_group_excerpt_more');

/**
 * Custom template parts
 */
function sti_group_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_html(get_the_modified_date())
    );

    echo '<span class="posted-on">' . $time_string . '</span>';
}

function sti_group_posted_by() {
    echo '<span class="byline"> ' . sprintf(
        esc_html_x('by %s', 'post author', 'sti-group'),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );
    echo '</span>';
}

/**
 * Customizer additions
 */
function sti_group_customize_register($wp_customize) {
    // Contact Info Section
    $wp_customize->add_section('sti_group_contact', array(
        'title'    => esc_html__('Contact Information', 'sti-group'),
        'priority' => 30,
    ));

    // Phone
    $wp_customize->add_setting('sti_phone', array(
        'default'           => '+7 (999) 123-45-67',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('sti_phone', array(
        'label'   => esc_html__('Phone Number', 'sti-group'),
        'section' => 'sti_group_contact',
        'type'    => 'text',
    ));

    // Email
    $wp_customize->add_setting('sti_email', array(
        'default'           => 'info@stigroup.ru',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('sti_email', array(
        'label'   => esc_html__('Email Address', 'sti-group'),
        'section' => 'sti_group_contact',
        'type'    => 'email',
    ));

    // Address
    $wp_customize->add_setting('sti_address', array(
        'default'           => 'Сочи, ул. Примерная, 123',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('sti_address', array(
        'label'   => esc_html__('Address', 'sti-group'),
        'section' => 'sti_group_contact',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'sti_group_customize_register');

/**
 * SVG Icons
 */
function sti_group_get_icon($icon_name) {
    $icons = array(
        'phone' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>',
        'email' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>',
        'location' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>',
        'arrow-right' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>',
        'check' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>',
    );

    return isset($icons[$icon_name]) ? $icons[$icon_name] : '';
}
