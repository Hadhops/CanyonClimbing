<?php 

?>

<section class="block-tall_links">
    <div class="container-fluid">
        <div class="row justify-content-center g-0">
            
            <?php while(have_rows('links')): the_row(); 
            
                $image = wp_get_attachment_image(get_sub_field('image'), 'full');
                $link = get_sub_field('link');
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';

            ?>

                <div class="col-lg-4 col-md-6 g-0">
                    <a href="<?= $link_url ?>" class="d-flex tall-link" target="<?= $link_target; ?>">
                        <?= $image; ?>
                        <h2 class="mt-auto"><?= $link_title; ?></h2>
                    </a>
                </div>

            <?php endwhile; ?>

        </div>
    </div>
</section>