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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'fclSv7gMbvpibHYGPsuhss0Lm1WMVCpV2gxrgIxQbF5kJZj7UDybOa21NRBIzOnCKfu47EwImR9RxNzxZz+9xA==');
define('SECURE_AUTH_KEY',  '3eyQpvUYkBrhPgmWn5Q9NY92eWIlCOOEuaUhdIUJt/wj3X+WTD7K78OVy+oGyDKWkKj75AhCHtqMsW9DLFcQjw==');
define('LOGGED_IN_KEY',    '+oLsggS+POtq6l8zH9/1fnYr98qi8lAwoT8MIKR0UaE9TrpBq4JbyTsN6e5fGAkAeonTEnQdaoHGmoFL3gBKQw==');
define('NONCE_KEY',        'y6zEcEhxtPhRvOB+8E11NIUOHvV4OMj/frmJstlVTyRJ4CI+ma64J1lv+PQBcTdGLuOF6arz6Q5EEBLTXcUMoA==');
define('AUTH_SALT',        'owldkhOYF05OaHDLj3pRqCsDUzl1tIHIfosPgyTpkJCzphr/RL2wcK93Ua6/ESsnUS4+k9jOZnH8hVPg2eL4XA==');
define('SECURE_AUTH_SALT', 'Lo338CbckaBrJD0BIc5TG0rzMBwkOhc9jM9APU5QCp4qU3crqppT+P9vj9ead9Da954VJ3fmKYtlZUjIK0OyJg==');
define('LOGGED_IN_SALT',   'e07dgZ01i8ZLN8BaNJm8vs/ZScZFcley2lk/eMk7ayMb8Iln8cP1rLlg50uwO/68mCVyCisRRlDSChMW0ghIwg==');
define('NONCE_SALT',       'dt4/npIf/gZ6wMiqinSSJeF3AXfky6Fr+zgqNk8ciRDjtYbW/OuRcO0adYTEsb+zz+CoyzUiUjTkiQOj4ga2nQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* Inserted by Local by Flywheel. Fixes $is_nginx global for rewrites. */
if (strpos($_SERVER['SERVER_SOFTWARE'], 'Flywheel/') !== false) {
	$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.10.1';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
