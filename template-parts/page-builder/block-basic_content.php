<?php 
//content
$content = get_sub_field('content');
$link = get_sub_field('link');


//settings
$is_full = get_sub_field('is_full_height');
$is_wide = get_sub_field('is_wide');

//styling classes
$class = get_sub_field('block_class');
$row_id = get_sub_field('row_id');
$section_class = 'block-basic';
if($is_full) $section_class .= ' block-basic--full';

$col_class = $is_wide ? 'col-xl-9 col-md-11' : 'col-lg-7 col-md-9';

?>

<section class="<?= $section_class . ' ' . $class; ?>" id="<?= $row_id ?>">
    <div class="container">
        <div class="row justify-content-left align-items-center">
            <div class="<?= $col_class; ?>">
                <div class="content-style ">
                    <?= $content; ?>
                </div>
                <?php if($link): ?>
                <a class="btn mt-5" href="<?= $link['url']; ?>"
                    target="<?= $link['target'] ? $link['target'] : '_self'; ?>"><?= $link['title']; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>