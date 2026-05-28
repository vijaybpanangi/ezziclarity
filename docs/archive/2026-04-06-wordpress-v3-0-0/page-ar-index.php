<?php
/**
 * Template Name: AR - Index
 *
 * NOTE: Arabic prose in this archived AR template was RECONSTRUCTED from the
 * parallel EN/FR templates and from the current static /ar/ tree, because
 * the source paste delivered the original Arabic as mojibake. CSS classes,
 * PHP routing, dir attributes, link targets, image refs, and overall
 * structure are verbatim. See archive README.md for full caveats.
 */
?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Ezzi Clarity Educational Consulting — استشارات في نجاح الطلاب والتعليم التجريبي للطلاب والمؤسسات وأصحاب العمل في أونتاريو.">
  <meta property="og:title" content="Ezzi Clarity — ضجيج أقل. تركيز أكثر.">
  <meta property="og:description" content="استشارات في نجاح الطلاب والتعليم التجريبي للطلاب والمؤسسات وأصحاب العمل في أونتاريو.">
  <meta property="og:type" content="website">
  <link rel="canonical" href="<?php echo esc_url(home_url('/ar/')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body>

<?php get_template_part('header-ar', null, ['active' => 'home']); ?>

<main id="main-content">

  <section class="hero">
    <div class="container hero-inner">

      <div class="hero-copy">
        <p class="eyebrow">استشارات تعليمية · أونتاريو</p>
        <h1>مساراتك إلى الأمام،<br><em>بوضوح أكبر.</em></h1>
        <p>
          نساعد الطلاب على التنقل في الأنظمة الأكاديمية الكندية، وندعم المؤسسات في تصميم برامج تعليم
          تجريبي أفضل، ونوجّه أصحاب العمل في تعاملهم مع المواهب في بداية مسيرتهم المهنية —
          بدفء وهيكل وخبرة حقيقية.
        </p>
        <div class="hero-actions">
          <a href="<?php echo esc_url(home_url('/ar/contact/')); ?>" class="btn-primary btn-lg">احجز مكالمة تعريفية</a>
          <a href="<?php echo esc_url(home_url('/ar/services/')); ?>" class="btn-secondary">خدماتنا</a>
        </div>
        <p class="hero-footnote">خدمات أكاديمية ومهنية فقط. لا نقدم استشارات في الهجرة أو التأشيرات.</p>
      </div>

      <div class="hero-panel">
        <div class="hero-visual">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-ecosystem.png'); ?>"
               alt="طلاب ومؤسسات وأصحاب عمل يعملون معًا"
               loading="eager">
        </div>
        <aside class="hero-card">
          <p class="eyebrow">مع من نعمل</p>
          <ul class="checklist">
            <li>جامعات وكليات تسعى إلى تعزيز برامج التعليم التجريبي ونجاح الطلاب.</li>
            <li>طلاب محليون ودوليون يتعاملون مع التوقعات الأكاديمية في كندا.</li>
            <li>أصحاب عمل يرغبون في استقطاب المواهب الناشئة بشكل أكثر تعمدًا.</li>
          </ul>
        </aside>
      </div>

    </div>
  </section>

  <div class="trust-bar">
    <div class="container trust-bar-inner">
      <span class="trust-item">مقرنا في أونتاريو</span>
      <span class="trust-item">ماجستير في التربية — OISE، جامعة تورنتو</span>
      <span class="trust-item">طلاب · مؤسسات · أصحاب عمل</span>
      <span class="trust-item">English · Français · العربية</span>
    </div>
  </div>

  <section class="section-alt">
    <div class="container">
      <div class="section-header" style="text-align:center; margin-bottom:2.5rem;">
        <p class="eyebrow">منهجنا</p>
        <h2>كيف يبدو العمل معنا</h2>
      </div>

      <div class="section-visual section-visual--feels">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/section-feels-ezzi.png'); ?>"
             alt="بيئة تعليم هادئة ومنظمة" loading="lazy">
      </div>

      <div class="grid grid-3" style="margin-top:2rem;">
        <div class="card card--accent">
          <p class="card-tag">وضوح</p>
          <h3>الوضوح قبل التعقيد</h3>
          <p>نترجم السياسات والتوقعات ومتطلبات البرامج إلى لغة بسيطة وخطوات عملية — للطلاب والموظفين وأصحاب العمل على حدٍّ سواء.</p>
        </div>
        <div class="card card--accent">
          <p class="card-tag">خبرة</p>
          <h3>مبنية على خبرة واقعية</h3>
          <p>يستند عملنا إلى تجربة مباشرة داخل الجامعات الكندية وفهم واقعي لكيفية تعامل الطلاب الفعلي مع الأنظمة الأكاديمية.</p>
        </div>
        <div class="card card--accent">
          <p class="card-tag">هيكل</p>
          <h3>دفء مهني ومنظّم</h3>
          <p>نقدّم أسلوبًا هادئًا ومنظمًا يراعي الفروق الثقافية ويحترم واقع المؤسسات واحتياجات الطلاب في الوقت ذاته.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">لمحة عن الخدمات</p>
        <h2>مجالاتنا الأساسية</h2>
        <p>دعم مركّز وعملي عبر منظومة الطالب—المؤسسة—صاحب العمل.</p>
      </div>

      <div class="grid grid-3">
        <article class="service-card card-inst">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/services-institution.png'); ?>"
                 alt="أعضاء هيئة التدريس والموظفون يتعاونون" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill inst">المؤسسات</span>
            <h3>خدمات للمؤسسات</h3>
            <p>دعم للجامعات والكليات الساعية إلى تعزيز التعليم التجريبي ودمج الطلاب الدوليين ومبادرات النجاح الأكاديمي.</p>
            <ul class="checklist">
              <li>تطوير برامج التعليم التجريبي</li>
              <li>دعم انتقال الطلاب الدوليين</li>
              <li>برامج النجاح الأكاديمي والاستمرارية</li>
            </ul>
          </div>
        </article>

        <article class="service-card card-stud">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/services-student.png'); ?>"
                 alt="طالب ومستشار في حوار" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill stud">الطلاب</span>
            <h3>خدمات للطلاب</h3>
            <p>دعم فردي وجماعي للطلاب الذين يتعاملون مع التوقعات الأكاديمية وقرارات بداية المسار المهني في كندا.</p>
            <ul class="checklist">
              <li>توجيه الانتقال الأكاديمي والمهني</li>
              <li>ورش التواصل المهني</li>
              <li>استراتيجيات الدراسة ومهارات التعلّم</li>
            </ul>
          </div>
        </article>

        <article class="service-card card-empl">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/services-employer.png'); ?>"
                 alt="صاحب عمل يتحدث مع مواهب في بداية مسيرتها" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill empl">أصحاب العمل</span>
            <h3>خدمات لأصحاب العمل</h3>
            <p>إرشاد لأصحاب العمل الراغبين في التعامل مع الطلاب والخريجين بطريقة متّسقة ومراعية لواقع الطلاب.</p>
            <ul class="checklist">
              <li>استراتيجية استقطاب المواهب الناشئة</li>
              <li>أطر الإعداد المهني للطلاب</li>
              <li>مواءمة توقعات بيئة العمل</li>
            </ul>
          </div>
        </article>
      </div>

      <div style="text-align:center; margin-top:2rem;">
        <a href="<?php echo esc_url(home_url('/ar/services/')); ?>" class="btn-secondary">عرض جميع الخدمات</a>
      </div>
    </div>
  </section>

  <section class="section-cta">
    <div class="container section-cta-inner">
      <div>
        <p class="eyebrow">هل أنت مستعد للبدء؟</p>
        <h2>لنتحدث عن سياقك المحدد.</h2>
        <p>سواء كنت طالبًا أو مؤسسة أو صاحب عمل — تبدأ المحادثة بفهم وضعك.</p>
      </div>
      <div>
        <a href="<?php echo esc_url(home_url('/ar/contact/')); ?>" class="btn-primary btn-lg">احجز مكالمة مجانية</a>
      </div>
    </div>
  </section>

</main>

<?php get_template_part('footer-ar'); ?>

</body>
</html>
