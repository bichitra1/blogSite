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
class Login_model extends CI_Model {
	
	public $table_name = 'admin';
	

	// Autoloading a system library usin constructor method
	public function __construct() {
        parent::__construct();
    }
	

	public function getUser($data) {
	
        $result = array();
        $this->db->select("*");
        $this->db->where('email', $data['email']);
        $this->db->where('password', base64_encode($data['password']));
        $query = $this->db->get($this->table_name);
		
                if ($query->num_rows() > 0) {
                    $results = $query->row_array();
					
					return $results;
						
						

		}
     		else {
                   
		      
		return 0;
			}
    }


	

	
	
}
?>