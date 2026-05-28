<?php
/**
 * Template Name: FR - About
 */
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="À propos d'Ezzi Clarity — un cabinet-conseil en réussite étudiante et apprentissage expérientiel fondé par Arva Yusuf Ezzi, M.Éd. (OISE, Université de Toronto).">
  <meta property="og:title" content="À propos — Ezzi Clarity Educational Consulting">
  <meta property="og:description" content="Une approche calme et structurée pour la réussite étudiante et l'apprentissage expérientiel. Fondé par Arva Yusuf Ezzi, M.Éd.">
  <meta property="og:type" content="website">
  <link rel="canonical" href="<?php echo esc_url(home_url('/fr/a-propos/')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body>

<?php get_template_part('header-fr', null, ['active' => 'about', 'lang_page' => 'a-propos/']); ?>

<main id="main-content">

  <!-- ── EN-TÊTE ───────────────────────────────── -->
  <section class="page-header">
    <div class="container">
      <p class="eyebrow">À propos d'Ezzi Clarity</p>
      <h1>Une approche calme et structurée pour la réussite étudiante et l'apprentissage expérientiel.</h1>
      <p>
        Ezzi Clarity se situe à l'intersection des établissements, des étudiants et des employeurs.
        Notre objectif est simple : clarifier les attentes, réduire les frictions et améliorer les résultats —
        sans complexité inutile ni promesses irréalistes.
      </p>
    </div>
  </section>

  <!-- ── NOTRE HISTOIRE ────────────────────────── -->
  <section class="section-alt">
    <div class="container grid grid-2">
      <div>
        <p class="eyebrow">Notre histoire</p>
        <h2>Pourquoi Ezzi Clarity existe</h2>
        <p>
          Ezzi Clarity a été créé pour répondre à une réalité simple : l'écart entre ce que les établissements
          académiques promettent et ce que les étudiants vivent réellement est souvent large, évitable et
          coûteux — pour tout le monde.
        </p>
        <p>
          Après des années de travail au sein des universités canadiennes, Arva Yusuf Ezzi a vu de près
          combien de difficultés étudiantes ne viennent pas d'un manque d'effort, mais d'un décalage entre
          attentes et réalité — des deux côtés. Les établissements conçoivent des programmes avec de bonnes
          intentions. Les étudiants arrivent avec leurs propres présupposés. Les employeurs attendent une
          préparation que personne n'a explicitement enseignée.
        </p>
        <p>
          Ezzi Clarity a été créé pour combler cet écart — de façon pratique, respectueuse, et sans
          simplifier à l'excès la complexité réelle en jeu.
        </p>
      </div>
      <div>
        <p class="eyebrow">Notre fondatrice</p>
        <h2>Arva Yusuf Ezzi, M.Éd.</h2>
        <p>
          Arva détient une maîtrise en éducation de l'OISE, Université de Toronto, axée sur la réussite
          étudiante et l'apprentissage expérientiel. Elle a travaillé dans l'enseignement postsecondaire
          en Ontario, soutenant les étudiants, le corps professoral et les programmes institutionnels dans
          des contextes nationaux et internationaux.
        </p>
        <p>
          Son parcours académique et professionnel englobe le conseil pédagogique, la conception de
          l'apprentissage expérientiel et le soutien à la transition vers le début de carrière — avec
          une attention particulière à ce qu'il faut réellement pour réussir dans les environnements
          académiques canadiens.
        </p>
        <div style="margin-top:1.25rem;">
          <a href="<?php echo esc_url(home_url('/fr/contact/')); ?>" class="btn-primary">Nous contacter</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ── VALEURS ───────────────────────────────── -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Comment nous travaillons</p>
        <h2>Nos principes</h2>
      </div>
      <div class="grid grid-3">
        <div class="card card--accent">
          <p class="card-tag">Honnêteté</p>
          <h3>Nous disons ce qui est vrai</h3>
          <p>Nous ne disons pas aux étudiants ce qu'ils veulent entendre et n'amplifions pas les attentes. Nous leur disons ce qui est précis et actionnable — ce qui s'avère bien plus utile.</p>
        </div>
        <div class="card card--accent">
          <p class="card-tag">Respect</p>
          <h3>Nous respectons la réalité institutionnelle</h3>
          <p>Les universités et collèges fonctionnent dans des contraintes réelles. Nous travaillons avec ces réalités plutôt que contre elles, ce qui rend nos recommandations réellement applicables.</p>
        </div>
        <div class="card card--accent">
          <p class="card-tag">Clarté</p>
          <h3>Nous réduisons, pas ajoutons, la complexité</h3>
          <p>Chaque livrable, chaque conversation, chaque recommandation est conçu pour clarifier les choses — et non pour démontrer notre expertise en les compliquant davantage.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ── CTA ──────────────────────────────────── -->
  <section class="section-cta">
    <div class="container section-cta-inner">
      <div>
        <p class="eyebrow">Prêt à nous contacter ?</p>
        <h2>Commencez par une conversation.</h2>
        <p>Dites-nous sur quoi vous travaillez et nous vous dirons honnêtement si et comment nous pouvons aider.</p>
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
