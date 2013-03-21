<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'a1721076_anime');

/** MySQL database username */
define('DB_USER', 'a1721076_anime');

/** MySQL database password */
define('DB_PASSWORD', 'vassword1223');

/** MySQL hostname */
define('DB_HOST', 'mysql5.000webhost.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'cNW/HOw-&KIOM&!$G+sO.l8xm2s:,7 ,Dq&Xh,K,l%S%:oW|vL)sYJK[x{C$$r/~');
define('SECURE_AUTH_KEY',  '<X41#Z-M8#.ESXfD_f;ItqMl`n-1Uv+5b}!~p6<RhgFXw-Hu(fE)%+f GJz,E`[6');
define('LOGGED_IN_KEY',    'I$[@DU.T.9)aXLH+A>Yyi2D/TAA-9e<c:S|zjy{ytP|@liNq,P13V |0y<`6O%SO');
define('NONCE_KEY',        'nY$InWC3~#QL]aB}w.3),wORKL3>^[W$_TVM0}V_VElsDB_@D]}N5?xv+f=4K5|5');
define('AUTH_SALT',        'KzR${sU7 +5~FO6I;_e@:@s,7!V|cS|gaocL+(^@S?=#I-9nm!q$0[2:kypjE,s2');
define('SECURE_AUTH_SALT', 'FiW/c[%-+`D3E2N<S-|,[,bp)53.9-45+j`-=+8xA+-|z&T8:,({eKzWw_qLHz^5');
define('LOGGED_IN_SALT',   '4OtNb2va.K7_?Jb|e%p!]H<Dc.2{CW4+6+7xF9lY|r1u@KAo(dYRduq:S+bBKm!+');
define('NONCE_SALT',       '+ss>NROjW0`w8XhQN]=.k^Jg+.tT38%53-&dECxUX.=cdiY7lslai:*q=^v*c|3/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'as_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
