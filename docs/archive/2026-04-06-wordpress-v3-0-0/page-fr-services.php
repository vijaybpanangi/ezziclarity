<?php
/**
 * Template Name: FR - Services
 */
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Services d'Ezzi Clarity pour les établissements, les étudiants et les employeurs — réussite étudiante, apprentissage expérientiel et transition de carrière en Ontario.">
  <meta property="og:title" content="Services — Ezzi Clarity Educational Consulting">
  <meta property="og:description" content="Un soutien chaleureux et structuré pour les établissements, les étudiants et les employeurs.">
  <meta property="og:type" content="website">
  <link rel="canonical" href="<?php echo esc_url(home_url('/fr/services/')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body>

<?php get_template_part('header-fr', null, ['active' => 'services', 'lang_page' => 'services/']); ?>

<main id="main-content">

  <section class="page-header">
    <div class="container">
      <p class="eyebrow">Nos services</p>
      <h1>Un soutien concret,<br>là où vous en êtes.</h1>
      <p>
        Que vous soyez étudiant en quête de repères, un établissement qui souhaite améliorer ses programmes, ou un employeur
        qui veut mieux engager la prochaine génération — nous vous rencontrons là où vous êtes, avec un accompagnement honnête et pratique.
      </p>
    </div>
  </section>

  <section class="section-alt">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Ce que nous offrons</p>
        <h2>Trois domaines de soutien ciblé</h2>
        <p>Chaque service est conçu autour de besoins réels — pas de cadres abstraits. Pratique, atteignable et bien calibré.</p>
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
            <p>Soutien aux universités et collèges qui souhaitent renforcer l'apprentissage expérientiel, l'intégration des étudiants internationaux et la programmation de réussite académique.</p>
            <ul class="checklist">
              <li>Développement de programmes d'apprentissage expérientiel</li>
              <li>Soutien à l'intégration des étudiants internationaux</li>
              <li>Conception de programmes de réussite académique</li>
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
            <p>Soutien à la transition académique et professionnelle pour les étudiants nationaux et internationaux qui bénéficieraient d'un encadrement structuré et d'attentes claires.</p>
            <ul class="checklist">
              <li>Coaching de transition académique et professionnelle</li>
              <li>Ateliers de communication professionnelle</li>
              <li>Soutien aux stratégies d'étude et compétences d'apprentissage</li>
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
            <p>Conseil en recrutement universitaire et en engagement des talents en début de carrière pour les employeurs qui travaillent avec des étudiants et de nouveaux diplômés.</p>
            <ul class="checklist">
              <li>Stratégie de recrutement universitaire</li>
              <li>Planification de l'engagement des talents</li>
              <li>Positionnement de la marque employeur</li>
            </ul>
          </div>
        </article>

      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Comment nous travaillons</p>
        <h2>Un processus fondé sur l'écoute</h2>
        <p>Chaque mandat commence par une vraie conversation — nous devons comprendre votre situation avant de pouvoir vous proposer quoi que ce soit d'utile.</p>
      </div>
      <div class="process process-two-column">
        <div class="process-step">
          <div class="process-number">1</div>
          <div>
            <h3>Écouter et comprendre le contexte</h3>
            <p>Nous commençons par une conversation structurée pour comprendre votre contexte, vos programmes actuels, vos contraintes et les résultats qui vous importent le plus.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="process-number">2</div>
          <div>
            <h3>Clarifier les objectifs et la portée</h3>
            <p>Ensemble, nous définissons des objectifs réalistes et une portée claire qui correspond aux ressources disponibles et aux réalités institutionnelles.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="process-number">3</div>
          <div>
            <h3>Concevoir des étapes concrètes</h3>
            <p>Nous définissons des étapes qui peuvent réellement être mises en œuvre, avec un accent sur la clarté, la simplicité et le vécu des étudiants et du personnel.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="process-number">4</div>
          <div>
            <h3>Soutenir la mise en œuvre et la réflexion</h3>
            <p>Le cas échéant, nous restons disponibles pour soutenir les premières étapes de la mise en œuvre et réfléchir honnêtement à ce qui fonctionne et ce qui doit être ajusté.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-alt">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Questions fréquentes</p>
        <h2>Ce qu'on nous demande souvent</h2>
      </div>
      <div style="display:grid; gap:1rem; max-width:800px;">
        <div class="faq">
          <p class="faq-q">Offrez-vous des services en immigration ou en visas ?</p>
          <p class="faq-a">Non. Ezzi Clarity ne fournit pas de conseils en immigration, en visas ou en toute autre forme de consultation réglementée en immigration. Nous nous concentrons exclusivement sur la transition académique, la réussite étudiante et l'apprentissage expérientiel.</p>
        </div>
        <div class="faq">
          <p class="faq-q">Pouvez-vous travailler avec des établissements hors Ontario ?</p>
          <p class="faq-a">Notre focus principal est le sud de l'Ontario. Pour les établissements hors de cette région, nous évaluons la compatibilité au cas par cas selon la portée et le mode de prestation.</p>
        </div>
        <div class="faq">
          <p class="faq-q">Offrez-vous un soutien individuel aux étudiants ?</p>
          <p class="faq-a">Oui. Nous offrons du coaching de transition académique et professionnelle, ainsi que des ateliers ciblés pour les étudiants qui souhaitent un encadrement structuré.</p>
        </div>
        <div class="faq">
          <p class="faq-q">Combien de temps dure un engagement typique ?</p>
          <p class="faq-a">Cela dépend entièrement de la portée. Certains engagements se résument à un seul atelier ou une consultation. D'autres impliquent un travail consultatif continu sur un semestre ou une année académique. Nous convenons toujours de la portée avant de commencer.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section-cta">
    <div class="container section-cta-inner">
      <div>
        <p class="eyebrow">Prêt à faire le premier pas ?</p>
        <h2>Voyons si nous sommes le bon partenaire.</h2>
        <p>Un court appel d'introduction est le meilleur point de départ — sans engagement, juste une conversation honnête sur votre situation.</p>
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
