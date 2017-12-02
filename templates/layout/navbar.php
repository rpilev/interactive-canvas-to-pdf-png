<nav class="navbar navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="./">Canvas - PDF / PNG</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <?php if(isset($_SESSION['user_id'])) { 
        ?>
        <li class="nav-item active">
          <a class="nav-link" href="logout">Logi välja</a>
        </li>
      <?php
      }
      ?>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo !isset($_SESSION['user_id']) ? 'loginpage' : 'list' ?>"><?php echo !isset($_SESSION['user_id']) ? 'Logi sisse' : 'Adminni ala' ?></a>
      </li>
    </ul>
  </div>
</nav>