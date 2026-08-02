<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Canyon
 */

$footerlinks = get_field('footer_links', 'options');

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row pb-md-3">
				<div class="col-md-3 col-5">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="site-footer__logo" src="<?= get_stylesheet_directory_uri(); ?>/static/logos/Canyon_Logo_Colour.svg" alt="Canyon Logo"></a>
					<?php get_template_part('template-parts/components/comp', 'social-icons'); ?>
				</div>
				<div class="col-md-3 col-7">
					<?php the_field('footer_contact', 'options'); ?>
				</div>
				<div class="col-md-6 mt-4 mt-md-0"><p class="h4"><?php the_field('footer_acknowledgement', 'options'); ?></p></div>
			</div>
			<div class="row mt-md-5 pb-2">
				<div class="col-12">
					<ul class="site-footer__list">
						<?php if($footerlinks): ?>
						<li>Canyon climbing © Copyright <?php echo date("Y"); ?></li>
						<li><?= $footerlinks; ?></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
