<?php 

$row_index = get_row_index();
$row_id = get_sub_field('row_id');

//content
$image = get_sub_field('image');
$content = get_sub_field('subtitle');
$second_content = get_sub_field('content');
$button = get_sub_field('button');

//options
$is_flipped_columns = get_sub_field('flip_columns');
$is_narrow = get_sub_field('narrow');
$content_not_image = get_sub_field('image_or_content');
$is_full = get_sub_field('is_full_height');
$has_intro_copy = get_sub_field('intro_copy');
$corner_element = get_sub_field('corner_element');

//has a popover
$popover_not_button = get_sub_field('link_or_popover');
$popover_button = get_sub_field('popover_button');
$popover_content = get_sub_field('popover_content');

$section_class = 'block-two_col';
if($is_full) $section_class .= ' block-two_col--full';

?>

<section class="<?= $section_class; ?>"<?php if($row_id) echo ' id="' . esc_attr($row_id) . '"'; ?>>
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-12<?php if($is_narrow) echo ' col-xxl-9'; ?>">
                <div class="row justify-content-center align-items-center<?php if($is_flipped_columns) echo ' flex-row-reverse'; ?>">

                    <?php if($has_intro_copy): ?>
                    <div class="col-lg-7 col-md-9 text-center mb-5 content-style">
                        <?php the_sub_field('intro_content'); ?>
                    </div>
                    <div class="w-100"></div>
                    <?php endif; ?>

                    <div class="col-md-5">
                        <div class="content-style">
                            <?= $content; ?>
                        </div>
                        <?php if($popover_not_button): ?>
                        <button class="btn mt-4"
                            data-popover-target="block-two_col__<?= $row_index; ?>"><?= $popover_button; ?></a>
                        <?php elseif($button): ?>
                            <a class="btn mt-4" href="<?= $button['url']; ?>"
                                target="<?= $button['target'] ? $button['target'] : '_self'; ?>"><?= $button['title']; ?></a>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-7" style="position:relative;">
                        <?php if($content_not_image):
                            echo "<div class='content-style'>" . $second_content . "</div>";
                        else:
                            $img_classs = $is_flipped_columns ? 'image-bg image-bg--flip' : 'image-bg';
                            echo "<figure class='" . $img_classs . "'>" . wp_get_attachment_image($image, 'full') . "</figure>";
                        endif; ?>
                        <?php if($corner_element): ?>
                        <img class="corner-element" src="<?php echo esc_url($corner_element['url']); ?>">
                        <?php endif; ?>
                    </div>

                </div>
            </div>

        </div>
    </div>

</section>

<?php if($popover_not_button):
    get_template_part('template-parts/components/comp', 'popover', array(
        'content' => $popover_content,
        'id' => 'block-two_col__' . $row_index
    ));
endif; ?>