<?php
session_start();
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
    <link rel="stylesheet" type="text/css" href="./imports/jqueryUI/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="./imports/bootstrap/css/bootstrap.min.css">
  </head>
  <body>

    <nav class="navbar navbar navbar-toggleable-md navbar-light bg-faded">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Canvas - PDF / PNG</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="login_page.php"><?php echo !isset($_SESSION['user_id']) ? 'Logi sisse' : 'Adminni ala' ?></a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container main">
      <form class="image-canvas-form" method="POST" action="./save.php" enctype="multipart/form-data">
        <div class="form-group">
          <label>Lisa pilt</label>
          <input class="form-control" name="img" type="file" id="img-loader">
        </div>
        <div class="form-group">
          <canvas id="img-canvas"></canvas>
        </div>
        <div class="form-group">
          <label>Lisa teksti ja muuda asukohta hiirega ringi tirides</label>
          <input type="text" class="form-control" id="text-input">
        </div>
        <div class="form-group">
          <label>Teksti suurus</label>
          <input type="number" id="size-input" value="50">
        </div>
        <input type="hidden" name="canvas-textValue" value="">
        <input type="hidden" name="canvas-textX" value="">
        <input type="hidden" name="canvas-textY" value="">
        <input type="hidden" name="canvas-canvas_text_size" value="">
        <input type="submit" class="btn btn-primary" name="" value="Salvesta">
      </form>
      
    </div>

    <script type="text/javascript" src="./imports/tether/tether.min.js"></script>
    <script type="text/javascript" src="./imports/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="./js/image_canvas.js"></script>
    <script type="text/javascript" src="./js/script.js"></script>
    <script type="text/javascript" src="./imports/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./imports/jqueryUI/jquery-ui.min.js"></script>
  </body>
</html>