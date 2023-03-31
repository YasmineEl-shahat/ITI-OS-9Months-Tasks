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
define( 'DB_NAME', 'portofolio' );

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
define( 'AUTH_KEY',         'h0SHii}uF<bSe )u[WVy+IK}IzxH%FQ(Ai@}z1mZz.g|/Qk/1}S#h6v{M=0vKbB]' );
define( 'SECURE_AUTH_KEY',  ')$@7M_bPV<~qMj|T^vC|$XM;<UA,W8JtE,=_B;=6)MLj+SA0[,J(ZaT,e5s.rJI-' );
define( 'LOGGED_IN_KEY',    's.*j)>uR:yJC)phI`0S/QOraz4{)S?%dU7tv:CW>wSVh5_j8J=L}!h4nQQt9KFu3' );
define( 'NONCE_KEY',        '+H=FW76ox73nUYNw8HkvdVb/Z7c)kQG6?O=roAGdGnOY#sE2&FMAX~GP`Q8GqnQu' );
define( 'AUTH_SALT',        '0R4B0lpAKuR*znkwAeJ?bF[^D#SUIg{`4$*m.1y>Zp4J0D]br&uT9=FcLC`m{y|3' );
define( 'SECURE_AUTH_SALT', ';S_1A+[4/`$Y>DQCbU0P}1DOrc~#I?48p i<%kgugq<LCsMVKe9-[-k1m56ebT!n' );
define( 'LOGGED_IN_SALT',   '_Db^48H>b1!822OtD@>D]!:w[Kg5>|.)SZ^LhstBJ5[Y~],>;XxyWc-<$HUice-&' );
define( 'NONCE_SALT',       'k)1jl<Ha}UpEY%Ky_.|2sAC7g{P fy2yWFl:Q(N~l0/rAg.!UA5_i$n<tpJsRGV&' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'portofolio_';

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
