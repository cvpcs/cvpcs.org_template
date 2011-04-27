function setup_hex_hover(button, image) {
  jQuery(document).ready(function() {
      var tmp = jQuery('<img />').src = image;

      jQuery(button).hover(function() {
          var front = jQuery('.bg > .front');
          front.css('background-image', 'url(' + image + ')');

          if (front.is(':animated')) {
            front.stop().fadeTo(500, 1);
          } else {
            front.fadeIn(500);
          }
        }, function() {
          var front = jQuery('.bg > .front');

          if (front.is(':animated')) {
            front.stop().fadeTo(500, 0);
          } else {
            front.fadeOut(500);
          }
        });
    });
}
