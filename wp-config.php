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
define('DB_NAME', 'phpdesignwp');

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
define('AUTH_KEY',         'G~[0PDWE5^Ahmh8A1LLfX[uYj.M|^/bKdp}*rmL=PE9l}TOiK20RB%)Hh.,To3+g');
define('SECURE_AUTH_KEY',  'f??!Oo1CN2M]VN;NZWF/k~#3XS)dsA=ja+`t1X~ZX0Kge:QPA|CN;l*]#&@]2w(g');
define('LOGGED_IN_KEY',    'y6>ed:4@f{C.;{c>8sf;HiI$`~&9L@Q f))GtA/eVaj4%e2cNh;00-V3lX5q7]CY');
define('NONCE_KEY',        'c||2&!Nkmm@tdHe.c#ja S0u#hhr(#j`sK~f;P&t/#9CT[]:BhIKD~j6%{{!<N|b');
define('AUTH_SALT',        '#T4-uSQPa?J(8c:*?>/A}GHs{mIW?$$3!s6,j(!(OQeI+-JIS@5B`FySim@^Cana');
define('SECURE_AUTH_SALT', 'PT2/;,VEY&}e}${(2m0`m/mlJ|x+yjacc[@a{z=:_A?e|A&fd)te_6B;Z4FFtBp4');
define('LOGGED_IN_SALT',   'QAcGPFYd>l{+G^_/rm8 y0v9[ciGM7f8J7&a;`{X.n4;OoPHq)En:i:]YFI8t=BI');
define('NONCE_SALT',       ')+&!L}Us9e1pa2U}B9a$V6Y51!<}$nbpirX7TaicVnx<_:8g@}Q}m-G})[12qb/d');

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
