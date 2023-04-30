<dis class="banner">
    <img src="<?php echo CFS()->get('home_tab1_background'); ?>" class="banner_bg">
    <div class="container">
        <div class="banner_block">
            <div class="banner_title">
                <h2><?php echo CFS()->get('home_tab1_title'); ?></h2>
                <p><?php echo CFS()->get('home_tab1_description'); ?></p>
            </div>
            <div class="banner_fos">
                <?php get_template_part(
                    "components/fos", 
                    null, 
                    [
                        "inputs" => [
                            [
                                "type" => "tel", 
                                "name" => "phone", 
                                "placeholder" => "+7 (___) ___-__-__",
                                "required" => true
                            ]
                        ], 
                        "orientation" => "vertikal",
                        "agreement" => false
                    ]
                ); ?>
            </div>
        </div>
    </div>
</dis>