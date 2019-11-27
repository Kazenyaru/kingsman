<?php
namespace app\middlewares;

use FadilArtisan\Middleware;
use FadilArtisan\helper\Session;

class Auth extends Middleware {
  public function __construct() {
    
  }

  public static function auth() {
    // return var_dump(Session::get('email'));
    if ( empty(Session::get('email')) ) {
      self::redirect('/login');
    }
  }

  public static function guest() {
    if (!empty($_SESSION['email'] ) ) {
      return self::back();
    }
  }
  
  public static function admin() {
    if ( Session::get('role') != 'admin' ) {
      self::back();
    }
  }

  public static function designer() {
    if (Session::get('role')) {
      if ( Session::get('role') == 'user' ) {
        return self::back();
      }
      return;
    } else {
      return self::back();
    }
  }

  public static function designerProtection($id) {
    return var_dump($id != $_SESSION['id_user'] || $_SESSION['role'] != 'admin');
    if ($id != $_SESSION['id_user'] || $_SESSION['role'] != 'admin') {
      return self::back();
    }
  }

}