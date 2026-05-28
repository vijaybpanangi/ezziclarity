<?php
/**
 * Template Name: Language Gateway
 */
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Ezzi Clarity Educational Consulting — student success and experiential learning advisory. Choose your language to continue.">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body>

<main class="gateway-wrap" id="main-content">
  <div class="gateway-card">

    <img
      src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-ec.svg'); ?>"
      alt="Ezzi Clarity logo"
    >

    <h1>Ezzi Clarity</h1>
    <p class="eyebrow" style="margin-bottom:0.5rem;">Educational Consulting · Ontario</p>
    <p>Student success and experiential learning advisory for students, institutions, and employers. Please choose your preferred language.</p>

    <div class="gateway-actions">
      <a class="btn-primary btn-lg" href="<?php echo esc_url(home_url('/en/')); ?>">English</a>
      <a class="btn-secondary btn-lg" href="<?php echo esc_url(home_url('/fr/')); ?>">Français</a>
      <a class="btn-secondary btn-lg" href="<?php echo esc_url(home_url('/ar/')); ?>">العربية</a>
    </div>

    <p class="small" style="margin-top:2rem; color:var(--text-soft);">
      Academic and career focused · No immigration or visa advice
    </p>

  </div>
</main>

<?php wp_footer(); ?>
</body>
</html>
