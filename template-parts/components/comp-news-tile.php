<?php

$date = get_field('year_awarded')?: get_the_date('F j, Y');

$tile_class = 'block-post_list__tile news-tile';
// Add post type specific class
$tile_class .= ' news-tile--' . get_post_type();

$link = get_post_type() == 'publications' ? get_field('publication_file') : get_permalink();

$excerpt = get_post_type() == 'publications' ? '<p class="mt-3">' . get_the_excerpt() . '</p>' : '';

$extra_link_text = get_post_type() == 'publications' ? '<p class="text-decoration-underline mt-2">View Publication</p>' : '';

?>

<div class="col-lg-4 col-md-6 col-12 mb-4">
    <a href="<?= $link; ?>" class="<?= $tile_class; ?>">
        <?php the_post_thumbnail(); ?>
        <div class="news-tile__title">
            <p class="large-body"><?php the_title(); ?></p>
            <?= $excerpt; ?>
            <p class="mt-2"><?= $date ?></p>
            <?= $extra_link_text; ?>
        </div>
    </a>
</div>