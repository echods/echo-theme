<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Echods
 * @since Echods 1.0
 */
?>
	<footer class="container-fluid">
		<hr>
		<p class="float-right"><a href="#">Back to top</a></p>
		<div class="site-info">
			<?php
				/**
				 * Fires before the echods footer text for footer customization.
				 *
				 * @since Echods 1.0
				 */
				do_action( 'echods_credits' );
			?>
			<p>© <?= date("Y"); ?> <a href="<?= esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		</div><!-- .site-info -->
	</footer>
	<?php wp_footer(); ?>
</body>
</html>