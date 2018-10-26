<?php

class Membership_model extends CI_Model{

	function validate() 
	{
		$this->db->where('username' , $this->input->post('username'));
		$this->db->where('password' , md5($this->input->post('password')));
		$query = $this->db->get('user_authoriztion');

		if($query->num_rows() == 1)
		{
			foreach ($query->result() as $row)
					{
						$account_type = $row->account_type;
					}

			$updates = array (
								'status' => 'In',
								'last_login' => date('Y-m-d H:i:s')
				);
			$this->db->where('username' , $this->input->post('username'));	
			$this->db->update('user_authoriztion', $updates);
	
			

			return $account_type;
		}

	}





}