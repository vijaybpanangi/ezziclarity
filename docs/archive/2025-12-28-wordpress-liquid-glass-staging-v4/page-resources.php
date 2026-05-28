<?php
/* Template: page-resources.php */
get_header();
?>
<main>
    <!-- Page intro -->
    <section class="page-header">
      <div class="container">
        <p class="eyebrow">Tools and Insight</p>
        <h1>Resources</h1>
        <p>
          The resources on this page are designed to support students, institutions and employers who want
          practical, grounded guidance on academic transition, experiential learning and early career development.
        </p>
      </div>
    </section>

    <!-- Academic Transition -->
    <section class="section-alt">
      <div class="container">
        <h2>Academic Transition</h2>

        <div class="grid grid-3">
          <article class="card">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/resources-academic-1.png' ); ?>" alt="Academic expectations illustration" class="service-illustration">
            <h3>Understanding Academic Expectations in Canada</h3>
            <p>
              A concise overview of how Canadian classrooms typically work, including participation expectations,
              assessment styles and the role of office hours and academic support units.
            </p>
          </article>

          <article class="card">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/resources-academic-2.png' ); ?>" alt="Study strategies illustration" class="service-illustration">
            <h3>Building Sustainable Study Strategies</h3>
            <p>
              Practical approaches to planning, note taking, reading and exam preparation that align with Canadian
              postsecondary expectations and help students manage their workload realistically.
            </p>
          </article>

          <article class="card">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/resources-academic-3.png' ); ?>" alt="Communication and feedback illustration" class="service-illustration">
            <h3>Working With Feedback</h3>
            <p>
              Guidance on how to respond to academic feedback, clarify expectations and adjust approaches over time
              so that feedback becomes a tool for growth rather than a source of anxiety.
            </p>
          </article>
        </div>
      </div>
    </section>

    <!-- Experiential Learning -->
    <section class="section">
      <div class="container">
        <h2>Experiential Learning</h2>

        <div class="grid grid-3">
          <article class="card">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/resources-experiential-1.png' ); ?>" alt="Experiential learning overview illustration" class="service-illustration">
            <h3>How Experiential Education Strengthens Student Outcomes</h3>
            <p>
              An overview of work integrated learning, co-op, internships and applied projects and how they connect to
              student learning, confidence and career readiness when designed with care.
            </p>
          </article>

          <article class="card">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/resources-experiential-2.png' ); ?>" alt="Program design illustration" class="service-illustration">
            <h3>Designing Experiential Learning Programs</h3>
            <p>
              Key considerations for institutions when planning or refining experiential learning offerings, including
              clear outcomes, student preparation and consistent communication with partners.
            </p>
          </article>

          <article class="card">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/resources-experiential-3.png' ); ?>" alt="Partnership illustration" class="service-illustration">
            <h3>Building Sustainable Employer Partnerships</h3>
            <p>
              Practical notes on how to maintain employer relationships that support students, respect employer realities
              and avoid overextending institutional capacity.
            </p>
          </article>
        </div>
      </div>
    </section>

    <!-- Early Career Development -->
    <section class="section-alt">
      <div class="container">
        <h2>Early Career Development</h2>

        <div class="grid grid-3">
          <article class="card">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/resources-earlycareer-1.png' ); ?>" alt="Early career transition illustration" class="service-illustration">
            <h3>Preparing Early Career Talent for Todayâs Workforce</h3>
            <p>
              Suggestions for helping students move from classroom confidence to workplace readiness in a realistic way,
              including how to think about skills, experience and fit.
            </p>
          </article>

          <article class="card">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/resources-earlycareer-2.png' ); ?>" alt="Employer brand illustration" class="service-illustration">
            <h3>Employer Brand Positioning for Students</h3>
            <p>
              How employers can present their work, culture and expectations in ways that resonate with student audiences
              while staying honest about demands and constraints.
            </p>
          </article>

          <article class="card">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/resources-earlycareer-3.png' ); ?>" alt="Career conversation illustration" class="service-illustration">
            <h3>Supporting Realistic Career Conversations</h3>
            <p>
              Approaches for talking about careers with students that balance aspiration with data, and that clarify both
              opportunities and limits in a transparent, respectful way.
            </p>
          </article>
        </div>
      </div>
    </section>

    <!-- CTA -->
    <section class="section-cta">
      <div class="container section-cta-inner">
        <div>
          <p class="eyebrow">Looking Ahead</p>
          <h2>Future Resource Library</h2>
          <p>
            As the business grows, this page will expand into a more complete resource library that includes guides,
            checklists and tools for students, institutions and employers. In the meantime, these themes guide how we
            structure our consulting and student facing work.
          </p>
        </div>
        <div>
          <a href="<?php echo esc_url( ec_get_page_url( 'contact' ) ); ?>" class="btn-primary btn-lg">Ask About Upcoming Resources</a>
        </div>
      </div>
    </section>
  </main>
<?php get_footer(); ?>
