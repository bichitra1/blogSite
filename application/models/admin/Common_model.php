<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Login Model for users to logged into the dashboard
 * This Login Model consist a login related funtions
 * @author		Spark(Mani)
 * @copyright	Copyright (c) 2013, Sparkinfosys.com
 * @version		2.0
 * @package		Chums
 * @subpackage  Business
 * @link         
 * */
class Common_model extends CI_Model {
	
	public $table_name = 'gk_adminusers';
	

	// Autoloading a system library usin constructor method
	public function __construct() {
        parent::__construct();
    }
	
public function getalldata($table){
	$this->db->select('*');
	 $this->db->from($table);
	 $result=$this->db->get();
	
	return  $result->result();
	
}
	public function getsingledata($table,$col,$val){
	$this->db->select('*');
	 $this->db->from($table);
	  $this->db->where($col,$val);
	 $result=$this->db->get();
	
	return  $result->result();
	
}
	

	

	
	
}
?>