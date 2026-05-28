<?php /* Save everything between these comments as footer-en.php */ ?>
<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">

      <div class="footer-brand">
        <img class="footer-logo" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-ec.svg'); ?>" alt="Ezzi Clarity logo">
        <span class="footer-name">Ezzi Clarity Educational Consulting</span>
        <p class="footer-desc">Student success and experiential learning advisory for students, institutions, and employers across Southern Ontario. Founded by Arva Yusuf Ezzi, MEd (OISE, University of Toronto).</p>
        <p class="footer-desc" style="margin-top:0.25rem; font-style:italic;">All services are academic and career focused. No immigration or visa consulting is provided.</p>
      </div>

      <div class="footer-col">
        <h4>Navigation</h4>
        <ul>
          <li><a href="<?php echo esc_url(home_url('/en/')); ?>">Home</a></li>
          <li><a href="<?php echo esc_url(home_url('/en/about/')); ?>">About</a></li>
          <li><a href="<?php echo esc_url(home_url('/en/services/')); ?>">Services</a></li>
          <li><a href="<?php echo esc_url(home_url('/en/resources/')); ?>">Resources</a></li>
          <li><a href="<?php echo esc_url(home_url('/en/contact/')); ?>">Contact</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Contact</h4>
        <ul>
          <li><a href="tel:+16475059487">+1 (647) 505-9487 (Mobile)</a></li>
          <li><a href="tel:+12263368100">+1 (226) 336-8100 (Office)</a></li>
          <li><a href="mailto:info@ezziclarity.ca">info@ezziclarity.ca</a></li>
          <li style="color:rgba(255,255,255,0.45); font-size:0.8rem; margin-top:0.5rem;">Waterloo Region, Ontario</li>
          <li><a href="https://book.titan.email/ezziclarity/intro" target="_blank" rel="noopener">Book an Intro Call →</a></li>
        </ul>
      </div>

    </div>

    <div class="footer-bottom">
      <p>© <?php echo date('Y'); ?> Ezzi Clarity Educational Consulting Services Inc. All rights reserved.</p>
      <div class="footer-lang">
        <a class="active" href="<?php echo esc_url(home_url('/en/')); ?>">EN</a>
        <a href="<?php echo esc_url(home_url('/fr/')); ?>">FR</a>
        <a href="<?php echo esc_url(home_url('/ar/')); ?>">AR</a>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
