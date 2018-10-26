<?php
class Pharmacy_model extends CI_Model{

	function fetchMedicine()
	{
		$q = $this->db->get('medicine_inventory');
		if($q->num_rows() >0)
		{
			foreach($q->result() as $row)
				{$data[] = $row;}
		}
		return $data; 
	}

	function prescriptionData($id)
	{
		$sql = "SELECT patient_info.name as name, reg_patient.patient_id as pid, reg_patient.registration as reg, profile.name as doctor, prescription.date as pdate, diagnosis, test FROM patient_info, reg_patient, profile, prescription WHERE reg_patient.registration =".$id." AND reg_patient.patient_id=patient_info.patient_id AND reg_patient.doctor_id=profile.user_id AND reg_patient.registration=prescription.registration";
		$pd = $this->db->query($sql);
		if($pd->num_rows() >0)
		{
			foreach($pd->result() as $row)
				{$data3[] = $row;}
		$updates = array (
							'stat' => 'Issue',

						);
		
		$this->db->where('registration', $id);
		$this->db->update('reg_patient', $updates);
		return $data3;

		}
		
	}

	function thePrescription($id)
	{
		$sql2 = "SELECT fromm, unit, brand, generic, schedule, days, advise, quantity FROM prescribed_medicine, prescription WHERE registration=".$id." AND prescription.medicine_data=prescribed_medicine.medicine_data ";
		$tp = $this->db->query($sql2);
		if($tp->num_rows() > 0)
		{
			foreach($tp->result() as $row)
				{$data4[] = $row;}
		return $data4;
		}
		
	}

	function viewPrescription()
	{
		$sql3 = "SELECT patient_info.name as name, reg_patient.registration as reg, reg_patient.patient_id as pid, profile.name as doctor FROM reg_patient, profile, patient_info WHERE reg_patient.stat='Pharmacy' AND reg_patient.date = cast(now() as date ) AND reg_patient.doctor_id = profile.user_id AND reg_patient.patient_id = patient_info.patient_id ";
		$vp = $this->db->query($sql3);
		if($vp->num_rows() > 0)
		{
			foreach($vp->result() as $row)
				{$data5[] = $row;}
			return $data5;
		}
		
	}

	function todayPrescription()
	{
		$p = $this->db->query("SELECT profile.name as doctor, patient_info.name as name, reg_patient.registration as reg, reg_patient.patient_id as pid, medicine_data FROM profile, patient_info, reg_patient, prescription WHERE reg_patient.registration = prescription.registration AND reg_patient.patient_id = patient_info.patient_id AND reg_patient.doctor_id = profile.user_id AND prescription.date= cast(now() as date ) AND reg_patient.stat = 'Issue' ");
		if($p->num_rows() >0)
		{
			foreach($p->result() as $row)
				{$data2[] = $row;}
		return $data2;
		}
		
	}

	function profile($updateprof)
	{
		$user = $this->input->post('username');
		$this->db->where('username',$user);
		$this->db->update('profile',$updateprof);
		return;
	}

	function image()
	{
		$user = $this->input->post('username');

		$image_path = realpath(APPPATH.'../images');
		
		$config = array(
							'allowed_types' => 'jpg|jpeg|png|gif|bmp',
							'upload_path' =>  $image_path,
							'encrypt_name' => TRUE
						);

		$this->load->library('upload',$config);
		$this->upload->do_upload();
		$image_data = $this->upload->data('file_name');
		$newimage = base_url("images/$image_data");
		
		$updateimg = array( 'image' => $newimage );
		$this->db->where('username',$user);
		$this->db->update('profile',$updateimg);
		return;
		

	}

	function password()
	{
		$user = $this->input->post('username');

		$this->db->select('password');
		$this->db->where('username',$user);
		$q = $this->db->get('user_authoriztion');
					
			foreach ($q->result() as $row) 
			{
				$pass = $row->password;
			}
		$opass = $this->input->post('old-password');
		$npass = $this->input->post('new-password');
		$cpass = $this->input->post('confirm-new-password');

		if(md5($opass) == $pass)
		{
			if($npass == $cpass)
			{
				$newpassword = md5($npass);
				$newpassupd = array('password' => $newpassword );
				$this->db->where('username',$user);
				$this->db->update('user_authoriztion',$newpassupd);
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}
}