<?php
/**
 * Template Name: EN - Resources
 */
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Practical resources on academic transition, experiential learning, and early career development — for students, institutions, and employers from Ezzi Clarity.">
  <meta property="og:title" content="Resources — Ezzi Clarity Educational Consulting">
  <meta property="og:description" content="Practical, grounded guidance on academic transition, experiential learning, and early career development.">
  <meta property="og:type" content="website">
  <link rel="canonical" href="<?php echo esc_url(home_url('/en/resources/')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body class="page-resources">

<?php get_template_part('header-en', null, ['active' => 'resources', 'lang_page' => 'resources/']); ?>

<main id="main-content">

  <!-- ── PAGE HEADER ──────────────────────────── -->
  <section class="page-header">
    <div class="container">
      <p class="eyebrow">Tools and Insight</p>
      <h1>Resources to help you<br>move forward with confidence.</h1>
      <p>
        These topics reflect the questions we hear most often from students, institutions, and employers.
        Each one is grounded in practical experience — not abstract theory.
      </p>
    </div>
  </section>

  <!-- ── ACADEMIC TRANSITION ──────────────────── -->
  <section class="section-alt">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">For students and institutions</p>
        <h2>Academic Transition</h2>
        <p>What helps students move into Canadian post-secondary life with realistic expectations and a clear sense of what's ahead.</p>
      </div>
      <div class="grid grid-3">

        <article class="service-card card-inst">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-academic-1.png'); ?>"
                 alt="Academic expectations illustration" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill inst">Academics</span>
            <h3>Understanding Academic Expectations in Canada</h3>
            <p>A concise overview of how Canadian classrooms work — participation, assessment styles, office hours, and the role of academic support.</p>
          </div>
        </article>

        <article class="service-card card-inst">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-academic-2.png'); ?>"
                 alt="Study strategies illustration" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill inst">Study Skills</span>
            <h3>Building Sustainable Study Strategies</h3>
            <p>Practical approaches to planning, note-taking, reading, and exam preparation that help students manage their workload realistically.</p>
          </div>
        </article>

        <article class="service-card card-inst">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-academic-3.png'); ?>"
                 alt="Feedback and communication illustration" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill inst">Feedback</span>
            <h3>Working With Feedback</h3>
            <p>How to receive, understand, and act on academic feedback so it becomes a tool for growth rather than a source of stress.</p>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── EXPERIENTIAL LEARNING ────────────────── -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">For institutions and employers</p>
        <h2>Experiential Learning</h2>
        <p>Design principles and practical considerations for institutions building or strengthening work-integrated learning programs.</p>
      </div>
      <div class="grid grid-3">

        <article class="service-card card-stud">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-experiential-1.png'); ?>"
                 alt="Experiential learning overview" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill stud">Overview</span>
            <h3>How Experiential Education Strengthens Student Outcomes</h3>
            <p>An overview of WIL, co-op, internships, and applied projects — and how they build confidence and career readiness when designed thoughtfully.</p>
          </div>
        </article>

        <article class="service-card card-stud">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-experiential-2.png'); ?>"
                 alt="Program design illustration" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill stud">Design</span>
            <h3>Designing Experiential Learning Programs</h3>
            <p>Key considerations for planning or refining experiential learning offerings — clear outcomes, student preparation, and strong partner communication.</p>
          </div>
        </article>

        <article class="service-card card-stud">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-experiential-3.png'); ?>"
                 alt="Employer partnership illustration" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill stud">Partnerships</span>
            <h3>Building Sustainable Employer Partnerships</h3>
            <p>Practical notes on maintaining employer relationships that support students without overextending institutional or employer capacity.</p>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── EARLY CAREER DEVELOPMENT ─────────────── -->
  <section class="section-alt">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">For students and employers</p>
        <h2>Early Career Development</h2>
        <p>Frameworks to help students and new graduates make that transition from academic life to professional environments with more intention and less uncertainty.</p>
      </div>
      <div class="grid grid-3">

        <article class="service-card card-empl">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-earlycareer-1.png'); ?>"
                 alt="Early career transition illustration" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill empl">Readiness</span>
            <h3>Preparing Early Career Talent for Today's Workforce</h3>
            <p>How to help students move from classroom confidence to workplace readiness — thinking about skills, experience, and professional fit realistically.</p>
          </div>
        </article>

        <article class="service-card card-empl">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-earlycareer-2.png'); ?>"
                 alt="Employer brand illustration" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill empl">Employers</span>
            <h3>Employer Brand Positioning for Students</h3>
            <p>How employers can present their work, culture, and expectations in ways that resonate with students while staying honest about demands and constraints.</p>
          </div>
        </article>

        <article class="service-card card-empl">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-earlycareer-3.png'); ?>"
                 alt="Career conversation illustration" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill empl">Conversations</span>
            <h3>Supporting Realistic Career Conversations</h3>
            <p>Approaches for talking about careers with students that balance aspiration with honesty, and clarify both opportunities and limits with care.</p>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- ── CTA ──────────────────────────────────── -->
  <section class="section-cta">
    <div class="container section-cta-inner">
      <div>
        <p class="eyebrow">Looking ahead</p>
        <h2>More resources on the way.</h2>
        <p>This library will keep growing. In the meantime, these themes guide how we structure all our consulting and student-facing work — reach out if you have a specific question.</p>
      </div>
      <div>
        <a href="<?php echo esc_url(home_url('/en/contact/')); ?>" class="btn-primary btn-lg">Get in Touch</a>
      </div>
    </div>
  </section>

</main>

<?php get_template_part('footer-en'); ?>

</body>
</html>
