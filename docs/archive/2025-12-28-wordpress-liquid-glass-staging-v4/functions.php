<?php
/**
 * Theme functions (WordPress.com-safe)
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function ec_welcome_setup() {
  add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'ec_welcome_setup' );

function ec_enqueue_assets() {
  wp_enqueue_style(
    'ezzi-clarity-liquid-glass-staging-v4-style',
    get_stylesheet_uri(),
    array(),
    wp_get_theme()->get( 'Version' )
  );
}
add_action( 'wp_enqueue_scripts', 'ec_enqueue_assets' );

/**
 * Resolve a page URL by slug if the page exists; otherwise fall back to a pretty URL.
 * This keeps navigation stable during initial setup.
 */
function ec_get_page_url( $slug ) {
  $slug = trim( (string) $slug, '/' );
  if ( $slug === '' ) {
    return home_url( '/' );
  }
  $page = get_page_by_path( $slug );
  if ( $page instanceof WP_Post ) {
    return get_permalink( $page->ID );
  }
  return home_url( '/' . $slug . '/' );
}

function ec_body_classes( $classes ) {
  if ( is_page( 'resources' ) ) {
    $classes[] = 'page-resources';
  }
  return $classes;
}
add_filter( 'body_class', 'ec_body_classes' );
