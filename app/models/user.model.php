<?php

use FadilArtisan\Model;

class UserModel extends Model {
  public function __construct() {

    parent::__construct();
    
    $this->_table = 'user';

    $this->validator([
      "password" => "min:8",
      "email" => "email|unique:email"
    ]);

    // return var_dump($this->_val);

  }
}