<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'zFGNOr<LjOn$Pjcv56%{E ~JR_0$juAK?2l|Zh}Ly}U?VnK4w5VNoP:4{3OrV*R4' );
define( 'SECURE_AUTH_KEY',  'w$r|QwXu^[Cjbv_%,wu*4-$xYn6]N6o`arR1*`,+$|f7l~-azQDlY,r (3|xZ1m;' );
define( 'LOGGED_IN_KEY',    'Kdyzbm]AOiuZoh^Gh~h{06-Fc#i]3UUO_xc8p`&bDNqssIrmGv^YI$DY57y]56s,' );
define( 'NONCE_KEY',        'Du &ctl{ZI2Ne1l~y7<7ci/_(JrvY~NsTLHnUiL60;.!s7L}^I6Xtx4_@UbJsgHs' );
define( 'AUTH_SALT',        '?EywfaKbZ<LtB!?@)E@IxS0X b%F<Pk<~)T>!p<pc<@+N{HpD& zlb^0!Vrjxl3E' );
define( 'SECURE_AUTH_SALT', '@]CKl$iX9DhBD.H*qO;q@?iwV`BP3YRLTUKjM9sg:o/PrckQf&/-c;NjUdw:m1UO' );
define( 'LOGGED_IN_SALT',   '!/^O)t?|:sNz(~*EurQ2]8}2W ASqBSz[:R*&Df4x$eKbG%r;?z`;c@5Qgr}Pe(H' );
define( 'NONCE_SALT',       'r_!P9(b5_zV-DV6SWLX:!=lcA}qxV:bX|*C#ETS3oHa)b`WOrbMRvDH:@!/V{gS1' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
