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
define( 'DB_NAME', 'maisya' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'w_/MB=R@ZS,|,m$}``ud!(Xd_uAwAt/+^=e1=x*o0)P}iT!3:S2G4Un5Nn&Mce/.' );
define( 'SECURE_AUTH_KEY',  '=@2&7=1t8NFkyK_z9t6KBRDP+>W/vhG1hLBq+!7H))?!{(u,1J]`c}S5j5^iA{-H' );
define( 'LOGGED_IN_KEY',    'C-~2m14)+znjDTUj:)b}3&^uc5|#mp{iG4b+PcVI:YVljOm7DAe5UKVQ#uCge7io' );
define( 'NONCE_KEY',        'xcFoz/>K(q`mEG6)2BA]BSvkJ:+0iOyNpCfv@(oxRg&+jSAa@H9im41t^2s}fC4,' );
define( 'AUTH_SALT',        'wW5<_GBY[f>^Q<r:0jbG5).q||!/UXEGuIE0U,vgUOBJBdZ~#tO/rZGr@$1E+{cJ' );
define( 'SECURE_AUTH_SALT', 'F|acQWAb[DO*z<tA,O t(RI<8oW(djPbLX1plN$In0ol=&,|6]<V6y[>zk;R9e.M' );
define( 'LOGGED_IN_SALT',   '&1vtrX4*_+BJZr(U=!w6UEqNcs7ry?45Kf}cB(`S@#~n:%wowZ2:D0g-|4NFlXG[' );
define( 'NONCE_SALT',       'uD8_2|-0gF{Y)y|{%,R%HlV+Wk?gR:jzHW:QWOZS)E0{j<DyBQP*(_1}VB)xX` 3' );

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
