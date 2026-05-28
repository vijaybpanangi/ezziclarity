<?php
/**
 * Template Name: AR - Services
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
  <meta name="description" content="خدمات Ezzi Clarity للمؤسسات والطلاب وأصحاب العمل — نجاح الطلاب، التعليم التجريبي، والانتقال المهني في أونتاريو.">
  <meta property="og:title" content="الخدمات — Ezzi Clarity Educational Consulting">
  <meta property="og:description" content="دعم دافئ ومنظم للمؤسسات والطلاب وأصحاب العمل.">
  <meta property="og:type" content="website">
  <link rel="canonical" href="<?php echo esc_url(home_url('/ar/services/')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body>

<?php get_template_part('header-ar', null, ['active' => 'services', 'lang_page' => 'services/']); ?>

<main id="main-content">

  <section class="page-header">
    <div class="container">
      <p class="eyebrow">خدماتنا</p>
      <h1>دعم حقيقي،<br>أينما كنت في مسيرتك.</h1>
      <p>
        سواء كنت طالبًا يبحث عن توجيه، أو مؤسسة تسعى لتحسين برامجها، أو صاحب عمل يريد التعامل مع الجيل القادم من المواهب —
        نلتقيك حيث أنت، بإرشاد عملي وصادق.
      </p>
    </div>
  </section>

  <section class="section-alt">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">ما نقدّمه</p>
        <h2>ثلاثة مجالات دعم مركّز</h2>
        <p>كل خدمة مصمَّمة حول احتياجات حقيقية — لا أطر نظرية. عملية، قابلة للتنفيذ، ومحدّدة النطاق.</p>
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
            <p>دعم للجامعات والكليات التي ترغب في تعزيز التعليم التجريبي ودمج الطلاب الدوليين والبرامج الأكاديمية.</p>
            <ul class="checklist">
              <li>تطوير برامج التعليم التجريبي</li>
              <li>دعم دمج الطلاب الدوليين</li>
              <li>تصميم برامج النجاح الأكاديمي</li>
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
            <p>دعم الانتقال الأكاديمي والمهني للطلاب المحليين والدوليين الذين يستفيدون من التوجيه المنظم والتوقعات الواضحة.</p>
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
            <p>استشارات في التوظيف الجامعي واستقطاب المواهب في بداية مسيرتها لأصحاب العمل الذين يعملون مع الطلاب والخريجين.</p>
            <ul class="checklist">
              <li>استراتيجية التوظيف الجامعي</li>
              <li>تخطيط استقطاب المواهب</li>
              <li>تحديد موقع العلامة لصاحب عمل</li>
            </ul>
          </div>
        </article>

      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">كيف نعمل</p>
        <h2>عملية مبنية على الاستماع أولًا</h2>
        <p>كل مشروع يبدأ بمحادثة حقيقية — نحتاج أن نفهم وضعك قبل أن نقترح أي شيء مفيد.</p>
      </div>
      <div class="process process-two-column">
        <div class="process-step">
          <div class="process-number">١</div>
          <div>
            <h3>الاستماع وفهم السياق</h3>
            <p>نبدأ بمحادثة منظمة لفهم سياقك وبرامجك الحالية وقيودك والنتائج التي تهمّك أكثر.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="process-number">٢</div>
          <div>
            <h3>توضيح الأهداف والنطاق</h3>
            <p>نحدد معًا أهدافًا واقعية ونطاقًا واضحًا يتناسب مع الموارد المتاحة والواقع المؤسسي.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="process-number">٣</div>
          <div>
            <h3>تصميم خطوات عملية</h3>
            <p>نضع خطوات يمكن تنفيذها فعليًا، مع التركيز على الوضوح والبساطة وتجربة الطلاب والموظفين.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="process-number">٤</div>
          <div>
            <h3>دعم التنفيذ والتأمل</h3>
            <p>عند الاقتضاء، نبقى متاحين لدعم المراحل الأولى من التنفيذ والتأمل بصدق فيما ينجح وما يحتاج تعديلًا.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-alt">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">أسئلة شائعة</p>
        <h2>ما يُسألنا كثيرًا</h2>
      </div>
      <div style="display:grid; gap:1rem; max-width:800px;">
        <div class="faq">
          <p class="faq-q">هل تقدّمون خدمات في مجال الهجرة أو التأشيرات؟</p>
          <p class="faq-a">لا. لا تقدّم Ezzi Clarity أي استشارات في الهجرة أو التأشيرات. نحن نركّز حصريًا على الانتقال الأكاديمي ونجاح الطلاب والتعليم التجريبي.</p>
        </div>
        <div class="faq">
          <p class="faq-q">هل تعملون مع مؤسسات خارج أونتاريو؟</p>
          <p class="faq-a">تركيزنا الأساسي في جنوب أونتاريو. بالنسبة للمؤسسات خارج هذه المنطقة، ندرس التوافق حالة بحالة حسب النطاق وطريقة التقديم.</p>
        </div>
        <div class="faq">
          <p class="faq-q">هل تقدّمون دعمًا فرديًا للطلاب؟</p>
          <p class="faq-a">نعم. نقدّم توجيهًا فرديًا للانتقال الأكاديمي والمهني وورشًا مخصصة للطلاب الذين يرغبون في إرشاد منظم.</p>
        </div>
        <div class="faq">
          <p class="faq-q">كم يستغرق المشروع النموذجي؟</p>
          <p class="faq-a">يعتمد كليًا على النطاق. بعض المشاريع تقتصر على ورشة واحدة أو استشارة. أخرى تتضمن عملًا استشاريًا مستمرًا على مدار فصل دراسي أو سنة أكاديمية. نتفق دائمًا على النطاق قبل البدء.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section-cta">
    <div class="container section-cta-inner">
      <div>
        <p class="eyebrow">هل أنت مستعد للخطوة الأولى؟</p>
        <h2>لنكتشف إن كنا الشريك المناسب.</h2>
        <p>مكالمة تعريفية قصيرة هي أفضل نقطة بداية — بلا التزام، مجرد حوار صادق حول وضعك.</p>
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
