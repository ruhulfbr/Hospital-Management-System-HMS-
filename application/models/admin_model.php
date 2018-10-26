<?php
class Admin_model extends CI_Model{

	
	function viewAll()
	{
		
		$q = $this->db->query("SELECT * FROM `profile`,`user_authoriztion` WHERE profile.username=user_authoriztion.username");

		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row) 
			{
				$data[]= $row;
			}

			return $data;
		}
	}

	function addUser($profile, $user)
	{
		$this->db->insert('profile', $profile);
		$this->db->insert('user_authoriztion', $user);
		return;


	}

	function deleteUser()
	{
		$this->db->where('username', $this->uri->segment(3));
		$this->db->delete('profile');

		$this->db->where('username', $this->uri->segment(3));
		$this->db->delete('user_authoriztion');

	}

	function availUser()
	{
		if($this->uri->segment(4)=='Available')
		{
			$updates = array (
							'availability' => 'Leave',
							
						);
		}
		else
		{
			$updates = array (
							'availability' => 'Available',

						);
		}
		$this->db->where('user_id', $this->uri->segment(3));
		$this->db->update('profile', $updates);
	}


	function addMedicine($medicine)
	{
		$this->db->insert('medicine_inventory', $medicine);
		return;
	}

	function TotalMembers()
	{
		$q = $this->db->get('user_authoriztion');

		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row) 
			{
				$data[]= $row;
			}

			return $data;
		}
	}

	

	function logout($usernamein)
	{
		$stat = array('status' => 'Out' );
		$this->db->where('username',$usernamein);
		$this->db->update('user_authoriztion',$stat);
		return;
	}

}