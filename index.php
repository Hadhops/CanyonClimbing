<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Canyon
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="block-post_list my-5">
				<div class="container">
					<div class="row align-items-center justify-content-center">
						<div class="col-12 col-xl-10">
							<div class="row align-items-center justify-content-left">

								<?php if ( have_posts() ) : ?>

									<?php
									/* Start the Loop */
									while ( have_posts() ) : the_post();  

									get_template_part( 'template-parts/components/comp', 'news-tile');

									endwhile;

									$postType = get_queried_object();
									$name = $postType->name?: $postType->post_name;
									the_posts_pagination( array(
										'mid_size'  => 2,
										'screen_reader_text' => __( 'More ' . $name , 'textdomain' ),
										'prev_text' => __( '<span><svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.94336 14.9141L9.05664 13.8105L3.14844 7.90234L9.05664 1.99414L7.94336 0.890625L0.931641 7.90234L7.94336 14.9141Z" fill="black"/></svg></span>', 'textdomain' ),
										'next_text' => __( '<span><svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.05664 14.9141L0.943359 13.8105L6.85156 7.90234L0.943359 1.99414L2.05664 0.890625L9.06836 7.90234L2.05664 14.9141Z" fill="black"/></svg></span>', 'textdomain' ),
									) );
								else : 
									echo '<p>No content found</p>'; // Fallback message
								endif;
								?>

							</div>
						</div>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
