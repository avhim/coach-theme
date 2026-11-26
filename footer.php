<?php
/** Theme footer. */
?>
<footer class="site-footer">
	<div class="container footer-inner">
		<p>© <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
		<p><?php esc_html_e( 'Thoughtful coaching for meaningful change.', 'coach-theme' ); ?></p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
