<?php
/** Single event template. */
get_header(); ?>
<main class="container article-layout">
	<?php while ( have_posts() ) : the_post(); $date = function_exists( 'get_field' ) ? get_field( 'event_date' ) : ''; $location = function_exists( 'get_field' ) ? get_field( 'event_location' ) : ''; ?>
		<article <?php post_class( 'article' ); ?>><header class="page-title"><p class="eyebrow"><?php esc_html_e( 'EVENT', 'coach-theme' ); ?><?php if ( $date ) : ?> · <?php echo esc_html( wp_date( 'F j, Y · g:i a', strtotime( $date ) ) ); ?><?php endif; ?></p><h1><?php the_title(); ?></h1><?php if ( $location ) : ?><p class="article-intro"><?php echo esc_html( $location ); ?></p><?php endif; ?></header><?php if ( has_post_thumbnail() ) : ?><div class="featured-image"><?php the_post_thumbnail( 'large' ); ?></div><?php endif; ?><div class="prose"><?php the_content(); ?></div></article>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
