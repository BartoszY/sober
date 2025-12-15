<?php
$terms = get_the_terms(get_the_ID(), 'category');
$date = get_the_date('d F Y');
?>

<div class="cs-teaser">
  <div class="container">
    <a href="<?= get_the_permalink() ?>" class="cs-teaser__image">
      <?php if (has_post_thumbnail()) : ?>
      <?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'large', false ); ?>
      <?php endif; ?>
    </a>

    <div class="cs-teaser__content">
      <div class="cs-teaser__header">
        <div>
          <?php if ($terms) : ?><h5 class="label mb-2"><?= $terms[0]->name ?></h5><?php endif; ?>
          <h3 class="heading heading--m"><a href="<?= get_the_permalink() ?>"><?php the_title() ?></a></h3>
          <div class="cs-teaser__text mt-2"><?php the_excerpt(); ?></div>
        </div>

        <a class="link" href="<?= get_the_permalink() ?>"><?php pll_e( 'Czytaj artykuł', 'cohubo' ); ?></a>

        <div class="cs-teaser__date">
          <?php if ($date) : ?>
          <div class="meta-tag"><?= $date ?></div>
          <?php endif; ?>
        </div>
      </div>

      <div class="cs-teaser__meta">
        <?php if ($date) : ?>
        <div class="meta-tag"><?= $date ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>