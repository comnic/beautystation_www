<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 
 * 
 * 
 * 
 */
class Product extends MH_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model('product_model');
		$this->_segment = $this->uri->segment_array();
	}
	
	function lists($kind = "brand", $idx = "1"){
		$this->_header();

		if($kind == ""){
			$data = array();
			$this->load->view('product/list', $data);
		}else if($kind == "brand"){
			$data = array('idx'=>$idx);
			$this->load->view('product/list_brand', $data);
		}else if($kind == "category"){
			$data = array('idx'=>$idx);
			$this->load->view('product/list_category', $data);
		}
		
		
		$this->_footer();
		
	}
	
	function view($idx){
		$this->_header();
		$this->load->helper(array('form', 'url'));
		
		$data['product_info'] = $this->product_model->get($idx);
		$data['product_info']['p_price'] = number_format($data['product_info']['p_price']);

		$this->load->model('evaluation_model');
		$this->load->library('member');
		$res = $this->evaluation_model->get('product', array('obj_idx' => $idx, 'mb_idx' => $this->member->getIdx()));
		if(count($res) > 0)
			$eval = $res[0]['eval'];
		else
			$eval = 0;
		$data['content_eval'] = $eval;
		
		$this->load->model('reply_model');
		$data['reply_total'] = number_format($this->reply_model->getNumRows('product', array("p_idx" => $idx)));
		
		$this->load->view('product/view', $data);
		
		$this->_footer();
	
	}
	
	/*
	 * get_brand_product()
	 * 
	 * 해당 브랜드의 상품목록을 구한다.
	 */
	function get_brand_product($bidx, $limit){
		$params = array('pb_idx' => $bidx);
		$res = $this->product_model->gets($params, $limit);
		
		echo(json_encode($res));
	}
	
	/*
	 * 
	 * 
	 */
	function get_relative_onair($pidx, $limit = 5){
		$params = array('p_idx' => $pidx);
		$res = $this->product_model->getsRelativeOnair($pidx, $limit);
		
		echo(json_encode($res));
	}
}