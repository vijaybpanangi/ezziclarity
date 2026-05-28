<?php
/**
 * Shared header partial — Arabic (RTL)
 * Usage: get_template_part('header-ar', null, ['active' => 'home', 'lang_page' => '']);
 *
 * NOTE: Arabic strings in this archived copy are mojibake (UTF-8 bytes
 * reinterpreted as Latin-1 during the source paste). The structural fidelity
 * — template logic, CSS classes, dir="ltr" / dir="rtl" wrapping, lang_page
 * routing — is preserved verbatim; the Arabic prose itself is corrupted in
 * this archive copy. Live production used proper Arabic. See archive README.
 */
$active = $args['active'] ?? '';
$lang_page = $args['lang_page'] ?? '';
?>
<a class="skip-link" href="#main-content">الانتقال إلى المحتوى الرئيسي</a>

<header class="site-header">
  <div class="container header-inner">

    <a href="<?php echo esc_url(home_url('/ar/')); ?>" class="brand" aria-label="Ezzi Clarity — الرئيسية">
      <img class="brand-logo" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-ec.svg'); ?>" alt="">
      <div class="brand-text">
        <span class="brand-name">Ezzi Clarity</span>
      </div>
    </a>

    <!-- Keep nav LTR for visual stability -->
    <nav class="main-nav" dir="ltr" aria-label="التنقل الرئيسي">
      <a href="<?php echo esc_url(home_url('/ar/')); ?>"           class="nav-link <?php echo $active==='home'      ? 'nav-active' : ''; ?>">الرئيسية</a>
      <a href="<?php echo esc_url(home_url('/ar/about/')); ?>"     class="nav-link <?php echo $active==='about'     ? 'nav-active' : ''; ?>">من نحن</a>
      <a href="<?php echo esc_url(home_url('/ar/services/')); ?>"  class="nav-link <?php echo $active==='services'  ? 'nav-active' : ''; ?>">الخدمات</a>
      <a href="<?php echo esc_url(home_url('/ar/resources/')); ?>" class="nav-link <?php echo $active==='resources' ? 'nav-active' : ''; ?>">الموارد</a>
      <a href="<?php echo esc_url(home_url('/ar/contact/')); ?>"   class="nav-link <?php echo $active==='contact'   ? 'nav-active' : ''; ?>">تواصل معنا</a>
    </nav>

    <div class="lang-switch" dir="ltr" aria-label="اللغة">
      <a class="nav-link" href="<?php echo esc_url(home_url('/en/' . ltrim($lang_page, '/'))); ?>">EN</a>
      <a class="nav-link" href="<?php echo esc_url(home_url('/fr/' . ltrim($lang_page, '/'))); ?>">FR</a>
      <a class="nav-link nav-cta" href="<?php echo esc_url(home_url('/ar/' . ltrim($lang_page, '/'))); ?>" aria-current="true">AR</a>
    </div>

    <a href="<?php echo esc_url(home_url('/ar/contact/')); ?>" class="header-cta">احجز مكالمة</a>

    <button class="nav-toggle" aria-expanded="false" aria-controls="mobile-nav" aria-label="فتح القائمة">
      <span></span><span></span><span></span>
    </button>

  </div>
</header>

<div class="mobile-nav" id="mobile-nav" aria-hidden="true">
  <nav class="mobile-nav-links" dir="rtl" aria-label="التنقل على الجوال">
    <a href="<?php echo esc_url(home_url('/ar/')); ?>"           class="<?php echo $active==='home'      ? 'nav-active' : ''; ?>">الرئيسية</a>
    <a href="<?php echo esc_url(home_url('/ar/about/')); ?>"     class="<?php echo $active==='about'     ? 'nav-active' : ''; ?>">من نحن</a>
    <a href="<?php echo esc_url(home_url('/ar/services/')); ?>"  class="<?php echo $active==='services'  ? 'nav-active' : ''; ?>">الخدمات</a>
    <a href="<?php echo esc_url(home_url('/ar/resources/')); ?>" class="<?php echo $active==='resources' ? 'nav-active' : ''; ?>">الموارد</a>
    <a href="<?php echo esc_url(home_url('/ar/contact/')); ?>"   class="<?php echo $active==='contact'   ? 'nav-active' : ''; ?>">تواصل معنا</a>
  </nav>
  <div class="mobile-lang" dir="ltr">
    <a href="<?php echo esc_url(home_url('/en/' . ltrim($lang_page, '/'))); ?>">EN</a>
    <a href="<?php echo esc_url(home_url('/fr/' . ltrim($lang_page, '/'))); ?>">FR</a>
    <a class="nav-cta" href="<?php echo esc_url(home_url('/ar/' . ltrim($lang_page, '/'))); ?>">AR</a>
  </div>
  <a href="<?php echo esc_url(home_url('/ar/contact/')); ?>" class="mobile-cta">احجز مكالمة تعريفية</a>
</div>

<script>
(function(){
  var btn = document.querySelector('.nav-toggle');
  var drawer = document.getElementById('mobile-nav');
  if(!btn || !drawer) return;
  btn.addEventListener('click', function(){
    var open = btn.getAttribute('aria-expanded') === 'true';
    btn.setAttribute('aria-expanded', String(!open));
    drawer.classList.toggle('is-open', !open);
    drawer.setAttribute('aria-hidden', String(open));
  });
  document.addEventListener('keydown', function(e){
    if(e.key === 'Escape' && drawer.classList.contains('is-open')){
      btn.setAttribute('aria-expanded','false');
      drawer.classList.remove('is-open');
      drawer.setAttribute('aria-hidden','true');
      btn.focus();
    }
  });
})();
</script>
