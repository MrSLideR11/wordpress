<?php add_action('init', function(){
    register_post_type('auto', [
        'labels' => [
            'name' => __('Автомобили'),
            'singular_name' => __('Автомобили'),
            'add_new' => __('Добавить автомобиль'),
            'add_new_item' => __('Добавление автомобиля'),
            'edit_item' => __('Редактировать автомобиль'),
            'new_item' => __('Новый автомобиль'),
            'view_item' => __('Смотреть автомобиль'),
            'search_items' => __('Искать автомобиль'),
            'not_found' => __('Не найдено'),
            'parent_item_colon' => __(''),
            'menu_name' => __('Автомобиль'),
        ],
        'public' => true,
        'menu_icon' => 'dashicons-car',
        'supports' => ['title','editor','thumbnail','excerpt'],
        'has_archive' => 'autos',
        'rewrite' => true,
        'query_var' => true,
    ]);
});

function getAuto($numberposts = 4){
    $auto = get_posts([
        'numberposts' => $numberposts,
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'auto',
    ]);

    return $auto;
}