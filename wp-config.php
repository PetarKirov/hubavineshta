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
define('DB_NAME', 'test');

/** MySQL database username */
define('DB_USER', 'ivan');

/** MySQL database password */
define('DB_PASSWORD', 'emilboev');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '^p^q.j;v8Gn29^[[-9bs&fq0!c*&uN^o]7dh;Z|kIAC+q*u7%HQ?;ju=n~9gWnZD');
define('SECURE_AUTH_KEY',  'iBS+4Rramx)8yYcr7+E?7<:>z6/$Q2s67<|1eWe~-x=bT?&Rw?fxu:--i5W|xT1F');
define('LOGGED_IN_KEY',    ']P+U,btf5AiXm0MA$=I[LvX<||bOKmZPC<vl,_x$J;ZuQCk@N5@i2WB~:DLPQ,v*');
define('NONCE_KEY',        'r++228e~t>~l6)/=orcL 5}bpx4zz|$-+U!5R5:E}Z#(#Qkp3^_A,=1PrYi+ N+J');
define('AUTH_SALT',        'Ob=7Man+bCbW/l;o0<u3^$p+uv$-EnMrQ0BVect8M3/dQcb=rJF}QN+o[!T%H$ZN');
define('SECURE_AUTH_SALT', '1b :u~g{$rWGdotSq0VwUkDE777/+A<;L4f`,_6C.|>BnxgJ&i|gPCxr@>A4cbrC');
define('LOGGED_IN_SALT',   'U7d+avq>/[2)a5{U/CAW3rJoq:l8k7^!Ajk!_lGDico#ggTs,3NLT(Yhc$h%m1<)');
define('NONCE_SALT',       '8k)LA)-PzH.XD5@Ocv,vY|QP?fDDAGDnN~enq2QnQ{NXxvx*,i{6yi+E0X(9QRPQ');

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

