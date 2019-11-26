<?php
namespace app\controllers;

use FadilArtisan\Controller;

class MainController extends Controller {

  // public function __construct() {
  //   if ( empty($_SESSION['username']) && empty($_SESSION['email'] ) ) {
  //     $this->redirect('login');
  //   }
  // }

  public function template($viewName, $datas = array()) {
    $view = $this->view('layout/template');
    $view->views($viewName);
    $view->bind('data', $datas);
    // return var_dump();
    // foreach ($datas as $key=>$value) {
    //   $view->bind($key, $value);
    // }
  }

}
