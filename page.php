<?php get_header(); ?>

<main class="main main--flexible">
<?php while ( have_posts() ) : the_post(); ?>

  <section class="simple-content">
    <div class="container">
      <h2 class="heading mb-4"><?php the_title(); ?></h2>
      <article><?php the_content(); ?></article>
    </div>
  </section>

<?php endwhile; ?>
</main>

<?php get_footer(); ?>