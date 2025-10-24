<?php $baner = get_field('baner', 'option'); if ($baner) : ?>
<div class="footer-baner">
  <div class="container">
    <div class="footer-baner__content">
      <h3 class="footer-baner__title"><?= esc_html($baner['title']) ?></h3>

      <?php if ($baner['tags']) : ?>
      <div class="footer-baner__tags">
        <?php foreach ($baner['tags'] as $tag) : ?>
        <span class="footer-baner__tags__item"><?= $tag['title'] ?></span>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <?php if ($baner['text']) : ?>
      <div class="footer-baner__text">
        <?= $baner['text'] ?>
      </div>
      <?php endif; ?>
    </div>

    <?php echo wp_get_attachment_image( $baner['image'], 'large', false, array( 'class' => 'footer-baner__image' ) ); ?>
  </div>
</div>
<?php endif; ?>