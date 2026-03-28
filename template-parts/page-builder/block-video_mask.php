<?php 

$video = get_sub_field('video');
$mask_image = get_sub_field('mask_image');
$mask_text = get_sub_field('mask_text');

$statement_1 = get_sub_field('statement_1');
$statement_2 = get_sub_field('statement_2');

?>

<section class="block-video_mask">
    <video  preload="none" playsinline autoplay muted loop poster="<?= $mask_image; ?>"
    class="block-video_mask__video">
        <source src="<?= $video; ?>" type="video/mp4">
    </video>

    <div class="block-video_mask__messaging">
        <h3><?= $statement_1; ?></h3>
        <h3><?= $statement_2; ?></h3>
    </div>

    
    <div class="block-video_mask__mask">
        <div class="block-video_mask__mask__text" style="background-image: url('<?= $mask_image; ?>');"><?= $mask_text; ?></div>
    </div>
</section>