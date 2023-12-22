<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '16t.f/;+#L@?-SW&Y_,s(L%>7d^q4.?p:3+r{CMJw87X0~XX_+M3p)D:~>4i6Nn~' );
define( 'SECURE_AUTH_KEY',   '#jVN;-j1!J(WjP$-xaIsp9m-AC3@]!)aI)H][g(C~ZD?~E2`SaF:`x,Kk$+NR%PZ' );
define( 'LOGGED_IN_KEY',     ']%0d6fj*3u[P!PT@AV#%oFZh*A+HH_LZ/z+JJE$qfwnc;iGz,rx)lrVIFF/v8^*t' );
define( 'NONCE_KEY',         ',qWvpYl> RGm#5?A`}TSq-Ry^< cT?E?|E%SM%(H2yR|Jd)/oWmYy4xiW3NC,*T{' );
define( 'AUTH_SALT',         '^#xDXx;H[Y1%j!qHB?E|EU*pL8+WnXD;~`J0cjSeUWwQIl*cpZ9J,xHMNP0{hJxY' );
define( 'SECURE_AUTH_SALT',  '|%TYaZkGHY!**xKG^Iwv2ht#r:bLMBM-TLCU3E3;[{UOyVDUBMbQb|n3v&T>D-z*' );
define( 'LOGGED_IN_SALT',    'Une9b&W72E`8z?{SYEN:O*jq c BcAF=+|JBGP-JDV25Gj<O^0b{C,Hi]<IVIT<c' );
define( 'NONCE_SALT',        'u*M86W06ah`*3{#vEbuFo&=>(T]64Z/+dia>3g6BS_q08HJNa5v[K^xezZ&IJ|I<' );
define( 'WP_CACHE_KEY_SALT', 'U6w6hg5~j8GtO&CUYCp4UcjSVqE+tC&o49q.}Y0^E&kc:x%Pa2s?z!db=2b~5^|X' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
