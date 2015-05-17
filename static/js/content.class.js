// JavaScript Document


/*
 * Content Class
 *
 * 
 */
 
var Content = function(idx, cat, kind, title, summary, content, cnt, link) 
{
	this.idx = idx;
	this.category = cat;
	this.kind = kind;
	this.title = title;
	this.summary = summary;
	this.content = content;
	this.cnt = cnt;
	this.link = link;
    
	this.getTitle = function () {
		return this.title;
	};
};

var Contents = function(kind, page, cntPerPage){

	this.kind = kind;
	this.page = page;
	this.cntPerPage = cntPerPage;
	
	this.items = new array();
	
	//cont is instance of Content Class
	this.add = function(cont){
		this.items.push(cont);
	};

	this.getList = function(){
		request_url = "/movie_list/get_content_list";
		
		$.ajaxJSON(request_url + "/" + this.cat + "/" + page, function(response){
			if (!response || response.error) {
				console.log(response.error.meassage);
			}else{
				;
			}
		});
	
	}

};