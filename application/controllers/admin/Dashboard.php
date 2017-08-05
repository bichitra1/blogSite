<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
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
	
		$this->load->view($this->headerPage);
		$this->load->view($this->sidemenu);
		$this->load->view('admin/dashboard');
		$this->load->view($this->footerPage);
		}
		public function editprofile()
	{
	$id=$this->session->userdata['adminid'];
	$query="SELECT * FROM admin WHERE id='$id'";
		 $query1 = $this->db->query($query);
		 
	 $data['result']= $query1->result();
	
		$this->load->view($this->headerPage);
		$this->load->view($this->sidemenu);
		$this->load->view('admin/editprofile',$data);
		$this->load->view($this->footerPage);
		}
	public function editprofilesubmit(){
		$id=$this->session->userdata['adminid'];
		
		 if ($_FILES['img']['name'] != '') {
			         
	
                   	$new_name =time().$_FILES['img']['name'];
					$new_name=str_replace("(","_",$new_name);
					$new_name=str_replace(")","_",$new_name);
					
						$config['file_name'] = $new_name;
						
						$config['upload_path'] = './img/'; /* NB! create this dir! */
						$config['allowed_types'] = 'png|jpg|jpeg';
						$config['max_size']  = '5242880';
						$config['max_width']  = '0';
						$config['max_height']  = '0';
						if (!is_dir('./img/')) {
							mkdir('./img/', 0777, TRUE);
							
						}
					
						$this->load->library('upload', $config);
						
					    
						if(!$this->upload->do_upload('img')){
							$data['msg'] = $this->upload->display_errors();
						
							$this->session->set_flashdata('msg_succ',$data['msg']);
						     redirect('admin/dashboard/editprofile');
							} else {
							$query="SELECT * FROM admin WHERE id='$id'";
						 $query1 = $this->db->query($query);
						 
					 $result1= $query1->row_array();
					 $filename=$result1['image'];
					  unlink('./img/'.$filename); 
							$data = $this->upload->data();
							
							
							$uploadedImages['image'] = $data['file_name'];
							$image = $uploadedImages['image'];
                         
						}
						
						  
					  $result = $this->my_model->updateprofileimage($image,$id);
					if($result){
						$this->session->set_flashdata('msg_succ', 'Update Successfully...');
						redirect('admin/dashboard/editprofile');
					}
				
		}
		else{
				$name=$this->input->post('name');
	$email=$this->input->post('email');
	$mobile=$this->input->post('mobile');
	
	$data=array(
	'name'=>$name,
	'email'=>$email,
	'mobile'=>$mobile,
	'created_date'=>date('Y-m-d H:i:s')
	
	);
	   $this->db->where('id',$id);
	$this->db->update('admin',$data);
			
			$affected_rows=$this->db->affected_rows();
				
				if ($affected_rows==1)
				{
					$this->session->set_flashdata( 'msg_succ', 'Profile Updated Sucessfully.' );
				}
				else
				{
					$this->session->set_flashdata( 'msg_succ', 'Profile Updated Error.' );
				}
				redirect ('admin/dashboard/editprofile');
			
			
			
			}
		
		}
		public function changepaswword(){
	$this->load->view($this->headerPage);
		$this->load->view($this->sidemenu);
		$this->load->view('admin/changepassword');
		$this->load->view($this->footerPage);
	
	
}
public function editpassword(){
	
	
	$id=$this->session->userdata['adminid'];
	
			$oldpass=$this->input->post('oldpassword');
			$old_pass=base64_encode($oldpass);
			$newpass=$this->input->post('newpassword');
			$cnfpass=$this->input->post('conpassword');
			$squery="SELECT * FROM admin WHERE id='$id' and password='$old_pass'";
			$query = $this->db->query($squery);
			$results=$query->result();
			
			if (count($results)==1)
			{
				if ($oldpass == $newpass)
				{
					$this->session->set_flashdata( 'msg_succ', 'Password cannot be last password.');
					redirect('admin/dashboard/changepaswword'); 
				}
				else
				{
					if ($newpass==$cnfpass)
					{
						$newpass=base64_encode($newpass);
						$squery="UPDATE admin SET password='$newpass' WHERE password='$old_pass' AND id='$id'";
						$query = $this->db->query($squery);
						echo "<script>
						alert('Password Changed Successfully');
						window.location.href='".base_url()."admin/login/logout';
						</script>";
					}
					else 
					{
						$this->session->set_flashdata( 'msg_succ', 'Password Not Changed : Enter Correct password');
						redirect('admin/dashboard/changepaswword'); 
					}
				}
			}
			else
			{
				$this->session->set_flashdata( 'msg_succ', 'Password Not Matched : Enter Correct password');
				redirect('admin/dashboard/changepaswword') ; 
			}
}
}
