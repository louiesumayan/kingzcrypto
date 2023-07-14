
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


$('.auth').on('change', function() {
    var selectedValue = $(this).val(); // Get the selected value
    
    // Remove the 'selected' property from all options
    $('.auth option').removeAttr('selected');
    
    // Set the 'selected' property for the selected option
    $('.auth option[value="' + selectedValue + '"]').attr('selected', 'selected');
  });