<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Google_Authentication extends CI_Controller
{
   public function index()
	{
	    	$this->load->library("googleplus");	
		
		if($this->session->userdata('login') == true){
			//print_r($this->session->userdata('user_profile'));
			
		}
		
		if (isset($_GET['code'])) {
			
			$this->googleplus->getAuthenticate();
			$this->session->set_userdata('login',true);
			$this->session->set_userdata('user_profile',$this->googleplus->getUserInfo());
		
		print_r($this->googleplus->getUserInfo());
			
		} 
	
		$contents['login_url'] = $this->googleplus->loginURL();
		$this->load->view('google/index', $contents);
		
	}
	
	public function profile(){
		
		if($this->session->userdata('login') != true){
			redirect('');
		}
		
		$contents['user_profile'] = $this->session->userdata('user_profile');
		$this->load->view('profile',$contents);
		
	}
	
	public function logout(){
		
		$this->session->sess_destroy();
		$this->googleplus->revokeToken();
		redirect('');
		
	}
}