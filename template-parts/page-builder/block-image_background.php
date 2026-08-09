<?php 

$row_index = get_row_index();
$row_id = get_sub_field('row_id');
$is_not_front_page = ! is_front_page();

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


// block options
$is_flipped_columns = get_sub_field('flip_columns');
$is_dark = get_sub_field('colour_scheme');


//popover content
$popover_not_button = get_sub_field('link_or_popover');
$popover_button = get_sub_field('popover_button');
$popover_content = get_sub_field('popover_content');

?>

<section class="block-img-bg<?php if($is_dark) echo ' block-img-bg--dark'  ?>" id="<?php if($row_id) echo $row_id ?>">

    <figure class="block-img-bg__bg">
        <?= $img_html; ?>
    </figure>

    <div class="container">
        <div class="row main-row align-items-center<?php if($is_flipped_columns) echo ' flex-row-reverse'; ?>">
            <div class="col-md-9 col-lg-<?php if($is_not_front_page) echo '6'; ?>">
                <div class="block-img-bg__content">
                    <h2 class="block-img-bg__title mb-4"><?php the_sub_field('title'); ?></h2>
                    <?php if($sub_title): ?>
                        <div class="block-img-bg__sub-title large-body content-style">
                        <?= $sub_title; ?>
                        </div>
                    <?php endif; ?>
                    <?php if($popover_not_button): ?>
                        <button class="btn mt-4<?php if($is_dark) echo ' btn--inverse'  ?>" data-popover-target="block-img-bg__<?= $row_index; ?>"><?= $popover_button; ?></a>
                    <?php elseif($button): ?>
                        <a class="btn mt-4<?php if($is_dark) echo ' btn--inverse'  ?>" href="<?= $button['url']; ?>" target="<?= $button['target'] ? $button['target'] : '_self'; ?>"><?= $button['title']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</section>

<?php if($popover_not_button):
    get_template_part('template-parts/components/comp', 'popover', array(
        'content' => $popover_content,
        'id' => 'block-img-bg__' . $row_index
    ));
endif; ?>