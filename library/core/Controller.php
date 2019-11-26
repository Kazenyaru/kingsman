<?php
namespace FadilArtisan;

class Controller {
  protected function view($viewName) {
    return new View($viewName);
  }

  protected function model($modelName) {
    require_once ROOT ."/app/models/". $modelName.".model.php";
    $className = ucfirst($modelName)."Model";
    $this->$modelName = new $className();
  }

  protected function template($viewName, $datas = array()) {
    $view = $this->view('layout/template');
    $view->views($viewName);
    $view->bind('data', $datas);
    // foreach ($datas as $key=>$value) {
    //   $view->bind($key, $value);
    // }
  }

  public function back() {
    echo '<script>history.go(-1)</script>';
  }

  public function redirect($url = '') {
    header('location: '.BASE_PATH.DS.$url);
  }

  public function validate($data) {
    return htmlentities(trim(strip_tags($data)));
  }

}