function ImageCanvasView(canvas_list_target, canvas_id, img_src, text_value, textX, textY, text_font_size) {

  this.canvas_id = canvas_id;
  this.canvas_list_target = document.getElementById(canvas_list_target);
  this.img_src = img_src;
  this.textValue = text_value;
  this.textX = textX;
  this.textY = textY;
  this.canvas_text_font_size = text_font_size;
  this.canvas_text_font = text_font_size + 'px Arial';
  this.baseHeight = 280;
  this.baseWidth = 370;
  this.canvas = undefined;

  this.init = function() {
    this.setUpCanvas();
    this.draw();
  }

  this.bindDownloadLinks = function () {

    //original image
    var original_img_link = document.getElementById('canvas-container-'+this.canvas_id).getElementsByClassName('download-original')[0];
    original_img_link.href = this.img_src;
    original_img_link.download = this.img_src;

    //png image
    var png_img_link = document.getElementById('canvas-container-'+this.canvas_id).getElementsByClassName('download-png')[0];
    png_img_link.href = this.canvas.toDataURL();
    png_img_link.download = 'png-canvas-'+this.canvas_id;

    //pdf image

    document.getElementById('canvas-container-'+this.canvas_id).getElementsByClassName('download-pdf')[0].addEventListener('click', function() {

      var jpeg_img_data = this.canvas.toDataURL("image/jpeg", 1.0);

      var computed_mm = parseInt(getComputedStyle(document.getElementById('my_mm')).getPropertyValue("height"))

      var width = Math.floor(this.img.width / computed_mm);
      var height = Math.floor(this.img.height / computed_mm);

      console.log(width, height);

      if(width < height) {
        var pdf = new jsPDF("p", "mm", [width, height]);
      } else {
        var pdf = new jsPDF("l", "mm", [width, height]);
      }

      pdf.addImage(jpeg_img_data, 'JPEG', 0, 0, width, height);
      pdf.save('pdf-canvas-'+this.canvas_id);
    }.bind(this));

  }

  this.draw = function() {
    this.img = document.createElement('img');
    this.img.src = './'+this.img_src;

    this.img.onload = function() {
      var hRatio = this.canvas.width  / this.img.width;
      var vRatio = this.canvas.height / this.img.height;
      var ratio  = Math.min ( hRatio, vRatio );
      this.canvas.width = this.img.width*ratio;
      this.canvas.height = this.img.height*ratio;

      this.context.drawImage(this.img, 0, 0, this.img.width*ratio, this.img.height*ratio);

      this.context.font = this.canvas_text_font;
      var textWidth = this.context.measureText(this.textValue);

      this.context.fillText(this.textValue, this.textX - textWidth.width / 2, this.textY + this.canvas_text_font_size / 2);

      //start binding only after the image has loaded
      this.bindDownloadLinks();

    }.bind(this);
  }

  this.setUpCanvas = function() {
    var canvas_container = document.createElement("div");
    canvas_container.className = 'canvas-container';
    canvas_container.id = 'canvas-container-' + this.canvas_id;

    var download_original_img_btn = document.createElement("a");
    download_original_img_btn.innerHTML = 'Originaal Pilt';
    download_original_img_btn.className = 'btn btn-primary download-original';

    var download_png = document.createElement("a");
    download_png.innerHTML = 'PNG';
    download_png.className = 'btn btn-secondary download-png';

    var download_pdf = document.createElement("button");
    download_pdf.innerHTML = 'PDF';
    download_pdf.className = 'btn btn-danger download-pdf';

    var canvas = document.createElement("canvas");
    canvas.id = 'canvas-'+this.canvas_id;

    canvas_container.appendChild(canvas);
    canvas_container.appendChild(download_original_img_btn);
    canvas_container.appendChild(download_png);
    canvas_container.appendChild(download_pdf);

    this.canvas_list_target.appendChild(canvas_container);
    this.canvas = document.getElementById('canvas-'+this.canvas_id);
    this.canvas.height = this.baseHeight;
    this.canvas.width = this.baseWidth;

    this.context = this.canvas.getContext('2d');
  }
}

$(document).ready(function () {
  $.ajax({
     url: 'get_canvas_list.php',
     data: {
        format: 'json'
     },
     success: function(data) {
        var canvas_array = JSON.parse(data);
        for (var i = 0; i < canvas_array.length; i++) {
          var imageCanvas = new ImageCanvasView(
            'img-canvas-list',
            canvas_array[i]['ID'],
            canvas_array[i]['img_file'],
            canvas_array[i]['text_value'],
            parseInt(canvas_array[i]['textX']),
            parseInt(canvas_array[i]['textY']),
            parseInt(canvas_array[i]['canvas_text_size'])
          )
          imageCanvas.init();
        }
     },
  });
})