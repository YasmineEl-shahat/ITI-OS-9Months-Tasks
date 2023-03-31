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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ecommerce' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'asd5693' );

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
define( 'AUTH_KEY',         'aO*(#L,:w=(>s~q-p c2,PoO*hqtX5?(:*pQj@w!NV*A>wFv#` $yR$])Tn@N?,z' );
define( 'SECURE_AUTH_KEY',  'M_L$d_Y+XMEu2IL=+Ab&+f=bp/FW-CG3[BfPk$/8n$/bsr*u(-S-/Q}fZ]D.AFA ' );
define( 'LOGGED_IN_KEY',    'x6;p#VSvcD.x{GL$4$ln/J[(|[ }uAMa#F*;RwhNl+NMq|3-S-;)HOWu*B;>qo[y' );
define( 'NONCE_KEY',        'MJ89wvr]iVM]aA P/0.1ynB9RAk&Cx*ln)+>x0nQT:$Ndd0t,EZ?f(2}nE2GJ5xl' );
define( 'AUTH_SALT',        'hI8`pVlA1[q~XMj]X)[H?4o-UwA^35R oRva2hT,.EqGE{L&aEZv%xr%;j:5+S_]' );
define( 'SECURE_AUTH_SALT', 'igZC$Ct} <=I6kk0q=!-j8#)2^&kR$3v(|?gGrJoJ_obz2{fT?dA?1ryL&p)lOY;' );
define( 'LOGGED_IN_SALT',   'AGjBOwqvPD;}N]-u5GqPb9}k(s>c,/ O;<jqgn#N~>Sel0V/$Fv6q?WLTh$7G3A[' );
define( 'NONCE_SALT',       'JWg7SS=A.bls7HbuVd]$MB.2>k# 253*.M2] VT{S4Y)9*zc$Yn.lGLm  &8*v`O' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ecommerce_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
