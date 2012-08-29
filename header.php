<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
    <link rel="icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/wp-content/themes/gavd/img/apple-touch-icon-iphone.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/wp-content/themes/gavd/img/apple-touch-icon-ipad.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/wp-content/themes/gavd/img/apple-touch-icon-iphone4.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/wp-content/themes/gavd/img/apple-touch-icon-ipad3.png" />
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed container">
    <header>
        <div class="row">

            <div class="span3" id="branding">
                <div id="blog-title">
                    <h1><?php if ( is_singular() ) {} else {echo '<h1>';} ?><a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a><?php if ( is_singular() ) {} else {echo '</h1>';} ?></h1>
                    <p id="blog-description"><?php bloginfo( 'description' ) ?></p>
                </div>
            </div>

            <div class="span6">
                <?php if ( is_active_sidebar('header-widget-area') ) : ?>
                <div id="header-widgets" class="widget-area">
                    <ul class="sid">
                    <?php dynamic_sidebar('header-widget-area'); ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>

            <div class="span3">
                <?php get_search_form(); ?>
            </div>
        </div>
    </header>

    <div class="row">
       <div class="subnav subnav-fixed">
            <div class="span12">
                <nav>
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                        </div>
                    </div>
                </nav>
            </div>
       </div>
    </div>
    <div id="container">