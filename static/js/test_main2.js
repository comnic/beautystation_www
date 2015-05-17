$(document).ready(function(){
	$('.box-content').mouseenter(function(){
		//console.log("over");
		$('.content-cover', $(this)).hide();
		
	}).mouseleave(function(){
		//console.log("out");
		$('.content-cover', $(this)).show();
	});
	
	$('.box-content').each(function(idx, item){
		var pt = (Math.floor($(this).height()/2) - 15) + "px";
		//console.log(pt);
		$('.content-cover', $(item)).css("padding-top", pt);
	});
	
});