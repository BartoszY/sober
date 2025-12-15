<?php get_header(); ?>

<main class="main">
<?php while ( have_posts() ) : the_post(); ?>

  <section class="page-header">
    <div class="container">
      <?php if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb( '<div class="bread-crumbs">','</div>' );
      } ?>
      <img src="<?php echo esc_url( get_template_directory_uri() . '/prod/img/h-elipse-1.svg' ); ?>" alt="elipse">

      <h2 class="heading page-header__title heading">Prelegent</h2>
    </div>
  </section>

  <section class="prelegent">
    <div class="container">
      <div>
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('large', ['class' => 'prelegent__image']); ?>
        <?php endif; ?>
      </div>

      <div class="prelegent__content">
        <article><?php the_content(); ?></article>

        <?php $prelections = get_field('prelections'); if ($prelections) : foreach ($prelections as $prelection) : ?>
        <div class="prelegent-event">
          <div class="prelegent-event__date">
            <strong><?php echo $prelection['time_from'] ?></strong>
            <?php echo $prelection['time_from'] ?>-<?php echo $prelection['time_to'] ?>
          </div>

          <div class="prelegent-event__info">
            <?php echo $prelection['text'] ?>
          </div>
        </div>
        <?php endforeach; endif; ?>
      </div>
    </div>
  </section>

<?php endwhile; ?>
</main>

<?php get_footer(); ?>