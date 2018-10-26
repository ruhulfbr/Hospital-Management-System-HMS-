<?php

class Hms extends CI_Controller{
		
		function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}

	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');

		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect('login/index');
		}
	}

	

	function admin()
	{
		$this->load->model('load_info');
		$data['records'] = $this->load_info->profile_data($this->session->userdata('username'));
		$data['records2'] = $this->admin_model->TotalMembers();
		$this->load->view('AdminPage/adminpage',$data);
	}

	function registration()
	{
		$this->load->model('load_info');
		$data['records'] = $this->load_info->profile_data($this->session->userdata('username'));
		$data['records2'] = $this->registration_model->fetchDoctor();
		$data['records3'] = $this->registration_model->patientid();
		$data['records5'] = $this->registration_model->patient_record();
		$this->load->view('RegistrationPage/new_registration',$data);
	}

	function doctor()
	{
		$this->load->model('load_info');
		$data['records'] = $this->load_info->profile_data($this->session->userdata('username'));
		$doctorid = $this->doctor_model->fetchDoctorID($this->session->userdata('username'));
		$data['records2'] = $this->doctor_model->fetchQueue($doctorid);
		$data['records3'] = $this->doctor_model->doctorHistory($doctorid);
		$data['records4'] = $this->doctor_model->fetchDoctor();
		$this->load->view('DoctorPage/doctorpage',$data);
	}

	function pharmacy()
	{
		$this->load->model('load_info');
		$data['records'] = $this->load_info->profile_data($this->session->userdata('username'));
		$data['records2'] = $this->pharmacy_model->fetchMedicine();
		$data['records3'] = $this->pharmacy_model->todayPrescription();
		$data['records6'] = $this->pharmacy_model->viewPrescription();
		$this->load->view('PharmacyPage/pharmacypage',$data);
	}

	function logout()
	{
		$usernamein = $this->session->userdata('username');
		$this->admin_model->logout($usernamein);
		$this->session->sess_destroy();
		$this->load->view('LoginPage/login');

	}
}