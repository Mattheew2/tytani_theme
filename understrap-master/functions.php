<?php

/**
 * UnderStrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ($understrap_includes as $file) {
	require_once get_template_directory() . '/inc' . $file;
}
function acf_orphans($value, $post_id, $field)
{
	if (class_exists('iworks_orphan')) {
		$orphan = new \iworks_orphan();
		$value = $orphan->replace($value);
	}
	return $value;
}
add_filter('acf/format_value/type=textarea', 'acf_orphans', 10, 3);
add_filter('acf/format_value/type=wysiwyg', 'acf_orphans', 10, 3);

add_shortcode('fb_link', 'fb_link_if');
function fb_link_if()
{
	if (get_the_id() == 11 || $post->post_parent == 11) {
		$fb = '<a class="fb_link" href="https://www.facebook.com/PerelkiTytanow/">FACEBOOK</a>';
	} else {
		$fb = '<a class="fb_link" href="https://www.facebook.com/TytaniLublin/">FACEBOOK</a>';
	}
	return $fb;
}
