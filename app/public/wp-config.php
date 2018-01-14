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
define('AUTH_KEY',         'o0qxof1kZKohMWTXxRHtw039FfE7XVOT44VgadLZ0eqnXlcUtEOMD28oWC5+bv71ZvotJdaflSwr9LtdJqRzhg==');
define('SECURE_AUTH_KEY',  'Zdt9kxWpvbZ9kzai5VV5GSOFgBBnZB/FVBqfwa8FcWLOJnL45U7axar6Sur/gO+tYNOukaI+MWIVyar0Fee+eg==');
define('LOGGED_IN_KEY',    'kypP6d0IglnjP31wYqicYPl+yjF83HfBuP+17lWSwMa5wb2viMk97p9MIWLf3n19ZnsDPxA+p7dviaEmVbJDXQ==');
define('NONCE_KEY',        'lteVUDVrmK89XdGgemS5L2liqCtf4MJd/Pjo6LTv4oqA51VWmaU3UeD4iUu7p2YKsEk6HVdBp9UPcHEVAK694Q==');
define('AUTH_SALT',        '3eSjruNtprupbL/iPYrTmx78b6PchEMXMXjKMOOixqKm8e1c2DBYySNzR1899td0D7ilOQkr1yfcpbaOO61fZw==');
define('SECURE_AUTH_SALT', 'ODjwMXBXY0B1mbEG3olEWKdQZ/alqbVPQSYC+oM/gSU+EXjcz0jYZeGF0dQBX8hUmWr6CBSDxYXzA3WL46jg9A==');
define('LOGGED_IN_SALT',   '3t7EAWWBWacC3XmEjVL2/D+NqC3CuiiuuTLtaj1B7wenFXVHg7uXJQV4UQgIDLG0p9VQ+zoHfbaFd2OZskBLZg==');
define('NONCE_SALT',       '1c6H/Hrnxpae+flLv1+S7GcLTek+jmOky0EGfpDEK+raLIR/AhSe2kKu/bBoFUqbJzcY5CBkSkK1v5l9qwAhUQ==');

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
