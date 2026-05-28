<?php
/**
 * Shared header partial — French
 * Usage: get_template_part('header-fr', null, ['active' => 'home', 'lang_page' => '']);
 */
$active = $args['active'] ?? '';
$lang_page = $args['lang_page'] ?? '';
?>
<a class="skip-link" href="#main-content">Aller au contenu principal</a>

<header class="site-header">
  <div class="container header-inner">

    <a href="<?php echo esc_url(home_url('/fr/')); ?>" class="brand" aria-label="Ezzi Clarity — Accueil">
      <img class="brand-logo" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-ec.svg'); ?>" alt="">
      <div class="brand-text">
        <span class="brand-name">Ezzi Clarity</span>
      </div>
    </a>

    <nav class="main-nav" aria-label="Navigation principale">
      <a href="<?php echo esc_url(home_url('/fr/')); ?>"           class="nav-link <?php echo $active==='home'      ? 'nav-active' : ''; ?>">Accueil</a>
      <a href="<?php echo esc_url(home_url('/fr/a-propos/')); ?>"  class="nav-link <?php echo $active==='about'     ? 'nav-active' : ''; ?>">À propos</a>
      <a href="<?php echo esc_url(home_url('/fr/services/')); ?>"  class="nav-link <?php echo $active==='services'  ? 'nav-active' : ''; ?>">Services</a>
      <a href="<?php echo esc_url(home_url('/fr/ressources/')); ?>" class="nav-link <?php echo $active==='resources' ? 'nav-active' : ''; ?>">Ressources</a>
      <a href="<?php echo esc_url(home_url('/fr/contact/')); ?>"   class="nav-link <?php echo $active==='contact'   ? 'nav-active' : ''; ?>">Contact</a>
    </nav>

    <div class="lang-switch" aria-label="Langue">
      <a class="nav-link" href="<?php echo esc_url(home_url('/en/' . ltrim($lang_page, '/'))); ?>">EN</a>
      <a class="nav-link nav-cta" href="<?php echo esc_url(home_url('/fr/' . ltrim($lang_page, '/'))); ?>" aria-current="true">FR</a>
      <a class="nav-link" href="<?php echo esc_url(home_url('/ar/' . ltrim($lang_page, '/'))); ?>">AR</a>
    </div>

    <a href="<?php echo esc_url(home_url('/fr/contact/')); ?>" class="header-cta">Prendre rendez-vous</a>

    <button class="nav-toggle" aria-expanded="false" aria-controls="mobile-nav" aria-label="Ouvrir le menu">
      <span></span><span></span><span></span>
    </button>

  </div>
</header>

<div class="mobile-nav" id="mobile-nav" aria-hidden="true">
  <nav class="mobile-nav-links" aria-label="Navigation mobile">
    <a href="<?php echo esc_url(home_url('/fr/')); ?>"           class="<?php echo $active==='home'      ? 'nav-active' : ''; ?>">Accueil</a>
    <a href="<?php echo esc_url(home_url('/fr/a-propos/')); ?>"  class="<?php echo $active==='about'     ? 'nav-active' : ''; ?>">À propos</a>
    <a href="<?php echo esc_url(home_url('/fr/services/')); ?>"  class="<?php echo $active==='services'  ? 'nav-active' : ''; ?>">Services</a>
    <a href="<?php echo esc_url(home_url('/fr/ressources/')); ?>" class="<?php echo $active==='resources' ? 'nav-active' : ''; ?>">Ressources</a>
    <a href="<?php echo esc_url(home_url('/fr/contact/')); ?>"   class="<?php echo $active==='contact'   ? 'nav-active' : ''; ?>">Contact</a>
  </nav>
  <div class="mobile-lang">
    <a href="<?php echo esc_url(home_url('/en/' . ltrim($lang_page, '/'))); ?>">EN</a>
    <a class="nav-cta" href="<?php echo esc_url(home_url('/fr/' . ltrim($lang_page, '/'))); ?>">FR</a>
    <a href="<?php echo esc_url(home_url('/ar/' . ltrim($lang_page, '/'))); ?>">AR</a>
  </div>
  <a href="<?php echo esc_url(home_url('/fr/contact/')); ?>" class="mobile-cta">Prendre un rendez-vous</a>
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
