// JavaScript Document
var product_page = 0;

$(document).ready(function(e) {	
	getBrandProductList(bidx, true);
	
	$('#btnReplyMore').click(function(){
		getReplyList(pidx, false);
	});
	
	$('#brandEvalGroup label').click(function(){
		//console.log("value==>" + $(this).data('no'));
		var eval = $(this).data('no');
		$.ajax({
			type: "GET",
			url: '/evaluation/add/brand/'+bidx+'/'+eval,
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
function getBrandProductList(idx, empty){

	if(empty)
		$("#brandProductList").empty();
	
	$.getJSON("/product/get_brand_product/"+idx+"/8", function( data ){
		
		if( data.length > 0 ){

			$.each(data, function(idx, item){
				
				var img = item.p_img;
				if( img == "")
					img = "/static/images/common/brand_none.png";

				$("#brandProductList").append("\
								<li class=\"col-md-3\">\
									<div>\
										<div><a href=\"/product/view/1\"><img src=\""+img+"\" ></a></div>\
										<div class=\"product-desc\">\
											<div class=\"title text-center\"><a href=\"/product/view/1\">"+item.p_name+"</a></div>\
											<div class=\"price text-center\"><a href=\"/product/view/1\">"+number_format(item.p_price)+"원</a></div>\
											<div class=\"text-center\"><a class=\"btn btn-sm btn-buy\">BUY</a></div>\
										</div>\
									</div>\
								</li>\
				");
			});
			
		}else{
			console.log('더이상 목록이 없습니다.');
		}
	});	

}
