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
	
	
	public function add(){
		$cidx = $this->input->post('cidx');
		$rep = $this->input->post('rep');
		
		if($this->_chkLogin()){
			$this->load->library('member');
			$params = array('c_idx' => $cidx, 'mb_idx' => $this->member->getIdx(), 're_memo' => $rep, 're_reg_time'=>date('y-m-d H:i:s'));
			$res = $this->reply_model->add($params);
			
			$result['RESULT'] = 'OK';
			$result['NAME'] = $this->member->getName();
			$result['IDX'] = $res;
		}else{
			$result['RESULT'] = 'FAIL';
			$result['MSG'] = '로그인 후 이용해 주세요!';
		}
		
		echo(json_encode($result));
	}
	
	public function getList($cidx){
		$list = $this->reply_model->getList($cidx, 0);
		
		echo(json_encode($list));
		
	}
}