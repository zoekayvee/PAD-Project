$(document).ready(function(){
    $('.carousel').carousel({
        interval: 3000
    })

    $('#fin-overlay-panel').slideUp(0);

    $('#fin-update').click(function() {
    	$('#fin-overlay-panel').slideDown('slow');
    });

    $('#close-fin-form').click(function(){
    	$('#fin-overlay-panel').slideUp('slow');
    });

});
