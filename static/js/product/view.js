// JavaScript Document
var reply_page = 0;

$(document).ready(function(e) {	
	getRelativeProductList(bidx);
	getRelativeOnairList(pidx);
	//getTagList(cidx);
	getReplyList(pidx, true);
	
	
	$('#btnReplyMore').click(function(){
		getReplyList(pidx, false);
	});
	
	$('#productEvalGroup label').click(function(){
		//console.log("value==>" + $(this).data('no'));
		var eval = $(this).data('no');
		$.ajax({
			type: "GET",
			url: '/evaluation/add/product/'+pidx+'/'+eval,
			dataType : "json",
			success: function(response) {
				if(response.RESULT == 'OK'){
					console.log('OK');
				}else{
					alert(response.MSG);
				}
			}
		});
		
	});	
});

/*
 * 
 */
function getReplyList(idx, empty){
	if(empty)
		$('#replyList').empty();
	
	$.getJSON("/reply/getList/product/"+idx+"/"+ ++reply_page, function( data ){
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
function getRelativeProductList(bidx){

	$("#RPList").empty();
	
	$.getJSON("/product/get_brand_product/"+bidx+"/4", function( data ){
		
		if( data.length > 0 ){

			$.each(data, function(idx, item){
				
				var img = item.p_img;
				if( img == "")
					img = "/static/images/product/none.png";

				$("#RPList").append("\
					<li data-pidx=\""+item.p_idx+"\">\
						<div>\
							<div><img src=\""+img+"\" width=\"70\" class=\"thumbnail\"></div>\
							<div class=\"cover\"><a href=\"/product/view/"+item.idx+"\"><p>"+item.p_name+"</p><p>\\"+number_format(item.p_price)+"원</p></a></div>\
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


/*
 * 
 */
function getRelativeOnairList(pidx){

	$("#ROList").empty();
	
	$.getJSON("/product/get_relative_onair/"+pidx+"/5", function( data ){
		
		if( data.length > 0 ){

			$.each(data, function(idx, item){
				
				var img = item.p_img;
				if( img == "")
					img = "/static/images/common/product_none.png";

				$("#ROList").append("\
								<li>\
									<div>\
										<div class=\"onair-thumbnail pull-left\"><a href=\"/contents/onair/"+item.c_idx+"\"><img src=\""+item.c_img+"\" width=\"110\" height=\"65\"></a></div>\
										<div class=\"onair-desc\">\
											<div class=\"content-title\"><a href=\"/contents/onair/"+item.c_idx+"\">"+item.c_title+"</a></div>\
										</div>\
									</div>\
								</li>\
				");
			});
			$('#ROList').show();
		}else{
			$('#ROList').hide();
		}
	});	

}
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
		url: '/reply/add/product/',
		dataType : "json",
		data:{csrf_t_name:csrf_token, pidx: pidx, rep:rep},
		success: function(response) {
			if(response.RESULT == 'OK'){
				$('input[name=reply_cont]').val('');
				
				$('#replyList').prepend('<li><span class="replyName">'+response.NAME+'</span><span class="replyMemo">'+rep+'</span><span class="replyRegTime">지금</span></li>');
			}else{
				alert(response.MSG);
			}
		}
	});
	
	return false;
}
