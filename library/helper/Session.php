<?php

namespace FadilArtisan\helper;

class Session {
  public static function get($key = "") {
    return $_SESSION[$key];
  }
}