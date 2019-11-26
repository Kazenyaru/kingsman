<?php

namespace FadilArtisan;

class Middleware {
  public static function back() {
    echo '<script>history.go(-1)</script>';
  }

  public static function redirect($url = '') {
    header('location: '.BASE_PATH.DS.$url);
  }
}