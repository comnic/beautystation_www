// JavaScript Document
var product_page = 0;

$(document).ready(function(e) {	
	getProductList(bidx);

});


/*
 * 
 */
function getProductList(bidx){

	$("#productList").empty();
	
	$.getJSON("/product/get_brand_product/"+bidx+"/8", function( data ){
		
		if( data.length > 0 ){

			$.each(data, function(idx, item){
				
				var img = item.p_img;
				if( img == "")
					img = "/static/images/product/none.png";

				$("#productList").append("\
					<li data-pidx=\""+item.p_idx+"\">\
						<div class=\"cont_img\"><a href=\"/product/view/"+item.p_idx+"\"><img src=\""+img+"\" width=\"170\" height=\"170\" class=\"thumbnail\"></a></div>\
						<div class=\"cont_title text-center\"><a href=\"/product/view/"+item.p_idx+"\">"+item.p_name+"</a></div>\
						<div class=\"cont_price text-center\">"+number_format(item.p_price)+"원</div>\
						<div class=\"cont_buy_btn text-center center-block\">BUY</div>\
					</li>\
				");
			});
		}else{
			console.log("더이상 목록이 없습니다.");
		}
	});	

}

