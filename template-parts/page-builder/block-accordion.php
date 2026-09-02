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
                            $content = get_sub_field('content');

                            // $parent_row keeps these unique across several accordions on one page
                            $panel_id  = 'accordion-' . $parent_row . '-' . get_row_index();
                            $toggle_id = $panel_id . '-toggle'; ?>

                        <div class="accordion__row">
                            <h4 class="accordion__heading">
                                <button type="button" class="accordion__toggle" id="<?= $toggle_id; ?>"
                                    aria-expanded="false" aria-controls="<?= $panel_id; ?>"><?= $heading ?></button>
                            </h4>
                            <div class="accordion__content" id="<?= $panel_id; ?>" role="region"
                                aria-labelledby="<?= $toggle_id; ?>">
                                <div class="accordion__content-inner">
                                    <div class="content-style"><?= $content; ?></div>
                                </div>
                            </div>
                        </div>

                        <?php endwhile; ?>

                    </div>
                </div>

        </div>
    </div>

</section>