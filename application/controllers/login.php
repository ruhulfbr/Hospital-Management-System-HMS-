<?php

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->is_logged_in();
	}

	function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');

		if(isset($is_logged_in) || $is_logged_in == true)
		{
			$user_type = $this->session->userdata('login_type');
			if($user_type == 'Admin')
			{
				redirect('hms/admin');
			}
			elseif ($user_type == 'Doctor') {
				redirect('hms/doctor');
			}
			elseif ($user_type == 'Registration') {
				redirect('hms/registration');
			}
			else
			{
				redirect('hms/pharmacy');
			}



		}
	}



	
	function index() {
		$this->session->sess_destroy();
		$this->load->view('LoginPage/login');
		
	}
	
	function validate_credentials() 
	{
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();

		if($query)
		{	

			$data = array(
       						 'username' => $this->input->post('username'),
       						 'is_logged_in'  => true,
       						 'login_type' => $query
       						 
						);

			
			$this->session->set_userdata($data);

			if($query == 'Admin')
			{
				redirect('hms/admin');
			}
			elseif ($query == 'Doctor') {
				redirect('hms/doctor');
			}
			elseif ($query == 'Registration') {
				redirect('hms/registration');
			}
			else
			{
				redirect('hms/pharmacy');
			}
		}

		else
		{
			$this->load->view('LoginPage/login');
		}
			
		

	}


}