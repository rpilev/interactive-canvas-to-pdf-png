<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Canvas - PDF / PNG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./imports/jqueryUI/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="./imports/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./imports/font-awesome/css/font-awesome.min.css">
  </head>
  <body>

    <?php
      include_once('./templates/layout/navbar.php');
    ?>

    <div class="container <?php echo (!isset($_GET['page']) || $_GET['page'] == 'mainpage') ? 'main' : '' ?>">
      <?php
        if(!isset($_GET['page']) || $_GET['page'] == 'mainpage') {
          include_once('./templates/pages/mainpage.php');
        } elseif (isset($_GET['page'])) {
          if(file_exists('./templates/pages/'.$_GET["page"].'.php')){
            include_once('./templates/pages/'.$_GET["page"].'.php');
          }
          else {
            ?>
            <h2 class="center-heading">Sellist lehte ei eksisteeri.</h2>
            <?php
          }
        } else {
          ?>
          <h2 class="center-heading">Tekkis viga!</h2>
          <?php
        }
      ?>
      
    </div>

    <script src="./imports/tether/tether.min.js"></script>
    <script src="./imports/jquery/jquery-3.2.1.min.js"></script>
    <?php
    if(!isset($_GET['page']) || $_GET['page'] == 'mainpage') {
      ?>
      <script src="./js/script.js"></script>
      <script src="./js/image_canvas.js"></script>
      <?php
    }
    if(isset($_GET['page']) && $_GET['page'] == 'list') {
      ?>
      <script src="./js/image_canvas_view.js"></script>
      <script src="./imports/jspdf/jspdf.debug.js"></script>
      <?php
    }
    ?>
    <script src="./imports/bootstrap/js/bootstrap.min.js"></script>
    <script src="./imports/jqueryUI/jquery-ui.min.js"></script>
  </body>
</html>