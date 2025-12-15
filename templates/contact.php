<?php
/**
 * Template Name: Contact
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
 

  <?php $contact_form_shortcode = get_field('contact_form_shortcode'); if ($contact_form_shortcode) : ?>
  <section class="contact" id="kontakt">
    <div class="container">
      <article>
        <?php the_content() ?>
      </article>

      <div class="contact__form">
        <?php if ($contact_form_shortcode) : ?>
        <?php echo do_shortcode( $contact_form_shortcode ); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

<?php endwhile; ?>
</main>

<?php get_footer(); ?>