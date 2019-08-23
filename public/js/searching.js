$(document).ready(function () {
    $("#search-input").on('keyup', function () {
        var value = $(this).val().toLowerCase();

        $('.cards').filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $('#option').on('change', function(){
        $('.cards').hide();
        $('.' + $(this).val()).show();
        $('.img-on-left-side').show();
        $(".img-top-side").hide();
        
        
        if($(this).val() === 'Сите')
        {
            $('.img-on-left-side').hide();
            $('.img-top-side').show();
    
            // $('.cards').show();
        }
    });
});