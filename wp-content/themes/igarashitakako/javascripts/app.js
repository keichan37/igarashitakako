(function() {
  var e;
  $(function() {
    $("a.scroll-top").click(function() {
      return $("body,html").animate({
        scrollTop: 0
      }, 400)
    }), 
      
    $('a[href^="#"]').click(function() {
      var speed = 400;
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top;
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
     });

  })
}).call(this);
