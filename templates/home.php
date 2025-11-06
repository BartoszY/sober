<?php
/**
 * Template Name: Home
 */
get_header(); 
?>

<main class="main">
<?php while ( have_posts() ) : the_post(); ?>

  <?php $hero = get_field('hero'); if ($hero) : ?>
  <section class="h-hero">
    <?php if ($hero['image']) : ?>
    <?php echo wp_get_attachment_image( $hero['image'], 'full', false, array( 'class' => 'h-hero__image' ) ); ?>
    <?php endif; ?>

    <div class="container">
      <div class="h-hero__content">
        <div>
          <?php if ($hero['subtitle']) : ?>
          <p class="h-hero__subtitle"><?= $hero['subtitle'] ?></p>
          <img src="<?php echo esc_url( get_template_directory_uri() . '/prod/img/h-elipse-1.svg' ); ?>" alt="elipse">
          <?php endif; ?>
        </div>

        <div>
          <?php if ($hero['title']) : ?>
          <h1 class="heading h-hero__title"><?= $hero['title'] ?></h1>
          <?php endif; ?>
          
          <?php if ($hero['links']) : ?>
          <div class="buttons">
            <?php foreach ($hero['links'] as $key => $button) : ?>
            <a href="<?= $button['link']['url'] ?>" target="<?= $button['link']['target'] ?>" class="button<?= $key === 0 ? ' button--arrow' : ' button--outline' ?>"><?= $button['link']['title'] ?></a>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>



  <?php $about = get_field('about'); if ($about) : ?>
  <section class="h-about" id="about">
    <div class="container">
      <article class="h-about__content">
        <?php if ($about['title']) : ?>
        <h2 class="heading h-about__title"><?= $about['title'] ?></h2>
        <?php endif; ?>

        <?php if ($about['text']) : ?>
        <?= $about['text'] ?>
        <?php endif; ?>
      </article>

      <?php if ($about['image']) : ?>
      <?php echo wp_get_attachment_image( $about['image'], 'full', false, array( 'class' => 'h-about__image' ) ); ?>
      <?php endif; ?>
    </div>
  </section>

  <div class="container"><hr></div>
  <?php endif; ?>
  
  

  <?php $program = get_field('program'); if ($program) : ?>
  <section class="h-program" id="agenda">
    <div class="container">
      <div>
        <?php if ($program['image']) : ?>
        <?php echo wp_get_attachment_image( $program['image'], 'medium', false, array( 'class' => 'h-program__image' ) ); ?>
        <?php endif; ?>
      </div>

      <article class="h-program__content">
        <?php if ($program['subtitle']) : ?>
        <p class="h-program__subtitle"><?= $program['subtitle'] ?></p>
        <?php endif; ?>

        <?php if ($program['titles']) : ?>
        <div class="h-program__titles">
          <?php foreach ($program['titles'] as $title) : ?>
          <div>
            <h3 class="heading h-program__title"><?= $title['title'] ?></h3>
            <p><?= $title['subtitle'] ?></p>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ($program['text']) : ?>
        <?= $program['text'] ?>
        <?php endif; ?>

        <?php if ($program['link']) : ?>
        <a href="<?= $program['link']['url'] ?>" target="<?= $program['link']['target'] ?>" class="button button--arrow"><?= $program['link']['title'] ?></a>
        <?php endif; ?>
      </article>
    </div>
  </section>
  <?php endif; ?>

  

  <?php $contact = get_field('contact'); if ($contact) : ?>
  <section class="h-contact" id="kontakt">
    <div class="container">
      <div>
        <h2 class="heading"><?= $contact['title'] ?></h2>
      </div>

      <div class="h-contact__form">
        <?php if ($contact['form_shortcode']) : ?>
        <?php echo do_shortcode( $contact['form_shortcode'] ); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

<?php endwhile; ?>
</main>

<?php get_footer(); ?>