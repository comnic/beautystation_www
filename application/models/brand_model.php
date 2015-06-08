<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brand_model extends MH_Model{
	
	function __construct(){
		parent::__construct();
		$this->tablename = 'product_brand';
		$this->product_tablename = 'product';
	}
	
}