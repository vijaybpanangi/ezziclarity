<?php
/* Template: page-services.php */
get_header();
?>
<main>
    <section class="page-header">
      <div class="container">
        <p class="eyebrow">What We Do</p>
        <h1>Our Services</h1>
        <p>
          Ezzi Clarity provides focused consulting services for institutions, students and employers. Each service line
          is designed to be practical, achievable and aligned with the real constraints of the academic and employment landscape.
        </p>
      </div>
    </section>

    <section class="section-alt">
      <div class="container grid grid-3">
        <article class="service-card">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/services-institution.png' ); ?>" alt="Institutional services illustration" class="service-illustration">
          <h2>Institutional Services</h2>
          <p>
            Support for universities and colleges that want to strengthen experiential learning, international student
            integration and academic success programming.
          </p>
          <ul class="checklist">
            <li>Experiential education program development.</li>
            <li>International student integration support.</li>
            <li>Academic success program design.</li>
          </ul>
        </article>

        <article class="service-card">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/services-student.png' ); ?>" alt="Student services illustration" class="service-illustration">
          <h2>Student Services</h2>
          <p>
            Academic and career transition support for domestic and international students who would benefit from
            structured guidance and clear expectations.
          </p>
          <ul class="checklist">
            <li>Academic and career transition coaching.</li>
            <li>Professional communication workshops.</li>
            <li>Study strategy and learning skills support.</li>
          </ul>
        </article>

        <article class="service-card">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/services-employer.png' ); ?>" alt="Employer services illustration" class="service-illustration">
          <h2>Employer Services</h2>
          <p>
            Campus recruitment and early talent engagement advisory for employers who work with students and new graduates.
          </p>
          <ul class="checklist">
            <li>Campus recruitment strategy.</li>
            <li>Early talent engagement planning.</li>
            <li>Employer brand positioning for students.</li>
          </ul>
        </article>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <p class="eyebrow">How We Work</p>
        <h2>Our Process</h2>
        <div class="process process-two-column">
          <div class="process-step">
            <div class="process-number">1</div>
            <div>
              <h3>Listen and Understand Context</h3>
              <p>
                We begin with a structured conversation to understand your context, current programs, constraints
                and the outcomes you care about most.
              </p>
            </div>
          </div>
          <div class="process-step">
            <div class="process-number">2</div>
            <div>
              <h3>Clarify Objectives and Scope</h3>
              <p>
                Together we define realistic objectives and a clear scope that matches available resources and
                institutional or organizational realities.
              </p>
            </div>
          </div>
          <div class="process-step">
            <div class="process-number">3</div>
            <div>
              <h3>Design Practical Steps</h3>
              <p>
                We outline steps that can be implemented, with an emphasis on clarity, simplicity and the lived
                experience of students and staff.
              </p>
            </div>
          </div>
          <div class="process-step">
            <div class="process-number">4</div>
            <div>
              <h3>Support Implementation and Reflection</h3>
              <p>
                Where appropriate, we remain available to support early implementation and to reflect on what is
                working, what is not and what should be adjusted.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-alt">
      <div class="container">
        <p class="eyebrow">Common Questions</p>
        <h2>Frequently Asked Questions</h2>

        <div class="faq">
          <h3>Do You Provide Immigration or Visa Services?</h3>
          <p>
            No. Ezzi Clarity does not provide immigration advice, visa guidance or any form of regulated immigration consulting.
            We focus on academic transition, student success and experiential learning.
          </p>
        </div>

        <div class="faq">
          <h3>Can You Work With Institutions Outside Ontario?</h3>
          <p>
            Our primary focus is Southern Ontario. For institutions outside this region, we review fit on a case by case
            basis depending on scope and mode of delivery.
          </p>
        </div>

        <div class="faq">
          <h3>Do You Offer One on One Support for Students?</h3>
          <p>
            Yes. We offer academic and career transition coaching and select workshops designed for students who want
            structured guidance as they adapt to Canadian academic and professional settings.
          </p>
        </div>
      </div>
    </section>

    <section class="section-cta">
      <div class="container section-cta-inner">
        <div>
          <p class="eyebrow">Next Step</p>
          <h2>Ready To Explore a Specific Need</h2>
          <p>
            If you see your institution, student community or organization in these service descriptions, we would be
            pleased to discuss what a tailored engagement could look like.
          </p>
        </div>
        <div>
          <a href="<?php echo esc_url( ec_get_page_url( 'contact' ) ); ?>" class="btn-primary btn-lg">Discuss Your Context</a>
        </div>
      </div>
    </section>
  </main>
<?php get_footer(); ?>
