<?php

namespace app\controllers;

use FadilArtisan\Request;
use FadilArtisan\helper\Session;

use app\controllers\MainController;
use app\middlewares\Auth;

class AuthController extends MainController {
  public function __construct() {
    $this->model('user');
    // if (!empty($_SESSION['email'] ) ) {
    //   $this->redirect('/');
    // }
  }

  public function login() {
    // return var_dump(Session::get('email'));
    Auth::guest();
    return $this->template('auth/login');
  }
  
  public function check(Request $request) {
    Auth::guest();
    $email = $this->validate($request->email);
    $password = $this->validate($request->password);

    $data = $this->user->select()->where([
      ['email', '=', "'$email'"]
    ])->limit(1)->get();

    // return var_dump($this->user->query("SELECT * FROM user WHERE email = 'fadilmuh2002@gmail.com'")->count());

    $jml = $this->user->count();
    if ($jml > 0) {
      if ( password_verify( $password, $data[0]['password'] ) ) {
        $_SESSION["email"] = $data[0]["email"];
        $_SESSION["role"] = $data[0]["role"];
        $_SESSION['id_user'] = $data[0]["id_user"];
        $this->redirect('');
      } else {
        $this->template('auth/login', array(
          "msg" => array("warning", "Password salah!")
        ));        // $view->bind('msg', 'Password salah!');
      }
    } else {
      $this->template('auth/login', array(
        "msg" => array("warning",'Email tidak dapat ditemukan')
      ));
      // $view->bind('msg', 'Email tidak dapat ditemukan');
    }
  }

  public function logout() {
    Auth::auth();
    session_destroy();
    $this->redirect('login');
  }

  public function register() {
    Auth::guest();
    return $this->template("auth/register");
  }
  
  public function create(Request $request) {
    // return die("ini kepanggil");
    $email = $this->validate($request->email);
    $password = $this->validate($request->password);

    
    $iniUser = $this->user->data([
      'email' => $email,
      'password' => $password,
      'role' => $request->role
    ]);
      
    return var_dump($this->user->getValMessage());
    if ($this->user->getValMessage()) {
      return $this->template('auth/login', array(
        "msg" => array("danger", $this->user->getValMessage())
      ));
    }

    $password = password_hash($password, PASSWORD_BCRYPT);

    $iniUser = $this->user->data([
      'email' => $email,
      'password' => $password
    ]);

    // return var_dump($this->user->getValMessage());


    $iniUser->insert();

    return $this->template('auth/login', array(
      "msg" => array("success","Register sukses silahkan login")
    ));

  }

  public function get($request, $id) {
    // Auth::auth();
    // return var_dump($id);
    // $user_id = $this->validate($id);
    // return var_dump($user_id);
    $user = $this->user->select(array("email", "profpict"))
      ->where(array('id_user', "=", "$id"))
      ->limit(1)
      ->get();
    return var_dump($user);
    return $this->template("", $user);
  }

}