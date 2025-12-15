<?php get_header(); $current = get_queried_object() ?>

<main class="main">

  <section class="page-header">
    <div class="container">
      <?php if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb( '<div class="bread-crumbs">','</div>' );
      } ?>
      <img src="<?php echo esc_url( get_template_directory_uri() . '/prod/img/h-elipse-1.svg' ); ?>" alt="elipse">

      <h2 class="heading page-header__title heading">Prelegenci</h2>
    </div>
  </section>


  <section class="prelegents">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>

      <a href="<?php the_permalink(); ?>" class="prelegent-teaser">
        <div class="prelegent-teaser__image">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium', ['class' => 'prelegent-teaser__img']); ?>
          <?php endif; ?>
        </div>

        <div class="prelegent-teaser__meta">
          <h3 class="prelegent-teaser__name"><?php the_title(); ?></h3>
          <?php $spec = get_field('spec'); if ($spec) : ?>
          <h4 class="prelegent-teaser__spec"><?php echo $spec ?></h4>
          <?php endif; ?>
        </div>        
      </a>

      <?php endwhile; ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>