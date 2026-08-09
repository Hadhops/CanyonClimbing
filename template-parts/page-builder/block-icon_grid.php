<?php 

$intro = get_sub_field('intro');

?>

<section class="block-icon_grid">
    <?php if($intro): ?>
    <div class="container">
        <div class="row align-items-center justify-content-left">
            <div class="col-xxl-9 col-md-10 mb-5 content-style">
                <?= $intro; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
        <div class="d-flex flex-wrap block-icon_grid__grid ms-auto me-auto">
            <?php while(have_rows('tiles')): the_row(); 
                $title = get_sub_field('title');
                $description = get_sub_field('description');
                $icon = get_sub_field('icon');
            ?>
            <div class="block-icon_grid__tile">
                <?= wp_get_attachment_image($icon); ?>
                <h4><?= $title; ?></h4>
                <p><?= $description; ?></p>
            </div>
            <?php endwhile; ?>
        </div>

</section>