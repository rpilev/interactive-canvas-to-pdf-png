<?php
switch ($_GET['type']) {
  case 'invalid':
    ?>
    <h4 class="center-heading">Vale formaadinga fail lisatud.</h3>
    <?php
    break;
  case 'size':
    ?>
    <h4 class="center-heading">Lisatud fail on liiga suur.</h3>
    <?php
    break;
  case 'same':
    ?>
    <h4 class="center-heading">Sama nimega fail on juba olemas.</h3>
    <?php
    break;
  case 'general':
    ?>
    <h4 class="center-heading">Tekkis viga faili lisamisel.</h3>
    <?php
    break;
  default:
    die();
}
?>