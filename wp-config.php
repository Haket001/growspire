<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache
/** Enable W3 Total Cache */
/** Enable W3 Total Cache */
define('WP_AUTO_UPDATE_CORE', 'minor');
/** Enable W3 Total Cache */
/** Enable W3 Total Cache */
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
define('DB_NAME', 'database');
/** MySQL database username */
define('DB_USER', 'root');
/** MySQL database password */
define('DB_PASSWORD', '');
/** MySQL hostname */
define('DB_HOST', 'localhost');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');
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
define('AUTH_KEY',         'fcenbm301wcshy6bihkpmztoy6w76dnd5cbj4yqqkmbrbaesd3mnpjzo1ltbpann');
define('SECURE_AUTH_KEY',  'sce44hlfi67w8gpxcmez0xzqat2g39e8l3qohg2xlkin0e9h7s88xjzmiy3aqggf');
define('LOGGED_IN_KEY',    'iqoa3zjkdynktilarnyu9tojhbwdgtwse2udis7yhvsusm7rxkvt5e9ub8z7clqg');
define('NONCE_KEY',        'wutgwjkuhadqrxsrj7eqswm4fosp19odo0fkqymn2k8ndr4k8zm2zlthel3q1dnq');
define('AUTH_SALT',        'lz13vr7t7iww1wgokoc16corwyqk4dnevapspc7cqjf4l1i9bytky43jeosduvhq');
define('SECURE_AUTH_SALT', 'o9qoqblfbhcspo59u5v5nq9epejawe9hgeoy5hv7us397gtstkltituswha8d5qi');
define('LOGGED_IN_SALT',   'capqihlmvjs9kw7eiqrymnppp053gpaqwn8pozptu3b9ra1fprd6b8rh071sqxk5');
define('NONCE_SALT',       'ejqfxlnefjtxs2dbo0lfdm6uq5u9ufkdm9dglthwsc1wpeafncrdx8cs7pd31l9z');
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp9g_';
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
define('WP_DEBUG', true);
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
@ini_set( 'upload_max_filesize' , '12800M' );
@ini_set( 'post_max_size', '12800M');
@ini_set( 'memory_limit', '25600M' );
@ini_set( 'max_execution_time', '30000' );
@ini_set( 'max_input_time', '300000' );