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
          include_once('./templates/pages/'.$_GET["page"].'.php');
        } else {
          ?>
          <h2>Tekkis viga!</h2>
          <?php
        }
      ?>
      
    </div>

    <script type="text/javascript" src="./imports/tether/tether.min.js"></script>
    <script type="text/javascript" src="./imports/jquery/jquery-3.2.1.min.js"></script>
    <?php
    if(!isset($_GET['page']) || $_GET['page'] == 'mainpage') {
      ?>
      <script type="text/javascript" src="./js/script.js"></script>
      <script type="text/javascript" src="./js/image_canvas.js"></script>
      <?php
    }
    if(isset($_GET['page']) && $_GET['page'] == 'list') {
      ?>
      <script type="text/javascript" src="./js/image_canvas_view.js"></script>
      <script type="text/javascript" src="./imports/jspdf/jspdf.debug.js"></script>
      <?php
    }
    ?>
    <script type="text/javascript" src="./imports/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./imports/jqueryUI/jquery-ui.min.js"></script>
  </body>
</html>