<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 
 * 
 * 
 * 
 */
class Reply extends MH_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model('reply_model');
		//$this->_segment = $this->uri->segment_array();
	}
	
	
	public function add($kind = "content"){
		$pidx = $this->input->post('pidx');
		$cidx = $this->input->post('cidx');
		$rep = $this->input->post('rep');
		
		if($this->_chkLogin()){
			$this->load->library('member');
			if($kind == "content"){
				$params = array('c_idx' => $cidx, 'mb_idx' => $this->member->getIdx(), 're_memo' => $rep, 're_reg_time'=>date('y-m-d H:i:s'));
			}else if($kind == "product"){
				$params = array('p_idx' => $pidx, 'mb_idx' => $this->member->getIdx(), 're_memo' => $rep, 're_reg_time'=>date('y-m-d H:i:s'));
			}
			$res = $this->reply_model->add($params, $kind);
			
			$result['RESULT'] = 'OK';
			$result['NAME'] = $this->member->getName();
			$result['IDX'] = $res;
		}else{
			$result['RESULT'] = 'FAIL';
			$result['ERRCODE'] = '100';
			$result['MSG'] = '로그인 후 이용해 주세요!';
		}
		
		echo(json_encode($result));
	}
	
	public function getList($kind = "content", $idx, $page = 1){
		$list = $this->reply_model->getList($kind, $idx, $page);
		
		echo(json_encode($list));
		
	}
}