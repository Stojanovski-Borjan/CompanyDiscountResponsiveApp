$(document).ready(function () {
    $('.img-on-left-side').hide();

    $('#table').on('click', function(){
        $(".img-top-side").hide();
        $('.img-on-left-side').show();
    });

    $('#grid').on('click', function(){
        $('.img-on-left-side').hide();
        $('.img-top-side').show();
        
    })

});