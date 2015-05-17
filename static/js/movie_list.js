// JavaScript Document

document.write("<script src='/static/js/channel.class.js'></script>");
document.write("<script src='/static/js/content.class.js'></script>");

var page = 0;
var scrollTop = 0;

$(document).ready(function(e) {
    $('.carousel').carousel({
		interval: 2000
	});	
	
    //0일때 최근 컨텐츠를 반환하다.
    //setContentView(0, true);
    
    getMovieContent(category_idx, ++page);
    //getBestContents();
    
	$(window).scroll(function(){
		if($(window).scrollTop() == $(document).height() - $(window).height()){
			getMovieContent(category_idx, ++page);
		}
		
	});
	
	$(document).on("mouseenter", "#movieList li", function(){
		$(".content-item-over", $(this)).show();
		
	});
	
	$(document).on("mouseleave", "#movieList li", function(){
		$(".content-item-over", $(this)).hide();
		
	});
	
	$(document).on("click", "#movieList li, #ranking li", function(){
	
		var cidx = $(this).data("cidx");
		
		setContentView(cidx, true);

	});

	$(document).on("click", "#relationContentList li", function(){
		
		var cidx = $(this).data("cidx");
		
		setContentView(cidx, false);

	});
		
	$("#btnMoreContentList").click(function(){
		getMovieContent(category_idx, ++page);
	});

/*
	$('#modalMovieView').on('show.bs.modal', function (event) {

	});
*/
	$('#modalMovieView').on('hide.bs.modal', function (event) {
		

		var scrollTop = parseInt($('html').css('top'));
		$('html').removeClass('noscroll');
		$('html,body').scrollTop(-scrollTop);
		
		jQuery('body').bind('touchmove', function(e){e.preventDefault()});
		
		//$("#youtubePlayer").html("");
		$("#moviePlayer").html("<div id='youtubePlayer'></div>");
	});



});

$(document).on("mouseenter", "#relationProductList li", function(){
	$('.cover', $(this)).show();
	
});	

$(document).on("mouseleave", "#relationProductList li", function(){
	$('.cover', $(this)).hide();
	
});	

function getBestContents(){
	$.getJSON( "/movie_list/get_best_content/", function( data ) {
		
		console.log(data);
		
		$("#ranking").empty();
		
		//add ranking list
		var rank = 1;
		$.each(data, function(idx, item){
			if(idx > 10)
				return false;
			
			$("#ranking").append("<li><a href=\"#\"><h5><span class=\"badge\">"+ rank++ +"</span> &nbsp;&nbsp;"+item.title+"</h5></a></li>");
		});		
	});
	
	
}

function getMovieContent(cat, page){

		$.ajax({
			type: "POST",
			url: "/movie_list/get_content_list/" + cat + "/" + page,
			data: "",
			datatype: "json",
			success: function(data)
			{
				var data = $.parseJSON(data);
				
				//add movie list
				$.each(data.items, function(idx, item){
					//console.log(idx);
					$("#movieList").append("\
						<li class=\"p5\" data-cidx=\""+item.idx+"\">\
			            	<div>\
            			    	<div class=\"content-item-over\"><img src=\"/static/images/contents_on.png\"></div>\
                    			<div class=\"content-item-img\"><img src=\""+item.img+"\"></div>\
                    			<div class=\"content-item-txt\"><h6>"+ item.title +"</h6></div>\
                			</div>\
            			</li>\
					");
				});
				
				
			}
		});
}

/*
 * setContentView()
 * 
 * 컨텐츠의 상세 정보와 관련 리스트(동일 카테고리 리스트)를 구한다.
 * 
 * cidx : content idx
 * rel : 관련 리스트 추출 유무
 * 
 */
function setContentView(cidx, rel){

	//google 측정을 위한 코드.
	//ga('send', 'event', 'category', 'action', {'page': '/contents/movie/view/'+cidx});

	$.ajax({
		type: "POST",
		url: "/movie_list/get_content_ajax/" + cidx,
		data: "",
		datatype: "json",
		success: function(data)
		{
			//console.log(data);
			$("#moviePlayer").html("<div id='youtubePlayer' class='embed-responsive-item'></div>");
			var item = $.parseJSON(data);
			
			var cont = new Content(item.idx, item.category, item.kind, item.title, item.summary, item.content, item.cnt, item.movie_link);
			//console.log(cont);
			
			var video_id = cont.link;
			var player =  new YT.Player( "youtubePlayer", {
				'height': '500',
				'width': '100%',
				'videoId': video_id,
				playerVars: {
					'autohide': 1,
					'autoplay':1,
					'wmode': 'transparent'
				},
				events: {
					'onStateChange': function(event){
						if (event.data == YT.PlayerState.ENDED){ /*youtube 영상 종료됐을때*/
							
							//player.destroy(); 
						}
					}
				}
			});
						
			//$("#youtubePlayer").html("<iframe class=\"embed-responsive-item\" src=\""+ cont.link +"\" width=\"623\" height=\"325\"></iframe>");
			$("#movieTitle").html(cont.title);
			$("#movieSummary").html(cont.summary);
			$("#movieDesc").html(cont.content);
			
			if(rel){
				$.getJSON( "/movie_list/get_content_list/"+cont.category+"/1", function( data ) {
				
					//console.log(data);
					$("#relationContentList").empty();
				
					//add relation list
					$.each(data.items, function(idx, item){
						if(idx > 3)
							return false;
						
						$("#relationContentList").append("\
							<li class=\"p5\" data-cidx=\""+item.idx+"\">\
								<div>\
									<div class=\"col-md-5 thumbnail\"><img src=\""+item.img+"\"></div>\
									<div class=\"col-md-6 content-item-txt\"><h6>"+ item.title +"</h6></div>\
				        		</div>\
			    	        </li>\
						");
					});

				});
				
				$("#relationProductList").empty();
				
				$.getJSON("/movie_list/get_relative_product_list/"+cidx, function( data ){
					
					if( data.length > 0 ){

						$.each(data, function(idx, item){
							
							var img = item.p_img;
							if( img == "")
								img = "/static/images/product/none.png";
	
							$("#relationProductList").append("\
								<li data-pidx=\""+item.p_idx+"\">\
									<div>\
										<div><img src=\""+img+"\" width=\"80\" class=\"thumbnail\"></div>\
										<div class=\"cover\"><p>"+item.p_name+"</p><p>\\"+number_format(item.p_price)+"원</p></div>\
					        		</div>\
				    	        </li>\
							");
						});
						$('#relativeProduct').show();
					}else{
						$('#relativeProduct').hide();
					}
				});

				$("#contentTagList").empty();
				
				$.getJSON("/movie_list/get_tag_list/"+cidx, function( data ){
					if( data.length > 0 ){

						$.each(data, function(idx, item){
							
							$("#contentTagList").append("\
								<li class=\"tag-box\">#"+item.ctl_tag+"</li>\
							");
						});
						$('#tagContent').show();
					}else{
						$('#tagContent').hide();
					}
				});

			}
			

			if ($(document).height() > $(window).height()) {
			     scrollTop = ($('html').scrollTop()) ? $('html').scrollTop() : $('body').scrollTop(); // Works for Chrome, Firefox, IE...
			     $('html').addClass('noscroll').css('top',-scrollTop);     
			}else{
				$('html').addClass('noscroll')
			}
			
			jQuery('body').unbind('touchmove');
			$('#modalMovieView').modal('show');
			
		}
	});	


}