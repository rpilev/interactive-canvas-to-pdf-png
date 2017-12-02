<?php
if(session_id() == '' || !isset($_SESSION) || !isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
  echo '<meta http-equiv="refresh" content="2; url=index.php?page=loginpage" />';
  echo '<h3 class="center-heading">Te peate olema sisse logitud.</h3>';
  die();
}
?>
<div class="container main-list">
  <div id="img-canvas-list">
    
  </div>
</div>
<div id="my_mm" style="height: 1mm; display: none"></div>