<?php 

$args = shortcode_atts(array(
    'id' => 'popover-' . uniqid(),
    'title' => false,
    'content' => false,
    'img' => false
), $args);

extract($args);

?>



<div class="popover popover--wide" data-popover="<?= $id; ?>">
    <div class="popover__inner">
        <div class="popover__header">
            <button data-popover-target="<?= $id; ?>" class="btn btn--basic">
                <img src="<?= get_template_directory_uri() . '/static/icon-close.svg'; ?>">
            </button>
        </div>
        <div class="popover__content">
            <?php if($img) echo wp_get_attachment_image($img, 'full'); ?>
            <div class="content-style">
                <?php if($title) echo '<h2>' . $title . '</h2>'; ?>
                <?= $content; ?>
            </div>
        </div>
    </div>
</div>