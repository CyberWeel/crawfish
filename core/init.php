<?php
/**
 * Crawfish - проект, предназначенный для разработки среды, с которой можно
 * легко начать разработку небольшого сайта.
 *
 * @license https://github.com/CyberWeel/crawfish/blob/master/LICENSE MIT License
 */

// session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

date_default_timezone_set('Asia/Yekaterinburg');

require_once $_SERVER['DOCUMENT_ROOT'].'/core/consts.php';
require_once CORE.'/funcs.php';
require_once CORE.'/classes.php';
