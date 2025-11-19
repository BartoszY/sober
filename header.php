<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<?php wp_head(); ?>

	
	<!-- GetResponse Analytics -->
  <script type="text/javascript">

  (function(m, o, n, t, e, r, _){
          m['__GetResponseAnalyticsObject'] = e;m[e] = m[e] || function() {(m[e].q = m[e].q || []).push(arguments)};
          r = o.createElement(n);_ = o.getElementsByTagName(n)[0];r.async = 1;r.src = t;r.setAttribute('crossorigin', 'use-credentials');_.parentNode .insertBefore(r, _);
      })(window, document, 'script', 'https://an.gr-wcon.com/script/75a7e5fa-0df7-4564-8347-5c944f0e10c7/ga.js', 'GrTracking');


  </script>
  <!-- End GetResponse Analytics -->

</head>
<body <?php body_class(); ?>>

	<?php $sm = get_field('social_media', 'option'); ?>

	<header class="header">
		<div class="container">
			<?php $logo = get_field('logo', 'option'); if ($logo) : ?>
			<a href="<?= home_url() ?>" class="header__logo">
				<img src="<?= $logo['sizes']['medium'] ?>" alt="<?= esc_attr( get_bloginfo('name') ) ?>">
			</a>
			<?php endif; ?>

			<div class="header__nav">
				<?php wp_nav_menu(array('theme_location' => 'main-menu', 'menu_id' => 'main-menu', 'menu_class' => 'header__menu', 'container' => '')); ?>

				<?php $header_cta = get_field('header_cta', 'option'); if ($header_cta) : ?>
				<a id="subscribe" href="<?= $header_cta['url'] ?>" target="<?= $header_cta['target'] ?>" class="button button--arrow header__nav__cta"><?= $header_cta['title'] ?></a>
				<?php endif; ?>
			</div>

			<?php $header_cta = get_field('header_cta', 'option'); if ($header_cta) : ?>
			<a href="<?= $header_cta['url'] ?>" target="<?= $header_cta['target'] ?>" id="subscribe" class="button button--arrow header__cta"><?= $header_cta['title'] ?></a>
			<?php endif; ?>

			<div class="header__right">
				<?php if ($sm) : ?>
				<?php get_template_part('template-parts/social-media'); ?>
				<?php endif; ?>
			</div>

			<button class="burger" type="button" data-burger aria-label="Otwórz menu" aria-expanded="false">
				<span></span>
				<span></span>
			</button>
		</div>
	</header>
