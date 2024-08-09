<?php
define( 'WP_CACHE', false /* Modified by NitroPack */ );
 // Added by WP Rocket

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'blogwordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ' 6!:r52hT(]m&9$53OE>vl)z!5uD3O> h`~.k_`@Wm!!Iu!{5lA^q~Kdzky,CkeH' );
define( 'SECURE_AUTH_KEY',  'c~i^f7^)5J*s+fjH^Qw-6OXNK53UObTNrHZ:P~~ZMJC&c@eshp;fc]CAR)tG<i5!' );
define( 'LOGGED_IN_KEY',    '!jDPntNZW~hiU0Q/zx<&!{auSimlFd6vwI{,f,;d5DWz-b0HmL15L##m]TT.,EyO' );
define( 'NONCE_KEY',        '=U.:pz8{/(JDz%tK-Cb`IV{yK!.f4qr;i+Ol[`d-n>lze^]Et4KZ=UD#Jz(.btBM' );
define( 'AUTH_SALT',        '2K,/4LCn75hnrc?*3H1KPYHDv;:t1J~kjU)nlS++U-gu8%bFiVg8>LKB(9:9J)K&' );
define( 'SECURE_AUTH_SALT', 'vNhGl:?XctkPO[XNf>W{m(1`h9p:xYw^8lh*v<cIQtM0D<)x4@3^C0H_D$V;?8^?' );
define( 'LOGGED_IN_SALT',   'g*#i.^fPnJUL:aNYm*tXf<K:48@0XE2 av?B!7H;V6jD=&*n5pvKmjym|7qR$(G!' );
define( 'NONCE_SALT',       ';?B/=n81S#WsLA2Vw:-sxRu)|Hnc1=r4|b}{,A,XpL8D$djiySFO}(e.}SdHBd31' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */

/** Memory Limit **/
define('WP_MEMORY_LIMIT', '256M');
define('WP_MAX_MEMORY_LIMIT', '256M');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
