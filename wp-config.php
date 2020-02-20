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
define( 'DB_NAME', 'siteblog' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '%Jc3L>z}+6~$$(~w5Svpn-j6[oM97*8HV> jzGv!LhIi;,.HKShL [<4C_2!NPS=' );
define( 'SECURE_AUTH_KEY',  'Z1S&TMH*S2{*uKUcI5sYd#&]A`{qHut!^d23Y16&Fi qk6xY^n>.)/OQvYFuxOD@' );
define( 'LOGGED_IN_KEY',    '%M<]rwI[H.ccKEYw1Fk,#RT&+9e$zGWu&F9Inx53@c7pHz6Ew!;qyv<<}_<tL3 0' );
define( 'NONCE_KEY',        'wlX(y@]mJ?UB4VD~:S%_TQ8!HJoFzg r:eJ}VirQ#+8( IW9W>h9p$e7syHGk5[e' );
define( 'AUTH_SALT',        '1^1Slh<<NQW++V-#0t/| -yn}SSo1W0}p~hBpf}J*<eQ<RgE~ws_)nbrdse^yXB]' );
define( 'SECURE_AUTH_SALT', 'NEinIL(HJ#h0/bN|tsY8~<<0a5klo5<`wbWZ]H9emy9P2fpV;C7iX`&EG(:)N#Vh' );
define( 'LOGGED_IN_SALT',   '8@aCjn?[$z[dOeK7Qrx29J)NlT+FMoK^rr.J~U+ciiXA/Ddk*6Ostlgt:U^?QVRm' );
define( 'NONCE_SALT',       't]bf^aXZ81>!3)7n|(0O%ZQgQ_GdKHZJgc3|4lS+XNg[E6AqWVX>G>h!{?``MH P' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
