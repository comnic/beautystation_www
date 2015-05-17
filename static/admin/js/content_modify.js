// JavaScript Document
$(document).ready(function(){
	$('#btnRegRelativeProduct').click(function(){
		$('#popProductList').empty();
		$('#relativeProductModal').modal('show');
	});
	
//	$('#btnRegRelativeProduct').on('show.bs.modal', function (e) {
//		$.getJSON(
//				'/admin.php/products/get',
//				function(response){
//					
//				}
//		);
//	});
	
	$('#btnAddRelativeProduct').click(function(response){
		var items = $('.select-product');
		if($(items).length == 0){
			alert("추가할 상품을 1개 이상 고르세요!");
			return false;
		}
		
		$(items).each(function(idx, item){
			var p_item = $(item).parent();
			var pidx = $(p_item).data('idx');
			var pimg = $(p_item).data('img');
			
			var list = $('#relative_list_items').children();
			
			var exist = false;
			$(list).each(function(idx, item){
				if(pidx == $(item).data('idx')) 
					exist = true;
			});
			if(exist == false){				
				$('#relative_list_items').append('\
					<li data-idx="'+pidx+'">\
						<img src="'+pimg+'" width="100" class="img-responsive thumbnail">\
						<p class="delRelativeProduct btn btn-link">X</p>\
					</li>\
				');
			}
			
		});
		
	})
	
});

function loadProductList(cidx){
	if(cidx != ""){
		$.getJSON(
			'/admin.php/products/getsForCat/'+cidx,
			function(response){
				//console.log(response);
				$('#popProductList').empty();
				if(response.length > 0){
					$.each(response, function(idx, item){
						$('#popProductList').append("<li class='productItem' data-idx='"+item.idx+"' data-img='"+item.p_img+"'><img src='"+item.p_img+"' width='100'></li>");
					});
				}
			}
		);
	}
}

$(document).on('click', '#popProductList li', function(response){
	if($("img", $(this)).hasClass('select-product'))
		$("img", $(this)).removeClass('select-product');
	else
		$("img", $(this)).addClass('select-product');
}).on('click', '.delRelativeProduct', function(response){
	$(this).parent().remove();
});

function chkSubmit(f){
	
	var list = $('#relative_list_items').children();
	
	var arrList = new Array();
	$(list).each(function(idx, item){
		if(idx != 0) 
			arrList.push($(item).data('idx')); 
	});
	
	$('input[name="relativeProductList"]').val(arrList.join(','));
	
	return true;

}