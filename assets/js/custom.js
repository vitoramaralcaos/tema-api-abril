$(function(){
    $('.menu-toggler-wrapper').click(function(){
        if($('.header-nav').is(':visible')){
            $('.menu-toggler').removeClass('active');
            $('.header-nav').hide();
        }
        else{
            $('.menu-toggler').addClass('active');
             $('.header-nav').show();
        }


    });


    $(window).resize(function(){
        if($(window).width() > 1023){
            $('.header-nav').show();
        }
        else{
            $('.menu-toggler').removeClass('active');
            $('.header-nav').hide();
        }

    });
});