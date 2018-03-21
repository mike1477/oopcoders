$(document).ready(function(){

  $("#profile").click(function(){
    if($(".login-slide-outer").css("width") == "0px"){
        $(".login-slide-outer").animate({
            width: '500px'

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
                breakpoint:800,
                settings: {
                    item:3,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:480,
                settings: {
                    item:2,
                    slideMove:1
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
          verticalHeight: 540,
          responsive : [
              {
                  breakpoint:800,
                  settings: {
                      item:3,
                      slideMove:1,
                      slideMargin:6,
                    }
              },
              {
                  breakpoint:480,
                  settings: {
                      item:2,
                      slideMove:1
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


});
