<?php
/* Used by AbstractDb */
define('CONF_DATABASE_HOST',   'localhost');
define('CONF_DATABASE_NAME',   'wifidog');
define('CONF_DATABASE_USER',   'wifidog');
define('CONF_DATABASE_PASSWORD',   '');

/*************************** Common setup option.  Adjust to suit your environment *******************************/

/* The SYSTEM_PATH, must be set to the url path needed to reach the wifidog directory.  Normally '/' or '/wifidog/', depending on where configure your document root.  Gateway configuration must match this as well */
define('SYSTEM_PATH', '/');
/**< Set this to true if your server has SSL available, otherwise, passwords will be transmitted in clear text over the air */
define('SSL_AVAILABLE', true); 
define('HOTSPOT_NETWORK_NAME', '�le sans fil');
define('HOTSPOT_NETWORK_URL', 'http://www.ilesansfil.org/');
define('UNKNOWN_HOSTPOT_NAME', 'Unknown HotSpot');

define('VALIDATION_EMAIL_FROM_ADDRESS', 'validation@yourdomain.org');
define('VALIDATION_EMAIL_SUBJECT', HOTSPOT_NETWORK_NAME.' new user validation');
define('LOST_PASSWORD_EMAIL_SUBJECT', HOTSPOT_NETWORK_NAME.' new password request');
define('LOST_USERNAME_EMAIL_SUBJECT', HOTSPOT_NETWORK_NAME.' lost username request');
/* RSS support.  If set to true, MAGPIERSS must be installed in MAGPIE_REL_PATH */
define('RSS_SUPPORT', true); 
/* Normally, the database cleanup routines will be called everytime a portal page is displayed.  If you set this to true, you must set a cron job on the server which will execute the script cron/cleanup.php. */
define('CONF_USE_CRON_FOR_DB_CLEANUP', false);

/** The next two items are constants, do not edit */
define('DBMS_MYSQL','AbstractDbMySql.php');
define('DBMS_POSTGRES','AbstractDbPostgres.php');

/** Defines which Database management software you want to use */
define('CONF_DBMS',DBMS_MYSQL);

/***** You should normally not have to edit anything below this ******/
define('MAGPIE_REL_PATH',  'lib/magpie/');
define('SMARTY_REL_PATH',  'lib/smarty/');
//define('NETWORK_RSS_URL', 'http://wifinetnews.com/index.rdf');
define('NETWORK_RSS_URL', 'http://patricktanguay.com/isf/atom.xml');
define('UNKNOWN_HOTSPOT_RSS_URL', '');

define('LOCAL_CONTENT_REL_PATH', 'local_content/');//Path to the directory containing the different node specific directories.  Relative to BASE_URL_PATH

/*These are the file names of the different templates that can be put in the CONTENT_PATH/(node_id)/ folders */
define('STYLESHEET_NAME', 'stylesheet.css');
define('LOGIN_PAGE_NAME', 'login.html');
define('PORTAL_PAGE_NAME', 'portal.html');
define('PAGE_HEADER_NAME', 'header.html');
define('PAGE_FOOTER_NAME', 'footer.html');
define('USER_MANAGEMENT_PAGE', 'user_management/');
define('HOTSPOT_LOGO_NAME', 'hotspot_logo.jpg');
define('HOTSPOT_LOGO_BANNER_NAME', 'hotspot_logo_banner.jpg');

/* Path for files in LOCAL_CONTENT_REL_PATH/common/ */
define('NETWORK_LOGO_NAME', 'network_logo.png');
define('NETWORK_LOGO_BANNER_NAME', 'network_logo_banner.png');
define('WIFIDOG_LOGO_NAME', 'wifidog_logo_banner.png');
define('WIFIDOG_LOGO_BANNER_NAME', 'wifidog_logo_banner.png');

define('DEFAULT_NODE_ID', 'default');
?>
