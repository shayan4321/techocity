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
define( 'DB_NAME', 'algotech_db' );

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
define( 'AUTH_KEY',         'HvQG*Cj90XDtBKn<&v%k2V tyG5.f#`0)g({3:dN1YV#QF_bTxr${cD,/:Yj?-kD' );
define( 'SECURE_AUTH_KEY',  '>C<?Q{Q4*&(=yR-+a;N28dp_$V:O4&Yx5=;|8h5=H :V3S#49*JZVTn][vGN6j<E' );
define( 'LOGGED_IN_KEY',    '}IC43%lo~-SZQ|3~Ja:W|Xgk,uoiRYH9zo|r<c{{0RQ9Q:?yz2_@HXm?ak^iuo(L' );
define( 'NONCE_KEY',        'R^lG QBThE6Xzs[*Z?plT5q=# h7! PO)OKK[4KuD6ty]ba=@;u$C_NjFP9FQYt6' );
define( 'AUTH_SALT',        'Xzl8)}oI_kOVa,OF(6uej1^PH%~/vL|LZQ<72.u=6MXxp9%V[tgT_zr0;i5OrzhW' );
define( 'SECURE_AUTH_SALT', '_^f/CsJKdVmzU:B3(>Jnk-XocEAD&BQtg{UV~=mZMV2+zd~jBK`cD88GU_p$A;j!' );
define( 'LOGGED_IN_SALT',   '9W2/fjW2F3qY%xyJqr(eCA3~ DtXt2uqh~>%JI&yJc^npD+^WtK}(#O=(;?X tR8' );
define( 'NONCE_SALT',       'dI=Uj`8A>}3m)RUp!,4|{QxEQc}B2s_9rvkgT6Vy=)kLZi+CtthBIEoI>4CtZb1K' );

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
