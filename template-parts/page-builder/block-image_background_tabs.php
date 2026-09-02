<?php 

// block options
$is_flipped_columns = get_sub_field('flip_columns');
$is_dark = get_sub_field('colour_scheme');

$tabs = get_sub_field('tabs');
$first_tab_image = is_array($tabs) && isset($tabs[0]['image']) ? $tabs[0]['image'] : null;
$first_tab_image_html = $first_tab_image ? wp_get_attachment_image($first_tab_image, 'full') : '';

?>

<section class="block-img-bg block-img-bg-t <?php if($is_dark) echo ' block-img-bg--dark'  ?>">

<div class="gradient-bottom<?php if($is_dark) echo ' gradient-bottom--black'; ?>"></div>

    <div class="container">
        <div class="row main-row align-items-center<?php if($is_flipped_columns) echo ' flex-row-reverse'; ?>">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <div class="block-img-bg-t__content">

                <?php while(have_rows('tabs')): the_row(); 
                    
                    //block background image or video
                    $image = get_sub_field('image');
                    $img_html = wp_get_attachment_image($image, 'full');

                    if(get_sub_field("video_background")):
                        $placeholder = wp_get_attachment_url($image);

                        $video_html = '<video preload="none" playsinline autoplay muted loop poster="' . $placeholder . '">
                        <source src="' . get_sub_field("video_background") . '" type="video/mp4">
                        </video>';
                        $img_html = $video_html;
                    endif;

                    //block content
                    $sub_title = get_sub_field('subtitle');
                    $button = get_sub_field('button');
                    
                    ?>

                    <div class="block-img-bg-t__tab" data-tab-image-html='<figure class="block-img-bg-t__bg"><?= $img_html; ?></figure>'>
                        <h2 class="block-img-bg__title mb-4"><?php the_sub_field('title'); ?></h2>
                        <?php if($sub_title): ?>
                            <div class="block-img-bg__sub-title large-body content-style">
                            <?= $sub_title; ?>
                            </div>
                        <?php endif; ?>
                        <?php if($button): ?>
                            <a class="btn mt-4<?php if($is_dark) echo ' btn--inverse'  ?>" href="<?= $button['url']; ?>" target="<?= $button['target'] ? $button['target'] : '_self'; ?>"><?= $button['title']; ?></a>
                        <?php endif; ?>
                    </div>

                <?php endwhile; ?>

                </div>
            </div>

            <div class="block-img-bg-t__toggles">
                <div class="container">
                    <div class="row justify-content-center align-items-end flex-nowrap">
                        <?php while(have_rows('tabs')): the_row(); ?>
                            <p class="d-inline-block mx-3 mb-0 col" data-toggle-bg-t-content="<?= get_row_index(); ?>"><?= get_sub_field('title'); ?></p>
                        <?php endwhile; ?>
                    </div>
                    <div class="block-img-bg-t__indicator">
                        <div class="block-img-bg-t__marker"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <figure class="block-img-bg-t__bg" style="opacity: 1;"><?= $first_tab_image_html; ?></figure>

</section>