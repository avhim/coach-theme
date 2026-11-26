<?php
/** Single blog post template. */
get_header(); ?>
<main class="container article-layout">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class( 'article' ); ?>><header class="page-title"><p class="eyebrow"><?php echo esc_html( get_the_date() ); ?> · <?php the_category( ', ' ); ?></p><h1><?php the_title(); ?></h1><p class="article-intro"><?php echo esc_html( get_the_excerpt() ); ?></p></header><?php if ( has_post_thumbnail() ) : ?><div class="featured-image"><?php the_post_thumbnail( 'large' ); ?></div><?php endif; ?><div class="prose"><?php the_content(); ?></div></article>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
