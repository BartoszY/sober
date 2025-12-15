<?php
$date = get_field('date');
?>

<div class="cs-box">
  <a href="<?= get_the_permalink() ?>" class="cs-box__image">
    <?php if (has_post_thumbnail()) : ?>
    <?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'large', false ); ?>
    <?php endif; ?>
  </a>
  
  <h3 class="heading heading--m mt-3 mb-2"><?php the_title() ?></h3>

  <div class="cs-box__meta">
    <div>
      <?= get_the_category_list(', ') ?> / <?= get_the_date('d F Y') ?>
    </div>
    <div>
      <a href="<?= get_the_permalink() ?>" class="link"><?php pll_e( 'Czytaj artykuł', 'cohubo' ); ?></a>
    </div>
  </div>
</div>