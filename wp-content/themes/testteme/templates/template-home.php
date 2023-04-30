<?php 
    /*
    *  Template name: Главная
    */
    get_header();
    
    if(CFS()->get('home_tab1_active'))
        get_template_part("components/banner", null, null);

    if(CFS()->get('home_tab2_active'))
        get_template_part("components/total", "auto", ["auto" => getAuto(CFS()->get("home_tab2_total"))]); 
        
    if(CFS()->get('home_tab3_active'))
        get_template_part("components/block", "fos", null); 

    if(CFS()->get('home_tab4_active'))
        get_template_part("components/map", null, null);
        
    get_footer();
?>