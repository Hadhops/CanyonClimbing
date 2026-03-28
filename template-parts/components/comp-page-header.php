<?php 

/*
Images
*/

//default
$img_id = get_post_thumbnail_id()?: get_post_thumbnail_id(get_option( 'page_on_front' ));


$img_html = wp_get_attachment_image($img_id, 'full');

//video replaces image
if(get_field("header_video")):
	$placeholder = get_the_post_thumbnail_url() ?: get_the_post_thumbnail_url(get_option( 'page_on_front' ), 'full');

    $video_html = '<video preload="none" playsinline autoplay muted loop poster="' . $placeholder . '">
    <source src="' . get_field("header_video") . '" type="video/mp4">
    </video>';
    $img_html = $video_html;
endif;

/*
Titles
*/

$title = get_the_title();

//check for archive
$title = is_archive() ? get_the_archive_title() : $title;
//check for search
$title = is_search() ? "Search Results" : $title;
//check for news home
$title = is_home() ? single_post_title('', false) : $title;
//check for 404
$title = is_404() ? '404 page not found' : $title;

$title = get_field('title_override') ?: $title;


//Header type
$is_small_header = get_field('plain_header') || is_singular( array('post', 'wyverns', 'events') ) || is_home() || is_archive() || is_search() || is_404();
$is_wide_header = get_field('is_wide_header');
$is_centered_header = get_field('is_centered_header');


//section class
$section_class = 'page-header';
if($is_small_header) $section_class .= ' page-header--plain';
if($is_wide_header) $section_class .= ' page-header--wide';
if($is_centered_header) $section_class .= ' page-header--centered';

?>

<section class="<?= $section_class; ?>">
    <?php if(!$is_small_header): ?>
        <div class="page-header__img">
            <?= $img_html; ?>
        </div>
    <?php endif; ?>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12">
				<h1 <?php if(!$is_small_header) echo 'class="text-white"'; ?> ><?= $title; ?></h1>
			</div>
		</div>
	</div>

</section>