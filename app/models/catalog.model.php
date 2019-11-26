<?php

use FadilArtisan\Model;

class CatalogModel extends Model {
  public function __construct() {
    parent::__construct();
    $this->_table = 'catalog_kingsman';
    $this->_primary = 'id_cat';
  }
}