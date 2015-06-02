<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content_model extends CI_Model{
	
	function __construct(){
		parent::__construct();	
	}
	
	function getList($kind = "MV", $channel = 0, $page = 1, $cntPerPage = 10){
		$start = ($page-1) * $cntPerPage;
		
		$sqlWhere = " c_kind = ". $this->db->escape($kind) . " AND c_active = 'Y' AND c_publish_date <= now() ";
		if($channel != 0 && $channel != "")
			$sqlWhere .= " AND cc_idx = '$channel' ";

		//전체 레코드수를 구한다. pagination을 위해.
		$this->db->where($sqlWhere, NULL, FALSE);
		$this->db->from('contents');
		$total_record = $this->db->count_all_results();
		
		//컨텐츠 리스트를 구한다.
		$this->db->select('c_idx as idx, cc_idx as channel_idx, cc_title as channel_title, c_kind as kind, c_title as title, c_count as cnt, c_img as img, c_movie_link as movie_id')
			->from('contents')
			->join('content_channel', 'contents.cc_idx = content_channel.idx')
			->where($sqlWhere, NULL, FALSE)
			->order_by("c_idx", "desc")
			->limit($cntPerPage, $start);
		
		$query = $this->db->get();

		return array("items"=>$query->result_array(), "total"=>$total_record);
	}
			
	function getContent($idx){
		if(!isset($idx) || $idx == "")
			return false;

			//먼저 c_count값을 1증가 시킨다.
			$this->upCount($idx);
			
			//idx해당 컨텐츠 정보를 구한다.
			$this->db->select('c_idx as idx, cc_idx as channel_idx, cc_title as channel_title, c_kind as kind, c_title as title, c_summary as summary, c_content as content, c_movie_link as movie_link, c_count as cnt')
			->from('contents')
			->join('content_channel', 'contents.cc_idx = content_channel.idx')
			->where('c_idx', $idx)
			->order_by("c_idx", "desc");
			
			$query = $this->db->get();
				
			return $query->row_array();
	}
	
	function getBestContentsList(){
		$this->db->select('c_idx as idx, c_title as title')
		->from('contents')
		->where('c_active', 'Y')
		->order_by("c_count", "desc")
		->limit(10);
			
		$query = $this->db->get();
		
		return $query->result_array();
		
		//return $this->db->query("SELECT c_idx as idx, c_title as title FROM contents WHERE c_active = 'Y' ORDER BY c_count DESC limit 10")->result_array();
	}
	
	/*
	 * 
	 * 
	 */
 	function getRelativeContents($kind = "MV", $cidx){
		
		$sqlWhere = " c_kind = ". $this->db->escape($kind) . " AND c_active = 'Y' AND c_publish_date <= now() ";
		
		$sqlWhere .= " AND cc_idx = (select cc_idx from contents where c_idx = '$cidx') ";

		//컨텐츠 리스트를 구한다.
		$this->db->select('c_idx as idx, cc_idx as channel_idx, cc_title as channel_title, c_kind as kind, c_title as title, c_count as cnt, c_img as img')
			->from('contents')
			->join('content_channel', 'contents.cc_idx = content_channel.idx')
			->where($sqlWhere, NULL, FALSE)
			->order_by("c_idx", "desc")
			->limit(5, 1);
		
		$query = $this->db->get();

		return array("items"=>$query->result_array());
	}
	/*
	 * getRelativeProducts()
	 * 컨텐츠와 관련있는 상품의 리스트를 구한다.
	 * 
	 * $idx - content idx
	 * 
	 * return value - product list
	 * 
	 */
	function getRelativeProducts($idx){
		
		$this->db
		->from('relative_product')
		->join('product', 'relative_product.p_idx = product.idx')
		->where('c_idx', $idx);
			
		$query = $this->db->get();
		
		return $query->result_array();

	}


	/*
	 * getTags()
	* 태그 목록을 구한다.
	*
	* $idx - content idx
	*
	* return value -
	*/
	function getTags($idx){
	
		$this->db->select('ctl_idx, ctl_tag')
		->from('content_tag')
		->join('content_tag_list','content_tag.ctl_idx = content_tag_list.idx')
		->where("c_idx", $idx);
	
		$query = $this->db->get();
	
		return $query->result_array();
	
	}
		
	/*
	 * 
	 * 
	 * 
	 */
	public function add($params){
		//insert content
// 		$params = array(
// 				"c_kind"=>$c_kind,
// 				"cc_idx"=>$c_channel,
// 				"c_seq"=>$c_seq,
// 				"c_title"=>$c_title,
// 				'c_summary' => '' ,
// 				'c_movie_link' => '' ,
// 				'c_img' => '' ,
// 				'c_content' => '' ,
// 				'c_publish_date' => '' ,
// 				'c_reg_date' => ''
// 		);
		
		$this->db->insert('contents', $params);
		
		
	}

	private function upCount($idx){
		//이후 컨텐츠 보기 로그에 쌓아야 하며, 부정클릭에 대한 검증도 필요함.
// 		$this->db->where('c_idx', $idx);
// 		$this->db->set('c_count', 'c_count+1', FALSE);
// 		$this->db->update('contents');

		$this->db->query("UPDATE contents SET c_count = c_count+1 WHERE c_idx = ".$this->db->escape($idx));
	}
}