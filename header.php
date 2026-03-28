<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Queens
 */

//setup header menu subnav
function recursive_get_parent_menu($page_id){
    $parent = wp_get_post_parent_id( $page_id );

    if(!$parent) return false;

    if(get_field('header_menu', $parent)):
        return get_field('header_menu', $parent);
    else:
        recursive_get_parent_menu($parent);
    endif;
}


$default_header_menu = get_field('header_menu', 'options');

$header_menu = $default_header_menu;

$closest_parent_menu = recursive_get_parent_menu(get_the_ID());

if(get_field('header_menu')):
    $header_menu = get_field('header_menu');
elseif($closest_parent_menu):
    $header_menu = $closest_parent_menu;
endif;


//use alt header
$body_classes = '';

if(get_field('plain_header')):
    $body_classes .= 'plain-header';
endif;

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php wp_head(); ?>

</head>

<body <?php body_class($body_classes); ?>>
    <div id="page" class="site">
        <header id="masthead" class="site-header">

            <nav class="header-nav" role="navigation">
                <div class="cornerstone"></div>
                <div class="container">
                    <div class="justify-content-end align-items-center flex-row d-flex position-relative">
                        <a href="#" class="header-nav__apply d-none d-md-block btn btn--inverse btn--no-arr btn--short">Apply now</a>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"
                            class="header-nav__logo col-md-4 col-6 text-center">
                            <img src="<?= get_stylesheet_directory_uri(); ?>/static/logos/QueensCollege_Landscape_Colour.svg"
                                alt="Queen's College Logo">
                        </a>
                        <div class="header-nav__right col-md-4 col-6">
                            <div class="header-nav__icons">

                                <a href="#">
                                    <svg fill="none" height="40" viewBox="0 0 40 40" width="40" xmlns="http://www.w3.org/2000/svg"><path d="m11.6609 39.1237c-.4016 0-.8032-.1721-1.0326-.4016l-10.268563-10.2685c-.516295-.6311-.4589426-1.4915.057352-2.0652l4.130361-4.1304c.63103-.5162 1.49154-.4589 2.0652.0574l1.37677 1.3768 2.52408-2.5241c1.4342-1.4342 2.811-2.811 5.6793-2.811h11.4732c.5163 0 1.0326.1148 1.4341.4016l3.7862-3.7862c.8031-.8031 1.7784-1.2046 2.8683-1.2046 1.09 0 2.1226.4589 2.8683 1.2046.6884.6884 1.0899 1.721 1.0899 2.811 0 .9178-.3441 1.8931-.9178 2.6962-.631.8605-1.3194 2.0078-2.0652 3.2125-.7457 1.2621-1.5489 2.5815-2.352 3.7288-1.6062 2.2946-3.7861 3.4993-6.3676 3.4993h-9.5228c-.7458 0-.9752.2295-1.5489.8031l-.4015.4016.3442.3442c.5163.631.4589 1.4915-.0574 2.0652l-4.073 4.073c-.2868.4015-.631.5163-1.0899.5163zm-9.98175-11.6454 10.03905 10.0391 3.9009-3.9009-10.03906-10.039zm7.45759-2.6388 6.25296 6.2529.4015-.4016c.6884-.6883 1.3194-1.3194 2.7536-1.3194h9.5227c2.0079 0 3.7862-.9752 5.0482-2.8109.8032-1.1473 1.549-2.4094 2.3521-3.6714.7457-1.2047 1.4341-2.4094 2.1225-3.3273.4016-.5736.631-1.2047.631-1.7783 0-.4016-.0573-1.1473-.631-1.6636-.4589-.459-1.0899-.7458-1.7209-.7458-.6884 0-1.2621.2295-1.721.7458l-3.7862 3.7861c.2295.4016.3442.8605.3442 1.3768 0 1.6636-1.3194 2.9831-2.9257 2.9831h-6.4823c-.459 0-.8032-.3443-.8032-.8032s.3442-.8031.8032-.8031h6.4823c.7458 0 1.3194-.631 1.3194-1.3768 0-.7457-.5736-1.3194-1.3194-1.3194h-11.4732c-2.2373 0-3.2125.9752-4.5319 2.352zm13.48106-10.0964-6.7119-6.71185c-1.8357-1.83571-1.8357-4.76139 0-6.65447.9753-.917855 2.18-1.37678 3.3273-1.37678 1.262 0 2.5241.516295 3.3272 1.43415l.0574.05737.0574-.05737c1.8357-1.835712 4.7613-1.835712 6.6544 0 1.8357 1.83572 1.8357 4.76139 0 6.65447zm-3.3846-13.13684c-.7458 0-1.5489.34418-2.1799.91784-1.1474 1.20469-1.2047 3.15514 0 4.35983l5.5645 5.56447 5.5645-5.56447c1.2047-1.26205 1.2047-3.15514 0-4.35983-1.2621-1.20468-3.1551-1.20468-4.3598 0l-.1148.11474c-.5736.57366-1.6062.57366-2.1799 0l-.1147-.11474c-.5737-.57366-1.3768-.91784-2.1799-.91784z" fill="#000"/></svg>
                                </a>

                                <a href="#">
                                    <svg fill="none" height="38" viewBox="0 0 31 38" width="31" xmlns="http://www.w3.org/2000/svg"><g fill="#000"><path d="m11.5827 28.9475v-6.0119h-3.74726c-1.7033 0-3.06591-1.3612-3.06591-3.0627v-9.98207c0-1.7015 1.36261-3.06271 3.06591-3.06271h20.09886c1.7033 0 3.0659 1.36121 3.0659 3.06271v9.98207c0 1.7015-1.3626 3.0627-3.0659 3.0627h-7.3809zm-3.69047-20.53129c-.79487 0-1.4762.68059-1.4762 1.47462v9.98207c0 .794.68133 1.4746 1.4762 1.4746h5.28017v4.594l6.87-4.594h7.8919c.7949 0 1.4762-.6806 1.4762-1.4746v-9.98207c0-.79403-.6813-1.47462-1.4762-1.47462z"/><path d="m17.9981 38h-14.19407c-2.10073 0-3.80403-1.7582-3.80403-3.9134v-30.17317c0-2.15522 1.7033-3.91343 3.80403-3.91343h14.19407c2.1008 0 3.8041 1.75821 3.8041 3.91343v3.11941c0 .45373-.3407.79403-.7949.79403s-.7949-.3403-.7949-.79403v-3.11941c0-1.24776-1.022-2.32537-2.2143-2.32537h-14.19407c-1.19231 0-2.2143 1.07761-2.2143 2.32537v30.17317c0 1.2477 1.02199 2.3253 2.2143 2.3253h14.19407c1.1923 0 2.2143-1.0776 2.2143-2.3253v-5.8418c0-.4538.3407-.7941.7949-.7941s.7949.3403.7949.7941v5.8418c0 2.1552-1.7033 3.9134-3.8041 3.9134z"/><path d="m11.0719 4.53728h-.2839c-.4542 0-.79484-.3403-.79484-.79403 0-.45374.34064-.79403.79484-.79403h.2839c.4542 0 .7949.34029.7949.79403 0 .45373-.3407.79403-.7949.79403z"/><path d="m13.1721 35.0509h-4.20147c-.45421 0-.79485-.3403-.79485-.794s.34064-.794.79485-.794h4.20147c.4542 0 .7949.3403.7949.794s-.3407.794-.7949.794z"/><path d="m26.5147 13.2717h-17.20321c-.45422 0-.79489-.3403-.79489-.7941 0-.4537.34067-.794.79489-.794h17.20321c.4542 0 .7949.3403.7949.794 0 .4538-.3407.7941-.7949.7941z"/><path d="m17.9415 17.5236h-8.63001c-.45422 0-.79489-.3403-.79489-.794 0-.4538.34067-.7941.79489-.7941h8.63001c.4542 0 .7949.3403.7949.7941 0 .4537-.3407.794-.7949.794z"/></g></svg>
                                </a>

                                <button data-toggle-main-menu class="btn btn--basic header-nav__hamburger">
                                    <svg fill="none" height="22" viewBox="0 0 37 22" width="37" xmlns="http://www.w3.org/2000/svg"><g stroke="#000" stroke-linecap="round" stroke-width="1.8"><path d="m1 21h35"/><path d="m1 11h35"/><path d="m1 1 35-.000003"/></g></svg>
                                </button>

                            </div>
                            <ul class="header-nav__menu">
                                <?php foreach($header_menu as $row):
                                $link = $row['link'];
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <li><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>            
            
            <?php get_template_part('template-parts/components/comp', 'main-menu'); ?>

        </header><!-- #masthead -->

        <div id="content" class="site-content">

            <?php get_template_part('template-parts/components/comp', 'page-header'); ?>