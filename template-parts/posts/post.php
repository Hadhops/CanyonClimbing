<?php
/**
 * Template part for displaying posts
 *
 */

?>

<section class="page-content">
    <?php if(have_rows('page_builder')): 
        while ( have_rows('page_builder') ) : the_row();
            get_template_part( 'template-parts/page-builder/block', get_row_layout() );
        endwhile;
    else: ?>
	<div class="container my-5">
		<div class="row">
			<div class="col-lg-9 col-xl-8">
                <div class="content-style">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>

    <?php endif; ?>
</section>