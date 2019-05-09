<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <!-- Meta, title, CSS, favicons, etc. -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <script type="text/javascript" src="js/admin/vendors/jquery/dist/jquery.min.js"></script>

 <!-- Bootstrap -->
 <link rel="stylesheet" href="{{asset('js/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
 <link rel="stylesheet" href="{{asset('js/admin/vendors/font-awesome/css/font-awesome.min.css')}}">
 <link rel="stylesheet" href="{{asset('js/admin/vendors/iCheck/skins/flat/green.css')}}">
 <link rel="stylesheet" href="{{asset('js/admin/vendors/bootstrap-daterangepicker/daterangepicker.css')}}">
 <link rel="stylesheet" href="{{asset('js/admin/build/css/custom.min.css')}}">

 <link rel="stylesheet" href="{{asset('js/admin/js/dataTables.bootstrap.min.css')}}">
 <link rel="stylesheet" href="{{asset('js/admin/js/buttons.bootstrap.min.css')}}">
 <link rel="stylesheet" href="{{asset('js/admin/js/fixedHeader.bootstrap.min.css')}}">
 <link rel="stylesheet" href="{{asset('js/admin/js/responsive.bootstrap.min.css')}}">
 <link rel="stylesheet" href="{{asset('js/admin/js/scroller.bootstrap.min.css')}}">

 <script type="text/javascript">
 $(document).ready(function(){
   $('#commission_from').on('change', function() {

     if ( this.value == 'vendor')
     {
       $("#vendoronly").show();
   $("#buyeronly").hide();
     }
     else if(this.value == 'buyer')
     {
       $("#vendoronly").hide();
   $("#buyeronly").show();
     }
   else
   {
     $("#vendoronly").hide();
     $("#buyeronly").hide();
   }
   });



 $('#stripe_mode').on('change', function() {

   if ( this.value == 'test')
     {
     $("#stripe_test_publish").show();
     $("#stripe_test_secret").show();
     $("#stripe_live_publish").hide();
     $("#stripe_live_secret").hide();
   }
   else if(this.value == 'live')
     {
     $("#stripe_test_publish").hide();
     $("#stripe_test_secret").hide();
     $("#stripe_live_publish").show();
     $("#stripe_live_secret").show();
   }
   else
   {
     $("#stripe_test_publish").hide();
     $("#stripe_test_secret").hide();
     $("#stripe_live_publish").hide();
     $("#stripe_live_secret").hide();
   }


 });
});



$(document).ready(function () {
  $('body').on('click', '#selectAll', function () {
     if ($(this).hasClass('allChecked')) {
        $('input[type="checkbox"]', '#datatable-responsive').prop('checked', false);
     } else {
      $('input[type="checkbox"]', '#datatable-responsive').prop('checked', true);
      }
      $(this).toggleClass('allChecked');
    })
});


$(document).ready(function () {
   $('#checkBtn').click(function() {
     checked = $("input[type=checkbox]:checked").length;

     if(!checked) {
       alert("You must check at least one checkbox.");
       return false;
     }

   });
});
</script>
