// JavaScript Document

var MAXPAGE = false;
var page = 1;

$(document).ready(function(e) {	
	
	$('#chNavLeft .leftBtn').mouseenter(function(){
		$('#chNavLeft .leftChBanner').show();
		$('#chNavLeft .leftChBanner').animate({left:'+=205px'}, 500);
	});

	$('#chNavLeft').mouseleave(function(){
		$('#chNavLeft .leftChBanner').animate({left:'-=205px'}, 300, function(){$('#chNavLeft .leftChBanner').hide();});
	});

	$('#chNavRight .rightBtn').mouseenter(function(){
		$('#chNavRight .rightBtn').hide();
		$('#chNavRight #innerWrap').animate({left:'-=190px'}, 500);
	});

	$('#chNavRight').mouseleave(function(){
		$('#chNavRight #innerWrap').animate({left:'190px'}, 300, function(){$('#chNavRight .rightBtn').show()});
	});
	
	
	
	$('#btnMore').click(function(){
		if(MAXPAGE){ alert('마지막 페이지 입니다.'); return false;}
		
		$.ajax({
			type: "GET",
			url: "/contents/get_content_list_ajax/MV/" + ch + '/' + ++page,
			data: "",
			datatype: "json",
			success: function(data)
			{
				var data = $.parseJSON(data);
				
				if(data.length > 0){
					if(data.length < 9)
						MAXPAGE = true;
					//add content list
					$.each(data, function(idx, item){
						$("#contentsList").append('\
							<li>\
								<div><a href="/contents/onair/'+item.idx+'"><img src="'+item.img+'" width="100%"></a></div>\
								<div>\
									<a href="/contents/onair/'+item.idx+'"><p class="title">'+item.title+'</p></a>\
									<p class="desc">조회수 '+item.cnt+'회</p>\
								</div>\
							</li>\
						');
					});
				}else{
					MAXPAGE = true;
				}
				
			}
		});		
		
	});
});