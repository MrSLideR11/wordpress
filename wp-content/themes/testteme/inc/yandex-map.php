<script src="https://api-maps.yandex.ru/2.1/?apikey=a2317259-6bd2-43e9-9214-b5e7527acd9c&lang=ru_RU" type="text/javascript"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        ymaps.ready(init);

        function init() {
            var myMap = new ymaps.Map('map', {center: [<?php echo get_theme_mod("map_lat"); ?>, <?php echo get_theme_mod("map_lng"); ?>], zoom: <?php echo get_theme_mod("map_zoom"); ?>, controls: []});

            myMap.behaviors.disable('scrollZoom');
            myMap.behaviors.disable('drag');

            myPlacemark = new ymaps.Placemark([<?php echo get_theme_mod("map_lat"); ?>, <?php echo get_theme_mod("map_lng"); ?>], {
                balloonContent: '<center><strong><?php echo get_theme_mod("map_title"); ?> - <?php echo get_theme_mod("map_desc"); ?></strong></center><br><center><?php echo get_theme_mod("address"); ?></center>',
                hintContent: '<?php echo get_theme_mod("map_title"); ?> - <?php echo get_theme_mod("map_desc"); ?>'
            }, {
                preset: 'twirl#violetIcon'
            });
            myMap.geoObjects.add(myPlacemark);
        }
    })
</script>