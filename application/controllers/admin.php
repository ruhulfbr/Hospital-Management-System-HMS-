<?php


class Admin extends CI_Controller{

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

	function add()
	{
		$this->load->view('AdminPage/add');
	}

	function delete()
	{
		$data['records'] = $this->admin_model->viewAll();
		$this->load->view('AdminPage/delete',$data);
	}

	function medicine()
	{
		$this->load->view('AdminPage/medicine');
	}

	function modify()
	{
		$this->load->view('AdminPage/modify');
	}

	function view()
	{
		$data['records'] = $this->admin_model->viewAll();
		$this->load->view('AdminPage/view',$data);
	}

	function home()
	{
		$data['records2'] = $this->admin_model->TotalMembers();
		$this->load->view('AdminPage/adminpage',$data);
	}

	function add_user()
	{	//field name, friendly name, validation rules
		$this->form_validation->set_rules('userid', 'User ID', 'trim|max_length[10]|numeric');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|max_length[11]|is_natural');
		$this->form_validation->set_rules('address', 'Address', 'trim|max_length[254]');
		$this->form_validation->set_rules('department', 'Department', 'trim|required|max_length[60]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[12]');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->add();
		}

		else
		{	$image = $this->input->post('type');
				if($image == 'Doctor')
				{
					$image = base_url('images/sksingh.jpg');
				}
				elseif ($image == 'Pharmacy') 
				{
					$image = base_url('images/pharmacy.png');
				}
				else
				{
					$image = base_url('images/IlleinaDave.png');
				}
		
				$profile = array (
							'user_id' => $this->input->post('userid'),
							'name' => $this->input->post('name'),
							'email' => $this->input->post('email'),
							'phone' => $this->input->post('phone'),
							'address' => $this->input->post('address'),
							'image' => $image,
							'department' => $this->input->post('department'),
							'type' => $this->input->post('type'),
							'username' => $this->input->post('username')
		
					);
				$user = array(
							'username' => $this->input->post('username'),
							'password' => md5('password'),
							'account_type' => $this->input->post('type'),
							'status' => 'Out',
							'last_login' => '2000-01-01 00:00:00'
					);
				
				$this->admin_model->addUser($profile,$user);
				$this->view();
		}
	}

	function deleteUser()
	{
		$this->admin_model->deleteUser();
		$this->view();

	}

	function availability()
	{
		$this->admin_model->availUser();
		$this->view();
	}

	function add_medicine()
	{	
		$this->form_validation->set_rules('medicine_id', 'Medicine ID', 'trim|max_length[15]|numeric');
		$this->form_validation->set_rules('brand', 'Brand Name', 'trim|required|max_length[60]');
		$this->form_validation->set_rules('generic', 'Generic', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|max_length[11]|is_natural');
		$this->form_validation->set_rules('expiry', 'Expiry Date', 'trim|required');
		$this->form_validation->set_rules('store', 'Store Number', 'trim|required|max_length[10]|numeric');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->medicine();
		}

		else
		{	
			$medicine = array (
							'medicine_id' => $this->input->post('medicine_id'),
							'type' => $this->input->post('type'),
							'brand' => $this->input->post('brand'),
							'generic' => $this->input->post('generic'),
							'quantity' => $this->input->post('quantity'),
							'expiry' => $this->input->post('expiry'),
							'store_number' => $this->input->post('store'),
							'date' => date("Y-m-d"),
							'time' => date("h:i:s")
						);
			$this->admin_model->addMedicine($medicine);
			echo 'Medicine Uploaded...';
			sleep(3);
			$this->home();
		}
	}
	
	
	
}