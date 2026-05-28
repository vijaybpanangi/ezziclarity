<?php
/**
 * Template Name: FR - Contact
 */
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Contactez Ezzi Clarity — réservez un appel d'introduction ou rejoignez-nous par téléphone ou courriel. Basé dans la région de Waterloo, Ontario.">
  <meta property="og:title" content="Contact — Ezzi Clarity Educational Consulting">
  <meta property="og:description" content="Réservez un appel gratuit ou contactez-nous directement. Basé dans la région de Waterloo, Ontario.">
  <meta property="og:type" content="website">
  <link rel="canonical" href="<?php echo esc_url(home_url('/fr/contact/')); ?>">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
  <?php wp_head(); ?>
</head>
<body>

<?php get_template_part('header-fr', null, ['active' => 'contact', 'lang_page' => 'contact/']); ?>

<main id="main-content">

  <section class="page-header">
    <div class="container">
      <p class="eyebrow">Nous sommes là pour vous</p>
      <h1>Chaque conversation<br>commence par l'écoute.</h1>
      <p>La meilleure première étape est un court appel d'introduction — sans engagement, juste une conversation centrée sur votre situation et sur comment nous pourrions vous aider.</p>
      <div class="hero-actions">
        <a class="btn-primary btn-lg" href="https://book.titan.email/ezziclarity/intro" target="_blank" rel="noopener noreferrer">
          Réserver un appel d'introduction
        </a>
        <a class="btn-secondary" href="tel:+16475059487">Appeler maintenant</a>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="contact-layout">

        <div class="card contact-form contact-card">
          <h2 style="margin-top:0;">Coordonnées</h2>
          <p class="muted">Le mobile est le moyen le plus rapide de nous joindre. Si nous manquons votre appel, laissez un message vocal et nous vous rappellerons rapidement.</p>

          <ul class="contact-list">
            <li>
              <strong>Mobile (le plus rapide) :</strong>
              <a href="tel:+16475059487"><span class="ltr">+1 (647) 505-9487</span></a>
            </li>
            <li>
              <strong>Bureau :</strong>
              <a href="tel:+12263368100"><span class="ltr">+1 (226) 336-8100</span></a>
            </li>
            <li>
              <strong>Courriel :</strong>
              <a href="mailto:info@ezziclarity.ca"><span class="ltr">info@ezziclarity.ca</span></a>
            </li>
          </ul>

          <h3 style="margin-top:1.5rem; margin-bottom:0.4rem;">Adresse commerciale</h3>
          <p class="muted" style="margin-bottom:0;">180 Northfield Drive West, Unité 4, 1er étage<br>Waterloo, ON N2L 0C7, Canada</p>

          <h3 style="margin-top:1.25rem; margin-bottom:0.4rem;">Siège social enregistré</h3>
          <p class="muted" style="margin-bottom:0;">650 West Georgia Street, Suite 2110<br>Vancouver, BC V6B 4N8, Canada</p>

          <div style="margin-top:1.5rem; padding-top:1.25rem; border-top:1px solid var(--border);">
            <a class="btn-primary" href="https://book.titan.email/ezziclarity/intro" target="_blank" rel="noopener noreferrer" style="width:100%; justify-content:center;">
              Réserver un appel gratuit →
            </a>
          </div>

          <p class="small muted" style="margin-top:1rem; margin-bottom:0;">
            Tous nos services sont axés sur l'académique, la carrière et les établissements. Nous ne fournissons pas de conseils en immigration ou en visas.
          </p>
        </div>

        <div style="display:grid; gap:1.25rem;">
          <div class="card" style="padding:0; overflow:hidden; border-radius:var(--r-lg);">
            <img
              src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/contact-advisor-student.png'); ?>"
              alt="Conseiller et étudiant en conversation"
              style="width:100%; height:240px; object-fit:cover; border-radius:var(--r-lg); display:block; box-shadow:none;"
              loading="lazy"
            />
          </div>
          <div class="card">
            <h3 style="margin-top:0; margin-bottom:0.75rem;">Bureau principal</h3>
            <div style="border-radius:var(--r-md); overflow:hidden; border:1px solid var(--border);">
              <iframe
                title="Localisation du bureau d'Ezzi Clarity"
                src="https://www.google.com/maps?q=180%20Northfield%20Drive%20West%20Unit%204%20Waterloo%20ON%20N2L0C7&output=embed"
                width="100%" height="220"
                style="border:0; display:block;"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>

<?php get_template_part('footer-fr'); ?>

</body>
</html>
