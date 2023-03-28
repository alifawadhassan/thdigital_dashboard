<?php

// ---------------------------------------------
//          PRODUCTS IDS
// ---------------------------------------------
$open_solar_product_id = "prod_NLyoxdB4dqjx3x";
$notes_product_id = "prod_NWWIxzXVtJXVcs";


// ---------------------------------------------
//    CENTRAL DASHBOARD DATABASE CONNECTION
// ---------------------------------------------
/** MySQL database name */
define('DB_NAME', 'autocreditchecks_thdigital_dashboard_staging');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

//  $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME,3307);
$link_dashboard = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



// ---------------------------------------------
//    OPENSOLAR DATABASE CONNECTION
// ---------------------------------------------
/** MySQL database name */
define('DB_NAME', 'autocreditchecks_opensolar_app_v2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

//  $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME,3307);
$link_opensolar = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);



// ---------------------------------------------
//    CUSTOM_NOTES DATABASE CONNECTION
// ---------------------------------------------
/** MySQL database name */
define('DB_NAME', 'autocreditchecks_custom_note_users_staging');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

//  $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME,3307);
$link_notes = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
