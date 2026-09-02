<?php 

$socials = array(
    array(
        'img' => 'fb',
        'link' => get_field('facebook_link', 'options')
    ),
    array(
        'img' => 'insta',
        'link' => get_field('instagram_link', 'options')
    )
);

?>


<div class="social-icons mt-4">
    <p><strong>Follow us</strong></p>
    <?php foreach ($socials as $social):?>
        <?php if (empty($social['link'])) continue; ?>
    <a href="<?= $social['link']; ?>" target="_blank">
        <?= file_get_contents(get_template_directory().'/static/icon-' . $social['img'] . '.svg'); ?>
    </a>
    <?php endforeach; ?>
</div>