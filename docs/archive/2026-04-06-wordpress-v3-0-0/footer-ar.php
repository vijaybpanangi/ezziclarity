<?php /* Save everything between these comments as footer-ar.php */ ?>
<?php /* NOTE: Arabic strings re-translated from the EN/FR parallels — the source paste delivered them as mojibake. Structure (CSS classes, dir="ltr"/"rtl" wrapping, lang_page routing, link targets) is verbatim. */ ?>
<footer class="site-footer" dir="rtl">
  <div class="container">
    <div class="footer-grid">

      <div class="footer-brand">
        <img class="footer-logo" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-ec.svg'); ?>" alt="Ezzi Clarity logo">
        <span class="footer-name">Ezzi Clarity Educational Consulting</span>
        <p class="footer-desc">استشارات في نجاح الطلاب والتعليم التجريبي للطلاب والمؤسسات وأصحاب العمل في جنوب أونتاريو. تأسست على يد Arva Yusuf Ezzi، ماجستير في التربية (OISE، جامعة تورنتو).</p>
        <p class="footer-desc" style="margin-top:0.25rem; font-style:italic;">جميع خدماتنا أكاديمية ومهنية. لا نقدم أي استشارات في مجال الهجرة أو التأشيرات.</p>
      </div>

      <div class="footer-col">
        <h4>التنقل</h4>
        <ul>
          <li><a href="<?php echo esc_url(home_url('/ar/')); ?>">الرئيسية</a></li>
          <li><a href="<?php echo esc_url(home_url('/ar/about/')); ?>">من نحن</a></li>
          <li><a href="<?php echo esc_url(home_url('/ar/services/')); ?>">الخدمات</a></li>
          <li><a href="<?php echo esc_url(home_url('/ar/resources/')); ?>">الموارد</a></li>
          <li><a href="<?php echo esc_url(home_url('/ar/contact/')); ?>">تواصل معنا</a></li>
        </ul>
      </div>

      <div class="footer-col" dir="ltr">
        <h4 dir="rtl">تواصل معنا</h4>
        <ul>
          <li><a href="tel:+16475059487">+1 (647) 505-9487</a></li>
          <li><a href="tel:+12263368100">+1 (226) 336-8100</a></li>
          <li><a href="mailto:info@ezziclarity.ca">info@ezziclarity.ca</a></li>
          <li style="color:rgba(255,255,255,0.45); font-size:0.8rem; margin-top:0.5rem; direction:rtl;">منطقة واترلو، أونتاريو</li>
          <li><a href="https://book.titan.email/ezziclarity/intro" target="_blank" rel="noopener">احجز مكالمة →</a></li>
        </ul>
      </div>

    </div>

    <div class="footer-bottom" dir="ltr">
      <p>© <?php echo date('Y'); ?> Ezzi Clarity Educational Consulting Services Inc.</p>
      <div class="footer-lang">
        <a href="<?php echo esc_url(home_url('/en/')); ?>">EN</a>
        <a href="<?php echo esc_url(home_url('/fr/')); ?>">FR</a>
        <a class="active" href="<?php echo esc_url(home_url('/ar/')); ?>">AR</a>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
