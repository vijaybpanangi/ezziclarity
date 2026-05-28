<?php get_header(); ?>
<div class="container" style="padding: 40px 0;"><?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?></div>
<?php get_footer(); ?>
