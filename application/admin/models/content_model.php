<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content_model extends MH_Model{
	
	var $tablename_relative_product = 'relative_product';	//관련 상품 리스트 관리 테이블명.
	
	
	/*
	 * 생성자
	 * 
	 *  테이블 이름을 정의한다.
	 *  
	 *
	 */
	function __construct(){
		parent::__construct();
		$this->tablename = 'contents';
	}
	
	/*
	 * 
	 */
	function getList($kind = "MV", $channel = 0, $offset = 0){
		
		$sqlWhere = " c_kind = ". $this->db->escape($kind) . " ";
		if($channel != 0 && $channel != "")
			$sqlWhere .= " AND cc_idx = '$channel' ";
		
		//컨텐츠 리스트를 구한다.
		$this->db->select('c_idx as idx, cc_idx as channel, c_kind as kind, c_title as title, c_count as cnt, c_img as img, c_active as active, c_publish_date as publish_date')
			->from('contents')
			->where($sqlWhere, NULL, FALSE)
			->order_by("c_idx", "desc")
			->limit($this->cntPerPage, $offset);
		
		$query = $this->db->get();

		return $query->result_array();
	}
	
	/*
	 * 
	 */
	function get($params){

			//idx해당 컨텐츠 정보를 구한다.
			$this->db//->select('c_idx as idx, cc_idx as channel, c_kind as kind, c_title as title, c_summary as summary, c_content as content, c_movie_link as movie_link, c_count as cnt')
			->from($this->tablename)
			->where($params)
			->order_by("c_idx", "desc");
			
			$query = $this->db->get();
				
			return $query->result_array();
	}
	
	
	/*
	 * getRelativeProductList()
	 * 관련 상품의 목록을 구한다.
	 *
	 * $idx - content idx
	 * 
	 * return value - 
	 */
	function getRelativeProductList($idx){
		
		$this->db
		->from($this->tablename_relative_product)
		->join('product','relative_product.p_idx = product.idx')
		->where("c_idx", $idx)
		->order_by("p_idx", "asc");
		
		$query = $this->db->get();
		
		return $query->result_array();		
		
	}
	
	/*
	 * addRelativeProduct()
	 * 
	 * 컨텐츠 관련 상품을 등록합니다.
	 * 
	 * $idx - content idx
	 * $list - product list
	 * 		 - Array
	 * 
	 * return value - 성공시 true, 실패시 false
	 */
	function addRelativeProduct($idx, $arrList){
		
		$data = array();
		
		foreach($arrList as $pidx){
			$data[] = array(
						'c_idx' => $idx ,
						'p_idx' => $pidx
					);
		}
		
		$this->db->insert_batch($this->tablename_relative_product, $data);
		
		return true;
	}

	/*
	 * updateRelativeProduct()
	*
	* 컨텐츠 관련 상품을 업데이트 합니다.
	* 기존의 것을 지우고 다시 등록 하는 방식으로 업데이트 한다.
	*
	* $idx - content idx
	* $list - product list
	* 		 - Array
	*
	* return value - 성공시 true, 실패시 false
	*/
	function updateRelativeProduct($idx, $arrList){
	
		$this->db->delete($this->tablename_relative_product, array('c_idx' => $idx));
		
		$data = array();
	
		foreach($arrList as $pidx){
			$data[] = array(
					'c_idx' => $idx ,
					'p_idx' => $pidx
			);
		}
	
		$this->db->insert_batch($this->tablename_relative_product, $data);
	
		return true;
	}
		
	/*
	 * 
	 */
	function getNumRows($kind = "MV", $channel = 0){
		$params = array('c_kind' => $kind);
		if($channel != 0 && $channel != "")
			$params['cc_idx'] = $channel;
		
		$this->db->where($params);
		$this->db->from($this->tablename);
		return $this->db->count_all_results();
	}
	
	/*
	 * 
	 */
	function getBestContentsList(){
		$this->db->select('c_idx as idx, c_title as title')
		->from($this->tablename)
		->where('c_active', 'Y')
		->order_by("c_count", "desc")
		->limit(10);
			
		$query = $this->db->get();
		
		return $query->result_array();
		
		//return $this->db->query("SELECT c_idx as idx, c_title as title FROM contents WHERE c_active = 'Y' ORDER BY c_count DESC limit 10")->result_array();
	}
	
	/*
	 * 
	 */
	private function upCount($idx){
		//이후 컨텐츠 보기 로그에 쌓아야 하며, 부정클릭에 대한 검증도 필요함.
// 		$this->db->where('c_idx', $idx);
// 		$this->db->set('c_count', 'c_count+1', FALSE);
// 		$this->db->update('contents');

		$this->db->query("UPDATE " . $this->tablename . " SET c_count = c_count+1 WHERE c_idx = ".$this->db->escape($idx));
	}
}