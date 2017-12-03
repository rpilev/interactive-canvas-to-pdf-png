<div class="container-center">
  <form class="form-horizontal login-form" method="POST" action="login.php">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h2>Loggige Sisse</h2>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="sr-only" for="username">Kasutajanimi</label>
          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
            <input type="text" name="username" class="form-control" id="username"
                   placeholder="Kasutajanimi" required autofocus oninvalid="this.setCustomValidity('Palun sisestage kasutajanimi')" oninput="setCustomValidity('')">
          </div>
        </div>
      </div>
    <div class="col-md-3">
      <div class="form-control-feedback">
        <span class="text-danger align-middle">
              
        </span>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="sr-only" for="password">Parool</label>
          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
            <input type="password" name="password" class="form-control" id="password"
                   placeholder="Parool" required oninvalid="this.setCustomValidity('Palun sisestage parool')" oninput="setCustomValidity('')">
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-control-feedback">
          <span class="text-danger align-middle">
            <?php echo isset($_GET['error']) ? 'Vale kasutajanimi või parool.' : '' ?>
          </span>
        </div>
      </div>
    </div>
    <div class="row" style="padding-top: 1rem">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Logi sisse</button>
      </div>
    </div>
  </form> <br>
  <div class="container-fluid">
    <h4>Näidis kasutaja:</h4>
    <i>Kasutajanimi: admin</i><br>
    <i>Parool: 12345</i>
  </div>
</div>