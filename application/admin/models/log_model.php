<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Log_model
 * 
 * log와 관련된 Model
 * 각종 로그를 기록한다.
 * 
 */
class Log_model extends CI_Model{
	
	function __construct(){
		parent::__construct();	
	}
	
	function addLogin($option){

		// Include and instantiate the class.
		require_once 'static/lib/Mobile_Detect.php';
		$detect = new Mobile_Detect;
		
		// Any mobile device (phones or tablets).
		if ( $detect->isMobile() ) {
			$device = "M";
		}else if( $detect->isTablet() ){
			$device = "T";
		}else{
			$device = "P";	
		}
		
		$ua = $detect->getUserAgent();
		
		$ip =  $_SERVER["REMOTE_ADDR"];

		$this->db->set('mb_idx', $option['mb_idx']);
		$this->db->set('ll_ip', $ip);
		$this->db->set('ll_device', $device);
		$this->db->set('ll_user_agent', $ua);
		$this->db->set('ll_session', $option['session']);
		$this->db->insert('login_log');
		
		$result = $this->db->insert_id();
		
		return $result;
		
	}
	
	function addContentView($option){
		
		
	}
	
}