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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'kirwa' );

/** MySQL database password */
define( 'DB_PASSWORD', 'kirwa@2020' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'dp?Sos)+&cxqBk$!j:~r(=z`_QOfqq@u=#%.%|L0vi0$avP7.W9D?*y[5DXxXbAT' );
define( 'SECURE_AUTH_KEY',   'c{#1n(Gm&ggC7}.pfum4f>7 }_S8/r`?;vi;U7:_0o}KJYpCFrDmqeZc]ki; Wuz' );
define( 'LOGGED_IN_KEY',     'J+[#P<<#ZRW[*fx];gJy^VVW|ppn)mq9`m;PGL)@|v@gt4]rvIM*VK/cPpp*mfxv' );
define( 'NONCE_KEY',         '(h)T :=Lhru^OD2$K?T`?_2D71YtiEkAeL=wd B$XG#N!p^#K*3v1c?bgfa6A^l*' );
define( 'AUTH_SALT',         '5s2s[PxVbm}#JS#itUXx]Qi$RnWfcV|8u%W8:^6u[2QsZ^+x0e-AS~<8j^x03j>]' );
define( 'SECURE_AUTH_SALT',  'O95(T0dWar)IBI.,WaQ7w(Eu&2;ha*eIx^o<k#Cqk&zPs?cbJSELB0/;ET,C9V/T' );
define( 'LOGGED_IN_SALT',    'nd(}WGaC=z%*8V%uf2kI<z,&pT<z5^M&X%5Dh_0V^UVGcy,N]u/&s}{c,} ;>m)x' );
define( 'NONCE_SALT',        'Jb6Cm3@^WM$Cd_KtW%~!j{Q61}`]O^1o>H{A@]Z/9_RN1Gv5-u0St8H%(WVmC(a ' );
define( 'WP_CACHE_KEY_SALT', 'X5Y%_nOxxZu<tmc43^4(Ar[7 @C81JUHis=IC qF<le2p1cevwhm;INh!;sJ}8*p' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
