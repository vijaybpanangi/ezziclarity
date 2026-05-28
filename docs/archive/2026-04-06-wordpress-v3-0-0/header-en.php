<?php
/**
 * Shared header partial — English
 * Usage: get_template_part('header-en', null, ['active' => 'home']);
 *
 * Pass $args['active'] as: 'home' | 'about' | 'services' | 'resources' | 'contact'
 */
$active = $args['active'] ?? '';
$lang_page = $args['lang_page'] ?? ''; // e.g. '/en/about/' for the FR/AR equivalent
?>
<a class="skip-link" href="#main-content">Skip to main content</a>

<header class="site-header">
  <div class="container header-inner">

    <a href="<?php echo esc_url(home_url('/en/')); ?>" class="brand" aria-label="Ezzi Clarity — Home">
      <img class="brand-logo" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-ec.svg'); ?>" alt="">
      <div class="brand-text">
        <span class="brand-name">Ezzi Clarity</span>
      </div>
    </a>

    <nav class="main-nav" aria-label="Main navigation">
      <a href="<?php echo esc_url(home_url('/en/')); ?>"           class="nav-link <?php echo $active==='home'      ? 'nav-active' : ''; ?>">Home</a>
      <a href="<?php echo esc_url(home_url('/en/about/')); ?>"     class="nav-link <?php echo $active==='about'     ? 'nav-active' : ''; ?>">About</a>
      <a href="<?php echo esc_url(home_url('/en/services/')); ?>"  class="nav-link <?php echo $active==='services'  ? 'nav-active' : ''; ?>">Services</a>
      <a href="<?php echo esc_url(home_url('/en/resources/')); ?>" class="nav-link <?php echo $active==='resources' ? 'nav-active' : ''; ?>">Resources</a>
      <a href="<?php echo esc_url(home_url('/en/contact/')); ?>"   class="nav-link <?php echo $active==='contact'   ? 'nav-active' : ''; ?>">Contact</a>
    </nav>

    <div class="lang-switch" aria-label="Language">
      <a class="nav-link nav-cta" href="<?php echo esc_url(home_url('/en/' . ltrim($lang_page, '/'))); ?>" aria-current="true">EN</a>
      <a class="nav-link" href="<?php echo esc_url(home_url('/fr/' . ltrim($lang_page, '/'))); ?>">FR</a>
      <a class="nav-link" href="<?php echo esc_url(home_url('/ar/' . ltrim($lang_page, '/'))); ?>">AR</a>
    </div>

    <a href="<?php echo esc_url(home_url('/en/contact/')); ?>" class="header-cta">Book a Call</a>

    <button class="nav-toggle" aria-expanded="false" aria-controls="mobile-nav" aria-label="Open menu">
      <span></span><span></span><span></span>
    </button>

  </div>
</header>

<!-- Mobile nav drawer -->
<div class="mobile-nav" id="mobile-nav" aria-hidden="true">
  <nav class="mobile-nav-links" aria-label="Mobile navigation">
    <a href="<?php echo esc_url(home_url('/en/')); ?>"           class="<?php echo $active==='home'      ? 'nav-active' : ''; ?>">Home</a>
    <a href="<?php echo esc_url(home_url('/en/about/')); ?>"     class="<?php echo $active==='about'     ? 'nav-active' : ''; ?>">About</a>
    <a href="<?php echo esc_url(home_url('/en/services/')); ?>"  class="<?php echo $active==='services'  ? 'nav-active' : ''; ?>">Services</a>
    <a href="<?php echo esc_url(home_url('/en/resources/')); ?>" class="<?php echo $active==='resources' ? 'nav-active' : ''; ?>">Resources</a>
    <a href="<?php echo esc_url(home_url('/en/contact/')); ?>"   class="<?php echo $active==='contact'   ? 'nav-active' : ''; ?>">Contact</a>
  </nav>
  <div class="mobile-lang">
    <a class="nav-cta" href="<?php echo esc_url(home_url('/en/' . ltrim($lang_page, '/'))); ?>">EN</a>
    <a href="<?php echo esc_url(home_url('/fr/' . ltrim($lang_page, '/'))); ?>">FR</a>
    <a href="<?php echo esc_url(home_url('/ar/' . ltrim($lang_page, '/'))); ?>">AR</a>
  </div>
  <a href="<?php echo esc_url(home_url('/en/contact/')); ?>" class="mobile-cta">Book an Intro Call</a>
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
