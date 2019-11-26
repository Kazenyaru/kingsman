<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
          <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
          <hr class="my-4">
          <h5 class="card-title text-center mt-4 mb-4">Sign In</h5>

          <?php if (@$msg) { ?>
            <div class="alert alert-<?= $msg[0] ?> alert-dismissible fade show" role="alert">
              <strong>Message: </strong> <?= $msg[1] ?>.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>

          <form class="form-signin" method="POST" action="<?= BASE_PATH ?>/auth/check" autocomplete="off">

            <div class="form-label-group">
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus autocomplete="off">
              <label for="inputEmail">Email address</label>
            </div>

            <div class="form-label-group">
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required autocomplete="off">
              <label for="inputPassword">Password</label>
            </div>

            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input" id="customCheck1">
              <label class="custom-control-label" for="customCheck1">Remember password</label>
            </div>

            <input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" value="Sign in">
            <a href="<?=BASE_PATH?>/register"><h4 class="text-center mt-5">Register</h4></a>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>