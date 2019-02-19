jQuery(document).ready(function($){
    //open popup
    $('.btn-danger').on('click', function(event){
        event.preventDefault();
        $('.cd-popup').addClass('is-visible');
        $('#confirmed').attr('href',$(this).attr('href'));
    });

    //close popup
    $('.cd-popup').on('click', function(event){
        if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') || $(event.target).is('.close-popup') ) {
            event.preventDefault();
            $(this).removeClass('is-visible');
        }
    });
    //close popup when clicking the esc keyboard button
    $(document).keyup(function(event){
        if(event.which=='27'){
            $('.cd-popup').removeClass('is-visible');
        }
    });
});