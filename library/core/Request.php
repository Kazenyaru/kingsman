<?php

namespace FadilArtisan;

class Request {
  
  public function __construct( $datas ) {

    $header = apache_request_headers();

    $head = "header";

    $this->$head = $header;

    if ($header["Content-Type"] ==  "application/json") {

      $datas = json_decode( file_get_contents('php://input'), true );

    }

    foreach ($datas as $key => $value) {
      $this->$key = $value;
    }

  }

}