<?php
namespace app\middlewares;

use FadilArtisan\Middleware;
use FadilArtisan\helper\Session;

class Auth extends Middleware {
  public function __construct() {
    
  }

  public static function auth() {
    // return var_dump(Session::get('email'));
    if ( empty( Session::get('email') ) ) {
      self::redirect('/login');
    }
  }

  public static function guest() {
    if (!empty($_SESSION['email'] ) ) {
      return self::back();
    }
  }
  
  public static function admin() {

  }

}