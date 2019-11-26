<?php

namespace FadilArtisan;

class View {
  public $viewName = null;
  public $isRender = false;
  public $data = array();
  public $dataName = null;

  public function __construct($view) {
    // return die($view);
    $this->viewName = $view;
  }

  public function bind($key = "", $value) {
    $this->data[$key] = $value;
    // return var_dump($this->data);
    // return die(extract($this->data));
  }

  public function bindData($data = array()) {
    $this->data = $data;
  }

  public function views($name = "") {
    $this->data['viewName'] = $name;
  }

  public function render() {
    $this->isRender = true;
    extract($this->data);
    // return var_dump($datas);
    $view = ROOT."/app/views/".$this->viewName.".view.php";
    if (file_exists($view)){
      require_once $view;
    } else die('View not found!');
  }

  public function __destruct() {
    if (!$this->isRender) {
      $this->render();
    }
  }

}