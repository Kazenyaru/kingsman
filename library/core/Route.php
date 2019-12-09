<?php
namespace FadilArtisan;

class Route {

  static public $_get = array();
  static public $_post = array();
  static public $_put = array();
  static public $_patch = array();
  static public $_delete = array();

  static public $reqType = "";
  static public $request;

  static public $errorController = array();

  public static function get($route = "", $controller = "") {
    if (preg_match("/{*}/", $route)) {
      $newRoute = self::trimBracket($route);
      self::$_get[$newRoute] = array(
        0 => $controller,
        1 => true
      );
    }
    self::$_get[$route] = $controller;
  }

  public static function post($route = "", $controller = "") {
    if (preg_match("/{*}/", $route)) {
      $newRoute = self::trimBracket($route);
      self::$_post[$newRoute] = array(
        0 => $controller,
        1 => true
      );
    }
    self::$_post[$route] = $controller;
  }

  public static function put($route = "", $controller = "") {
    if (preg_match("/{*}/", $route)) {
      $newRoute = self::trimBracket($route);
      return self::$_get[$newRoute] = array(
        0 => $controller,
        1 => true
      );
    }
    return self::$_put[$route] = $controller;
  }

  public static function patch($route = "", $controller = "") {
    if (preg_match("/{*}/", $route)) {
      $newRoute = self::trimBracket($route);
      return self::$_get[$newRoute] = array(
        0 => $controller,
        1 => true
      );
    }
    return self::$_patch[$route] = $controller;
  }

  public static function delete($route = "", $controller = "") {
    if (preg_match("/{*}/", $route)) {
      $newRoute = self::trimBracket($route);
    }
    return self::$_delete[$route] = $controller;
  }

  public static function error($controller = "") {
    $newController = explode("@", $controller);
    $newController[0] = "app\\controllers\\".$newController[0];
    self::$errorController = $newController;

    // return var_dump(self::$errorController);
  }

  public static function call($route = "", $reqType = "") {

    self::$reqType = $reqType;
    // return var_dump($route, self::$reqType);
    switch($reqType) {

      case "GET":
        $uriParsed = self::parseUrl($route);

        self::$request = new Request($_GET);
        if ( isset(self::$_get[$route] ) ) {
          
          return self::dispatch( self::$_get[$route] );

        } elseif ( isset(self::$_get[$uriParsed[0]]) ) {
          if ( is_array(self::$_get[$uriParsed[0]]) ) {
            $controller = self::$_get[$uriParsed[0]][0];
            return self::dispatch( $controller, $uriParsed[1] );
          }
          return self::dispatch( $controller );

        } elseif ( !isset(self::$_get[$route] ) ) {
          
          return self::errorController("Route");
      
        }

      break;

      case "POST":
        $uriParsed = self::parseUrl($route);

        self::$request = new Request($_POST);


        if ( isset(self::$_post[$route]) ) {
          self::dispatch( self::$_post[$route] );
        } elseif ( isset(self::$_post[$uriParsed[0]]) ) {
          if ( is_array(self::$_post[$uriParsed[0]]) ) {
            $controller = self::$_post[$uriParsed[0]][0];
            return self::dispatch( $controller, $uriParsed[1] );
          }
          return self::dispatch( $controller );
          
        } elseif ( !isset(self::$_post[$route] ) ) {
          return self::errorController("Route");
        }

      break;

      case "PUT":
        $uriParsed = self::parseUrl($route);

        $_PUT = "";
        
        self::$request = new Request($_PUT);
        

        if ( isset(self::$_put[$route]) ) {
          self::dispatch( self::$_put[$route] );
        } elseif ( isset(self::$_put[$uriParsed[0]]) ) {
          if ( is_array(self::$_put[$uriParsed[0]]) ) {
            $controller = self::$_put[$uriParsed[0]][0];
            return self::dispatch( $controller, $uriParsed[1] );
          }
          return self::dispatch( $controller );
          
        } elseif ( !isset(self::$_put[$route] ) ) {
          return self::errorController("Route");
        }

      break;

      case "PATCH":
        $uriParsed = self::parseUrl($route);

        $_PATCH = "";
        
        self::$request = new Request($_PATCH);

        if ( isset(self::$_patch[$route]) ) {
          self::dispatch( self::$_patch[$route] );
        } elseif ( isset(self::$_patch[$uriParsed[0]]) ) {
          // return var_dump("this called two", self::$_patch[$uriParsed[0]]);
          if ( is_array(self::$_patch[$uriParsed[0]]) ) {
            $controller = self::$_patch[$uriParsed[0]][0];
            return self::dispatch( $controller, $uriParsed[1] );
          }
          return self::dispatch( $controller );
          
        } elseif ( !isset(self::$_patch[$route] ) ) {
          return self::errorController("Route");
        }

      break;

      case "DELETE":
        $uriParsed = self::parseUrl($route);

        $_DELETE = "";
        
        self::$request = new Request($_DELETE);

        if ( isset(self::$_delete[$route]) ) {
          self::dispatch( self::$_delete[$route] );
        } elseif ( isset(self::$_delete[$uriParsed[0]]) ) {
          // return var_dump("this called two", self::$_delete[$uriParsed[0]]);
          if ( is_array(self::$_delete[$uriParsed[0]]) ) {
            $controller = self::$_delete[$uriParsed[0]][0];
            return self::dispatch( $controller, $uriParsed[1] );
          }
          return self::dispatch( $controller );
          
        } elseif ( !isset(self::$_delete[$route] ) ) {
          return self::errorController("Route");
        }

      break;
      
      default:
        return die("error");
    }

  }

  public static function dispatch($controller = "", $param = "") {
    $newCon = explode("@", $controller);
    $classWNS = "app\\controllers\\".$newCon[0];
    if (\class_exists($classWNS)) {
      $object = new $classWNS();

      if (method_exists($classWNS, $newCon[1])) {

        call_user_func_array(
          array($object, $newCon[1]), 
          array(self::$request, $param)
        );

      } else return self::errorController("Action");
    } else return self::errorController("File");
  }

  public static function errorController($msg = "") {

    if (!self::$errorController) {
      return die("Error controller hasn't defined yet");
    } elseif (!class_exists(self::$errorController[0])) {
      return die("Error controller class not exist");
    }

    if ( method_exists(self::$errorController[0], self::$errorController[1]) ) {

      $method = self::$errorController[1];
      self::$errorController[0]::$method();

    } else die("$msg not found and error controller not found");

  }

  public static function checkParam($str = "") {
    
  }

  public static function trimBracket($str = "") {
    return $newRoute = substr($str, 0, strpos($str, "/{"))."/";
  }

  public static function parseUrl($url) {
    $routes = explode("/", $url);
        
    $param = array_pop($routes);

    $newRoute = implode( "/", $routes )."/";

    return array($newRoute, $param);

  }

}