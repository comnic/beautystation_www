// JavaScript Document

$(document).ready(function(e) {	
	getRelativeProductList(cidx);
	getTagList(cidx);
	getReplyList(cidx);
});

/*
 * 
 */
function getReplyList(cidx){
	$('#replyList').empty();
	
	$.getJSON("/reply/getList/"+cidx, function( data ){
		if( data.length > 0 ){

			$.each(data, function(idx, item){
				$('#replyList').append('<li><span class="replyName">'+item.mb_name+'</span><span class="replyMemo">'+item.re_memo+'</span><span class="replyRegTime">'+item.re_reg_time+'</span></li>');
			});
			
		}
	});	

}


/*
 * 
 */
function getTagList(cidx){
	$("#tagList").empty();
	
	$.getJSON("/movie_list/get_tag_list/"+cidx, function( data ){
		if( data.length > 0 ){

			$.each(data, function(idx, item){
				
				$("#tagList").append("\
					<li class=\"tag-box\"><a href=\"/tag/search/"+item.idx+"\">#"+item.ctl_tag+"</li>\
				");
			});
			$('#tagContent').show();
		}else{
			$('#tagContent').hide();
		}
	});

}

/*
 * 
 */
function getRelativeProductList(cidx){

	$("#RPList").empty();
	
	$.getJSON("/movie_list/get_relative_product_list/"+cidx, function( data ){
		
		if( data.length > 0 ){

			$.each(data, function(idx, item){
				
				var img = item.p_img;
				if( img == "")
					img = "/static/images/product/none.png";

				$("#RPList").append("\
					<li data-pidx=\""+item.p_idx+"\">\
						<div>\
							<div><img src=\""+img+"\" width=\"70\" class=\"thumbnail\"></div>\
							<div class=\"cover\"><p>"+item.p_name+"</p><p>\\"+number_format(item.p_price)+"원</p></div>\
		        		</div>\
	    	        </li>\
				");
			});
			$('#RPList').show();
		}else{
			$('#RPList').hide();
		}
	});	

}


$(document).on("mouseenter", "#RPList li", function(){
	$('.cover', $(this)).show();
	
});	

$(document).on("mouseleave", "#RPList li", function(){
	$('.cover', $(this)).hide();
	
});	

function chkReplySubmit(){
	var f = $('form[name=replyWriteForm]');
	var rep = $.trim($('input[name=reply_cont]').val());
	
	if(rep == ""){
		alert('댓글 내용을 입력해 주세요!');
		$('input[name=reply_cont]').focus();
		return false;
	}
	

	var csrf_token = $('input[name=csrf_t_name]').val();

	$.ajax({
		type: "POST",
		url: '/reply/add',
		dataType : "json",
		data:{csrf_t_name:csrf_token, cidx: cidx, rep:rep},
		success: function(response) {
			if(response.RESULT == 'OK'){
				$('input[name=reply_cont]').val('');
				
				$('#replyList').prepend('<li><span class="replyName">'+response.NAME+'</span><span class="replyMemo">'+rep+'</span></li>');
			}else{
				alert(response.MSG);
			}
		}
	});
	
	return false;
}

// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;

function onYouTubeIframeAPIReady() {
  player = new YT.Player('youtubePlayer', {
    height: '390',
    width: '100%',
    videoId: movie_id,
		playerVars: {
			'autohide': 1,
			'autoplay':1,
			'wmode': 'transparent'
		},
    
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    }
  });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
  event.target.playVideo();
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
var done = false;
function onPlayerStateChange(event) {
  if (event.data == YT.PlayerState.PLAYING && !done) {
    setTimeout(stopVideo, 1000);
    done = true;
  }
}
function stopVideo() {
  player.stopVideo();
}