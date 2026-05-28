<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Google Help-style typography -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
    $favicon = get_template_directory_uri() . '/assets/images/logo-ec.svg';
  ?>
  <link rel="icon" type="image/svg+xml" href="<?php echo esc_url( $favicon ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
    <div class="container header-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-ec.svg' ); ?>" alt="Ezzi Clarity logo" class="brand-logo">
        <div class="brand-text">
          <span class="brand-name">Ezzi Clarity Educational Consulting</span>
          <span class="brand-tagline">Student Success and Experiential Learning Advisory</span>
          <span class="brand-founder">Founded by Arva Yusuf Ezzi, MEd (OISE, University of Toronto)</span>
        </div>
      </a>
      <nav class="main-nav">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link nav-cta">Home</a>
        <a href="<?php echo esc_url( ec_get_page_url( 'about' ) ); ?>" class="nav-link">About</a>
        <a href="<?php echo esc_url( ec_get_page_url( 'services' ) ); ?>" class="nav-link">Services</a>
        <a href="<?php echo esc_url( ec_get_page_url( 'resources' ) ); ?>" class="nav-link">Resources</a>
        <a href="<?php echo esc_url( ec_get_page_url( 'contact' ) ); ?>" class="nav-link">Contact</a>
      </nav>
    </div>
  </header>
<main id="content">
