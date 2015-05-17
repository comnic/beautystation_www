<?php namespace Beautystation\Content;

class Content {
	var $kind;
	var $title;
	var $summary;
	var $img;
	var $thumbnail;
	var $desc;
	var $view_cnt;
	
	public function __construct($params) {
		$this->kind = $params['kind'];
		$this->title = $params['title'];
	}
	
	public function __toString(){
		return "[".$this->kind."]".$this->title;
	}

}