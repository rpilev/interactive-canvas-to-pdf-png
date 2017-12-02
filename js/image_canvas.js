function ImageCanvas(target_canvas, target_img_input, target_text_input, target_number_input) {

  this.canvas = document.getElementById(target_canvas);
  this.canvas_text_font_size = 50;
  this.canvas_text_font = this.canvas_text_font_size + 'px Arial';
  this.img_input = document.getElementById(target_img_input);
  this.text_input = document.getElementById(target_text_input);
  this.target_number_input = document.getElementById(target_number_input);
  this.img = null;
  this.context = undefined;
  this.textValue = '';
  this.dragging = false;
  this.baseHeight = 280;
  this.baseWidth = 370;
  this.textX = this.canvas.width / 2;
  this.textY = this.canvas.height / 2;

  this.init = function() {
    this.setUpCanvas();
    this.setUpInputs();
  }

  this.draw = function() {
    this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    this.canvas.height = this.baseHeight;
    this.canvas.width = this.baseWidth;

    if(this.img!=null) {
      var hRatio = this.canvas.width  / this.img.width;
      var vRatio = this.canvas.height / this.img.height;
      var ratio  = Math.min ( hRatio, vRatio );
      this.canvas.width = this.img.width*ratio;
      this.canvas.height = this.img.height*ratio;
      this.context.drawImage(this.img, 0, 0, this.img.width*ratio, this.img.height*ratio);
    }
    this.context.font = this.canvas_text_font;
    var textWidth = this.context.measureText(this.textValue);
    this.context.fillText(this.textValue, this.textX - textWidth.width / 2, this.textY + this.canvas_text_font_size / 2);
  }

  this.setUpCanvas = function() {
    this.context = this.canvas.getContext('2d');
    this.context.font = this.canvas_text_font;
  }

  this.setUpInputs = function() {
    this.img_input.addEventListener('change', function(e) {
      var reader = new FileReader();
      reader.onload = function(e2) {
        this.img = new Image();
        this.img.onload = function() {
          this.draw();
        }.bind(this)
        this.img.src = e2.target.result;
      }.bind(this);
      reader.readAsDataURL(e.target.files[0]);
    }.bind(this));

    this.text_input.addEventListener('input', function (e) {
      this.textValue = e.target.value;
      this.draw();
    }.bind(this));

    this.target_number_input.addEventListener('input', function (e) {
      this.canvas_text_font_size = e.target.value;
      this.canvas_text_font = this.canvas_text_font_size + 'px Arial';
      this.draw();
    }.bind(this));

    this.canvas.addEventListener('mousedown', function (e) {
      this.dragging = true;
    }.bind(this));   

    this.canvas.addEventListener('mousemove', function (e) {
      if(!this.dragging){
        return;
      }
      var bounds = this.canvas.getBoundingClientRect();
      this.textX = Math.floor(e.clientX - bounds.left);
      this.textY = Math.floor(e.clientY - bounds.top);

      this.draw(this.textX, this.textY);
    }.bind(this));

    this.canvas.addEventListener('mouseup', function () {
      this.dragging = false;
    }.bind(this));

    this.canvas.addEventListener('mouseleave', function () {
      this.dragging = false;
    }.bind(this));
  }
}