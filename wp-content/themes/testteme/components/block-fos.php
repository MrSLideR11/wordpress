<div id="block-fos">
    <div class="container">
        <div class="block-fos">
            <div class="block-fos_title">
                <h2><?php echo CFS()->get('home_tab3_title'); ?></h2>
            </div>
            <div class="block-fos_description">
                <?php echo CFS()->get('home_tab3_description'); ?>
            </div>
            <div class="block-fos_fos">
                <?php get_template_part(
                    "components/fos", 
                    null, 
                    [
                        "inputs" => [
                            [
                                "type" => "text", 
                                "name" => "name", 
                                "placeholder" => "Ваше имя",
                                "required" => false
                            ], [
                                "type" => "tel", 
                                "name" => "phone", 
                                "placeholder" => "+7 (___) ___-__-__",
                                "required" => true
                            ]
                        ], 
                        "orientation" => "horizontal",
                        "agreement" => true
                    ]
                ); ?>
            </div>
        </div>
    </div>
</div>