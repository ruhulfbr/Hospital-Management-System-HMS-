<?php
class Doctor_model extends CI_model{

	
	
	function fetchQueue($docid)
	{
		$sql = "SELECT reg_patient.registration as reg, reg_patient.patient_id as pid, patient_info.name as name from reg_patient, patient_info WHERE reg_patient.patient_id = patient_info.patient_id AND reg_patient.doctor_id =".$docid." AND date = cast(now() as date ) AND stat='Queue' ";
		$fq = $this->db->query($sql);
		if($fq->num_rows() > 0)
		{
			foreach ($fq->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function fetchDoctorID($user)
	{
		$this->db->select('user_id');
		$this->db->where('username',$user);
		$fdi = $this->db->get('profile');
		foreach ($fdi->result() as $row) 
		{
			$data2 = $row->user_id;
		}
		return $data2;
	}

	function doctorHistory($doctorid)
	{
		$sql = "SELECT reg_patient.date as date, patient_info.name as name, registration, reg_patient.patient_id as pid from reg_patient, patient_info WHERE doctor_id =".$doctorid." AND reg_patient.patient_id=patient_info.patient_id AND stat='Issue' ";
		$dc = $this->db->query($sql);
		if($dc->num_rows() > 0)
		{
			foreach ($dc->result() as $row) 
			{
				$data3[] = $row;
			}
			return $data3;
		}
	}

	function fetchDoctor()
	{
		$this->db->where('type','Doctor');
		$q = $this->db->get('profile');

		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row) 
			{
				$data4[]= $row;
			}

			return $data4;
		}
	}

	function refer($ref,$reg,$pat,$pid,$regid)
	{
		$this->db->insert('refer', $ref);

		$this->db->where('registration',$regid);
		$this->db->update('reg_patient',$reg);

		$this->db->where('patient_id',$pid);
		$this->db->update('patient_info',$pat);
		return;

	}

	function patientInfo($pid)
	{
		$this->db->where('patient_id',$pid);
		$pi = $this->db->get('patient_info');

		if($pi->num_rows()>0)
		{
			foreach ($pi->result() as $row) 
			{
				$data5[] = $row;
			}
			return $data5;
		}
	}

	function crefer($crf)
	{
		$this->db->insert('cross_refer',$crf);
		return;
	}

	function selectPatient($regs)
	{
		$upd = array('stat' => 'Doctor');
		$this->db->where('registration',$regs);
		$this->db->update('reg_patient',$upd);
		return;
	}

	function getPatient($regs)
	{
		$sql2 = "SELECT * FROM reg_patient,patient_info WHERE registration=".$regs." AND reg_patient.patient_id=patient_info.patient_id ";
		$gp = $this->db->query($sql2);
		foreach ($gp->result() as $row) 
			{
				$data6[] = $row;
			}
			return $data6;
	}

	function patientHistory($patid)
	{
		$sql3 = "SELECT reg_patient.date as date, profile.name as doctor, reg_patient.registration as reg, diagnosis from reg_patient, profile, prescription WHERE reg_patient.patient_id=".$patid." AND reg_patient.doctor_id=profile.user_id AND reg_patient.registration = prescription.registration AND reg_patient.stat = 'Issue' ";
		$ph =$this->db->query($sql3);
		if($ph->num_rows()>0)
		{
			foreach ($ph->result() as $row) 
			{
				$data7[] = $row;
			}
			return $data7;
		}
	}

		function prescriptionData($id)
	{
		$sql = "SELECT patient_info.name as name, reg_patient.patient_id as pid, reg_patient.registration as reg, profile.name as doctor, prescription.date as pdate, diagnosis, test FROM patient_info, reg_patient, profile, prescription WHERE reg_patient.registration =".$id." AND reg_patient.patient_id=patient_info.patient_id AND reg_patient.doctor_id=profile.user_id AND reg_patient.registration=prescription.registration";
		$pd = $this->db->query($sql);
		if($pd->num_rows() >0)
		{
			foreach($pd->result() as $row)
				{$data3[] = $row;}
		
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

	function addPrescription($add)
	{
		$this->db->insert('prescription',$add);



		return;
	}

	function fetchMedicineData($reg)
	{
		
		$regi = array('stat' => 'Pharmacy');
		$this->db->where('registration',$reg);
		$this->db->update('reg_patient',$regi);

		$this->db->select('medicine_data');
		$this->db->where('registration',$reg);
		$md = $this->db->get('prescription');
		foreach ($md->result() as $row) 
		{
			$meds = $row->medicine_data;
		}
		return $meds;


	}

	function addMeds($medicine)
	{
		$this->db->insert('prescribed_medicine',$medicine);
		return;
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