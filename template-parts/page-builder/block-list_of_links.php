<?php 

$intro = get_sub_field('intro');

$parent_row = get_row_index();

$links = get_sub_field('links');
$row_count = is_array($links) ? count($links) : 0;

$list_class = '';

if($row_count >= 5 && $row_count <= 7) $list_class = ' block-list_of_links__list--' . $row_count;

?>

<section class="block-list_of_links">
    <div class="container">
        <div class="row align-items-center justify-content-center">

            <div class="col-12 col-xl-11">
                <div class="row align-items-center justify-content-center">

                    <?php if($intro): ?>
                    <div class="col-xl-8 col-md-10 mb-5 content-style">
                        <?= $intro; ?>
                    </div>
                    <div class="w-100"></div>
                    <?php endif; ?>

                    <div class="col-12">
                        <div class="d-flex justify-content-center flex-wrap<?= $list_class; ?>">

                            <?php if(have_rows('links')): while(have_rows('links')): the_row(); 
                                $image = get_sub_field('image');
                                $link = get_sub_field('link');
                                
                                $is_popover = get_sub_field('link_or_popover');
                                $popover_title = get_sub_field('popover_title');

                                $row_index = get_row_index();

                                $popover_index = 'block-list_of_links__' . $parent_row . $row_index; 
                            ?>

                                <?php if($is_popover): ?>
                                <a data-popover-target="<?= $popover_index; ?>" class="link-tile<?php if($image) echo ' link-tile--img'; ?>">
                                    <?= wp_get_attachment_image($image, 'medium'); ?>
                                    <p><?= $popover_title; ?></p>
                                </a>
                                <?php else: ?>
                                <a href="<?= $link['url']; ?>" class="link-tile<?php if($image) echo ' link-tile--img'; ?>">
                                    <?= wp_get_attachment_image($image, 'medium'); ?>
                                    <p><?= $link['title']; ?></p>
                                </a>
                                <?php endif; ?>
                            

                            <?php endwhile; endif; ?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</section>


<?php if(have_rows('links')): ?> 
<div class="block-list_of_links__pops">
    <?php while(have_rows('links')): the_row(); if(get_sub_field('link_or_popover')):

    $image = get_sub_field('image');
    $popover_title = get_sub_field('popover_title');
    $popover_content = get_sub_field('popover_content');

    $row_index = get_row_index();
    $popover_index = 'block-list_of_links__' . $parent_row . $row_index; 

        get_template_part('template-parts/components/comp', 'popover', array(
            'content' => $popover_content,
            'id' => $popover_index,
            'img' => $image,
            'title' => $popover_title
        ));   

    endif; endwhile;?> 

</div>
<?php endif;?>

