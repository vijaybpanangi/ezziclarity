<?php
/**
 * Template Name: EN - Services
 */
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Ezzi Clarity services for institutions, students and employers — experiential learning, academic transition coaching, and early career talent engagement across Southern Ontario.">
  <meta property="og:title" content="Services — Ezzi Clarity Educational Consulting">
  <meta property="og:description" content="Warm, structured support for institutions, students and employers across the education-to-career ecosystem.">
  <meta property="og:type" content="website">
  <link rel="canonical" href="<?php echo esc_url(home_url('/en/services/')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body>

<?php get_template_part('header-en', null, ['active' => 'services', 'lang_page' => 'services/']); ?>

<main id="main-content">

  <!-- ── PAGE HEADER ──────────────────────────── -->
  <section class="page-header">
    <div class="container">
      <p class="eyebrow">Our Services</p>
      <h1>Real support, wherever you are<br>in the journey.</h1>
      <p>
        Whether you're a student finding your footing, an institution building better programs, or an employer
        engaging the next generation of talent — we meet you where you are with practical, honest guidance.
      </p>
    </div>
  </section>

  <!-- ── THREE SERVICE CARDS ──────────────────── -->
  <section class="section-alt">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">What we offer</p>
        <h2>Three areas of focused support</h2>
        <p>Each service is designed around real needs — not abstract frameworks. Practical, achievable, and right-sized.</p>
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
            <p>Support for universities and colleges that want to strengthen experiential learning, international student integration, and academic success programming.</p>
            <ul class="checklist">
              <li>Experiential education program development</li>
              <li>International student integration support</li>
              <li>Academic success program design</li>
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
            <p>Academic and career transition support for domestic and international students who would benefit from structured guidance and clear expectations.</p>
            <ul class="checklist">
              <li>Academic and career transition coaching</li>
              <li>Professional communication workshops</li>
              <li>Study strategy and learning skills support</li>
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
            <p>Campus recruitment and early talent engagement advisory for employers who work with students and new graduates.</p>
            <ul class="checklist">
              <li>Campus recruitment strategy</li>
              <li>Early talent engagement planning</li>
              <li>Employer brand positioning for students</li>
            </ul>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── HOW WE WORK ───────────────────────────── -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">How we work</p>
        <h2>A process built on listening first</h2>
        <p>Every engagement starts with a genuine conversation — we need to understand your situation before we can offer anything useful.</p>
      </div>
      <div class="process process-two-column">
        <div class="process-step">
          <div class="process-number">1</div>
          <div>
            <h3>Listen and understand context</h3>
            <p>We begin with a structured conversation to understand your context, current programs, constraints, and the outcomes you care about most.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="process-number">2</div>
          <div>
            <h3>Clarify objectives and scope</h3>
            <p>Together we define realistic objectives and a clear scope that matches available resources and institutional or organizational realities.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="process-number">3</div>
          <div>
            <h3>Design practical steps</h3>
            <p>We outline steps that can actually be implemented, with an emphasis on clarity, simplicity, and the lived experience of students and staff.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="process-number">4</div>
          <div>
            <h3>Support implementation and reflection</h3>
            <p>Where appropriate, we remain available to support early implementation and to reflect honestly on what is working and what should be adjusted.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── FAQ ──────────────────────────────────── -->
  <section class="section-alt">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Common questions</p>
        <h2>Things people often ask us</h2>
      </div>
      <div style="display:grid; gap:1rem; max-width:800px;">
        <div class="faq">
          <p class="faq-q">Do you provide immigration or visa services?</p>
          <p class="faq-a">No. Ezzi Clarity does not provide immigration advice, visa guidance, or any form of regulated immigration consulting. We focus exclusively on academic transition, student success, and experiential learning.</p>
        </div>
        <div class="faq">
          <p class="faq-q">Can you work with institutions outside Ontario?</p>
          <p class="faq-a">Our primary focus is Southern Ontario. For institutions outside this region, we review fit on a case-by-case basis depending on scope and mode of delivery.</p>
        </div>
        <div class="faq">
          <p class="faq-q">Do you offer one-on-one support for students?</p>
          <p class="faq-a">Yes. We offer academic and career transition coaching and select workshops designed for students who want structured guidance as they adapt to Canadian academic and professional settings.</p>
        </div>
        <div class="faq">
          <p class="faq-q">How long does a typical engagement take?</p>
          <p class="faq-a">It depends entirely on scope. Some engagements are a single workshop or consultation. Others involve ongoing advisory work over a semester or academic year. We always agree on scope before starting.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── CTA ──────────────────────────────────── -->
  <section class="section-cta">
    <div class="container section-cta-inner">
      <div>
        <p class="eyebrow">Ready to take the next step?</p>
        <h2>Let's find out if we're the right fit.</h2>
        <p>A short intro call is the best place to start — no commitment, just an honest conversation about your situation.</p>
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
