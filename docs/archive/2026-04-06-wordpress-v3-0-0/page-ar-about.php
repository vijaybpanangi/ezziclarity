<?php
/**
 * Template Name: AR - About
 *
 * NOTE: Arabic prose reconstructed from EN/FR parallels — source paste was mojibake.
 * Structure (CSS classes, PHP routing, dir attributes, link targets) is verbatim.
 * See archive README.md for full caveats.
 */
?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="عن Ezzi Clarity — نهج هادئ ومنظم لدعم نجاح الطلاب والتعليم التجريبي. تأسست على يد Arva Yusuf Ezzi، ماجستير في التربية (OISE، جامعة تورنتو).">
  <meta property="og:title" content="من نحن — Ezzi Clarity Educational Consulting">
  <meta property="og:description" content="نهج هادئ ومنظم لدعم نجاح الطلاب والتعليم التجريبي في كندا.">
  <meta property="og:type" content="website">
  <link rel="canonical" href="<?php echo esc_url(home_url('/ar/about/')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body>

<?php get_template_part('header-ar', null, ['active' => 'about', 'lang_page' => 'about/']); ?>

<main id="main-content">

  <section class="page-header">
    <div class="container">
      <p class="eyebrow">عن Ezzi Clarity</p>
      <h1>نهج هادئ ومنظم لدعم نجاح الطلاب والتعليم التجريبي.</h1>
      <p>
        تعمل Ezzi Clarity عند نقطة التقاء المؤسسات التعليمية والطلاب وأصحاب العمل.
        هدفنا بسيط: توضيح التوقعات، تقليل الاحتكاك، وتحسين النتائج —
        دون تعقيد غير ضروري أو وعود مبالغ فيها.
      </p>
    </div>
  </section>

  <section class="section-alt">
    <div class="container grid grid-2">
      <div>
        <p class="eyebrow">قصتنا</p>
        <h2>لماذا أُسِّست Ezzi Clarity</h2>
        <p>
          أُسِّست Ezzi Clarity استجابةً لواقع بسيط: الفجوة بين ما تَعِد به المؤسسات الأكاديمية
          وما يَعِيشه الطلاب فعليًا كثيرًا ما تكون واسعة وقابلة للتجنب ومُكلِفة — للجميع.
        </p>
        <p>
          بعد سنوات من العمل داخل الجامعات الكندية، رأت Arva Yusuf Ezzi عن كثب كيف أن كثيرًا
          من الصعوبات التي يواجهها الطلاب لا تنبع من نقص في الجهد، بل من تعارض بين التوقعات
          والواقع — من كلا الجانبين. المؤسسات تصمم برامج بنوايا حسنة، والطلاب يصلون بافتراضاتهم
          الخاصة، وأصحاب العمل يتوقعون استعدادًا لم يعلِّمه أحد بشكل صريح.
        </p>
        <p>
          بُنِيت Ezzi Clarity لردم هذه الفجوة — بشكل عملي، محترم، دون تبسيط مفرط للتعقيد الحقيقي القائم.
        </p>
      </div>
      <div>
        <p class="eyebrow">مؤسستنا</p>
        <h2>Arva Yusuf Ezzi، ماجستير في التربية</h2>
        <p>
          تحمل Arva درجة الماجستير في التربية من OISE، جامعة تورنتو، بتخصص في نجاح الطلاب
          والتعليم التجريبي. عملت في قطاع التعليم ما بعد الثانوي في أونتاريو، حيث دعمت الطلاب
          وأعضاء هيئة التدريس والبرامج المؤسسية في سياقات محلية ودولية.
        </p>
        <p>
          يمتد مسارها الأكاديمي والمهني ليشمل الاستشارات التعليمية، وتصميم التعليم التجريبي،
          ودعم الانتقال نحو بداية المسار المهني — مع تركيز خاص على ما يلزم فعليًا لتحقيق
          النجاح في البيئات الأكاديمية الكندية.
        </p>
        <div style="margin-top:1.25rem;">
          <a href="<?php echo esc_url(home_url('/ar/contact/')); ?>" class="btn-primary">تواصل معنا</a>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">كيف نعمل</p>
        <h2>مبادؤنا</h2>
      </div>
      <div class="grid grid-3">
        <div class="card card--accent">
          <p class="card-tag">صدق</p>
          <h3>نقول الحقيقة</h3>
          <p>لا نقول للطلاب ما يريدون سماعه ولا نرفع التوقعات. نقول لهم ما هو دقيق وقابل للتطبيق — وهذا أكثر نفعًا بكثير.</p>
        </div>
        <div class="card card--accent">
          <p class="card-tag">احترام</p>
          <h3>نحترم الواقع المؤسسي</h3>
          <p>الجامعات والكليات تعمل ضمن قيود حقيقية. نعمل مع هذه القيود لا ضدها، مما يجعل توصياتنا قابلة للتطبيق فعليًا.</p>
        </div>
        <div class="card card--accent">
          <p class="card-tag">وضوح</p>
          <h3>نُبسِّط لا نُعقِّد</h3>
          <p>كل مخرج، كل محادثة، كل توصية مصمَّمة لتوضيح الأمور — لا لإثبات خبرتنا بتعقيدها أكثر.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section-cta">
    <div class="container section-cta-inner">
      <div>
        <p class="eyebrow">هل أنت مستعد للتواصل؟</p>
        <h2>ابدأ بمحادثة.</h2>
        <p>أخبرنا بما تعمل عليه وسنخبرك بصدق إذا كنا نستطيع المساعدة وكيف.</p>
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
