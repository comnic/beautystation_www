<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 
 * 
 * 
 * 
 */
class Evaluation extends MH_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model('evaluation_model');
	}
	
	public function get($kind = "content", $idx){
		if($this->_chkLogin()){
			$this->load->library('member');
			$res = $this->evaluation_model->get($kind, array('obj_idx' => $idx, 'mb_idx' => $this->member->getIdx()));
			if(count($res) > 0)
				$eval = $res[0]['eval'];
			else
				$eval = 0;
			
			$result['RESULT'] = 'OK';
			$result['EVAL'] = $eval;
				
		}else{
			$result['RESULT'] = 'FAIL';
			$result['ERRCODE'] = '100';
			$result['MSG'] = '로그인 후 이용해 주세요!';
		}

	}
	
	public function add($kind = "content", $idx, $eval){
		
		if($this->_chkLogin()){
			$this->load->library('member');
			
			$params = array('obj_idx' => $idx, 'mb_idx' => $this->member->getIdx(), 'eval' => $eval, 'reg_time'=>date('y-m-d H:i:s'));
			$res = $this->evaluation_model->add($kind, $params);
			
			$result['RESULT'] = 'OK';
			$result['IDX'] = $res;
		}else{
			$result['RESULT'] = 'FAIL';
			$result['ERRCODE'] = '100';
			$result['MSG'] = '로그인 후 이용해 주세요!';
		}
		
		echo(json_encode($result));
	} 
	
}