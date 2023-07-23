
$('.nav-burger').on('click', function(){
    if($('.mobile-menu').hasClass('is-open')){
        $('.mobile-menu').removeClass("is-open");
    }else{
        $('.mobile-menu').addClass("is-open");
    }        
})

var mserach = document.getElementById('search-bar-desktop');

mserach.addEventListener("click", showSearch);

function  showSearch(){
    $("#msearch").addClass('is-open');
}


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

//mobile tab
$('.mobile-navigation').on('click', function(){  
    if($('.mobile-navigation').hasClass('is-active')){
        $('.mobile-navigation').removeClass("is-active");
    }else{
        $('.mobile-navigation').addClass("is-active");
    }
})

$('#boostcoin').on('click', function(){   
    var tboost = $('#f').html();
    var coin = $('#coin').html(); 
    var tk = $('#tk').val();
    //alert('add '+ coin +' boosts for ' + tboost + ' with '+ tk);

    $.post("/api.php",{
        api: tk,
        boosts: tboost,
        coins : coin
    }, function(res){
        //console.log(res);
        window.location.href = '/dashboard/';
    })
    

})




$('.network').on('change', function() {
    var selectedValue = $(this).val(); // Get the selected value
    
    // Remove the 'selected' property from all options
    $('.network option').removeAttr('selected');
    
    // Set the 'selected' property for the selected option
    $('.network option[value="' + selectedValue + '"]').attr('selected', 'selected');
});

//cap_network
$('.cap_network').on('change', function() {
    var selectedValue = $(this).val(); // Get the selected value
    
    // Remove the 'selected' property from all options
    $('.cap_network option').removeAttr('selected');
    
    // Set the 'selected' property for the selected option
    $('.cap_network option[value="' + selectedValue + '"]').attr('selected', 'selected');
});

//presale_start_day
$('.presale_start_day').on('change', function() {
    var selectedValue = $(this).val(); // Get the selected value
    
    // Remove the 'selected' property from all options
    $('.presale_start_day option').removeAttr('selected');
    
    // Set the 'selected' property for the selected option
    $('.presale_start_day option[value="' + selectedValue + '"]').attr('selected', 'selected');
});
//presale_start_month
$('.presale_start_month').on('change', function() {
    var selectedValue = $(this).val(); // Get the selected value
    
    // Remove the 'selected' property from all options
    $('.presale_start_month option').removeAttr('selected');
    
    // Set the 'selected' property for the selected option
    $('.presale_start_month option[value="' + selectedValue + '"]').attr('selected', 'selected');
});
//presale_start_year
$('.presale_start_year').on('change', function() {
    var selectedValue = $(this).val(); // Get the selected value
    
    // Remove the 'selected' property from all options
    $('.presale_start_year option').removeAttr('selected');
    
    // Set the 'selected' property for the selected option
    $('.presale_start_year option[value="' + selectedValue + '"]').attr('selected', 'selected');
});


//presale_end_day
$('.presale_end_day').on('change', function() {
    var selectedValue = $(this).val(); // Get the selected value
    
    // Remove the 'selected' property from all options
    $('.presale_end_day option').removeAttr('selected');
    
    // Set the 'selected' property for the selected option
    $('.presale_end_day option[value="' + selectedValue + '"]').attr('selected', 'selected');
});
//presale_end_month
$('.presale_end_month').on('change', function() {
    var selectedValue = $(this).val(); // Get the selected value
    
    // Remove the 'selected' property from all options
    $('.presale_end_month option').removeAttr('selected');
    
    // Set the 'selected' property for the selected option
    $('.presale_end_month option[value="' + selectedValue + '"]').attr('selected', 'selected');
});
//presale_end_year
$('.presale_end_year').on('change', function() {
    var selectedValue = $(this).val(); // Get the selected value
    
    // Remove the 'selected' property from all options
    $('.presale_end_year option').removeAttr('selected');
    
    // Set the 'selected' property for the selected option
    $('.presale_end_year option[value="' + selectedValue + '"]').attr('selected', 'selected');
});



