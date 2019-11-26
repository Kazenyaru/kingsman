<?php

use app\controllers\MainController;

class CatalogController extends MainController {
  public function __construct() {
    $this->model('catalog');
    // for ($i = 1; $i < 18; $i++) {
    //   $cat = $this->catalog->data([
    //     "id_cat" => "$i",
    //     "category" => "category $i",
    //     "nama_cat" => "catalog $i",
    //     "gambar" => "gambar $i",
    //     "harga" => "200000",
    //     "ukuran" => "m",
    //     "tahun" => "2018",
    //     "designer" => "1"
    //   ]);
    //   // die($cat->getQuery());
    //   $cat->insert();
    //   $this->_dbh = "";
    //   $this->_sql = "";
    //   echo "insert berhasil!";
    // }

  }
  public function index() {
    $this->template('catalog/index');
  }
}
