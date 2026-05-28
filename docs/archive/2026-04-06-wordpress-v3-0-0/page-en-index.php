<?php
/**
 * Template Name: EN - Index
 */
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Ezzi Clarity Educational Consulting — student success, academic transition support, and experiential learning advisory for students, institutions, and employers across Southern Ontario.">
  <meta property="og:title" content="Ezzi Clarity — Less Noise. More Signal.">
  <meta property="og:description" content="Student success and experiential learning advisory for students, institutions, and employers across Southern Ontario.">
  <meta property="og:type" content="website">
  <link rel="canonical" href="<?php echo esc_url(home_url('/en/')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body>

<?php get_template_part('header-en', null, ['active' => 'home']); ?>

<main id="main-content">

  <!-- ── HERO ────────────────────────────────── -->
  <section class="hero">
    <div class="container hero-inner">

      <div class="hero-copy">
        <p class="eyebrow">Educational Consulting · Ontario</p>
        <h1>Less Noise.<br>More Signal.</h1>
        <p>
          We help students navigate Canadian academic systems, support institutions building better experiential
          learning programs, and guide employers engaging early-career talent — with clarity, not complexity.
        </p>
        <div class="hero-actions">
          <a href="<?php echo esc_url(home_url('/en/contact/')); ?>" class="btn-primary btn-lg">Book an Intro Call</a>
          <a href="<?php echo esc_url(home_url('/en/services/')); ?>" class="btn-secondary">Explore Services</a>
        </div>
        <p class="hero-footnote">Academic and career focused only. No immigration or visa advice provided.</p>
      </div>

      <div class="hero-panel">
        <div class="hero-visual">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-ecosystem.png'); ?>"
               alt="Students, institutions and employers working together"
               loading="eager">
        </div>
        <aside class="hero-card">
          <p class="eyebrow">Who We Work With</p>
          <ul class="checklist">
            <li>Universities and colleges strengthening experiential learning and student success programs.</li>
            <li>Domestic and international students navigating Canadian academic expectations.</li>
            <li>Employers building more intentional early-career talent pipelines.</li>
          </ul>
        </aside>
      </div>

    </div>
  </section>

  <!-- ── TRUST BAR ─────────────────────────────── -->
  <div class="trust-bar">
    <div class="container trust-bar-inner">
      <span class="trust-item">Southern Ontario based</span>
      <span class="trust-item">MEd — OISE, University of Toronto</span>
      <span class="trust-item">Students · Institutions · Employers</span>
      <span class="trust-item">English · Français · العربية</span>
    </div>
  </div>

  <!-- ── WHAT WORKING WITH US FEELS LIKE ────────── -->
  <section class="section-alt">
    <div class="container">
      <div class="section-header" style="text-align:center; margin-bottom:2.5rem;">
        <p class="eyebrow">Our Approach</p>
        <h2>What Working With Us Feels Like</h2>
      </div>

      <div class="section-visual section-visual--feels">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/section-feels-ezzi.png'); ?>"
             alt="Calm and structured learning environment" loading="lazy">
      </div>

      <div class="grid grid-3" style="margin-top:2rem;">
        <div class="card card--accent">
          <p class="card-tag">Clarity</p>
          <h3>Clarity Over Complexity</h3>
          <p>We translate policies, expectations, and program requirements into plain language and practical steps — for students, staff, and employers alike.</p>
        </div>
        <div class="card card--accent">
          <p class="card-tag">Experience</p>
          <h3>Grounded in Real Experience</h3>
          <p>Our work is shaped by direct experience inside Canadian universities and a first-hand understanding of how students actually engage with academic systems.</p>
        </div>
        <div class="card card--accent">
          <p class="card-tag">Structure</p>
          <h3>Warm, Professional, Structured</h3>
          <p>We bring a calm, organized, and culturally aware approach that respects both institutional realities and individual student needs.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── CORE SERVICES ──────────────────────────── -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Service Overview</p>
        <h2>Our Core Service Areas</h2>
        <p>Focused, practical support across the student–institution–employer ecosystem.</p>
      </div>

      <div class="grid grid-3">
        <article class="service-card card-inst">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/services-institution.png'); ?>"
                 alt="Faculty and staff collaborating" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill inst">Institutions</span>
            <h3>Institutional Services</h3>
            <p>Support for universities and colleges strengthening experiential education, international student integration, and academic success initiatives.</p>
            <ul class="checklist">
              <li>Experiential education program development</li>
              <li>International student transition support</li>
              <li>Academic success and retention programming</li>
            </ul>
          </div>
        </article>

        <article class="service-card card-stud">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/services-student.png'); ?>"
                 alt="Student and advisor in conversation" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill stud">Students</span>
            <h3>Student Services</h3>
            <p>One-on-one and small-group support for students navigating academic expectations and early career decisions in Canada.</p>
            <ul class="checklist">
              <li>Academic and career transition coaching</li>
              <li>Professional communication workshops</li>
              <li>Study strategies and learning skills</li>
            </ul>
          </div>
        </article>

        <article class="service-card card-empl">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/services-employer.png'); ?>"
                 alt="Employer speaking with early career talent" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill empl">Employers</span>
            <h3>Employer Services</h3>
            <p>Guidance for employers wanting to engage students and graduates in a more consistent, student-aware way.</p>
            <ul class="checklist">
              <li>Early career talent engagement strategy</li>
              <li>Student-ready onboarding frameworks</li>
              <li>Workplace expectation alignment</li>
            </ul>
          </div>
        </article>
      </div>

      <div style="text-align:center; margin-top:2rem;">
        <a href="<?php echo esc_url(home_url('/en/services/')); ?>" class="btn-secondary">View All Services</a>
      </div>
    </div>
  </section>

  <!-- ── CTA BANNER ────────────────────────────── -->
  <section class="section-cta">
    <div class="container section-cta-inner">
      <div>
        <p class="eyebrow">Ready to get started?</p>
        <h2>Let's talk about your specific context.</h2>
        <p>Whether you're a student, an institution, or an employer — the conversation starts with understanding your situation.</p>
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
