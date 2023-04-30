<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="app">
            <header>
                <div class="container">
                    <div class="head">
                        <div class="head-logo">
                            <a href="<?php echo get_home_url(); ?>">
                                <?php get_template_part("components/logo", null, ["color" => "white"]); ?>
                            </a>
                        </div>
                        <div class="head-menu menu">
                            <?php $menu = wp_nav_menu([
                                'theme_location'  => '',
                                'menu'            => 'MainMenu',
                                'container'       => false,
                                'menu_class'      => 'menu-header menu-header-mobile',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                'depth'           => 0,
                            ]); ?>
                        </div>
                        <div class="head-fos fos">
                            <a href="#" class="btn_fos btn_modal">Обратный звонок</a>
                        </div>
                    </div>
                </div>
            </header>
            <main>