<?php namespace Beautystation\Content;

class ContentList {
	
	protected $list;
	
  	public function __construct($params) {
  		$this->list = array();
  	}
	
  	public function __toString(){
  		return count($this->list);
  	}
}

?>