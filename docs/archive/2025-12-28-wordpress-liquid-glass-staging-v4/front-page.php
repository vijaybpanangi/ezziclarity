<?php
/* Template: front-page.php */
get_header();
?>
<main>
    <!-- Hero -->
    <section class="hero">
      <div class="container hero-inner">
        <div class="hero-copy">
          <p class="eyebrow">Educational Consulting Services Inc.</p>
          <h1>Less Noise. More Signal.</h1>
          <p>
            Ezzi Clarity Educational Consulting Services Inc. is an Ontario based advisory firm focused on student success,
            academic transition support and experiential learning. We work with students, institutions and employers across
            Southern Ontario to make academic journeys clearer and early career paths more intentional.
          </p>
          <p>
            We focus on what we know best: how Canadian classrooms work in practice, how experiential learning programs
            are built and how students actually experience the transition into academic and professional life.
          </p>
          <div class="hero-actions">
            <a href="<?php echo esc_url( ec_get_page_url( 'contact' ) ); ?>" class="btn-primary btn-lg">Book an Intro Conversation</a>
            <a href="<?php echo esc_url( ec_get_page_url( 'services' ) ); ?>" class="btn-secondary">Explore Our Services</a>
          </div>
          <p class="hero-footnote">
            All services are academic, career and institution focused. We do not provide immigration or visa advice.
          </p>
        </div>

        <div class="hero-panel">
          <div class="hero-visual">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-ecosystem.png' ); ?>" alt="Students, institutions and employers working together">
          </div>
          <aside class="hero-card">
            <p class="eyebrow">Who We Work With</p>
            <ul class="checklist">
              <li>Universities and colleges building experiential learning and student success programs.</li>
              <li>Domestic and international students who want practical support with academic expectations.</li>
              <li>Employers who want to engage early career talent more thoughtfully and effectively.</li>
            </ul>
          </aside>
        </div>
      </div>
    </section>

    <!-- What Working With Us Feels Like -->
    <section class="section-alt">
      <div class="container">

        <div class="section-visual section-visual--feels">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/section-feels-ezzi.png' ); ?>" alt="Calm and structured learning environment illustration">
        </div>
        <div class="grid grid-3">
          <div class="card">
            <h3>Clarity Over Complexity</h3>
            <p>
              We translate policies, expectations and program requirements into plain language and practical steps
              for students, staff and employers.
            </p>
          </div>
          <div class="card">
            <h3>Grounded in Real Experience</h3>
            <p>
              Our work is shaped by direct experience inside Canadian universities and by first hand understanding of how
              students actually engage with academic systems.
            </p>
          </div>
          <div class="card">
            <h3>Warm, Professional and Structured</h3>
            <p>
              We bring a calm, organized and culturally aware approach that respects institutional realities and student needs
              at the same time.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Core Service Areas -->
    <section class="section">
      <div class="container">
        <p class="eyebrow">Service Overview</p>
        <h2>Our Core Service Areas</h2>

        <div class="grid grid-3">
          <article class="service-card">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/services-institution.png' ); ?>" alt="Faculty and staff collaborating" class="service-illustration">
            <h3>Institutional Services</h3>
            <p>
              Support for universities and colleges that want to strengthen experiential education, international student
              integration and academic success initiatives.
            </p>
            <ul class="checklist">
              <li>Experiential education program development.</li>
              <li>International student transition and integration support.</li>
              <li>Academic success and retention focused programming.</li>
            </ul>
          </article>

          <article class="service-card">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/services-student.png' ); ?>" alt="Student and advisor in conversation" class="service-illustration">
            <h3>Student Services</h3>
            <p>
              One on one and small group support for students navigating academic expectations and early career decisions in Canada.
            </p>
            <ul class="checklist">
              <li>Academic and career transition coaching.</li>
              <li>Professional communication and presentation workshops.</li>
              <li>Study strategies and learning skills support.</li>
            </ul>
          </article>

          <article class="service-card">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/services-employer.png' ); ?>" alt="Employer speaking with early career talent" class="service-illustration">
            <h3>Employer Services</h3>
            <p>
              Guidance for employers who want to engage students and graduates in a more consistent and student aware way.
            </p>
            <ul class="checklist">
              <li>Campus recruitment strategy and planning.</li>
              <li>Early talent engagement and outreach design.</li>
              <li>Employer brand positioning for student audiences.</li>
            </ul>
          </article>
        </div>
      </div>
    </section>

    <!-- CTA -->
    <section class="section-cta">
      <div class="container section-cta-inner">
        <div>
          <p class="eyebrow">Next Step</p>
          <h2>Ready To Begin?</h2>
          <p>
            Whether you are designing an institutional program, preparing students for transition or planning a campus
            recruitment strategy, we can walk through your goals and outline a practical, right sized path forward.
          </p>
        </div>
        <div>
          <a href="<?php echo esc_url( ec_get_page_url( 'contact' ) ); ?>" class="btn-primary btn-lg">Schedule a Conversation</a>
        </div>
      </div>
    </section>
  </main>
<?php get_footer(); ?>
