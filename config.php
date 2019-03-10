<?php
session_start();


#Debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

#environment
define("BASE_PATH", $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/TAuthenticationService/");
define("CACHE_PATH", BASE_PATH . "cache");
define("PATH_TO_CORE",$_SERVER['CONTEXT_DOCUMENT_ROOT']."/TStuffPhpModules/TStuff/Php/tstuff.php");

#include tstuff modules
include(PATH_TO_CORE);

#secure config
$secureConfig = [
    "server"=>"",
    "db"=>"",
    "user"=>"",
    "password"=>"",
    "passwordSalt"=>""
];
#development version
$secureConfig = json_decode(file_get_contents("secure_config.json"),true);

#DB Credentials
define("DB_DSN", "mysql:host=".$secureConfig['server'].";dbname=".$secureConfig['db'].";charset=utf8mb4");
define("DB_USER", $secureConfig['user']);
define("DB_PASS", $secureConfig['password']);
define("PASSWORD_SALT",$secureConfig["passwordSalt"]);