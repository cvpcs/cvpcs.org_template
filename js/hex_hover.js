function setup_hex_hover(button, image) {
  $(new Image()).src = image;

  $(document).ready(function() {
      $(button).hover(function() {
          var front = $('.bg > .front');
          front.css('background-image', 'url(' + image + ')');

          if (front.is(':animated')) {
            front.stop().fadeTo(500, 1);
          } else {
            front.fadeIn(500);
          }
        }, function() {
          var front = $('.bg > .front');

          if (front.is(':animated')) {
            front.stop().fadeTo(500, 0);
          } else {
            front.fadeOut(500);
          }
        });
    });
}
