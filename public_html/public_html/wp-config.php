<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
define('WP_HOME','http://thetechlog.in');
define('WP_SITEURL','http://thetechlog.in');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'thetesql_soham');

/** MySQL database username */
define('DB_USER', 'thetesql_soham');

/** MySQL database password */
define('DB_PASSWORD', 'Aintitfun123!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'Lu&.ug`bOuL]<@]ghF-~Yt$.o^2<RWo}V2*(.|t?W%+2s#J/&q+|&PCW/-v#YU =');
define('SECURE_AUTH_KEY',  'PvKfLc]Inm_&log#Zz{,v&Tt%u*boF(sq.r%=AZj3+82ZVi[.O`jo}Vcwzwkaf:t');
define('LOGGED_IN_KEY',    'P]l}AP|;Y!$jl,4{9Q|]Poc)h9kJL)Ob%+S+|7+b!*{hY00VNE_9]E+TEmb@+{,`');
define('NONCE_KEY',        'PXZr1><nN+RSZ{)S+@ZaN`+V+>:^w|BA/:Jv^UO/8<5J<,Jj71+Rg)|8aYh[=^qJ');
define('AUTH_SALT',        'pCV|O A(8aLYsvgJDIaN4$HR6FO?sLrd=_;78*:7x-t|i+XW0Da~PCu}gxr{0(E5');
define('SECURE_AUTH_SALT', 'o3{Iu-H.dv3IGy^B]]n+0KCE!L2LH4eoaP]9Gae+}7NtrB +`nhLT+,+{*O<OH)t');
define('LOGGED_IN_SALT',   '#lZk)#^.3+.2^LC4~?M5}|H)|VITtwx(N8HAJV(X<8Xv*N_MQ!Ax~^E{TPc^%Z:I');
define('NONCE_SALT',       'mV8e<;AVY)_M<;(|@:9/L#r-yK1I|cXBXwk=g3]2.#|z|@F6d2h#iP1tHu-#o0j%');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
