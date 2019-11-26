<?php

session_start();

// ? ROOT FILE
define( 'ROOT', dirname( dirname(__FILE__)) );
define( 'DS', DIRECTORY_SEPARATOR );

//
$url = isset($_GET['url']) ? $_GET['url'] : '' ;

// ! AUTOLOAD
require_once ROOT ."/vendor/autoload.php";


// ? CALL CONFIG FILE
require_once (ROOT .'/config/app.php');

use FadilArtisan\Route;

function __autoload($class) {
  $dir = ROOT.DS.str_replace("\\", DS, $class) .".php";
  if (file_exists($dir)) require_once $dir;
}

// ? ERROR MESSAGE
function setReporting() {
  if (DEVELOPMENT_ENVIRONMENT) {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
  } else {
    error_reporting(E_ALL);
    ini_set('display_errors', 'Off');
    ini_set('log_errors', 'On');
    ini_set('error_log', ROOT.'/tmp/log/error.log');
  }
}

// ? CALL CONTROLLER
function callHook() {
  global $url;
  // return var_dump();
  
  if (strlen($url) > 1) {
    if ($url[strlen($url)-1] == "/") {
      $url = substr($url, 0, -1);
      return header("location: ".BASE_PATH.DS.$url);
    }
  }

  // return var_dump($url);

  $method = $_SERVER['REQUEST_METHOD'];

  // $urlArray = explode('/', $url);
  $routeWeb = ROOT .'/app/routes/web.php';
  $routeApi = ROOT .'/app/routes/api.php';

  try {
    require_once $routeWeb;
    require_once $routeApi;
  } catch (\Throwable $th) {
    echo "no prob $th";
  }

  FadilArtisan\Route::call($url, $method);

}

setReporting();
callHook();