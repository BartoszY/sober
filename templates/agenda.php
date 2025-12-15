<?php
/**
 * Template Name: Agenda
 */
get_header(); 
?>

<main class="main">
<?php while ( have_posts() ) : the_post(); ?>

  <section class="page-header">
    <div class="container">
      <?php if ( function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb( '<div class="bread-crumbs">','</div>' );
      } ?>
      <img src="<?php echo esc_url( get_template_directory_uri() . '/prod/img/h-elipse-1.svg' ); ?>" alt="elipse">
      
      <h1 class="heading page-header__title heading"><?php the_title(); ?></h1>
    </div>
  </section>



  <section class="agenda" id="agenda">
    <div class="container">
      <div class="agenda__days">
        <?php $days = get_field('days'); if ($days) : foreach ($days as $day) : ?>
        
        <a href="<?= $day['link']['url'] ?>" class="agenda__day<?= $day['active'] ? ' active' : '' ?>"><?= $day['link']['title'] ?></a>

        <?php endforeach; endif; ?>
      </div>
      

      <?php $events = get_field('events'); if ($events) : foreach ($events as $event) : ?>
      <div class="event-row">
        <div class="event-row__hours">
          <strong><?php echo $event['time_from'] ?></strong>
          <?php echo $event['time_from'] ?>-<?php echo $event['time_to'] ?>
        </div>

        <div class="event-row__content">
          <?= $event['text']; ?>
          
          <?php if ($event['text_more']) : ?>
          <button class="link event-row__more-button" data-close-text="<?php pll_e('zwiń') ?>"><?php pll_e('szczegóły') ?></button>
          <div class="event-row__more">
            <?= $event['text_more']; ?>
          </div>
          <?php endif; ?>
        </div>

        <?php if ($event['prelegents']) : ?>
        <div class="event-row__prelegents">
          <?php foreach ($event['prelegents'] as $prelegent) : ?>

          <a href="<?= get_permalink($prelegent); ?>" class="event-row__prelegents__item">
            <?php if (has_post_thumbnail($prelegent)) : ?>
              <?php echo get_the_post_thumbnail($prelegent, 'small'); ?>
            <?php endif; ?>
            <?= get_the_title($prelegent); ?>
          </a>

          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
      <?php endforeach; endif; ?>
    </div>
  </section>



  <?php $header_cta = get_field('header_cta', 'option'); if ($header_cta) : ?>
  <div class="container">
    <div class="buttons buttons--center">
			<a href="<?= $header_cta['url'] ?>" target="<?= $header_cta['target'] ?>" id="subscribe" class="button button--arrow header__cta"><?= $header_cta['title'] ?></a>
    </div>
  </div>
  <?php endif; ?>

<?php endwhile; ?>
</main>

<?php get_footer(); ?>