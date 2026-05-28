<?php
if (!defined('ABSPATH')) { exit; }

function ec_mlg_enqueue_assets() {
  wp_enqueue_style('ec-mlg-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'ec_mlg_enqueue_assets');

add_theme_support('title-tag');
add_theme_support('post-thumbnails');
?>
