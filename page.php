<?php
/** Default page template. */
get_header(); ?>
<main class="container content-section prose">
	<?php while ( have_posts() ) : the_post(); ?>
		<header class="page-title"><p class="eyebrow"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></p><h1><?php the_title(); ?></h1></header>
		<?php if ( has_post_thumbnail() ) : ?><div class="featured-image"><?php the_post_thumbnail( 'large' ); ?></div><?php endif; ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
