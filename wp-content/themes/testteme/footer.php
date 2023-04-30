            </main>
            <footer>
                <div class="container">
                    <div class="footer">
                        <?php if(get_theme_mod("tagline_on")){ ?>
                            <div class="footer-tagline">
                                <div class="tagline">
                                    <?php echo get_theme_mod("tagline"); ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </footer>
        </div>
        <?php 
            get_template_part("inc/modal", null, null);
            get_template_part("inc/result", null, null);
            wp_footer();
            get_template_part("inc/yandex", "map", null);
        ?>
    </body>
</html>