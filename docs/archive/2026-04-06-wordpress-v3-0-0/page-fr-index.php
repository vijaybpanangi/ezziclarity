<?php
/**
 * Template Name: FR - Index
 */
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Ezzi Clarity Educational Consulting — réussite étudiante, soutien aux transitions académiques et apprentissage expérientiel pour étudiants, établissements et employeurs en Ontario.">
  <meta property="og:title" content="Ezzi Clarity — Moins de bruit. Plus de signal.">
  <meta property="og:description" content="Cabinet-conseil en réussite étudiante et apprentissage expérientiel pour étudiants, établissements et employeurs en Ontario.">
  <meta property="og:type" content="website">
  <link rel="canonical" href="<?php echo esc_url(home_url('/fr/')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body>

<?php get_template_part('header-fr', null, ['active' => 'home']); ?>

<main id="main-content">

  <!-- ── HERO ────────────────────────────────── -->
  <section class="hero">
    <div class="container hero-inner">

      <div class="hero-copy">
        <p class="eyebrow">Services-conseils en éducation · Ontario</p>
        <h1>Votre avenir,<br><em>enfin clarifié.</em></h1>
        <p>
          Nous accompagnons les étudiants dans les systèmes académiques canadiens, soutenons les établissements
          dans la conception de meilleurs programmes d'apprentissage expérientiel, et orientons les employeurs
          dans leur engagement auprès des talents en début de carrière — avec chaleur, structure et expertise réelle.
        </p>
        <div class="hero-actions">
          <a href="<?php echo esc_url(home_url('/fr/contact/')); ?>" class="btn-primary btn-lg">Prendre un rendez-vous</a>
          <a href="<?php echo esc_url(home_url('/fr/services/')); ?>" class="btn-secondary">Nos services</a>
        </div>
        <p class="hero-footnote">Services axés sur l'académique et la carrière uniquement. Aucun conseil en immigration ou en visa.</p>
      </div>

      <div class="hero-panel">
        <div class="hero-visual">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-ecosystem.png'); ?>"
               alt="Étudiants, établissements et employeurs travaillant ensemble"
               loading="eager">
        </div>
        <aside class="hero-card">
          <p class="eyebrow">Avec qui nous travaillons</p>
          <ul class="checklist">
            <li>Universités et collèges qui renforcent leurs programmes d'apprentissage expérientiel.</li>
            <li>Étudiants nationaux et internationaux qui naviguent dans les attentes académiques canadiennes.</li>
            <li>Employeurs qui souhaitent un engagement plus réfléchi auprès des talents en début de carrière.</li>
          </ul>
        </aside>
      </div>

    </div>
  </section>

  <!-- ── TRUST BAR ─────────────────────────────── -->
  <div class="trust-bar">
    <div class="container trust-bar-inner">
      <span class="trust-item">Basé en Ontario</span>
      <span class="trust-item">M.Éd. — OISE, Université de Toronto</span>
      <span class="trust-item">Étudiants · Établissements · Employeurs</span>
      <span class="trust-item">English · Français · العربية</span>
    </div>
  </div>

  <!-- ── NOTRE APPROCHE ─────────────────────────── -->
  <section class="section-alt">
    <div class="container">
      <div class="section-header" style="text-align:center; margin-bottom:2.5rem;">
        <p class="eyebrow">Notre approche</p>
        <h2>Ce que ça ressent de travailler avec nous</h2>
      </div>

      <div class="section-visual section-visual--feels">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/section-feels-ezzi.png'); ?>"
             alt="Environnement d'apprentissage calme et structuré" loading="lazy">
      </div>

      <div class="grid grid-3" style="margin-top:2rem;">
        <div class="card card--accent">
          <p class="card-tag">Clarté</p>
          <h3>La clarté avant la complexité</h3>
          <p>Nous traduisons les politiques, les attentes et les exigences des programmes en langage simple et en étapes concrètes — pour les étudiants, le personnel et les employeurs.</p>
        </div>
        <div class="card card--accent">
          <p class="card-tag">Expérience</p>
          <h3>Ancré dans l'expérience réelle</h3>
          <p>Notre travail est façonné par une expérience directe au sein des universités canadiennes et par une compréhension de première main de la façon dont les étudiants s'engagent réellement.</p>
        </div>
        <div class="card card--accent">
          <p class="card-tag">Structure</p>
          <h3>Chaleureux, professionnel, structuré</h3>
          <p>Nous adoptons une approche calme, organisée et culturellement consciente qui respecte les réalités institutionnelles et les besoins individuels des étudiants.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── SERVICES PRINCIPAUX ────────────────────── -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Aperçu des services</p>
        <h2>Nos domaines de service principaux</h2>
        <p>Un soutien ciblé et pratique à travers l'écosystème étudiant–établissement–employeur.</p>
      </div>

      <div class="grid grid-3">
        <article class="service-card card-inst">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/services-institution.png'); ?>"
                 alt="Enseignants et personnel en collaboration" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill inst">Établissements</span>
            <h3>Services aux établissements</h3>
            <p>Soutien aux universités et collèges qui souhaitent renforcer l'éducation expérientielle, l'intégration des étudiants internationaux et les initiatives de réussite académique.</p>
            <ul class="checklist">
              <li>Développement de programmes d'apprentissage expérientiel</li>
              <li>Soutien à la transition des étudiants internationaux</li>
              <li>Programmation axée sur la réussite et la rétention</li>
            </ul>
          </div>
        </article>

        <article class="service-card card-stud">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/services-student.png'); ?>"
                 alt="Étudiant et conseiller en conversation" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill stud">Étudiants</span>
            <h3>Services aux étudiants</h3>
            <p>Soutien individuel et en petits groupes pour les étudiants qui naviguent dans les attentes académiques et les décisions de début de carrière au Canada.</p>
            <ul class="checklist">
              <li>Coaching de transition académique et professionnelle</li>
              <li>Ateliers de communication professionnelle</li>
              <li>Stratégies d'étude et compétences d'apprentissage</li>
            </ul>
          </div>
        </article>

        <article class="service-card card-empl">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/services-employer.png'); ?>"
                 alt="Employeur s'adressant à des talents en début de carrière" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill empl">Employeurs</span>
            <h3>Services aux employeurs</h3>
            <p>Orientation pour les employeurs qui souhaitent engager les étudiants et les diplômés de façon cohérente et adaptée aux réalités étudiantes.</p>
            <ul class="checklist">
              <li>Stratégie d'engagement des talents en début de carrière</li>
              <li>Cadres d'intégration adaptés aux étudiants</li>
              <li>Alignement des attentes en milieu de travail</li>
            </ul>
          </div>
        </article>
      </div>

      <div style="text-align:center; margin-top:2rem;">
        <a href="<?php echo esc_url(home_url('/fr/services/')); ?>" class="btn-secondary">Voir tous les services</a>
      </div>
    </div>
  </section>

  <!-- ── CTA ────────────────────────────────────── -->
  <section class="section-cta">
    <div class="container section-cta-inner">
      <div>
        <p class="eyebrow">Prêt à commencer ?</p>
        <h2>Parlons de votre contexte spécifique.</h2>
        <p>Que vous soyez étudiant, établissement ou employeur — la conversation commence par la compréhension de votre situation.</p>
      </div>
      <div>
        <a href="<?php echo esc_url(home_url('/fr/contact/')); ?>" class="btn-primary btn-lg">Réserver un appel gratuit</a>
      </div>
    </div>
  </section>

</main>

<?php get_template_part('footer-fr'); ?>

</body>
</html>
