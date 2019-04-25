/*-------------------------------------------------------------------------------
  Fit Text
-------------------------------------------------------------------------------*/
jQuery("#fit1").fitText(0.9, {
  minFontSize: '10px',
  maxFontSize: '68px'
});

jQuery("#fit2").fitText(0.9, {
  minFontSize: '10px',
  maxFontSize: '68px'
});
/*-------------------------------------------------------------------------------
  Scroll down
-------------------------------------------------------------------------------*/
$('#more').click(function(event) {
  event.preventDefault();
  $('html, body').animate({
    scrollTop: $('#features').offset().top
  }, 1000);

  });
/*-------------------------------------------------------------------------------
  Typed js
-------------------------------------------------------------------------------*/
  var typed = new Typed('.typeme', {
    strings: ['Le moyen le plus simple'],
    smartBackspace : true,
    startDelay : 900,
    showCursor: false
  });

  var typed = new Typed('.typeme2', {
    strings: ['d\'envoyer des informations privées.'],
    smartBackspace : true,
    startDelay : 1600,
  });
  /*-------------------------------------------------------------------------------
    PRE LOADER
  -------------------------------------------------------------------------------*/

  $(window).load(function(){
    $('.preloader').fadeOut(1000); // set duration in brackets
  });


  /*-------------------------------------------------------------------------------
    jQuery Parallax
  -------------------------------------------------------------------------------*/

    function initParallax() {
    $('#home').parallax("50%", 0.3);

  }
  initParallax();


  /* Back top
  -----------------------------------------------*/

  $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
        $('.go-top').fadeIn(200);
        } else {
          $('.go-top').fadeOut(200);
        }
        });
        // Animate the scroll to top
      $('.go-top').click(function(event) {
        event.preventDefault();
      $('html, body').animate({scrollTop: 0}, 300);
      })
