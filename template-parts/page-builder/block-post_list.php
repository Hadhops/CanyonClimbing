<?php 

$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$post_type = get_sub_field('post_type');
$category = get_sub_field('category');
$event_cat = get_sub_field('event_category');
$posts_per_page = get_sub_field('number_of_posts');

$args = array(
	'posts_per_page'	=> $posts_per_page?: 3,
	'post_type'		=> $post_type
);

$link = get_post_type_archive_link( $post_type );

if($post_type == 'post' && is_array($category)){
    $args['tax_query'] = array( array (
        'taxonomy' => 'category',
        'field' => 'term_id',
        'terms' => $category,
    ));

    $link = get_term_link( $category[0], 'category' );

} else if($post_type == 'events' && is_array($event_cat)){ 
    $args['tax_query'] = array( array (
        'taxonomy' => 'events_categories',
        'field' => 'term_id',
        'terms' => $event_cat,
    ));

    $link = get_term_link( $event_cat[0], 'events_categories' );
}

$query = new WP_Query($args);

?>

<?php if( $query->have_posts() ): ?>
<section class="block-post_list">
    <div class="container">
        <div class="row align-items-center justify-content-center">

            <div class="col-12">
                <div class="row align-items-center justify-content-left">

                    <div class="col-12 mb-4">
                        <h2><?= $title; ?></h2>
                        <p class="large-body"><?= $subtitle; ?></p>
                    </div>
                    <div class="w-100"></div>
                    <?php while( $query->have_posts() ) : $query->the_post(); 
                    get_template_part( 'template-parts/components/comp', 'news-tile');
                    endwhile; ?>
                    <div class="col-12 text-center text-md-end">
                        <a href="<?= $link; ?>" class="btn">All</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

<?php endif; ?>

<?php wp_reset_postdata();	 // Restore global post data stomped by the_post(). ?>