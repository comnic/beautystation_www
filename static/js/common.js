var console = window.console || {log:function(){}};

$(document).ready(function(){
	$('#topMenu li, #topChannelMenu li').hover(function(){
		$(this).css('background-color', '#fff');
		$(this).children('a').css('color', '#ea0465').css('text-decoration', 'underline');
	},function(){
		$(this).css('background-color', '#ea0465');
		$(this).children('a').css('color', '#fff').css('text-decoration', 'none');
	}
	
	);
	
	$('.submenu .menuItems .active').append('<span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="top: -22px; float: right;"></span>').css('color', '#ea0465');
});

function number_format(num){
    var num_str = num.toString();
    var result = "";
 
    for(var i=0; i<num_str.length; i++){
        var tmp = num_str.length - (i+1);
 
        if(((i%3)==0) && (i!=0))    result = ',' + result;
        result = num_str.charAt(tmp) + result;
    }
 
    return result;
}
