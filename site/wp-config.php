<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'mnbtcom_architecture');

/** Имя пользователя MySQL */
define('DB_USER', 'mnbtcom_arch');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'architecture');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8 k=-UWv|T%Y8SI99|v[DmKl,q{H~oFMnBs}jF$OPAoMh_Hpo^c?^7Y+|EAs9m$-');
define('SECURE_AUTH_KEY',  ';hcnJ{XlqsTFuP2CTm|Z,-I0j$<dgPF<t;0-~;4IS%]}=8v$P<8Z(D`]*! <+8q<');
define('LOGGED_IN_KEY',    'K~.}q;~|xXWF]5Qw`FCVc)@0qlz>nu6/N-9{u/b7~|{ Yi3Ky!+RmEtAy4kU-;D~');
define('NONCE_KEY',        ')/:ZO(ZKl0.@.{FfA3ce5]p@+yLLo+^6>JbwZ]?*,TiQ$G(n2UJMWe)Aq5=kUenK');
define('AUTH_SALT',        '[Jw~`qF)xlPdrtToO>Ldmb`LW?xf:o6zqnb)!$uwlb&dM5.QV.eh9kRUW(%Hzpe_');
define('SECURE_AUTH_SALT', '5%rFn.R+x{P|$[Ltf4|tk+HIC]D6&n[EF4|7.?%>_5GRf=pi1.3JZjGDUNSDN4f.');
define('LOGGED_IN_SALT',   'idr+=6M+a!=#>O2N;U&Q8O)Wgpv-aEjdTswn~qt3|*fe+iS~W:+.%?4,)LArRe~P');
define('NONCE_SALT',       'w?>(R_,OUx||pv+Yb.&uh&zP2{(J`SEC;,jFg?SX|s#&DFzQn<34FQ<OI](7z.Hv');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
