<?php
define("START_TIME", microtime(true));

// The absolute filesystem root to Shop

//define('BASE_PATH', dirname(realpath(dirname(__FILE__).'/../index.php')));
define('BASE_PATH', dirname(realpath(dirname(__FILE__))));



/**
 * Run stripslashes on every value of a multidimension array
 *
 * @param mixed $value The variable to run stripslashes on
 * @return mixed
 **/
function stripslashes_deep($value) {
    if (is_array($value)) {
        $value = array_map('stripslashes_deep', $value);
    } else {
        $value = stripslashes($value);
    }

    return $value;
}

	function slugify($str) {
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $str);
   $slug = strtolower($slug);
   return $slug;
}


error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);
ini_set("track_errors","1");
ini_set('log_errors', 'On');
ini_set('error_log', BASE_PATH.'/tmp/logs/error.log');
@set_time_limit(0);
ini_set("magic_quotes_runtime", "off");

// If the PHP timezone function exists, set the default to GMT so calls to date()
// will return the GMT time. Our date functions then apply the store timezone on top
// of this
if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set('GMT');
}

// If magic_quotes_gpc is on, strip all the slashes it added. By doing
// this we can be sure that all the gpc vars never have slashes and so
// we will always need to treat them the same way


/*
 * inlcude the all functions files and
*/
require(BASE_PATH . "/config/config.php");
require_once(BASE_PATH.'/system/general.php');
require(BASE_PATH . "/system/database/mysql.db.php");
require(BASE_PATH . "/system/security/php_security.php");
require(BASE_PATH . "/system/session/secure.sessions.php");
$GLOBALS['db'] = new db;
$GLOBALS['sesions'] = new Sessions();

//header("location: ".GetConfig("BlockPage")."");
//exit;
//die();

$GLOBALS['CFG']['ShopPath'] = rtrim(GetConfig('WebPath'), '/');
$parsedLocation = ParseAppPath($GLOBALS['CFG']['WebPath']);
if(!empty($parsedLocation['appPath'])) {
	$GLOBALS['CFG']['AppPath'] = $parsedLocation['appPath'];
}
else {
	$GLOBALS['CFG']['AppPath'] = '';
}
