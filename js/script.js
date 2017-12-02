$(document).ready(function () {

  var imageCanvas = new ImageCanvas('img-canvas', "img-loader", "text-input", "size-input");

  imageCanvas.init();

  $(document).on('submit', '.image-canvas-form', function (e) {
        $('input[name="canvas-textValue"]').val(imageCanvas.textValue);
        $('input[name="canvas-textX"]').val(imageCanvas.textX);
        $('input[name="canvas-textY"]').val(imageCanvas.textY);
        $('input[name="canvas-canvas_text_size"]').val(imageCanvas.canvas_text_font_size);
    return true;
  });
});