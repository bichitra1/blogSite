<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	public $headerPage = 'admin/header';
	public $sidemenu = 'admin/sidemenu';
	
	public $footerPage = 'admin/footer';
	

	public function __construct() {
        parent::__construct();
		
  		
  	
                if($this->session->userdata('adminid') == '') { 
				
                      redirect('admin/login');
                }
	
    }
	
	
	public function index()
	{
	     $query="SELECT * FROM contact";
		 $query1 = $this->db->query($query);
		 
	 $data['result']= $query1->result();
	 
		 
		$this->load->view($this->headerPage);
		$this->load->view($this->sidemenu);
		$this->load->view('admin/allcontact',$data);
		$this->load->view($this->footerPage);
		}
		
	public function changestatus($status){
	$udate=date('Y-m-d H:i:s');
	
		$data = array(
				
				
				'status'=>1,
				
				'updated_date'=>$udate,
				
			
				);
				
				$this->db->where('id',$status);		
			$this->db->update('contact', $data); 
		//		echo $this->db->last_query();exit;
				$affected_rows=$this->db->affected_rows();
				
				if ($affected_rows==1)
				{
					$this->session->set_flashdata( 'msg_succ', 'Status Updated Sucessfully.' );
				}
				else
				{
					$this->session->set_flashdata( 'msg_succ', 'Status Updated Error.' );
				}
				redirect ('admin/contact');
			
		
		}
public function deletecontact($id){
	
	$this->db->where('id',$id);		
			$this->db->delete('contact'); 
			$affected_rows=$this->db->affected_rows();
				
				if ($affected_rows==1)
				{
					$this->session->set_flashdata( 'msg_succ', 'Contact Deleted Sucessfully.' );
				}
				else
				{
					$this->session->set_flashdata( 'msg_succ', 'Contact Delete Error.' );
				}
				redirect ('admin/contact');
			
	
}		
}
