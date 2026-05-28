<?php
/**
 * Template Name: FR - Resources
 */
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Ressources pratiques sur la transition académique, l'apprentissage expérientiel et le développement en début de carrière — pour étudiants, établissements et employeurs.">
  <meta property="og:title" content="Ressources — Ezzi Clarity Educational Consulting">
  <meta property="og:description" content="Des repères concrets sur les transitions académiques, l'apprentissage expérientiel et le développement professionnel.">
  <meta property="og:type" content="website">
  <link rel="canonical" href="<?php echo esc_url(home_url('/fr/ressources/')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body class="page-resources">

<?php get_template_part('header-fr', null, ['active' => 'resources', 'lang_page' => 'ressources/']); ?>

<main id="main-content">

  <section class="page-header">
    <div class="container">
      <p class="eyebrow">Outils et repères</p>
      <h1>Des ressources pour avancer<br>avec confiance.</h1>
      <p>
        Ces sujets reflètent les questions que nous entendons le plus souvent de la part des étudiants, des établissements et des employeurs.
        Chacun est ancré dans l'expérience concrète — pas dans la théorie abstraite.
      </p>
    </div>
  </section>

  <section class="section-alt">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Pour les étudiants et les établissements</p>
        <h2>Transition académique</h2>
        <p>Ce qui aide les étudiants à aborder la vie postsecondaire canadienne avec des attentes réalistes et une vision claire de ce qui les attend.</p>
      </div>
      <div class="grid grid-3">
        <article class="service-card card-inst">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-academic-1.png'); ?>"
                 alt="Illustration des attentes académiques" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill inst">Académique</span>
            <h3>Comprendre les attentes académiques au Canada</h3>
            <p>Un aperçu concis du fonctionnement des salles de classe canadiennes — participation, évaluation, heures de disponibilité et soutien académique.</p>
          </div>
        </article>
        <article class="service-card card-inst">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-academic-2.png'); ?>"
                 alt="Illustration des stratégies d'étude" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill inst">Méthodes</span>
            <h3>Construire des stratégies d'étude durables</h3>
            <p>Des approches concrètes de planification, prise de notes, lecture et préparation aux examens qui aident les étudiants à gérer leur charge de travail.</p>
          </div>
        </article>
        <article class="service-card card-inst">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-academic-3.png'); ?>"
                 alt="Illustration de la rétroaction" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill inst">Rétroaction</span>
            <h3>Travailler avec la rétroaction</h3>
            <p>Comment recevoir, comprendre et utiliser la rétroaction académique pour en faire un outil de progression plutôt qu'une source d'anxiété.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Pour les établissements et les employeurs</p>
        <h2>Apprentissage expérientiel</h2>
        <p>Principes de conception et considérations pratiques pour les établissements qui créent ou renforcent des programmes d'apprentissage intégré au travail.</p>
      </div>
      <div class="grid grid-3">
        <article class="service-card card-stud">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-experiential-1.png'); ?>"
                 alt="Illustration de l'apprentissage expérientiel" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill stud">Aperçu</span>
            <h3>Comment l'apprentissage expérientiel améliore les résultats</h3>
            <p>Un survol du WIL, des stages coop, des stages et des projets appliqués — et comment ils renforcent la confiance et la préparation à la carrière.</p>
          </div>
        </article>
        <article class="service-card card-stud">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-experiential-2.png'); ?>"
                 alt="Illustration de la conception de programme" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill stud">Conception</span>
            <h3>Concevoir des programmes d'apprentissage expérientiel</h3>
            <p>Éléments clés à considérer pour planifier ou affiner des offres d'apprentissage expérientiel — résultats clairs, préparation des étudiants, communication avec les partenaires.</p>
          </div>
        </article>
        <article class="service-card card-stud">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-experiential-3.png'); ?>"
                 alt="Illustration de partenariat employeur" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill stud">Partenariats</span>
            <h3>Bâtir des partenariats employeurs durables</h3>
            <p>Repères pratiques pour entretenir des relations employeurs qui soutiennent les étudiants sans surcharger la capacité institutionnelle ou celle des employeurs.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="section-alt">
    <div class="container">
      <div class="section-header">
        <p class="eyebrow">Pour les étudiants et les employeurs</p>
        <h2>Développement en début de carrière</h2>
        <p>Des cadres pour aider les étudiants et les nouveaux diplômés à vivre cette transition de la vie académique au monde professionnel avec plus d'intention et moins d'incertitude.</p>
      </div>
      <div class="grid grid-3">
        <article class="service-card card-empl">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-earlycareer-1.png'); ?>"
                 alt="Illustration de la préparation au début de carrière" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill empl">Préparation</span>
            <h3>Préparer les talents émergents pour le monde du travail</h3>
            <p>Comment aider les étudiants à passer de la confiance en classe à la préparation au milieu professionnel — avec une vision réaliste des compétences et de l'expérience.</p>
          </div>
        </article>
        <article class="service-card card-empl">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-earlycareer-2.png'); ?>"
                 alt="Illustration de la marque employeur" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill empl">Employeurs</span>
            <h3>Positionnement de la marque employeur auprès des étudiants</h3>
            <p>Comment présenter son travail, sa culture et ses attentes de façon à résonner avec les étudiants, en restant transparent sur les exigences et les limites.</p>
          </div>
        </article>
        <article class="service-card card-empl">
          <div class="service-card-img">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resources-earlycareer-3.png'); ?>"
                 alt="Illustration de conversations de carrière" loading="lazy">
          </div>
          <div class="service-card-body">
            <span class="svc-pill empl">Conversations</span>
            <h3>Soutenir des conversations de carrière réalistes</h3>
            <p>Des approches pour parler de carrière avec les étudiants en équilibrant aspiration et honnêteté, et en clarifiant opportunités et limites avec bienveillance.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="section-cta">
    <div class="container section-cta-inner">
      <div>
        <p class="eyebrow">Pour aller plus loin</p>
        <h2>D'autres ressources arrivent bientôt.</h2>
        <p>Cette bibliothèque continuera de s'enrichir. En attendant, ces thèmes guident tout notre travail de conseil — contactez-nous si vous avez une question spécifique.</p>
      </div>
      <div>
        <a href="<?php echo esc_url(home_url('/fr/contact/')); ?>" class="btn-primary btn-lg">Nous contacter</a>
      </div>
    </div>
  </section>

</main>

<?php get_template_part('footer-fr'); ?>

</body>
</html>
