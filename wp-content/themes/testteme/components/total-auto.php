
<div class="total-auto">
    <div class="container">
        <div class="total-auto_title">
            <h2><?php echo CFS()->get('home_tab2_title'); ?></h2>
        </div>
        <div class="total-auto_items total-auto_items--<?php echo key(CFS()->get('home_tab2_row')); ?>">
            <?php foreach($args["auto"] as $item){
                $id = $item->ID; ?>
                <div class="total-auto_item">
                    <div class="total-auto_item__title">
                        <h3><a href="<?php echo get_permalink($id); ?>"><?php echo $item->post_title; ?></a></h3>
                    </div>
                    <div class="total-auto_item__fields">
                        <div class="total-auto_item__fields--availability">
                            <img src="<?php echo CFS()->get('home_tab2_img_availability'); ?>">
                            <?php echo CFS()->get('auto_cfs_availability', $id); ?>
                        </div>
                        <div class="total-auto_item__fields--term">
                            <img src="<?php echo CFS()->get('home_tab2_img_term'); ?>">
                            <?php echo CFS()->get('auto_cfs_term', $id); ?>
                        </div>
                    </div>
                    <div class="total-auto_item__img">
                        <img src="<?php echo get_the_post_thumbnail_url($id, 'total-auto'); ?>">
                    </div>
                    <div class="total-auto_item__excerpt">
                        <?php echo $item->post_excerpt; ?>
                    </div>
                    <div class="total-auto_item__btns">
                        <a href="#" class="btn btn_1 btn_modal">Получить спец. цену</a>
                        <a href="#" class="btn btn_2 btn_modal">Спец. условия по лизингу</a>
                        <a href="#" class="btn btn_2 btn_modal">Подобрать автомобиль</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>