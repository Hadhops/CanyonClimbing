<?php
$sectionHeading = get_sub_field('section_heading');
$pages = get_sub_field('pages');
?>

<section class="block-pages-grid">
    <div class="container">
        <div class="row align-items-center justify-content-center">

            <div class="col-12">
                <div class="row align-items-center justify-content-center">
                    <h2 class="page-grid__sectionHeading"><?php echo esc_html($sectionHeading); ?></h2>
                </div>

                <div class="row align-items-center justify-content-center">
                <?php if ($pages): ?>
                    <div class="page-grid">
                        <?php foreach ($pages as $post): 
                            setup_postdata($post);

                            $title = get_the_title();
                            $link = get_permalink();
                            $subHeading = get_field('sub_heading');

                            // Featured image (thumbnail)
                            $thumbnail = get_the_post_thumbnail_url($post->ID, 'medium_large');

                        ?>
                            <a href="<?php echo esc_url($link); ?>" class="page-grid__item">
                                
                                <?php if ($thumbnail): ?>
                                    <div class="page-grid__image" style="background-image: url('<?php echo esc_url($thumbnail); ?>');"></div>
                                <?php endif; ?>

                                <div class="page-grid__content">
                                    <h3 class="page-grid__title"><?php echo esc_html($title); ?></h3>
                                    <!--<p class="page-grid__excerpt"><?php echo esc_html($subHeading); ?></p>-->
                                </div>

                            </a>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
