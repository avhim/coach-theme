<?php
/** Theme header. */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
	<div class="container header-inner">
		<a class="site-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( has_custom_logo() ) { the_custom_logo(); } else { bloginfo( 'name' ); } ?></a>
		<button class="menu-toggle" aria-label="<?php esc_attr_e( 'Open menu', 'coach-theme' ); ?>" aria-expanded="false" onclick="document.querySelector('.primary-nav').classList.toggle('is-open'); this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true')">☰</button>
		<nav class="primary-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'coach-theme' ); ?>">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'fallback_cb' => false ) ); ?>
			<a class="nav-cta" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Let’s talk', 'coach-theme' ); ?></a>
		</nav>
	</div>
</header>
