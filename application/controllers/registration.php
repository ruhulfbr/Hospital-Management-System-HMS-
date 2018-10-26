<?php

class Registration extends CI_Controller{

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
			echo 'You dont have permission to access this page. <a href="../login">Login</a> ';
			die();
		}
	}

	function home()
	{
		$this->load->model('load_info');
		$data['records'] = $this->load_info->profile_data($this->session->userdata('username'));
		$data['records2'] = $this->registration_model->fetchDoctor();
		$data['records3'] = $this->registration_model->patientid();
		$data['records5'] = $this->registration_model->patient_record();
		$this->load->view('RegistrationPage/new_registration',$data);

	}

	

	function old_patient()
	{
		$this->load->model('load_info');
		$data['records'] = $this->load_info->profile_data($this->session->userdata('username'));
		$data['records2'] = $this->registration_model->fetchDoctor();
		$data['records5'] = $this->registration_model->patient_record();
		$this->load->view('RegistrationPage/old_registration',$data);
	}
	
	function oldview()
	{
		$pid = $this->input->post('patientid');
		$doc = $this->input->post('doctor');
		$this->load->model('load_info');
		$data['records'] = $this->load_info->profile_data($this->session->userdata('username'));
		$data['records2'] = $this->registration_model->fetchDoctor();
		$data['records3'] = $this->registration_model->patientid();
		$data['records5'] = $this->registration_model->patient_record();
		$data['records6'] = $this->registration_model->fetchOldPatient($pid);
		$data['doctor'] = $this->registration_model->fetchDoctorName($doc);
		$data['doctorid'] = $doc;
		$this->load->view('RegistrationPage/oldreg',$data);

	}

	

	function new_patient()
	{	//field name, User name, validaton rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('father_name', 'Father Name', 'trim|max_length[55]');
		$this->form_validation->set_rules('age', 'Age', 'trim|max_length[3]|is_natural|required');
		$this->form_validation->set_rules('remarks', 'Remarks', 'trim|max_length[255]');

		if ($this->form_validation->run() == FALSE)
		{
			$this->home();
		}

		else
		{		
				$patient = array (
									'patient_id' => $this->input->post('patient_id'),
									'name' => $this->input->post('name'),
									'father_name' => $this->input->post('father_name'),
									'age' => $this->input->post('age'),
									'gender' => $this->input->post('gender'),
									'blood_group' => $this->input->post('blood_group'),
									'remarks' => $this->input->post('remarks')
		
				
							);
				$registration = array (
									'patient_id' => $this->input->post('patient_id'),
									'doctor_id' => $this->input->post('doctor'),
									
									'date' => date('Y-m-d'),
									'time' => date('h:i:s')
							);
				$this->registration_model->addPatient($patient,$registration);
				$this->home();
		}
	}

	function oldPatientReg()
	{
		$oreg = array(
						'patient_id' => $this->input->post('regpid'),
						'doctor_id' => $this->input->post('regdoc'),
						'date' => date('Y-m-d'),
						'time' => date('h:i:s')

					);
		$this->registration_model->oldPatReg($oreg); 
		$this->home();
	}

	function profile()
	{
		$updates = array(
							'email' => $this->input->post('email'),
							'phone' => $this->input->post('phone'),
							'address' => $this->input->post('address'),
							'content' => $this->input->post('content'),
							

						);
		$this->doctor_model->profile($updates);
		$this->home();
	}

	function image()
	{
		if($this->input->post('upload'))
		{
			$img = $this->doctor_model->image();
			
		}
		$this->home();
	}

	function password()
	{
		$retv = $this->doctor_model->password();
		if ($retv) 
		{
			$this->home();
		}
		else
		{
			echo 'Wrong old password or confimation password. Go back and try again';
		}
		
	}

}