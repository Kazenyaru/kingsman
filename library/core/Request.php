<?php

namespace FadilArtisan;

class Request {
  
  public function __construct($datas = array()) {
    $header = apache_request_headers();
    $datas = array_merge_recursive($header, $datas);

    foreach($datas as $key => $value) {
      $this->$key = $value;
    }

  }

}