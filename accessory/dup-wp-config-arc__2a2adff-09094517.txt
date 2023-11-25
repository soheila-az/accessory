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

define( 'DB_NAME', "accessorydb" );


/** MySQL database username */

define( 'DB_USER', "root" );


/** MySQL database password */

define( 'DB_PASSWORD', "" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


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

define( 'AUTH_KEY',         '80h(7rk|1$4fw0&H<^^d0#ifk,kr/YJ:C|,+1j,;~p4e3lv3>E!+wz|B6WFUI&]O' );

define( 'SECURE_AUTH_KEY',  '|940dY7E2:(GUxd@6*mMl>di#00DRBr6<)$9}d/}Q#iG*eW:Urk!{56! -ncamv&' );

define( 'LOGGED_IN_KEY',    'iV27u(~OO6O-u}_T2H#jFxTu64:O!W0L_4TVex]e@yiujLw(oX]b^,&uY:X==due' );

define( 'NONCE_KEY',        '*spxP6{1V4fvc%$polZ{+R$57->t?Qj|dVP>?,Fd]36UTSoEh[rWtjD`Dp)3r`^;' );

define( 'AUTH_SALT',        '(x+(Wa8quD/*XR^a)JA)Vq}5V;jp|~g3_Jy3{N=1Y>}~q7pxqoE.Bwc({^L Y,!S' );

define( 'SECURE_AUTH_SALT', 'rL$tgqkX ;WD)8upy3b^le^>QLuc?y<r4`;0/aR),Cph$,~~Q~5H[_UBW65 MOql' );

define( 'LOGGED_IN_SALT',   '8%5n>Pq7}eLP.;J3VP0}@~vxv6(NnUJ/.WGZrJZex;D`{ukFpB}lC@u36yqTHs&s' );

define( 'NONCE_SALT',       'E<D)X(2zR_*jrkfylVR0U-3${R_h*#BC|FX-h5*Z%>dI?$S~@_Mo+#Th> ksM541' );


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

