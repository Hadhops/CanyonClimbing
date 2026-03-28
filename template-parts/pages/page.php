<?php
/**
 * Template part for displaying posts
 *
 */

?>

<section class="page-content">
    <?php  while ( have_rows('page_builder') ) : the_row();
            get_template_part( 'template-parts/page-builder/block', get_row_layout() );
        endwhile; ?>
</section>