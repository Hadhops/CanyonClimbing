<?php 
//content
$content = get_sub_field('html_text');

?>

<section class="block-html section--html-block">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <?= $content; ?>
        </div>
    </div>
</section>