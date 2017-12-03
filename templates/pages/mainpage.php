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
  <input type="submit" class="btn btn-primary" name="save" value="Salvesta">
</form>