<?php
/**
 * Template Name: EN - About
 */
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="About Ezzi Clarity — a student success and experiential learning advisory led by Arva Yusuf Ezzi, MEd (OISE, University of Toronto), grounded in real experience inside Canadian universities.">
  <meta property="og:title" content="About — Ezzi Clarity Educational Consulting">
  <meta property="og:description" content="A calm, structured approach to student success and experiential learning. Founded by Arva Yusuf Ezzi, MEd (OISE, University of Toronto).">
  <meta property="og:type" content="website">
  <link rel="canonical" href="<?php echo esc_url(home_url('/en/about/')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body>

<?php get_template_part('header-en', null, ['active' => 'about', 'lang_page' => 'about/']); ?>

<main id="main-content">

  <!-- ── PAGE HEADER ──────────────────────────── -->
  <section class="page-header">
    <div class="container">
      <p class="eyebrow">About Ezzi Clarity</p>
      <h1>A calm, structured approach to student success and experiential learning.</h1>
      <p>
        Ezzi Clarity works at the intersection of institutions, students, and employers.
        Our goal is simple: clarify expectations, reduce friction, and improve outcomes — without unnecessary complexity or unrealistic promises.
      </p>
    </div>
  </section>

  <!-- ── OUR STORY ──────────────────────────── -->
  <section class="section-alt">
    <div class="container grid grid-2">
      <div>
        <p class="eyebrow">Our Story</p>
        <h2>Why Ezzi Clarity Exists</h2>
        <p>
          Ezzi Clarity was created to respond to a simple reality: the gap between what academic institutions promise
          and what students actually experience is often wide, avoidable, and costly — for everyone involved.
        </p>
        <p>
          After years working inside Canadian universities, Arva Yusuf Ezzi saw first-hand how much of the friction
          students face comes not from a lack of effort, but from a mismatch between expectations and reality — on both sides.
          Institutions design programs with good intentions. Students arrive with their own assumptions. Employers expect
          a kind of readiness that no one has explicitly taught.
        </p>
        <p>
          Ezzi Clarity was built to close that gap — practically, respectfully, and without oversimplifying the real complexity involved.
        </p>
      </div>
      <div>
        <p class="eyebrow">Our Founder</p>
        <h2>Arva Yusuf Ezzi, MEd</h2>
        <p>
          Arva holds a Master of Education from OISE, University of Toronto, with a focus on student success and
          experiential learning. She has worked in post-secondary education in Ontario, supporting students, faculty,
          and institutional programs across domestic and international contexts.
        </p>
        <p>
          Her academic and professional background spans educational consulting, experiential learning design,
          and early career transition support — with a particular focus on what it actually takes for students
          to succeed in Canadian academic environments.
        </p>
        <div style="margin-top:1.25rem;">
          <a href="<?php echo esc_url(home_url('/en/contact/')); ?>" class="btn-primary">Get in Touch</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ── VALUES ───────────────────────────────── -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">How We Work</p>
        <h2>Our Principles</h2>
      </div>
      <div class="grid grid-3">
        <div class="card card--accent">
          <p class="card-tag">Honesty</p>
          <h3>We Say What's True</h3>
          <p>We don't tell students what they want to hear or inflate expectations. We tell them what's accurate and what's actionable — which turns out to be far more useful.</p>
        </div>
        <div class="card card--accent">
          <p class="card-tag">Respect</p>
          <h3>We Respect Institutional Reality</h3>
          <p>Universities and colleges operate within real constraints. We work with those realities rather than against them, which makes our recommendations actually implementable.</p>
        </div>
        <div class="card card--accent">
          <p class="card-tag">Clarity</p>
          <h3>We Reduce, Not Add, Complexity</h3>
          <p>Every deliverable, every conversation, every recommendation is designed to make things clearer — not to demonstrate our expertise by making things more complicated.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── CTA ──────────────────────────────────── -->
  <section class="section-cta">
    <div class="container section-cta-inner">
      <div>
        <p class="eyebrow">Ready to connect?</p>
        <h2>Start with a conversation.</h2>
        <p>Tell us what you're working on and we'll tell you honestly whether and how we can help.</p>
      </div>
      <div>
        <a href="<?php echo esc_url(home_url('/en/contact/')); ?>" class="btn-primary btn-lg">Book a Free Intro Call</a>
      </div>
    </div>
  </section>

</main>

<?php get_template_part('footer-en'); ?>

</body>
</html>
