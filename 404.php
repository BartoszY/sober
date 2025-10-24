<?php get_header(); ?>

<main class="main">
  <section class="error404-content">
    <div class="container">
      <div class="section-header">
        <p class="subheading subheading--center">404</p>
        <h2 class="heading heading--l mt-2">Nie znaleziono strony</h2>
        <div class="buttons buttons--center">
          <a href="<?= home_url() ?>" class="button">Wróć na stronę główną</a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>