<?php

class Load_info extends CI_Model{

	function profile_data($username)
	{
		$this->db->where('username' , $username);
		$q = $this->db->get('profile');
		
			if ($q->num_rows() == 1) {
				foreach ($q->result() as $row)
					{
						$data[]= $row;
						
					}
			
			return $data;
			}
	}


}