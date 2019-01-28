<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ninacordeiro');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'roP4=hFP<{IUv<@w5{!l^m9uC6E!ALuwvyXI=U.V CsJ.LM<@yX(V]*hYWmO{>VB');
define('SECURE_AUTH_KEY',  'tQ@&y<rptzj-F)v.KOSu;LiK74wB@QR;r<Sb-*EVsptocp?3&ZfyE{a_Vd$TDZvy');
define('LOGGED_IN_KEY',    '.Ph:72m~1{9p()i-~4e~Sad~]/{-2)v43>8{Zqp1HBDqsC]5&VwB5#a.PW4bh{j.');
define('NONCE_KEY',        'w-_Q:@JB6B.nl32S4J(k_>-Lg;<?.AM747=Rj[s2X!=6l2(H/3F4hEK}7#;nhi3X');
define('AUTH_SALT',        'Su]o0)RU1iqPnyoa}eCXQ?}}buD[:cr8%a0IY:ju-P~)dHc#b3k8@ ; q5$9_vy<');
define('SECURE_AUTH_SALT', ':Xjd~QFUhVv7xk!`9dP}Sq(3_5%KjKTMy*xXBDM<2TxcH_164]OC$es8,9+][Pw*');
define('LOGGED_IN_SALT',   'U.G|:*_c^1LoALuQ2m3j%|L495Q[XbxeLYee1iqWwzF)}qFw#j|hM81$7P+ZKkEE');
define('NONCE_SALT',       'd[[6!] 8=#w38C7j?FP^-R_Lvw`X|n26V+*n7*L0U$^*;&|9U[7s;2B 8&/i[Ypb');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
