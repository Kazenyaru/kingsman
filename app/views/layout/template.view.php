<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Kingsman</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="<?=BASE_PATH?>/css/index.css">

  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container">
      <a class="navbar-brand nav-atas" href="<?=BASE_PATH?>/">Kingsman</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link active" href="<?=BASE_PATH?>">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?=BASE_PATH?>/catalog/1">Catalog</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?=BASE_PATH?>/contact">Contact Us</a>
          </li>
          <?php if(@$_SESSION['role']) { ?>
          <li class="nav-item">
              <a class="nav-link" href="<?=BASE_PATH?>/cart">My Cart</a>
          </li>
          <?php } ?>
          <li class="nav-item">
              <a class="nav-link" href="<?=BASE_PATH?>/login">Login/Register</a>
          </li>

          <?php if(@$_SESSION['email']) { ?>
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <?= @ucfirst(explode('@', $_SESSION['email'])[0]) ?> <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= BASE_PATH ?>"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="<?=BASE_PATH?>/auth/logout" method="POST" style="display: none;">
                    
                </form>
            </div>

          </li>
          <?php } ?>

        </ul>
      </div>
    </div>
  </nav>

  <main class="mt-2">
    <div class="container">
      <div class="container">
<?php
  $view = new FadilArtisan\View($viewName);
  // return var_dump($data);
  $view->bindData($data);
  $view->render();
?>
      </div>
    </div>
  </main>

  <hr>

  <!-- Footer -->
  <!-- <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p class="copyright text-muted">Copyright &copy; Your Website 2019</p>
        </div>
      </div>
    </div>
  </footer> -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>