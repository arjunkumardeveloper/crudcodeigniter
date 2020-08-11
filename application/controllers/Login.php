<?php
	class Login extends CI_controller
	{
		//public function __construct()
//		{
//			parent:: __construct();
//			if($this->session->userdata('id'))
//			return redirect('Arjun/welcomeuser');
//		}
		public function welcome()
		{
			$this->form_validation->set_rules('username', 'User Name', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if($this->form_validation->run())
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				$this->load->model('cimodel');
				$sdata = $this->cimodel->userlogin($username, $password);
				if($sdata)
				{
					$data = array();
					$data['id'] = $sdata->id;
					$data['fullname'] = $sdata->fullname;
					
					$this->session->set_userdata($data);
					return redirect('Arjun/welcomeuser');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Login Faild...Try Again');
					$this->session->set_flashdata('msg_class', 'alert-danger');
					return redirect('login/welcome');
				}
			
			}
			else
			{
				$this->load->view('login');
			}
		}
		public function addUser()
		{
			$this->load->view('registration');
		}
		public function registration()
		{
			//$this->load->library('form_validation');
			$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
			$this->form_validation->set_rules('username', 'UserName', 'trim|required|is_unique[ciregistration.username]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
			$this->form_validation->set_rules('dob', 'Date Of Birth', 'trim|required');
			$this->form_validation->set_rules('mobile', 'Contact Number', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if($this->form_validation->run())
			{
				$data = $this->input->post();
				//print_r($data);
				//exit;
				$this->load->model('cimodel');
				if($this->cimodel->userRegistration($data))
				{
					$this->session->set_flashdata('msg', 'Registration Successfully');
					$this->session->set_flashdata('msg_class', 'alert-success');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Registration Faild');
					$this->session->set_flashdata('msg_class', 'alert-danger');
				}
				return redirect('login/welcome');
			}
			else
			{
				//echo validation_errors();
				$this->load->view('registration');
			}
		}
		
	}
?>