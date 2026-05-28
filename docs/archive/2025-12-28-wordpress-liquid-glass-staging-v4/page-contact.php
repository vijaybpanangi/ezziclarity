<?php
/**
 * Template Name: Contact
 * Description: Call-first contact page (WP.com Basic-safe)
 */

get_header();

/**
 * Helper: safe theme asset URL builder
 */
function ec_asset_url(string $path): string {
  return esc_url(get_template_directory_uri() . '/' . ltrim($path, '/'));
}

/**
 * Numbers (set these once; used everywhere consistently)
 */
$mobile_display = '+1 (647) 505-9487';
$mobile_tel     = '+16475059487';

$office_display = '+1 (226) 336-8100';
$office_tel     = '+12263368100';
?>

<main>
  <section class="page-header">
    <div class="container">
      <p class="eyebrow">Connect</p>
      <h1>Contact Us</h1>
      <p>
        For the quickest response, we recommend calling our mobile number. If we miss you, please leave a voicemail and weâll call back as soon as possible.
      </p>
    </div>
  </section>

  <section class="section">
    <div class="container">

      <div class="contact-layout">

        <!-- LEFT: Call-first contact card -->
        <div class="card contact-form">
          <h2 style="margin-top:0;">Call Us</h2>
          <p class="muted" style="margin-top:0.25rem;">
            Mobile is the best option for the quickest response.
          </p>

          <div class="contact-cta" style="margin: 1rem 0 0.75rem;">
            <a class="btn btn-primary" href="<?php echo esc_url('tel:' . $mobile_tel); ?>" aria-label="<?php echo esc_attr('Call ' . $mobile_display); ?>">
              Call Mobile: <?php echo esc_html($mobile_display); ?>
            </a>
          </div>

          <!-- Booking CTA (SECONDARY, placed correctly inside the card) -->
          <div class="contact-cta" style="margin: 0 0 0.9rem;">
            <a
              class="btn btn-secondary"
              href="https://book.titan.email/ezziclarity/intro"
              target="_blank"
              rel="noopener noreferrer"
              aria-label="Book an introductory call"
            >
              Book an Intro Call
            </a>
          </div>

          <ul class="contact-list">
            <li>
              <strong>Mobile (fastest):</strong>
              <a href="<?php echo esc_url('tel:' . $mobile_tel); ?>"><?php echo esc_html($mobile_display); ?></a>
            </li>

            <li>
              <strong>Office:</strong>
              <a href="<?php echo esc_url('tel:' . $office_tel); ?>"><?php echo esc_html($office_display); ?></a>
            </li>

            <li>
              <strong>Email:</strong>
              <a href="mailto:info@ezziclarity.ca">info@ezziclarity.ca</a>
            </li>
          </ul>

          <div style="margin-top: 1rem;">
            <h3 style="margin-bottom:0.4rem;">Business Address</h3>
            <p class="muted" style="margin-top:0;">
              180 Northfield Drive West, Unit 4, 1st Floor, Waterloo, ON, N2L 0C7, Canada
            </p>

            <h3 style="margin:1rem 0 0.4rem;">Registered Office</h3>
            <p class="muted" style="margin-top:0;">
              650 West Georgia Street, Suite 2110, Vancouver, BC, V6B 4N8, Canada
            </p>
          </div>

          <p class="fineprint muted" style="margin-top:1rem;">
            All services are academic, career, and institution-focused. We do not provide immigration or visa advice.
          </p>
        </div>

        <!-- RIGHT: Image + Map -->
        <div class="stack" style="display:grid; gap:1.1rem;">

          <div class="card section-visual">
            <img
              src="<?php echo ec_asset_url('assets/images/contact-advisor-student.png'); ?>"
              alt="Advisor and student conversation"
              style="width:100%; height:auto; border-radius: 18px; display:block;"
              loading="lazy"
            />
          </div>

          <div class="card">
            <h3 style="margin-top:0;">Business Office Location</h3>

            <div style="border-radius: 16px; overflow:hidden; border: 1px solid rgba(148,163,184,0.35);">
              <iframe
                title="Ezzi Clarity business office map"
                src="https://www.google.com/maps?q=180%20Northfield%20Drive%20West%20Unit%204%20Waterloo%20ON%20N2L0C7&output=embed"
                width="100%"
                height="260"
                style="border:0; display:block;"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>

            <p class="fineprint muted" style="margin-top:0.8rem;">
              Prefer email? Send a note anytime and weâll respond as soon as possible.
            </p>
          </div>

        </div>

      </div><!-- /.contact-layout -->

    </div>
  </section>
</main>

<?php get_footer(); ?>
