<?php
/**
 * Template Name: AR - Contact
 *
 * NOTE: Arabic prose reconstructed from EN/FR parallels — source paste was mojibake.
 * Structure (CSS classes, PHP routing, dir attributes, link targets) is verbatim.
 */
?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="تواصل مع Ezzi Clarity — احجز مكالمة تعريفية أو تواصل معنا عبر الهاتف أو البريد الإلكتروني. مقرنا في منطقة واترلو، أونتاريو.">
  <meta property="og:title" content="تواصل معنا — Ezzi Clarity Educational Consulting">
  <meta property="og:description" content="احجز مكالمة مجانية أو تواصل معنا مباشرة. نحن سعداء دائمًا بالحديث معك.">
  <meta property="og:type" content="website">
  <link rel="canonical" href="<?php echo esc_url(home_url('/ar/contact/')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body>

<?php get_template_part('header-ar', null, ['active' => 'contact', 'lang_page' => 'contact/']); ?>

<main id="main-content">

  <section class="page-header">
    <div class="container">
      <p class="eyebrow">نحن هنا من أجلك</p>
      <h1>كل محادثة<br><em>تبدأ بالاستماع.</em></h1>
      <p>أفضل خطوة أولى هي مكالمة تعريفية قصيرة — بلا التزام، مجرد حوار مركّز حول وضعك وكيف يمكننا المساعدة.</p>
      <div class="hero-actions" dir="ltr" style="justify-content:flex-end;">
        <a class="btn-primary btn-lg" href="https://book.titan.email/ezziclarity/intro" target="_blank" rel="noopener noreferrer">
          احجز مكالمة تعريفية
        </a>
        <a class="btn-secondary" href="tel:+16475059487">اتصل بنا الآن</a>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="contact-layout">

        <div class="card contact-form contact-card">
          <h2 style="margin-top:0;">معلومات التواصل</h2>
          <p class="muted">الهاتف المحمول هو أسرع طريقة للتواصل. إذا لم نتمكن من الرد، اترك رسالة صوتية وسنعاود الاتصال بك قريبًا.</p>

          <ul class="contact-list" dir="ltr" style="text-align:left;">
            <li>
              <strong>المحمول (الأسرع):</strong>
              <a href="tel:+16475059487">+1 (647) 505-9487</a>
            </li>
            <li>
              <strong>المكتب:</strong>
              <a href="tel:+12263368100">+1 (226) 336-8100</a>
            </li>
            <li>
              <strong>البريد الإلكتروني:</strong>
              <a href="mailto:info@ezziclarity.ca">info@ezziclarity.ca</a>
            </li>
          </ul>

          <h3 style="margin-top:1.5rem; margin-bottom:0.4rem;">عنوان المكتب التجاري</h3>
          <p class="muted" dir="ltr" style="text-align:left; margin-bottom:0;">180 Northfield Drive West, Unit 4, 1st Floor<br>Waterloo, ON N2L 0C7, Canada</p>

          <h3 style="margin-top:1.25rem; margin-bottom:0.4rem;">المكتب المسجّل</h3>
          <p class="muted" dir="ltr" style="text-align:left; margin-bottom:0;">650 West Georgia Street, Suite 2110<br>Vancouver, BC V6B 4N8, Canada</p>

          <div style="margin-top:1.5rem; padding-top:1.25rem; border-top:1px solid var(--border);">
            <a class="btn-primary" href="https://book.titan.email/ezziclarity/intro" target="_blank" rel="noopener noreferrer" style="width:100%; justify-content:center;">
              احجز مكالمة مجانية →
            </a>
          </div>

          <p class="small muted" style="margin-top:1rem; margin-bottom:0;">
            جميع خدماتنا أكاديمية ومهنية ومؤسسية. لا نقدّم أي استشارات في مجال الهجرة أو التأشيرات.
          </p>
        </div>

        <div style="display:grid; gap:1.25rem;">
          <div class="card" style="padding:0; overflow:hidden; border-radius:var(--r-lg);">
            <img
              src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/contact-advisor-student.png'); ?>"
              alt="مستشار وطالب في حوار"
              style="width:100%; height:240px; object-fit:cover; border-radius:var(--r-lg); display:block; box-shadow:none;"
              loading="lazy"
            />
          </div>
          <div class="card">
            <h3 style="margin-top:0; margin-bottom:0.75rem;">موقع المكتب التجاري</h3>
            <div style="border-radius:var(--r-md); overflow:hidden; border:1px solid var(--border);">
              <iframe
                title="موقع مكتب Ezzi Clarity"
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

<?php get_template_part('footer-ar'); ?>

</body>
</html>
