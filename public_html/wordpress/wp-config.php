<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'truongph_wordpress');

/** MySQL database username */
define('DB_USER', 'truongph_quytv');

/** MySQL database password */
define('DB_PASSWORD', '123@123a');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+Mz&V|.?MQeeB2Ov0NNR<-G._L;haJIrfs`CH4B9Qms!3|h,xhP745b@Kfiv4(WA');
define('SECURE_AUTH_KEY',  'O_c An:uKgualR(}sOKe?[ Z{=`6.1=N .`UI+W @p.%Y0N4g/mjFQI8g&O*Oe&1');
define('LOGGED_IN_KEY',    'Y>m$,-)vv;6eBt,[oC U8B+2z+yO6pX&qkk?|*q-41|3sjxa%oU :v|C%FUC~I@>');
define('NONCE_KEY',        'iuWkd-E]UM#:aXjc&*I1Z?ub2WzGouq,[qL9tc0uQY{Nc{?[^D_(^ Zt/C?<MU0Y');
define('AUTH_SALT',        'whd3^#9`*K%<6|(>ov a)?-`Li(7OUe 2(tv!99-4h97BO!LHwP}-Ab=X@kO78H|');
define('SECURE_AUTH_SALT', 'Hm;J}2NO+w}1?#eeU3V@%&&#|_rjlSLT6.YvZu[(GvB Dz#f0v|l`G`<l 4E-C],');
define('LOGGED_IN_SALT',   'a!)HKv=q_1e8L*^y|8z~?hXdxjW?K]V*hS6E-sC;<fM3/J}#6]N+i!Fw-WeTOM#B');
define('NONCE_SALT',       '!3#~vzX,>nV+//gMLtZixft-M[#x|l/RMMmgK,HjP:==GAAEl&@ePHfSH(5&79IB');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
