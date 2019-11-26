<?php
define( 'ROOT', dirname( dirname(__FILE__)) );

require_once ROOT ."/vendor/autoload.php";
require_once (ROOT .'/config/config.php');

use FadilArtisan\Controller;

class KingsmanMigration extends Controller {
  
  public function __construct() {
    $this->model('catalog');
    for ($i = 0; $i < 18; $i++) {
      $cat = $this->catalog->data([
        "id_cat" => "$i",
        "category" => "category$i",
        "nama_cat" => "catalog$i",
        "gambar" => "gambar$i",
        "harga" => "200000",
        "ukuran" => "m",
        "tahun" => "2018",
        "designer" => "1"
      ]);
      $cat->insert();
      $this->_dbh = "";
      $this->_sql = "";
      echo "insert berhasil!\n";
    }
  }
}

$obj = new KingsmanMigration();
