<div class="logo logo_color--<?php echo $args['color']; ?>">
    <?php if(is_front_page()){ ?>
        <h1><?php echo get_bloginfo('name'); ?></h1>
    <?php }else{ ?>
        <span><?php echo get_bloginfo('name'); ?></span>
    <?php } ?>
</div>