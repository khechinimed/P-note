/*-------------------------------------------------------------------------------
  Fit Text
-------------------------------------------------------------------------------*/
$("#fit1").fitText(0.9, {
  minFontSize: '10px',
  maxFontSize: '68px'
});

$("#fit2").fitText(0.9, {
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
  /*----------------------------------------------
  Form Validation using Ajax
  -----------------------------------------------*/

  var password = document.getElementById("password"),
  confirm_password = document.getElementById("cpassword");

  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Les mots de passe ne correspondent pas.");
    } else {
      confirm_password.setCustomValidity('');
    }
  }
  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
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
    Select the textArea Text
  -------------------------------------------------------------------------------*/
function selectText() {
    let textarea = document.getElementById("link");
    textarea.select();
    document.execCommand("selectText");
}
