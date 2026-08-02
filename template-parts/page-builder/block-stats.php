<?php 

$content = get_sub_field('content');

?>


<section class="block-stats">

    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-md-10 col-xxl-9 mb-4">
                <?= $content; ?>
            </div>

            <div class="col-md-10 col-xxl-9 mb-4">
                <div class="block-stats__stats d-flex justify-content-between flex-wrap">
                    <?php while(have_rows('statistics')): the_row(); 
                        $stat = get_sub_field('statistic');
                        $detail = get_sub_field('detail');
                    ?>
                    <div class="statistic mx-3 mb-4">
                        <h3 class="text-yellow"><?= $stat; ?></h3>
                        <p><?= $detail; ?></p>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>

        </div>
    </div>

</section>