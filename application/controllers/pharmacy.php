<?php
class Pharmacy extends CI_Controller{

	function viewmedicine()
	{
		$this->prescription();
	}

	function medicine()
	{	//$id = $this->uri->segment(3);
		$this->prescription();
	}

	function home()
	{
		$this->load->model('load_info');
		$data['records'] = $this->load_info->profile_data($this->session->userdata('username'));
		$data['records2'] = $this->pharmacy_model->fetchMedicine();
		$data['records3'] = $this->pharmacy_model->todayPrescription();
		$data['records6'] = $this->pharmacy_model->viewPrescription();
		$this->load->view('PharmacyPage/pharmacypage',$data);
	}

	function prescription()
	{
		$id = $this->uri->segment(3);
		$data['records4'] = $this->pharmacy_model->prescriptionData($id);
		$data['records5'] = $this->pharmacy_model->thePrescription($id);
		$this->load->view('PharmacyPage/prescription',$data);
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