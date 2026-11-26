<?php
/** Blog archive and search template. */
get_header(); ?>
<main class="container content-section">
	<header class="page-title"><p class="eyebrow"><?php esc_html_e( 'THE JOURNAL', 'coach-theme' ); ?></p><h1><?php echo is_home() ? esc_html__( 'Latest articles', 'coach-theme' ) : esc_html( get_the_archive_title() ); ?></h1></header>
	<div class="card-grid">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="card"><a class="card__image" href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?></a><div class="card__body"><p class="meta"><?php echo esc_html( get_the_date() ); ?> · <?php the_category( ', ' ); ?></p><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><p><?php echo esc_html( get_the_excerpt() ); ?></p><a class="text-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read article →', 'coach-theme' ); ?></a></div></article>
	<?php endwhile; else : ?><p><?php esc_html_e( 'No posts found.', 'coach-theme' ); ?></p><?php endif; ?>
	</div>
	<div class="pagination"><?php the_posts_pagination(); ?></div>
</main>
<?php get_footer(); ?>
