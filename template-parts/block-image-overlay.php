<?php
/** ACF Image with text overlay block template. */
$image = get_field( 'background_image' );
$title = get_field( 'overlay_heading' );
$text = get_field( 'overlay_text' );
$link = get_field( 'overlay_link' );
$position = get_field( 'overlay_position' ) ?: 'left';
$alignment = 'center' === $position ? 'overlay-content--center' : ( 'right' === $position ? 'overlay-content--right' : 'overlay-content--left' );
$style = $image && ! empty( $image['url'] ) ? 'background-image:linear-gradient(90deg,rgba(16,35,31,.78),rgba(16,35,31,.22)),url(' . esc_url( $image['url'] ) . ')' : '';
?>
<section class="image-overlay <?php echo esc_attr( $alignment ); ?>" <?php if ( $style ) : ?>style="<?php echo esc_attr( $style ); ?>"<?php endif; ?> <?php if ( ! empty( $block['anchor'] ) ) : ?>id="<?php echo esc_attr( $block['anchor'] ); ?>"<?php endif; ?>>
	<div class="container image-overlay__inner"><div class="image-overlay__copy"><?php if ( $title ) : ?><h2><?php echo esc_html( $title ); ?></h2><?php endif; ?><?php if ( $text ) : ?><p><?php echo esc_html( $text ); ?></p><?php endif; ?><?php if ( $link && ! empty( $link['url'] ) ) : ?><a class="button" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ?: '_self' ); ?>"><?php echo esc_html( $link['title'] ?: __( 'Learn more', 'coach-theme' ) ); ?></a><?php endif; ?></div></div>
</section>
