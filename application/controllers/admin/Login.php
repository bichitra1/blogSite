<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public $headerPage = 'admin/headerlogin';
	//set footer page
	public $footerPage = 'admin/footerlogin';
	
	public $login_redirect = 'admin/login/index';

	public function __construct() {
        parent::__construct();
		$this->load->model('admin/login_model','my_model');
  		

		
		error_reporting(E_ERROR | E_WARNING | E_PARSE | ~E_NOTICE);
	//	error_reporting(0);
	//	ini_set('display_errors','off'); 
    }
	
	
	public function index()
	{
                
		 if($this->session->userdata('adminid') != '') { 
		 
		  redirect('admin/dashboard');
		 }
		 
		$this->load->view($this->headerPage);
		$this->load->view('admin/login');
		$this->load->view($this->footerPage);
	}
	
	

	
	public function login_process()	{	
  
 
  
		if($this->input->post('submit')!=''){
			
			
				
				 $data = array(
							'email' => $this->input->post('username'),
							'password' => $this->input->post('password')
						 );
				
				$user_details = $this->my_model->getUser($data);
				
				if($user_details){
				
				
					$newdata = array(
									'adminname'  => $user_details['name'],
									'adminimg'  => $user_details['image'],
									'adminemail'  => $user_details['email'],
									'adminmobile'  => $user_details['mobile'],
									
									'adminid'  => $user_details['id']
									
								);
								
								
				        $this->session->set_userdata($newdata);
						$this->session->set_flashdata( 'msg_succ', 'Welcome to Admin.' );
						redirect('admin/dashboard'); // if user's exist in our ecords redirecting to dashboard page
					} else {
						$this->session->set_flashdata( 'message', 'Username and Password did not match.' );
						redirect($this->login_redirect);
					}				
		
	 	}
	}
	public function forgotpassword(){
		$email=$this->input->post('email');
		
		$this->db->select('name,email,password');
		$this->db->from('admin');
		$this->db->where('email',$email);
		$result=$this->db->get();
		$email=$result->row_array();
		
		if(count($email)==3){
			$email1=$email['email'];
			$password=base64_decode($email['password']);
			
			
			$to   = "$email1";
				$from = "Jigarlad";
				$headers = "From: $from\r\n";
				
				
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				$subject = "Jigarlad Forgot Password";
				
				$message = "<html><body>";
				
				
				$message.="<h3>Hi, </h3>";
				
				
				$message.="<p>Your Password Is ".$password." </p>";
				
				
				$message.="</body></html>";
				
				
				
				mail($to,$subject,$message,$headers);
				$this->session->set_flashdata( 'message', 'Check Your Email For Password.' );
						redirect($this->login_redirect);
			}
			else{
				$this->session->set_flashdata( 'message', 'Email Is not Coorect.' );
						redirect($this->login_redirect);
				
				}
		
		
		}
	


	public function logout() {

				

	
			$user_data = $this->session->all_userdata();
			
				foreach ($user_data as $key => $value) {
					$this->session->unset_userdata($key);
				}
			

			redirect($this->login_redirect,'refresh');
		
   }
   
   
		
	

	
}
