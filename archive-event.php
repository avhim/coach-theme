<?php
/** Events archive. */
get_header(); ?>
<main class="container content-section">
	<header class="page-title"><p class="eyebrow"><?php esc_html_e( 'LEARN & CONNECT', 'coach-theme' ); ?></p><h1><?php esc_html_e( 'Upcoming events', 'coach-theme' ); ?></h1></header>
	<div class="card-grid">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $date = function_exists( 'get_field' ) ? get_field( 'event_date' ) : ''; $location = function_exists( 'get_field' ) ? get_field( 'event_location' ) : ''; ?>
		<article class="card"><a class="card__image" href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?></a><div class="card__body"><?php if ( $date ) : ?><p class="meta"><?php echo esc_html( wp_date( 'F j, Y · g:i a', strtotime( $date ) ) ); ?></p><?php endif; ?><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php if ( $location ) : ?><p><?php echo esc_html( $location ); ?></p><?php endif; ?><p><?php echo esc_html( get_the_excerpt() ); ?></p></div></article>
	<?php endwhile; else : ?><p><?php esc_html_e( 'There are no events scheduled yet.', 'coach-theme' ); ?></p><?php endif; ?>
	</div><?php the_posts_pagination(); ?>
</main>
<?php get_footer(); ?>