$('#search-bar-mobile').on('keyup', function(){
    var que = $(this).val();
   
    $.post('/api.php', { search: que }, function(res){
        console.log(JSON.parse(res));
        var data = JSON.parse(res);
        var cont = [];
        var cnt = Object.keys(data).length;
      
        if( cnt == 1){
            var temp = "<a href='/dashboard/coin.php?cid="+ data[0]['id'] +"' class='result'>"+
            "  <img src='"+ data[0]['image_url'] +"' loading='lazy' alt=''>"+
            "   <div class='has-titles'>"+
            "      <span class='titles'>"+
                "        <h1>"+ data[0]['name'] +"</h1>"+
            "         <h2>$"+ data[0]['symbol'] +"</h2>"+
                "     </span>"+
            "      <span class='titles'>"+
            "         <h3>"+ data[0]['bsc_contract_address'] +"</h3>"+
            "         <h4>"+
                "           <svg width='8' height='4' viewBox='0 0 8 4' fill='none' xmlns='http://www.w3.org/2000/svg'>"+
                "              <path d='M4.32937 0.1152C4.29267 0.079672 4.24356 0.0506224 4.18628 0.030554C4.129 0.0104855 4.06526 -1.05568e-07 4.00054 -1.11225e-07C3.93583 -1.16883e-07 3.87209 0.0104855 3.8148 0.0305539C3.75752 0.0506223 3.70842 0.079672 3.67172 0.1152L0.0714341 3.58163C0.0297609 3.62161 0.00532296 3.66844 0.000774885 3.71703C-0.00377272 3.76562 0.0117431 3.81411 0.0456381 3.85724C0.0795326 3.90036 0.130509 3.93647 0.193029 3.96164C0.25555 3.98681 0.327222 4.00008 0.40026 4L7.60082 4C7.67369 3.9998 7.7451 3.98636 7.80737 3.96113C7.86964 3.9359 7.92041 3.89984 7.95422 3.85681C7.98804 3.81379 8.00362 3.76543 7.99929 3.71694C7.99496 3.66846 7.97088 3.62168 7.92965 3.58163L4.32937 0.1152Z' fill='#FFFFFF'></path>"+
                "           </svg>"+
                "           "+
                "        </h4>"+
                "     </span>"+
                "  </div>"+
            "</a>";
            $('.results').html(temp);
        }else if(cnt > 1){
            for (let index = 0; index < cnt; index++) {
                var temp = "<a href='/dashboard/coin.php?cid="+ data[index]['id'] +"' class='result'>"+
                "  <img src='"+ data[index]['image_url'] +"' loading='lazy' alt=''>"+
                "   <div class='has-titles'>"+
                "      <span class='titles'>"+
                    "        <h1>"+ data[index]['name'] +"</h1>"+
                "         <h2>$"+ data[index]['symbol'] +"</h2>"+
                    "     </span>"+
                "      <span class='titles'>"+
                "         <h3>"+ data[index]['bsc_contract_address'] +"</h3>"+
                "         <h4>"+
                    "           <svg width='8' height='4' viewBox='0 0 8 4' fill='none' xmlns='http://www.w3.org/2000/svg'>"+
                    "              <path d='M4.32937 0.1152C4.29267 0.079672 4.24356 0.0506224 4.18628 0.030554C4.129 0.0104855 4.06526 -1.05568e-07 4.00054 -1.11225e-07C3.93583 -1.16883e-07 3.87209 0.0104855 3.8148 0.0305539C3.75752 0.0506223 3.70842 0.079672 3.67172 0.1152L0.0714341 3.58163C0.0297609 3.62161 0.00532296 3.66844 0.000774885 3.71703C-0.00377272 3.76562 0.0117431 3.81411 0.0456381 3.85724C0.0795326 3.90036 0.130509 3.93647 0.193029 3.96164C0.25555 3.98681 0.327222 4.00008 0.40026 4L7.60082 4C7.67369 3.9998 7.7451 3.98636 7.80737 3.96113C7.86964 3.9359 7.92041 3.89984 7.95422 3.85681C7.98804 3.81379 8.00362 3.76543 7.99929 3.71694C7.99496 3.66846 7.97088 3.62168 7.92965 3.58163L4.32937 0.1152Z' fill='#FFFFFF'></path>"+
                    "           </svg>"+
                    "           "+
                    "        </h4>"+
                    "     </span>"+
                    "  </div>"+
                "</a>";

                cont.push(temp)

                
            }
            $('.results').html(cont);

        }

        
    })


})