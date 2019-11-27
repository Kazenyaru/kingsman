<?php
namespace app\controllers;

use FadilArtisan\Request;

use app\controllers\MainController;

class KingsmanController extends MainController {

  public function __construct() {
    $this->model('catalog');
  }

  public function home() {
    return $this->template('main/home');
  }

  public function redirectCatalog() {
    return $this->redirect('catalog/page/1');
  }

  public function catalog(Request $request, $pagi = 1) {

    $cat = [];

    if (preg_match("/[a-z]/i", $pagi)) {
      $this->search($pagi);
    }
    
    $halaman = 6;

    $page = $pagi ?$pagi : 1 ;

    // return var_dump($pagi);

    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

    $jumlah = $this->catalog->select([ "catalog_kingsman.*","user.email" ])->join('user', array(
      "catalog_kingsman.designer" => "user.id_user" 
    ))->count();
    
    $cat = $this->catalog->select([ "catalog_kingsman.*","user.email" ])->join('user', array(
      "catalog_kingsman.designer" => "user.id_user" 
    ))->limit($mulai,$halaman)->get();
      
      // return var_dump($jumlah);

    $pages = ceil($jumlah/$halaman);

    // return var_dump($cat);
    return $this->template('main/catalog', [ 'fadil' => $cat, 'paginate' => $pages ]);
  }

  public function search($str = "") {
    $cat = [];
    
    $cat = $this->catalog->select([ "catalog_kingsman.*","user.email" ])->join('user', array(
      "catalog_kingsman.designer" => "user.id_user" 
    ))->where([["catalog_kingsman.nama_cat", "like", "'%$str%'"]])->get();
      
    // return var_dump($jumlah);

    // return var_dump($cat);
    return $this->template('main/catalog', [ 'fadil' => $cat, 'paginate' => 1]);
  }

  public function about() {
    return $this->template('main/about');
  }

  public function contact() {
    return $this->template('main/contact');
  }

  public function error() {
    return $this->view('main/notfound');
  }

}

$king  = new KingsmanController();