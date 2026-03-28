<?php


/*
* Pages and Files for ACF
*/


//Options Page
function register_acf_options_pages() {

    // Check function exists.
    if( !function_exists('acf_add_options_page') )
        return;

    // register options page.
    $option_page = acf_add_options_page(array(
        'page_title'    => __('Site Information'),
        'menu_title'    => __('Site Information'),
        'menu_slug'     => 'site-info',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

// Hook into acf initialization.
add_action('acf/init', 'register_acf_options_pages');


//start with all flex content fields closed
function close_flex_contents() {
	?>
	<script type="text/javascript">
	(function($){

		$(document).ready(function(){
            
            $( ".acf-field-flexible-content .layout:not(.-collapsed) .-collapse" ).each(function( index ) {
              $( this ).click();
            });
            
        });

	})(jQuery);
	</script>
	<?php
}

add_action('acf/input/admin_head', 'close_flex_contents');

// replace titles on flex content fields
add_filter('acf/fields/flexible_content/layout_title/name=page_builder', 'my_acf_fields_flexible_content_layout_title', 10, 4);
function my_acf_fields_flexible_content_layout_title( $title, $field, $layout, $i ) {

    if($layout['name'] == 'basic_content') $title = get_sub_field('content');
    if($layout['name'] == 'post_list') $title = get_sub_field('title');
    if($layout['name'] == 'image_background') $title = get_sub_field('title');
    if($layout['name'] == 'image_background_tabs') $title = count(get_sub_field('tabs')) . ' Image Background Tabs';
    if($layout['name'] == 'list_of_links') $title = get_sub_field('intro');
    if($layout['name'] == 'two_columns_w_options') $title = get_sub_field('subtitle');
    if($layout['name'] == 'video_mask') $title = get_sub_field('mask_text');
    if($layout['name'] == 'stats') $title = get_sub_field('content');
    if($layout['name'] == 'icon_grid') $title = get_sub_field('intro');
    if($layout['name'] == 'accordion') $title = get_sub_field('intro') ?: get_sub_field('accordion')[0]['heading'];

    $title = strip_tags($title);
    if( strlen($title) >= 45 ) $title = substr($title, 0, 45) . '...';

    $title = $layout['label'] . ' - ' . $title;

    return $title;
}