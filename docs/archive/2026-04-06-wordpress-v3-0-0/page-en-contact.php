<?php
/**
 * Template Name: EN - Contact
 */
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Contact Ezzi Clarity — book an intro call or reach us by phone or email. Based in Waterloo Region, Ontario.">
  <meta property="og:title" content="Contact — Ezzi Clarity Educational Consulting">
  <meta property="og:description" content="Book a free intro call or reach us directly. We're based in Waterloo Region, Ontario and always happy to talk.">
  <meta property="og:type" content="website">
  <link rel="canonical" href="<?php echo esc_url(home_url('/en/contact/')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body>

<?php get_template_part('header-en', null, ['active' => 'contact', 'lang_page' => 'contact/']); ?>

<main id="main-content">

  <!-- ── PAGE HEADER ──────────────────────────── -->
  <section class="page-header">
    <div class="container">
      <p class="eyebrow">We'd love to hear from you</p>
      <h1>Every conversation<br>starts with listening.</h1>
      <p>The best first step is a short intro call — no commitment, just a focused conversation about where you are and how we might be able to help.</p>
      <div class="hero-actions">
        <a class="btn-primary btn-lg" href="https://book.titan.email/ezziclarity/intro" target="_blank" rel="noopener noreferrer">
          Book an Intro Call
        </a>
        <a class="btn-secondary" href="tel:+16475059487">Call Us Now</a>
      </div>
    </div>
  </section>

  <!-- ── CONTACT LAYOUT ───────────────────────── -->
  <section class="section">
    <div class="container">
      <div class="contact-layout">

        <!-- LEFT: Contact details -->
        <div class="card contact-form contact-card">
          <h2 style="margin-top:0;">Contact Information</h2>
          <p class="muted">Mobile is the fastest way to reach us. If we miss you, leave a voicemail and we'll call you back promptly.</p>

          <ul class="contact-list">
            <li>
              <strong>Mobile (fastest):</strong>
              <a href="tel:+16475059487"><span class="ltr">+1 (647) 505-9487</span></a>
            </li>
            <li>
              <strong>Office:</strong>
              <a href="tel:+12263368100"><span class="ltr">+1 (226) 336-8100</span></a>
            </li>
            <li>
              <strong>Email:</strong>
              <a href="mailto:info@ezziclarity.ca"><span class="ltr">info@ezziclarity.ca</span></a>
            </li>
          </ul>

          <h3 style="margin-top:1.5rem; margin-bottom:0.4rem;">Business Address</h3>
          <p class="muted" style="margin-bottom:0;">180 Northfield Drive West, Unit 4, 1st Floor<br>Waterloo, ON N2L 0C7, Canada</p>

          <h3 style="margin-top:1.25rem; margin-bottom:0.4rem;">Registered Office</h3>
          <p class="muted" style="margin-bottom:0;">650 West Georgia Street, Suite 2110<br>Vancouver, BC V6B 4N8, Canada</p>

          <div style="margin-top:1.5rem; padding-top:1.25rem; border-top:1px solid var(--border);">
            <a class="btn-primary" href="https://book.titan.email/ezziclarity/intro" target="_blank" rel="noopener noreferrer" style="width:100%; justify-content:center;">
              Book a Free Intro Call →
            </a>
          </div>

          <p class="small muted" style="margin-top:1rem; margin-bottom:0;">
            All services are academic, career, and institution-focused. We do not provide immigration or visa advice.
          </p>
        </div>

        <!-- RIGHT: Image + Map -->
        <div style="display:grid; gap:1.25rem;">

          <div class="card" style="padding:0; overflow:hidden; border-radius:var(--r-lg);">
            <img
              src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/contact-advisor-student.png'); ?>"
              alt="Advisor and student in conversation"
              style="width:100%; height:240px; object-fit:cover; border-radius:var(--r-lg); display:block; box-shadow:none;"
              loading="lazy"
            />
          </div>

          <div class="card">
            <h3 style="margin-top:0; margin-bottom:0.75rem;">Business Office</h3>
            <div style="border-radius:var(--r-md); overflow:hidden; border:1px solid var(--border);">
              <iframe
                title="Ezzi Clarity business office location"
                src="https://www.google.com/maps?q=180%20Northfield%20Drive%20West%20Unit%204%20Waterloo%20ON%20N2L0C7&output=embed"
                width="100%" height="220"
                style="border:0; display:block;"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

</main>

<?php get_template_part('footer-en'); ?>

</body>
</html>
