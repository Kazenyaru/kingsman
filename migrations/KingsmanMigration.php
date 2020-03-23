<?php
define( 'ROOT', dirname( dirname(__FILE__)) );

require_once ROOT ."/vendor/autoload.php";
require_once (ROOT .'/config/config.php');

use FadilArtisan\Controller;

class KingsmanMigration extends Controller {
  
  public function __construct() {
    $this->model('catalog');
  }
}

$obj = new KingsmanMigration();
