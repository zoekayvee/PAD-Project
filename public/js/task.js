$(document).ready(function(){

	hide_div();
	$('#nav-comm').attr('class', 'active');
	$('#commi').show();

    $('#nav-comm').click(function() {
    	hide_div();
    	$('#nav-comm').attr('class', 'active');
    	$('#commi').show();
    });

    $('#nav-tsk').click(function(){
    	hide_div();
    	$('#nav-tsk').attr('class', 'active');
    	$('#tsk').show();
    });

    $('#1').click(function() {
    	hide_div();
    	$('#1').attr('class', 'active');
    	$('#Promotions').show();
    });
      
});

function hide_div(){
	$('#nav-comm').attr('class', '');
	$('#nav-tsk').attr('class', '');
	$('#1').attr('class', '');

	$('#Promotions').hide();
	$('#tsk').hide();
	$('#commi').hide();
      
}
