<?php

class Registration_model extends CI_Model{

	function patient_record()
	{
		$pr = $this->db->query("SELECT reg_patient.patient_id, registration, profile.name as doctor, patient_info.name as name FROM `reg_patient`,`profile`,`patient_info` WHERE doctor_id = user_id AND date= cast(now() as date ) AND reg_patient.patient_id = patient_info.patient_id  ");
		if($pr->num_rows() > 0)
		{
			foreach ($pr->result() as $row) 
			{
				$data5[]= $row;
			}

			return $data5;
		}
	}

	function fetchPatient($patient_id)
	{
				
			//$info = $this->db->query(SELECT * FROM `reg_patient`,`profile`,`patient_info` WHERE doctor_id = user_id AND date='2015-07-10' AND reg_patient.patient_id = patient_info.patient_id );
			if($info->num_rows() == 1)
			{
				foreach($info->result() as $row)
				{
					$data4[] = $row;
				}
			}
			else
			{
				$data4 = 'NO';
			}
		return $data4;
	}

	function fetchDoctor()
	{
		$q = $this->db->query("SELECT * FROM `profile`,`user_authoriztion` WHERE profile.username=user_authoriztion.username AND type='Doctor' ");

		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row) 
			{
				$data2[]= $row;
			}

			return $data2;
		}
	}

	function patientid()
	{
		$p = $this->db->query("SELECT max(patient_id) as pid FROM `patient_info` ");
		if($p->num_rows() == 1)
		{
			foreach ($p->result() as $row) 
			{
				$data3[]= $row;
			}

			return $data3;
		}
	}

	function addPatient($patient, $registration)
	{
		$this->db->insert('patient_info', $patient);
		$this->db->insert('reg_patient', $registration);
		return;
	}

	function fetchOldPatient($pid)
	{
		$this->db->where('patient_id',$pid);
		$fop = $this->db->get('patient_info');
		if($fop->num_rows() == 1)
		{
			foreach ($fop->result() as $row)
			{
				$data6[] = $row;
			}
			return $data6;
		}
	}

	function fetchDoctorName($docid)
	{
		$this->db->select('name');
		$this->db->where('user_id', $docid);
		$fdn = $this->db->get('profile');
		foreach ($fdn->result() as $row)
			{
				$data7[] = $row;
			}
			return $data7;
	}

	function oldPatReg($oreg)
	{
		$this->db->insert('reg_patient', $oreg);
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