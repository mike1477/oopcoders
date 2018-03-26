$(document).ready(function(){

  $("#profile").click(function(){
    var windowWidth = $( window ).width();

    if($(".login-slide-outer").css("width") == "0px" && windowWidth > 500){
        $(".login-slide-outer").animate({
            width: '500px'
        });
      }else if ($(".login-slide-outer").css("width") == "0px" && windowWidth < 500) {
        $(".login-slide-outer").animate({
            width: windowWidth
        });
      }else{
        $(".login-slide-outer").animate({
            width: '0px'
        });
      }
  });

  $(".close").click(function(){
    $(".login-slide-outer").animate({
          width: '0px'
    });
  });

  $(".light-slider").lightSlider({
        item:5,
        loop:false,
        slideMove:2,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        pager:false,
        responsive : [
            {
                breakpoint:1000,
                settings: {
                    item:4,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:789,
                settings: {
                    item:3,
                    slideMove:1
                  }
            },
            {
                breakpoint:500,
                settings: {
                    item:2,
                    slideMove:1,
                    slideMargin:6,
                  }
            }
        ]
     });

    $(".vertical-light-slider").lightSlider({
          item:5,
          loop:false,
          slideMove:2,
          easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
          speed:600,
          pager:false,
          vertical: true,
          verticalHeight: 520,
          responsive : [
              {
                  breakpoint:1119,
                  settings: {
                      item:4,
                      slideMove:1,
                      slideMargin:6,
                      verticalHeight: 450
                    }
              },
              {
                  breakpoint:991,
                  settings: {
                      item:3,
                      slideMove:1,
                      vThumbWidth: 190,
                      verticalHeight: 500,
                      vertical: true,
                    }
              },
              {
                  breakpoint:768,
                  settings: {
                      item:5,
                      slideMove:5,
                      verticalHeight: 520,
                    }
              }
          ]
      });

  $(".reply-link span").click(function(){

      if($(this).siblings("div").css("height") == "0px"){
          $(this).siblings("div").animate({
                height: '200px',
                opacity : 1
          });
        }else{
          $(this).siblings("div").animate({
              height: '0px',
              opacity : 0

         });
        }
    });

  $( "form" ).on( "submit", function( event ) {
    $(this).append('<input type="hidden" name="csrf_name" value="' + getcsrf().name + '"><input type="hidden" name="csrf_value" value="' + getcsrf().value + '">');
   });

  $(".container").click(function(){

     $(".login-slide-outer").animate({
           width: '0px'
     });
     $(".search_results").css("display","none");
  });

  $(".cell-search-outer").click(function(){
    if($(".cell-search-input").css("display") == "none"){
        $(".cell-search-input").css("display", "block");
        $(".cell-search-input form input").focus();
      }else{
        $(".cell-search-input").css("display", "none");
      }
  });


});
