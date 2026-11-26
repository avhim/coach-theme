<?php
/** Front page template. */
get_header();
$hero = function_exists( 'get_field' ) ? get_field( 'home_hero_image' ) : null;
$eyebrow = function_exists( 'get_field' ) ? get_field( 'home_eyebrow' ) : '';
$heading = function_exists( 'get_field' ) ? get_field( 'home_heading' ) : '';
$intro = function_exists( 'get_field' ) ? get_field( 'home_intro' ) : '';
$button_text = function_exists( 'get_field' ) ? get_field( 'home_button_text' ) : '';
$button_url = function_exists( 'get_field' ) ? get_field( 'home_button_url' ) : '';
?>
<main id="main">
	<section class="hero" <?php if ( $hero && ! empty( $hero['url'] ) ) : ?>style="background-image:linear-gradient(90deg,rgba(16,35,31,.78),rgba(16,35,31,.12)),url('<?php echo esc_url( $hero['url'] ); ?>')"<?php endif; ?>>
		<div class="container hero__content">
			<?php if ( $eyebrow ) : ?><p class="eyebrow"><?php echo esc_html( $eyebrow ); ?></p><?php endif; ?>
			<h1><?php echo esc_html( $heading ? $heading : get_bloginfo( 'name' ) ); ?></h1>
			<?php if ( $intro ) : ?><p class="hero__intro"><?php echo esc_html( $intro ); ?></p><?php endif; ?>
			<?php if ( $button_text && $button_url ) : ?><a class="button" href="<?php echo esc_url( $button_url ); ?>"><?php echo esc_html( $button_text ); ?></a><?php endif; ?>
		</div>
	</section>
	<section class="container page-content">
		<?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
	</section>
	<section class="container content-section">
		<div class="section-heading"><p class="eyebrow">INSIGHTS & INSPIRATION</p><h2><?php esc_html_e( 'Ideas for your next chapter', 'coach-theme' ); ?></h2></div>
		<div class="card-grid">
			<?php $latest_posts = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3, 'post_status' => 'publish' ) ); ?>
			<?php if ( $latest_posts->have_posts() ) : while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
				<article class="card">
					<a class="card__image" href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?></a>
					<div class="card__body"><p class="meta"><?php echo esc_html( get_the_date() ); ?></p><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php echo esc_html( get_the_excerpt() ); ?></p></div>
				</article>
			<?php endwhile; wp_reset_postdata(); else : ?><p><?php esc_html_e( 'New articles are coming soon.', 'coach-theme' ); ?></p><?php endif; ?>
		</div>
		<p class="section-link"><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Explore the blog →', 'coach-theme' ); ?></a></p>
	</section>
</main>
<?php get_footer(); ?>
