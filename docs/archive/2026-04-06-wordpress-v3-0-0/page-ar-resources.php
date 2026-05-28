<?php
/**
 * Template Name: AR - Resources
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
  <meta name="description" content="موارد عملية حول الانتقال الأكاديمي والتعليم التجريبي وبداية المسار المهني — للطلاب والمؤسسات وأصحاب العمل.">
  <meta property="og:title" content="الموارد — Ezzi Clarity Educational Consulting">
  <meta property="og:description" content="إرشادات عملية وواقعية حول الانتقال الأكاديمي والتعليم التجريبي وبداية المسار المهني.">
  <meta property="og:type" content="website">
  <link rel="canonical" href="<?php echo esc_url(home_url('/ar/resources/')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body class="page-resources">

<?php get_template_part('header-ar', null, ['active' => 'resources', 'lang_page' => 'resources/']); ?>

<main id="main-content">

  <section class="page-header">
    <div class="container">
      <p class="eyebrow">أدوات وإطارات عمل</p>
      <h1>موارد تساعدك على<br><em>المضي قدمًا بثقة.</em></h1>
      <p>
        تعكس هذه المواضيع الأسئلة التي نسمعها أكثر من الطلاب والمؤسسات وأصحاب العمل.
        كل موضوع مبني على تجربة عملية حقيقية — لا على نظريات مجردة.
      </p>
    </div>
  </section>

  <section class="section-alt">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">للطلاب والمؤسسات</p>
        <h2>الانتقال الأكاديمي</h2>
        <p>ما يساعد الطلاب على دخول التعليم ما بعد الثانوي الكندي بتوقعات واقعية وإحساس واضح بما ينتظرهم.</p>
      </div>
      <div class="grid grid-3">
        <article class="service-card card-inst">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-academic-1.png'); ?>"
                 alt="التوقعات الأكاديمية" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill inst">أكاديمي</span>
            <h3>فهم التوقعات الأكاديمية في كندا</h3>
            <p>نظرة موجزة على كيفية عمل الفصول الدراسية الكندية — المشاركة وأساليب التقييم والساعات المكتبية والدعم الأكاديمي.</p>
          </div>
        </article>
        <article class="service-card card-inst">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-academic-2.png'); ?>"
                 alt="استراتيجيات الدراسة" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill inst">مهارات</span>
            <h3>بناء استراتيجيات دراسة مستدامة</h3>
            <p>أساليب عملية للتخطيط وتدوين الملاحظات والقراءة والاستعداد للاختبارات تساعد الطلاب على إدارة عبئهم الدراسي بواقعية.</p>
          </div>
        </article>
        <article class="service-card card-inst">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-academic-3.png'); ?>"
                 alt="التغذية الراجعة" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill inst">تغذية راجعة</span>
            <h3>التعامل مع التغذية الراجعة</h3>
            <p>كيفية استقبال وفهم الملاحظات الأكاديمية والتصرف بناءً عليها، وتحويلها إلى أداة نمو لا مصدر قلق.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">للمؤسسات وأصحاب العمل</p>
        <h2>التعليم التجريبي</h2>
        <p>مبادئ تصميم واعتبارات عملية للمؤسسات التي تبني أو تعزز برامج التعليم المدمج بالعمل.</p>
      </div>
      <div class="grid grid-3">
        <article class="service-card card-stud">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-experiential-1.png'); ?>"
                 alt="التعليم التجريبي" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill stud">نظرة عامة</span>
            <h3>كيف يعزز التعليم التجريبي نتائج الطلاب</h3>
            <p>لمحة عن التعليم المدمج بالعمل والتدريب والمشاريع التطبيقية — وكيف تبني الثقة والاستعداد المهني عند تصميمها بعناية.</p>
          </div>
        </article>
        <article class="service-card card-stud">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-experiential-2.png'); ?>"
                 alt="تصميم البرامج" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill stud">تصميم</span>
            <h3>تصميم برامج تعليم تجريبي بعناية</h3>
            <p>اعتبارات أساسية لتخطيط أو تطوير برامج التعليم التجريبي — أهداف واضحة وتحضير للطلاب وتواصل قوي مع الشركاء.</p>
          </div>
        </article>
        <article class="service-card card-stud">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-experiential-3.png'); ?>"
                 alt="شراكات أصحاب العمل" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill stud">شراكات</span>
            <h3>بناء شراكات مستدامة مع أصحاب العمل</h3>
            <p>ملاحظات عملية للحفاظ على علاقات مع أصحاب العمل تدعم الطلاب دون إرهاق الطاقة المؤسسية أو قدرات أصحاب العمل.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="section-alt">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">للطلاب وأصحاب العمل</p>
        <h2>بداية المسار المهني</h2>
        <p>أطر عمل تساعد الطلاب والخريجين الجدد على الانتقال من الحياة الأكاديمية إلى البيئة المهنية بنية أوضح ويقين أعلى.</p>
      </div>
      <div class="grid grid-3">
        <article class="service-card card-empl">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-earlycareer-1.png'); ?>"
                 alt="إعداد المواهب الناشئة" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill empl">الاستعداد</span>
            <h3>إعداد المواهب الناشئة لسوق العمل</h3>
            <p>كيف تساعد الطلاب على الانتقال من الثقة الأكاديمية إلى الاستعداد المهني — بتفكير واقعي في المهارات والخبرة والتوافق.</p>
          </div>
        </article>
        <article class="service-card card-empl">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-earlycareer-2.png'); ?>"
                 alt="العلامة لصاحب عمل" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill empl">أصحاب العمل</span>
            <h3>بناء علامة صاحب العمل للطلاب</h3>
            <p>كيف يقدّم أصحاب العمل عملهم وثقافتهم وتوقعاتهم بطريقة تتناغم مع الطلاب مع الإفصاح الصادق عن المتطلبات.</p>
          </div>
        </article>
        <article class="service-card card-empl">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-earlycareer-3.png'); ?>"
                 alt="محادثات مهنية واقعية" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill empl">محادثات</span>
            <h3>دعم محادثات مهنية واقعية</h3>
            <p>مقاربات للحديث عن المسار المهني مع الطلاب توازن بين الطموح والصدق، وتوضح الفرص والقيود باحترام واهتمام.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="section-cta">
    <div class="container section-cta-inner">
      <div>
        <p class="eyebrow">قريبًا المزيد</p>
        <h2>مكتبة موارد موسّعة في الطريق.</h2>
        <p>ستستمر هذه المكتبة في النمو. في الوقت الحالي، تشكّل هذه المواضيع أساس عملنا الاستشاري — تواصل معنا إن كان لديك سؤال محدد.</p>
      </div>
      <div>
        <a href="<?php echo esc_url(home_url('/ar/contact/')); ?>" class="btn-primary btn-lg">تواصل معنا</a>
      </div>
    </div>
  </section>

</main>

<?php get_template_part('footer-ar'); ?>

</body>
</html>
