<?php

use FadilArtisan\Model;

class RedirectsModel extends Model {

  public function __construct() {

    parent::__construct();
    
    $this->_table = 'redirects';
    $this->_primary = 'id_redir';

  }

}