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


});
