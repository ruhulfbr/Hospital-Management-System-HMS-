<?php
class Doctor extends CI_Controller{

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

	function home()
	{

		$this->load->model('load_info');
		$data['records'] = $this->load_info->profile_data($this->session->userdata('username'));
		$doctorid = $this->doctor_model->fetchDoctorID($this->session->userdata('username'));
		$data['records2'] = $this->doctor_model->fetchQueue($doctorid);
		$data['records3'] = $this->doctor_model->doctorHistory($doctorid);
		$data['records4'] = $this->doctor_model->fetchDoctor();
		$this->load->view('DoctorPage/doctorpage',$data);
	}

	function fetchQueue()
	{

	}

	function select()
	{
		$regs = $this->uri->segment(3);
		$patid = $this->uri->segment(4);
		
		$this->doctor_model->selectPatient($regs);
		

		$data['regs'] = $regs;
		$data['patid'] = $patid;
		$this->load->model('load_info');
		$data['records'] = $this->load_info->profile_data($this->session->userdata('username'));
		$doctorid = $this->doctor_model->fetchDoctorID($this->session->userdata('username'));
		$data['records2'] = $this->doctor_model->fetchQueue($doctorid);
		$data['records3'] = $this->doctor_model->doctorHistory($doctorid);
		$data['records4'] = $this->doctor_model->fetchDoctor();
		$data['records5'] = $this->doctor_model->getPatient($regs);
		$data['records6'] = $this->doctor_model->patientHistory($patid);
		$this->load->view('DoctorPage/doctorpage2', $data);

	}

	function refer()
	{
		$pid = $this->input->post('patient-id');
		$regid = $this->input->post('reg-id');
		$ref = array(
						'registration' => $this->input->post('reg-id'),
						'from_doctor' => $this->input->post('from-doctor'),
						'to_doctor' => $this->input->post('refer-doctor'),
						'remarks' => $this->input->post('message'),
						'date' => date('Y-m-d'),
						'time' => date('h:m:s')

					);

		$reg = array(
						'doctor_id' => $this->input->post('refer-doctor'),
						'stat' => 'Queue'
					);

		$pat = array(
						'remarks' => $this->input->post('message')
					);

		$this->doctor_model->refer($ref,$reg,$pat,$pid,$regid);
		$this->home();
	}

	function crossRefer()
	{
		$crf = array(
					'registration' => $this->input->post('reg-id'),
					'refer_to' => $this->input->post('cross-doc'),
					'department' => $this->input->post('refer-doctor-dept'),
					'reason' => $this->input->post('reason'),
					'remarks' => $this->input->post('remarks'),
					'from_doctor' => $this->input->post('from-doc'),
					'date' => date('Y-m-d'),
					'time' => date('h:i:s')
			);
		$this->doctor_model->crefer($crf);
		$data2['cref'] = $crf;
		$pid = $this->input->post('patient-id');
		$data2['patient'] = $this->doctor_model->patientInfo($pid);
		$data2['doctor'] = $this->input->post('from-doc-name');
		$this->load->view('DoctorPage/crossrefer',$data2);
	}

	function prescription()
	{
		$id = $this->uri->segment(3);
		$data['records4'] = $this->doctor_model->prescriptionData($id);
		$data['records5'] = $this->doctor_model->thePrescription($id);
		$this->load->view('DoctorPage/viewprescription',$data);
	}

	function addPrescription()
	{
		$pid = $this->input->post('patid');
		$reg = $this->input->post('regs');
		$prescription = array(

								'patient_id' => $pid,
								'registration' => $reg,
								'test' => $this->input->post('tests'),
								'diagnosis' => $this->input->post('diagnosis'),
								'date' => date('Y-m-d'),
								'time' => date('h:i:s'),
								'status' => 'Pharmacy'
								
							);
		$this->doctor_model->addPrescription($prescription);
		$meds = $this->doctor_model->fetchMedicineData($reg);
		$tests = $_POST["tests"];
		$diagnosis = $_POST["diagnosis"];
		$fromm = $_POST["fromm"];
		$unit = $_POST["unit"];
		$brand = $_POST["brand"];
		$generic = $_POST["generic"];
		$schedule = $_POST["schedule"];
		$days = $_POST["days"];
		$advise = $_POST["advise"];
		$quantity = $_POST["quantity"];
		$lim = count($fromm);
		for ($i=0; $i < $lim; $i++) 
		{ 
			$medicine = array(
							'fromm' => $fromm[$i],
							'unit' => $unit[$i],
							'brand' => $brand[$i],
							'generic' => $generic[$i],
							'schedule' => $schedule[$i],
							'days' => $days[$i],
							'advise' => $advise[$i],
							'quantity' => $quantity[$i],
							'medicine_data' => $meds
							);
			$this->doctor_model->addMeds($medicine);
		}
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