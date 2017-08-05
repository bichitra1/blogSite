<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogcategory extends CI_Controller {
	
	public $headerPage = 'admin/header';
	public $sidemenu = 'admin/sidemenu';
	//set footer page
	public $footerPage = 'admin/footer';
	

	public function __construct() {
        parent::__construct();
		
  		$this->load->model('admin/common_model','my_model');
  	
                if($this->session->userdata('adminid') == '') { 
				
                      redirect('admin/login');
                }
	
    }
	
	
	public function index()
	{
	     
		 $data['blogcategory']=$this->my_model->getalldata('blog_category');
		$this->load->view($this->headerPage);
		$this->load->view($this->sidemenu);
		$this->load->view('admin/allblogcategory',$data);
		$this->load->view($this->footerPage);
		}
	
	public function addcategory(){
	
	
	$this->load->view($this->headerPage);
		$this->load->view($this->sidemenu);
		$this->load->view('admin/addblogcategory');
		$this->load->view($this->footerPage);
	}	

public function editcategory($id){
	 
	 $data['blogcategoryedit']=$this->my_model->getsingledata('blog_category','id',$id);
	$this->load->view($this->headerPage);
		$this->load->view($this->sidemenu);
		$this->load->view('admin/editblogcategory',$data);
		$this->load->view($this->footerPage);
		
}	
public function changestatustype(){
		$id=$this->input->post('bid');
		$status=$this->input->post('blogStatus');
	
	$udate=date('Y-m-d H:i:s');
	
		$data = array(
				'status'=>$status,
				
				'updated_date'=>$udate,
				
				);
				
				$this->db->where('id',$id);		
			$this->db->update('blog_category', $data); 
		//echo $this->db->last_query();exit;
				$affected_rows=$this->db->affected_rows();
				
				if ($affected_rows==1)
			{
				
			echo 1;	
				
			}
			
		
		}
		
		
public function categorysubmit($id)
	    {
	    
	$category= $this->input->post('category');
	 $data=array(
	 'cat_name'=>$category,
	 'updated_date'=>date('Y-m-d H:i:s')
	 
	 );
			$this->db->where('id',$id);
			$this->db->update('blog_category', $data); 
			$affected_rows=$this->db->affected_rows();
				
				if ($affected_rows==1)
				{
					$this->session->set_flashdata( 'msg_succ', 'Category Updated Sucessfully.' );
				}
				else
				{
					$this->session->set_flashdata( 'msg_succ', 'Category Updated Error.' );
				}
				redirect ('admin/blogcategory'); 
		
		}
		public function categoryeditsubmit()
	    {
	    
	$category= $this->input->post('category');
	 $data=array(
	 'cat_name'=>$category,
	 'created_date'=>date('Y-m-d H:i:s')
	 
	 );
			
			$this->db->insert('blog_category', $data); 
			//	echo $this->db->last_query();exit;
				$affected_rows=$this->db->affected_rows();
				
				if ($affected_rows==1)
				{
					$this->session->set_flashdata( 'msg_succ', 'Category Created Sucessfully.' );
				}
				else
				{
					$this->session->set_flashdata( 'msg_succ', 'Category Created Error.' );
				}
				redirect ('admin/blogcategory'); 
		
		}
		
		public function deletecategory($id){
	
	$this->db->where('id',$id);		
			$this->db->delete('blog_category'); 
			$affected_rows=$this->db->affected_rows();
				
				if ($affected_rows==1)
				{
					$this->session->set_flashdata( 'msg_succ', 'Category Deleted Sucessfully.' );
				}
				else
				{
					$this->session->set_flashdata( 'msg_succ', 'Category Delete Error.' );
				}
				redirect ('admin/blogcategory');
			
}	

		
}
