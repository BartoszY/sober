<?php
$sm = get_field('social_media', 'option');
?>

<?php if ($sm) : ?>
<div class="sm">
  <?php foreach ($sm as $item) : if ($item['url']) : ?>

  <a href="<?= $item['url'] ?>" target="_blank" rel="noopener noreferrer">
    <?php if ( 'dashicons' === $item['icon']['type'] ) : ?>
      <div class="dashicons <?php echo esc_attr( $item['icon']['value'] ) ?>"></div>
    <?php
    endif; 

    if ( 'media_library' === $item['icon']['type'] ) :
      $attachment_id = $item['icon']['value'];
      $icon_url = $attachment_id['sizes']['small'];
      $icon_alt = $attachment_id['alt'];
      if ($icon_url) : ?>
      <img src="<?php echo esc_attr( $icon_url ) ?>" alt="<?php echo esc_attr( $icon_alt ) ?>" />
      <?php endif; ?>
    <?php endif; ?>
  </a>

  <?php endif; endforeach; ?>
</div>
<?php endif; ?>