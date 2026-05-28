<?php
/* Template: page-about.php */
get_header();
?>
<main>
    <section class="page-header">
      <div class="container">
        <p class="eyebrow">About Ezzi Clarity</p>
        <h1>About Ezzi Clarity</h1>
        <p>
          Ezzi Clarity Educational Consulting Services Inc. is a student success and experiential learning advisory
          led by Arva Yusuf Ezzi. The firm is grounded in real experience inside Canadian universities and in a
          detailed understanding of how students, institutions and employers actually work together.
        </p>
      </div>
    </section>

    <section class="section-alt">
      <div class="container grid grid-2">
        <div>
          <h2>Our Story</h2>
          <p>
            Ezzi Clarity was created to respond to a simple reality. Students do not experience academic life in isolation.
            Institutions, classrooms, support units and employers are all part of the same system. When expectations are clear
            and supports are practical, students succeed more often and early career transitions become less stressful for everyone.
          </p>
          <p>
            After years of working in student services, experiential learning and academic units at leading institutions,
            Arva saw the opportunity to support that ecosystem from the outside with focused, student aware consulting.
          </p>
        </div>
        <div class="quote-card">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/arva-portrait.png' ); ?>" alt="Portrait of Arva Yusuf Ezzi" class="quote-avatar">
          <h3>Meet the Founder</h3>
          <p>
            Arva Yusuf Ezzi has held professional roles at the University of Toronto and York University, working with
            academic departments, student success units and experiential learning teams. She holds a Master of Education
            degree from OISE, University of Toronto, and is fluent in English, Arabic, Hindi, Urdu and Gujarati.
          </p>
          <span class="quote-meta">Founder and Lead Consultant, Ezzi Clarity Educational Consulting Services Inc.</span>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container grid grid-2">
        <div>
          <h2>Why Ezzi Clarity Exists</h2>
          <p>
            The firm exists to support three groups that are closely connected but often operate in separate conversations:
          </p>
          <ul class="checklist">
            <li>Institutions that are designing or refining experiential learning and student success programming.</li>
            <li>Students who are navigating unfamiliar academic expectations and cultural norms.</li>
            <li>Employers who want to engage early career talent in a respectful and effective way.</li>
          </ul>
          <p>
            We help bridge those conversations so that students can learn, institutions can deliver and employers can connect
            with talent in ways that make sense for all three.
          </p>
        </div>
        <div>
          <h2>Our Approach</h2>
          <p>
            Our work is practical, modest and structured. We start from the current reality of the institution or student,
            clarify what success looks like and then design steps that can actually be implemented with available capacity.
          </p>
          <p>
            We favor clear language, thoughtful listening and evidence informed recommendations. We are comfortable
            operating in both academic and employer environments and we take care to respect the responsibilities and
            constraints that each group carries.
          </p>
        </div>
      </div>
    </section>

    <section class="section-alt">
      <div class="container">
        <h2>Our Values</h2>
        <div class="grid grid-3">
          <div class="card">
            <h3>Student Centered</h3>
            <p>
              We design services around how students actually learn, work and make decisions rather than around abstract assumptions.
            </p>
          </div>
          <div class="card">
            <h3>Institution Aware</h3>
            <p>
              We understand that institutions have policies, governance and resource limits. Our recommendations are built to fit that context.
            </p>
          </div>
          <div class="card">
            <h3>Employer Conscious</h3>
            <p>
              We recognize the realities of hiring, timelines and workplace expectations and we help employers work with students in a grounded way.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="section-cta">
      <div class="container section-cta-inner">
        <div>
          <p class="eyebrow">Next Step</p>
          <h2>Ready To Talk About Your Context</h2>
          <p>
            If you are an institution, student or employer who sees your reality reflected here, we would be happy to
            connect and understand your needs more clearly.
          </p>
        </div>
        <div>
          <a href="<?php echo esc_url( ec_get_page_url( 'contact' ) ); ?>" class="btn-primary btn-lg">Connect With Ezzi Clarity</a>
        </div>
      </div>
    </section>
  </main>
<?php get_footer(); ?>
