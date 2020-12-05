
<script type="text/javascript" src="{{ URL::to('public/js/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::to('public/js/popper.min.js')}}" ></script>

<script type="text/javascript" src="{{ URL::to('public/js/jquery-ui.min.js')}}"></script>
 <script src="{{ URL::to('public/js/owl.carousel.js')}}"></script>
  <script src="{{ URL::to('public/js/owl.carousel.min.js')}}"></script>
 <script type="text/javascript">
 	if ($(window).width() > 992) {
  $(window).scroll(function(){  
     if ($(this).scrollTop() > 40) {
        $('#navbar_top').addClass("fixed-top");
        // add padding top to show content behind navbar
        $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
      }else{
        $('#navbar_top').removeClass("fixed-top");
         // remove padding top from body
        $('body').css('padding-top', '0');
      }   
  });
} // end if


$("[data-trigger]").on("click", function(){
    var trigger_id =  $(this).attr('data-trigger');
    $(trigger_id).toggleClass("show");
    $('body').toggleClass("offcanvas-active");
});

// close button 
$(".btn-close").click(function(e){
    $(".navbar-collapse").removeClass("show");
    $("body").removeClass("offcanvas-active");
}); 
 </script>
  <script>
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 5,
                    nav: true,
                    loop: false,
                    margin: 20
                  }
                }
              })
            })
          </script>
         





<script type="text/javascript">
  $(document).ready(function() {
  $('.btnNext').click(function() {

          var make = $('.make').val();
          if(make == ''){ 
            $('#make_error').html("<span style='color:red'><b>Make Cannot be empty</b></span>");
            $('#make').focus();
            return false;
          } 
          else{
            $('#make_error').html('');
          }

          var model = $('.model').val();
          if(model == ''){ 
            $('#model_error').html("<span style='color:red'><b>model Cannot be empty</b></span>");
            $('#model').focus();
            return false;
          } 
          else{
            $('#model_error').html('');
          }

           var car_year = $('.car_year').val();
          if(car_year == ''){ 
            $('#car_year_error').html("<span style='color:red'><b>Year Cannot be empty</b></span>");
            $('#car_year').focus();
            return false;
          } 
          else{
            $('#car_year_error').html('');
          }

            var condition = $('.condition').val();
          if(condition == ''){ 
            $('#condition_error').html("<span style='color:red'><b>condition Cannot be empty</b></span>");
            $('#condition').focus();
            return false;
          } 
          else{
            $('#condition_error').html('');
          }

           var body = $('.body').val();
          if(body == ''){ 
            $('#body_error').html("<span style='color:red'><b>body Cannot be empty</b></span>");
            $('#body').focus();
            return false;
          } 
          else{
            $('#body_error').html('');
          }

           var mileage = $('.mileage').val();
          if(mileage == ''){ 
            $('#mileage_error').html("<span style='color:red'><b>mileage Cannot be empty</b></span>");
            $('#mileage').focus();
            return false;
          } 
          else{
            $('#mileage_error').html('');
          }

          var fuel = $('.fuel').val();
          if(fuel == ''){ 
            $('#fuel_error').html("<span style='color:red'><b>fuel Cannot be empty</b></span>");
            $('#fuel').focus();
            return false;
          } 
          else{
            $('#fuel_error').html('');
          }

          var engine = $('.engine').val();
          if(engine == ''){ 
            $('#engine_error').html("<span style='color:red'><b>engine Cannot be empty</b></span>");
            $('#engine').focus();
            return false;
          } 
          else{
            $('#engine_error').html('');
          }

           var exterior_color = $('.exterior_color').val();
          if(exterior_color == ''){ 
            $('#exterior_color_error').html("<span style='color:red'><b>Color Cannot be empty</b></span>");
            $('#exterior_color').focus();
            return false;
          } 
          else{
            $('#exterior_color_error').html('');
          }

           var interior_color = $('.interior_color').val();
          if(interior_color == ''){ 
            $('#interior_color_error').html("<span style='color:red'><b>Color Cannot be empty</b></span>");
            $('#interior_color').focus();
            return false;
          } 
          else{
            $('#interior_color_error').html('');
          }


           var registered = $('.registered').val();
          if(registered == ''){ 
            $('#registered_error').html("<span style='color:red'><b>Register No. Cannot be empty</b></span>");
            $('#registered').focus();
            return false;
          } 
          else{
            $('#registered_error').html('');
          }

           var vin_no = $('.vin_no').val();
          if(vin_no == ''){ 
            $('#vin_no_error').html("<span style='color:red'><b>Vin No. Cannot be empty</b></span>");
            $('#vin_no').focus();
            return false;
          } 
          else{
            $('#vin_no_error').html('');
          }

          var listing_type = $('.listing_type').val();
          if(listing_type == ''){ 
            $('#listing_type_error').html("<span style='color:red'><b>Select type Cannot be empty</b></span>");
            $('#listing_type').focus();
            return false;
          } 
          else{
            $('#listing_type_error').html('');
          }

           var start_date = $('.start_date').val();
           var end_date = $('.end_date').val();
          if(start_date > end_date){ 
            $('#date_error').html("<span style='color:red'><b>Start date must be smaller than End date </b></span>");
            $('#date_error').focus();
            return false;
          } 
          else{
            $('#date_error').html('');
          }

           var budding_price = $('.budding_price').val();
           var sall_price = $('.sall_price').val();
          if(sall_price < budding_price){ 
            $('#budding_error').html("<span style='color:red'><b> Max salling price must be grather than budding price</b></span>");
            $('#budding_error').focus();
            return false;
          } 
          else{
            $('#budding_error').html('');
          }

    $('.nav-tabs .active').parent().next('li').find('a').trigger('click');
  });

  $('.btnPrevious').click(function() {
    $('.nav-tabs .active').parent().prev('li').find('a').trigger('click');
  });
});


 </script>
 
 <script type="text/javascript">
   $('#reset').click(function() {
           var newpassword = $('#new').val();
           var confirm_password = $('#cfpassword').val();

          if(newpassword != confirm_password){ 
            $('#password').html("<span style='color:red'><b>Confirm password donot match </b></span>");
            $('#password').focus();
            return false;
          } 
          else{
            $('#password').html('');
          }

          
   //$('.nav-tabs .active').parent().next('li').find('a').trigger('click');
  });
 </script>

 
 </script>
 <script defer src="{{ URL::to('public/js/jquery.flexslider.js')}}"></script>
 <script type="text/javascript">
   
    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 100,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".boxs").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>



</body>
</html>