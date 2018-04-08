$("document").ready(function(){
  $('#slideLeft').click(function(){
    $('.white-banner').animate({
      left: 20
    }, {duration: 1400});
    $('#login').fadeOut(1200, function(){
      $('#signup').fadeIn(100);
    });
  });
  $('#slideRight').click(function(){
    $('.white-banner').animate({
      left: 440
    }, {duration: 1400});
    $('#signup').fadeOut(1200, function() {
      $('#login').fadeIn(100);
    });
  });

});
