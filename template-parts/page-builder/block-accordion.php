<?php 

$intro = get_sub_field('intro');

$parent_row = get_row_index();

?>

<section class="block-accordion">
    <div class="container">
        <div class="row align-items-center justify-content-center">

                <?php if($intro): ?>
                <div class="col-xxl-9 col-md-10 mb-5 content-style">
                    <?= $intro; ?>
                </div>
                <div class="w-100"></div>
                <?php endif; ?>

                <div class="col-xxl-9 col-md-10">
                    <div class="accordion">

                        <?php  while( have_rows('accordion') ) : the_row();
                            $heading = get_sub_field('heading');
                            $content = get_sub_field('content'); ?>

                        <div class="accordion__row">
                            <div class="accordion__heading"><h4><?= $heading ?></h4></div>
                            <div class="accordion__content">
                                <div class="content-style"><?= $content; ?></div>
                            </div>
                        </div>

                        <?php endwhile; ?>

                    </div>
                </div>

        </div>
    </div>

</section>