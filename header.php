<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Canyon
 */

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
    <link rel="preconnect" href="https://portal3.climbing-gym.com">

    <?php wp_head(); ?>

</head>

<body <?php body_class($body_classes); ?>>
    <div id="page" class="site">
        <header id="masthead" class="site-header">

            <nav class="header-nav" role="navigation">
                <div class="container">
                    <div class="justify-content-end align-items-center flex-row d-flex position-relative">
                        <!--<a data-redpoint="lightbox" data-lightboxcolor="#e3b545" data-lightboxurl="https://portal3.climbing-gym.com/lightbox/uptown/agreements/waiver" href="https://portal3.climbing-gym.com/uptown/agreements/waiver" class="header-nav__apply d-none d-md-block btn btn--inverse btn--no-arr btn--short">WAIVER</a>-->
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"
                            class="header-nav__logo col-md-4 col-6 text-center">
                            <img src="<?= get_stylesheet_directory_uri(); ?>/static/logos/Canyon_Logo_Colour.svg"
                                alt="Canyon Logo">
                        </a>
                        <div class="header-nav__right col-md-4 col-6">
                            <div class="header-nav__icons">

                                <!--<a href="#">
                                    <svg fill="none" height="38" viewBox="0 0 31 38" width="31" xmlns="http://www.w3.org/2000/svg"><g fill="#E3B545"><path d="m11.5827 28.9475v-6.0119h-3.74726c-1.7033 0-3.06591-1.3612-3.06591-3.0627v-9.98207c0-1.7015 1.36261-3.06271 3.06591-3.06271h20.09886c1.7033 0 3.0659 1.36121 3.0659 3.06271v9.98207c0 1.7015-1.3626 3.0627-3.0659 3.0627h-7.3809zm-3.69047-20.53129c-.79487 0-1.4762.68059-1.4762 1.47462v9.98207c0 .794.68133 1.4746 1.4762 1.4746h5.28017v4.594l6.87-4.594h7.8919c.7949 0 1.4762-.6806 1.4762-1.4746v-9.98207c0-.79403-.6813-1.47462-1.4762-1.47462z"/><path d="m17.9981 38h-14.19407c-2.10073 0-3.80403-1.7582-3.80403-3.9134v-30.17317c0-2.15522 1.7033-3.91343 3.80403-3.91343h14.19407c2.1008 0 3.8041 1.75821 3.8041 3.91343v3.11941c0 .45373-.3407.79403-.7949.79403s-.7949-.3403-.7949-.79403v-3.11941c0-1.24776-1.022-2.32537-2.2143-2.32537h-14.19407c-1.19231 0-2.2143 1.07761-2.2143 2.32537v30.17317c0 1.2477 1.02199 2.3253 2.2143 2.3253h14.19407c1.1923 0 2.2143-1.0776 2.2143-2.3253v-5.8418c0-.4538.3407-.7941.7949-.7941s.7949.3403.7949.7941v5.8418c0 2.1552-1.7033 3.9134-3.8041 3.9134z"/><path d="m11.0719 4.53728h-.2839c-.4542 0-.79484-.3403-.79484-.79403 0-.45374.34064-.79403.79484-.79403h.2839c.4542 0 .7949.34029.7949.79403 0 .45373-.3407.79403-.7949.79403z"/><path d="m13.1721 35.0509h-4.20147c-.45421 0-.79485-.3403-.79485-.794s.34064-.794.79485-.794h4.20147c.4542 0 .7949.3403.7949.794s-.3407.794-.7949.794z"/><path d="m26.5147 13.2717h-17.20321c-.45422 0-.79489-.3403-.79489-.7941 0-.4537.34067-.794.79489-.794h17.20321c.4542 0 .7949.3403.7949.794 0 .4538-.3407.7941-.7949.7941z"/><path d="m17.9415 17.5236h-8.63001c-.45422 0-.79489-.3403-.79489-.794 0-.4538.34067-.7941.79489-.7941h8.63001c.4542 0 .7949.3403.7949.7941 0 .4537-.3407.794-.7949.794z"/></g></svg>
                                </a>-->

                                <button data-toggle-main-menu class="btn btn--basic header-nav__hamburger"
                                    aria-expanded="false" aria-controls="main-menu-panel">
                                    <!--<svg fill="none" height="24" viewBox="0 0 37 22" width="37" xmlns="http://www.w3.org/2000/svg"><g stroke="#E3B545" stroke-linecap="round" stroke-width="4"><path d="m1 21h35"/><path d="m1 11h35"/><path d="m1 1 35-.000003"/></g></svg>-->
                                    <span class="header-nav__hamburger-label">Menu</span>
                                    <img src="<?= get_template_directory_uri() . '/static/hamburger.svg'; ?>" alt="">
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </nav>            
            
            <?php get_template_part('template-parts/components/comp', 'main-menu'); ?>

        </header><!-- #masthead -->

        <div id="content" class="site-content">

            <?php get_template_part('template-parts/components/comp', 'page-header'); ?>