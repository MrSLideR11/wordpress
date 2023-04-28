<?php global $art_khv; ?>
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
                        <div class="logo">
                            <a href="<?=get_home_url()?>">
                                <?get_template_part("components/logo")?>
                                <div class="logo-desc">
                                    <? if(is_front_page()){ ?>
                                        <h1><?=get_bloginfo('name')?></h1>
                                    <? }else{ ?>
                                        <span class="h1"><?=get_bloginfo('name')?></span>
                                    <? } ?>
                                    <span><?=get_bloginfo('description')?></span>
                                </div>
                            </a>
                        </div>
                        <? if(wp_is_mobile()){ ?>
                            <?=get_template_part("components/icon-mobile")?>
                            <div class="mobile-phone">
                                <a href="tel:<?=preg_replace("/[^+0-9]/s", "", get_theme_mod("phone"))?>"><?=get_theme_mod("phone")?></a>
                            </div>
                            <div class="mobile-block">
                        <? } ?>
                        <div class="menu">
                            <? $menu = wp_nav_menu([
                                'theme_location'  => '',
                                'menu'            => 'Main Menu',
                                'container'       => false,
                                'menu_class'      => 'menu-header menu-header-mobile',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                'depth'           => 0,
                            ]); ?>
                        </div>
                        <div class="cont">
                            <? if(get_theme_mod("phone_on")): ?>
                                <div class="head-phone">
                                    <a href="tel:<?=preg_replace("/[^+0-9]/s", "", get_theme_mod("phone"))?>"><?=get_theme_mod("phone")?></a>
                                </div>
                            <? endif;
                            if(get_theme_mod("wa_on")): ?>
                                <div class="head-wa">
                                    <a href="//wa.me/<?=preg_replace("/[^0-9]/s", "", get_theme_mod("wa"))?>"><?=get_template_part("components/icon-wa")?></a>
                                </div>
                            <? endif;
                            if(get_theme_mod("in_on")): ?>
                                <div class="head-in">
                                    <a href="//www.instagram.com/<?=get_theme_mod("in")?>"><?=get_template_part("components/icon-inst")?></a>
                                </div>
                            <? endif; ?>
                            <div class="head-fos">
                                <?=get_template_part("components/button")?>
                            </div>
                        </div>
                        <? if(wp_is_mobile()){ ?>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </header>
            <main>
                <div class="space"></div>
                <div class="container">