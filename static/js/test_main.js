$(document).ready(function(){
	$('.box-content').mouseenter(function(){
		//console.log("over");
		$('.content-cover', $(this)).show();		
	}).mouseleave(function(){
		//console.log("out");
		$('.content-cover', $(this)).hide();

	});
	
	$('.box-content').each(function(idx, item){
		var pt = (Math.floor($(this).height()/2) - 15) + "px";
		//console.log(pt);
		$('.content-cover', $(item)).css("padding-top", pt);
	});

	var waypoint1 = $('#waypoint1').waypoint({
		handler: function(direction){
			if(direction == "down"){
				$('#topMenuList').show();
				
			}else if(direction == "up"){
				$('#topMenuList').hide();
				
			}
		}
	});
	
	var waypoint2 = $('#waypoint2').waypoint({
		handler: function(direction){
			if(direction == "down"){
				$('#topMenuList').css("margin-left", "115px");
				$('#topMyMenu').show();
				
			}else if(direction == "up"){
				$('#topMenuList').css("margin-left", "386px");
				$('#topMyMenu').hide();
				
			}
		}
	});	
	
	$.scrollUp({
	    scrollName: 'scrollUp', // Element ID
	    topDistance: '300', // Distance from top before showing element (px)
	    topSpeed: 300, // Speed back to top (ms)
	    animation: 'fade', // Fade, slide, none
	    animationInSpeed: 200, // Animation in speed (ms)
	    animationOutSpeed: 200, // Animation out speed (ms)
	    scrollText: 'Top', // Text for element
	    activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	  });
});