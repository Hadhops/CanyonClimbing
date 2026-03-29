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
			<div class="row">
				<div class="col-md-3 col-5">
					<img class="site-footer__logo" src="<?= get_stylesheet_directory_uri(); ?>/static/logos/Canyon_Logo_Colour.svg" alt="Canyon Logo">
				</div>
				<div class="col-md-3 col-7">
					<?php the_field('footer_contact', 'options'); ?>
					<?php get_template_part('template-parts/components/comp', 'social-icons'); ?>
				</div>
				<div class="col-md-6 mt-4 mt-md-0"><p class="h4"><?php the_field('footer_acknowledgement', 'options'); ?></p></div>
				<div class="col-12 text-center">
					<ul class="site-footer__list">
						<?php if($footerlinks): ?>
						<li><?= $footerlinks; ?></li>
						<?php endif; ?>
						<li>© Copyright <?php echo date("Y"); ?></li>
						<li><a href="https://canyonclimbing.com.au" target="_blank">Website by Canyon.</a></li>
					</ul>
				</div>
			</div>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
