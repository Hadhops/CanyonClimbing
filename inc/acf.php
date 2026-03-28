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


// dynamically replace titles on all flexible content layouts
add_filter('acf/fields/flexible_content/layout_title/name=page_builder', 'dynamic_acf_flex_layout_title', 10, 4);

function dynamic_acf_flex_layout_title($title, $field, $layout, $i) {

    $layout_title = '';

    // loop through subfields and pick the first one with usable content
    if( isset($layout['sub_fields']) && is_array($layout['sub_fields']) ) {
        foreach( $layout['sub_fields'] as $subfield ) {
            $value = get_sub_field($subfield['name']);
            
            // if value is string or number, use it
            if( is_string($value) && $value !== '' ) {
                $layout_title = $value;
                break;
            }
            
            // if value is array, try to grab first string inside
            if( is_array($value) && count($value) > 0 ) {
                foreach($value as $v) {
                    if( is_array($v) && isset($v['heading']) ) {
                        $layout_title = $v['heading'];
                        break 2; // break both loops
                    } elseif( is_string($v) && $v !== '' ) {
                        $layout_title = $v;
                        break 2;
                    }
                }
            }
        }
    }

    // sanitize and truncate safely
    $layout_title = $layout_title ? strip_tags($layout_title) : '';
    if( strlen($layout_title) >= 45 ) {
        $layout_title = substr($layout_title, 0, 45) . '...';
    }

    // final title
    $title = $layout['label'] . ($layout_title ? ' - ' . $layout_title : '');

    return $title;
}