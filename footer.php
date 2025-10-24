<?php get_template_part('template-parts/footer-baner'); ?>


<?php
$sm = get_field('social_media', 'option');
$logo = get_field('logo', 'option'); 
?>

<footer class="footer">
  <div class="container">
    <?php if ($logo) : ?>
    <a href="<?= home_url() ?>" class="footer__logo">
      <img src="<?= $logo['sizes']['medium'] ?>" alt="<?= esc_attr( get_bloginfo('name') ) ?>">
    </a>
    <?php endif; ?>

    <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'menu_id' => 'footer-menu', 'menu_class' => 'footer__menu', 'container' => '')); ?>

    <?php if ($sm) : ?>
    <?php get_template_part('template-parts/social-media'); ?>
    <?php endif; ?>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
