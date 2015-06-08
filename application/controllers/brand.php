<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 
 * 
 * 
 * 
 */
class Brand extends MH_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model('brand_model');
	}
	
	/*
	 * 
	 * 
	 */
	function lists(){
		$this->_header();

		echo("Brand 리스트");
		
		$this->_footer();
		
	}
	
	/*
	 * 
	 * 
	 */
	function view($idx){
		$this->_header();
		
		$res = $this->brand_model->get($idx);
		if(count($res) > 0){
 			$data['brand_info'] = $res[0];
		
	 		$this->load->model('evaluation_model');
			$this->load->library('member');
			$res = $this->evaluation_model->get('brand', array('obj_idx' => $idx, 'mb_idx' => $this->member->getIdx()));
			if(count($res) > 0)
				$eval = $res[0]['eval'];
			else
				$eval = 0;
			$data['brand_eval'] = $eval;
		
			$this->load->view('brand/view', $data);
		
		
		}else{
			echo("존재하지 않는 브랜드입니다.");
			//$this->load->helper('url');
			//redirect('/');
		}

		
		$this->_footer();
	
	}
	
	/*
	 * 
	 * 
	 */
	function get_product_list($idx, $limit){
		
		
	}

}