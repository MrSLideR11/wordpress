<?php 
add_action('customize_register', function(WP_Customize_Manager $wp_customize){
    $section = "map_settings";
    $wp_customize->add_section($section, 
        [
            "title" => "Настройки карты",
            "description" => "Редактирование настроек",
        ]
    );
    $items = [
        "Заголовок метки"           => "map_title",
        "Описание метки"            => "map_desc",
        "Координата LAT"            => "map_lat",
        "Координата LNG"            => "map_lng",
        "Zoom"                      => "map_zoom",
    ];
    foreach($items as $key => $item){
        $wp_customize->add_setting($item);
        $wp_customize->add_control($item, ['label' => $key, 'section' => $section, 'type' => 'text',]);
    }
});

add_action('customize_register', function(WP_Customize_Manager $wp_customize){
    $section = "tagline_settings";
    $wp_customize->add_section($section, 
        [
            "title" => "Теглайн в подвале",
            "description" => "Описание теглайна",
        ]
    );
    $wp_customize->add_setting("tagline_on");
    $wp_customize->add_control("tagline_on", ['label' => "Показывать теглайн?", 'section' => $section, 'type' => 'checkbox',]);
    $wp_customize->add_setting("tagline");
    $wp_customize->add_control("tagline", ['label' => "Содержимое теглайна", 'section' => $section, 'type' => 'textarea',]);
});

add_action('customize_register', function(WP_Customize_Manager $wp_customize){
    $section = "fos_settings";
    $wp_customize->add_section($section, 
        [
            "title" => "ФОС",
            "description" => "Редактирование ФОС",
        ]
    );
    $wp_customize->add_setting("fos_signature");
    $wp_customize->add_control("fos_signature", ['label' => "Содержимое подписи", 'section' => $section, 'type' => 'textarea',]);
});