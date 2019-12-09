<?php

namespace app\controllers;

use FadilArtisan\Controller;
use FadilArtisan\Request;
use FadilArtisan\helper\Data;

use app\controllers\KingsmanController;

class RedirectController extends Controller {

  public function __construct() {
    $this->model('redirects');
  }

  public function redirectCatalog() {
    return $this->redirect('catalog/page/1');
  }

  public function createRedirect(Request $request) {

    $redir = $this->redirects->data([
      "id_redir" => Data:: generateRandomString(4),
      "url" => $request->url
    ]);

    $redir->insert();

    return $this->redirect('');
  }

  public function redirec(Request $request, $id) {

    $url = $this->redirects->select()->find($id)->get();

    if (!$url) {
      return KingsmanController::error();
    }

    return $this->redirect($url[0]['url'], true);

  }

}