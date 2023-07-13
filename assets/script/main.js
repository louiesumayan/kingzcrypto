
$('.nav-burger').on('click', function(){
    if($('.mobile-menu').hasClass('is-open')){
        $('.mobile-menu').removeClass("is-open");
    }else{
        $('.mobile-menu').addClass("is-open");
    }        
})

$('.close').on('click', function(){
    $('.mobile-menu').removeClass("is-open");
})
