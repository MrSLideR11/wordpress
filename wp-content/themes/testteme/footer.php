                </div>
                <div class="space"></div>
            </main>
            <footer>
                <div class="container">
                    <div class="footer">
                        <div class="footer-1">
                            <div class="logo">
                                <a href="<?=get_home_url()?>">
                                    <?get_template_part("components/logo")?>
                                    <div class="logo-desc">
                                        <h2><?=get_bloginfo('name')?></h2>
                                        <span><?=get_bloginfo('description')?></span>
                                    </div>
                                </a>
                            </div>
                            <? if(!wp_is_mobile()){
                                if(get_theme_mod("tagline_on")){
                                    get_template_part("components/tag-line");
                                }
                            } ?>
                        </div>
                        <div class="footer-2">
                            <? $menu = wp_nav_menu([
                                'theme_location'  => '',
                                'menu'            => 'FooterMenu1',
                                'container'       => false,
                                'menu_class'      => 'menu-footer menu-footer-mobile',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                'depth'           => 0,
                            ]); ?>
                        </div>
                        <div class="footer-3">
                            <? $menu = wp_nav_menu([
                                'theme_location'  => '',
                                'menu'            => 'FooterMenu2',
                                'container'       => false,
                                'menu_class'      => 'menu-footer menu-footer-mobile',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                'depth'           => 0,
                            ]); ?>
                        </div>
                        <div class="footer-4">
                            <? $menu = wp_nav_menu([
                                'theme_location'  => '',
                                'menu'            => 'FooterMenu3',
                                'container'       => false,
                                'menu_class'      => 'menu-footer menu-footer-mobile',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                'depth'           => 0,
                            ]); ?>
                            <div class="cont">
                                <div class="footer-fos">
                                    <?=get_template_part("components/button")?>
                                </div>
                                <? if(get_theme_mod("wa_on")): ?>
                                    <div class="footer-wa">
                                        <a href="//wa.me/<?=preg_replace("/[^0-9]/s", "", get_theme_mod("wa"))?>"><?=get_template_part("components/icon-wa")?></a>
                                    </div>
                                <? endif;
                                if(get_theme_mod("in_on")): ?>
                                    <div class="footer-in">
                                        <a href="//www.instagram.com/<?=get_theme_mod("in")?>"><?=get_template_part("components/icon-inst")?></a>
                                    </div>
                                <? endif; ?>
                            </div>
                        </div>
                        <? if(wp_is_mobile()) { ?>
                            <div class="footer-mobile">
                                <? if(get_theme_mod("tagline_on")):
                                    get_template_part("components/tag-line");
                                endif; ?>
                            </div>
                        <? } ?>
                    </div>
                </div>
                <? if(get_theme_mod("wa_on")): ?>
                    <div class="fixed-wa">
                        <a href="//wa.me/<?=preg_replace("/[^0-9]/s", "", get_theme_mod("wa"))?>" target="_blank"><?=get_template_part("components/icon-wa")?></a>
                    </div>
                <? endif; ?>
            </footer>
        </div>
        <?php wp_footer(); ?>
        <?get_template_part("inc/yandex","map")?>
        <?get_template_part("inc/metrika","footer")?>
    </body>
</html>