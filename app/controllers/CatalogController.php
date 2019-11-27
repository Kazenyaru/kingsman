<?php
namespace app\controllers;

use FadilArtisan\Request;

use app\controllers\MainController;
use app\middlewares\Auth;

class CatalogController extends MainController {
  
  public function __construct() {
    $this->model('catalog');
  }

  public function get(Request $request ,$id) {
    $catalog = $this->catalog->select()->join('user', array(
      "catalog_kingsman.designer" => "user.id_user" 
    ))->find($id)->get();

    return $this->template('catalog/show-catalog', ['cat' => $catalog]);
  }

  public function designer(Request $request ,$id) {
    $catalog = $this->catalog->select([
      "catalog_kingsman.*","user.email" 
    ])->join('user', array(
      "catalog_kingsman.designer" => "user.id_user" 
    ))->where(["catalog_kingsman.designer", "=", "$id"])->get();

    return $this->template('main/catalog', [
      'fadil' => @$catalog, 
      'email' => @$catalog[0]['email'],
      'id' => $id
    ]);

  }

  public function tambah() {
    return $this->template('catalog/tambah-catalog');
  }

  public function create(Request $request) {
    Auth::designer();

    $namaFile = " ";

    if ($_FILES['gambar']) {
      $namaFile = $_FILES['gambar']['name'];
      $namaSementara = $_FILES['gambar']['tmp_name'];
    
      // tentukan lokasi file akan dipindahkan
      $dirUpload = ROOT."public/images/designer";
    
      // pindahkan file
      $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
    }

    $catalog = $this->catalog->data([
      'category' => $request->category,
      'nama_cat' => $request->nama_cat,
      'gambar' => $namaFile,
      'harga' => $request->harga,
      'ukuran' => $request->ukuran,
      'tahun' => $request->tahun,
      'designer' => $request->designer
    ]);

    $catalog->insert();

    return $this->redirect("catalog");

  }

  public function edit(Request $request, $id) {
    Auth::designer();

    $catalog = $this->catalog->select()->find($id)->limit(1)->get();

    Auth::designerProtection($catalog[0]['designer']);

    return $this->template('catalog/edit-catalog', ['cat' => $catalog]);
  }

  public function update(Request $request, $id) {
    Auth::designer();

    Auth::designerProtection($id);

    $namaFile = "";

    
    if ($_FILES['gambar']['name']) {
      $namaFile = $_FILES['gambar']['name'];
      $namaSementara = $_FILES['gambar']['tmp_name'];
    
      // tentukan lokasi file akan dipindahkan
      $dirUpload = ROOT."/public/images/designer/";
    
      // pindahkan file=
      $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

      // return var_dump($terupload);

      if (!$terupload) {
        return $this->back();
      }

    }

    $catalog = $this->catalog->find($id);

    $catalog->data([
      'category' => $request->category,
      'nama_cat' => $request->nama_cat,
      'gambar' => $namaFile,
      'harga' => $request->harga,
      'ukuran' => $request->ukuran,
      'tahun' => $request->tahun,
      'designer' => $request->designer
    ]);

    $catalog->update();

    return $this->redirect('catalog');

  } 


  public function delete(Request $request ,$id) {
    Auth::designer();

    Auth::designerProtection($id);
    
    $catalog = $this->catalog->find($id);

    $catalog->delete();

    return $this->redirect('catalog');

  }

}
