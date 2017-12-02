<?php
session_start();
if(isset($_SESSION['user_id'])) {
  echo '<meta http-equiv="refresh" content="0; url=list.php" />';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./imports/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./imports/font-awesome/css/font-awesome.min.css">
  </head>
  <body>

    <nav class="navbar navbar navbar-toggleable-md navbar-light bg-faded">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php">Canvas to PDF / PNG</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Logi sisse</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container main">
      <form class="form-horizontal" role="form" method="POST" action="login.php">
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
              <!-- Put password error message here -->    
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
      </form>
      <br>
      <div class="container-fluid">
        <h4>Näidis kasutaja:</h4>
        <i>Kasutajanimi: admin</i><br>
        <i>Parool: 12345</i>
      </div>
    </div>

    <script type="text/javascript" src="./imports/tether/tether.min.js"></script>
    <script type="text/javascript" src="./imports/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="./imports/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./imports/jqueryUI/jquery-ui.min.js"></script>
  </body>
</html>