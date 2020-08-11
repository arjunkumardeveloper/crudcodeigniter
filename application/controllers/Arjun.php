<?php
	class Arjun extends CI_controller
	{
		//public function __construct()
//		{
//			parent:: __construct();
//			if(!$this->session->userdata('id'))
//			return redirect('login/welcome');
//			//$this->load->view('welcome_message');
//		}
		public function index()
		{
			$this->load->view('welcome_message'); 	
		}
		public function welcomeuser()
		{
			$this->load->library('pagination');
			$this->load->model('cimodel');
			$config = array(
				'base_url' => base_url('Arjun/welcomeuser'),
				'per_page' => 3,
				'total_rows' => $this->cimodel->get_row(),
			
			'full_tag_open' => '<ul class="pagination justify-content-center">',
			'full_tag_close' => '</ul>',
			'first_tag_open' => '<li class="page-link">',
			'first_tag_close' => '</li>',
			'last_tag_open' => '<li class="page-link">',
			'last_tag_close' => '</li>',
			'next_tag_open' => '<li class="page-link">',
			'next_tag_close' => '</li>',
			'prev_tag_open' => '<li class="page-link">',
			'prev_tag_close' => '</li>',
			'num_tag_open' => '<li class="page-link">',
			'num_tag_close' => '</li>',
			'cur_tag_open' => '<li class="page-item"><a class="page-link">',
			'cur_tag_close' => '</a></li>'
			
			);
			
			$this->pagination->initialize($config);
			
			
			$data['article'] = $this->cimodel->fetchData($config['per_page'], $this->uri->segment(3));
			//echo "<pre>";
			//print_r($data);
			//exit;
			$this->load->view('home', $data);
		}
		public function logout()
		{
			$this->session->unset_userdata('id');
			return redirect('Arjun/index');
		}
		public function contact()
		{
			$this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
			$this->form_validation->set_rules('mobile', 'Mobile No.', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('message', 'Message', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if($this->form_validation->run())
			{
				$data = $this->input->post();
				//print_r($data);
				//exit;
				$this->load->model('cimodel');
				if($this->cimodel->contactus($data))
				{
					$this->session->set_flashdata('msg', 'Submition Complete');
					$this->session->set_flashdata('msg_class', 'alert-success');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Submition Faild');
					$this->session->set_flashdata('msg_class', 'alert-danger');
				}
				return redirect('Arjun');
			}
			else
			{
				$this->load->view('welcome_message');
			}
		}
		public function addArticle()
		{
			$this->load->view('articleAdd');
		}
		public function uploadArticle()
		{
			$config = array(
							'upload_path' => './articleImage/',
							'allowed_types' => 'gif|jpeg|jpg'
						);
				$this->load->library('upload', $config);
			
			$this->form_validation->set_rules('articletitle', 'Article Title', 'trim|required');
			$this->form_validation->set_rules('articlebody', 'Article Body', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if($this->form_validation->run() && $this->upload->do_upload())
			{
				$post = $this->input->post();
				//print_r($post);
				//exit;
				$data = $this->upload->data();
				//print_r($data);
				//exit;
				$img_path = base_url("articleImage/". $data['raw_name'] . $data['file_ext']);
				$post['articleimage'] = $img_path;
				
				//print_r($post);
				//exit;
				$this->load->model('cimodel');
				if($this->cimodel->addArticle($post))
				{
					$this->session->set_flashdata('msg', 'Article Successfully Added !');
					$this->session->set_flashdata('msg_class', 'alert-success');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Faild Try Again !');
					$this->session->set_flashdata('msg_class', 'alert-danger');
				}
				return redirect('Arjun/welcomeuser');
			}
			else
			{
				$upload_error = $this->upload->display_errors();
				$this->load->view('articleAdd', compact('upload_error'));
			}
		}
		public function delArticle($id)
		{
			$this->load->model('cimodel');
			if($this->cimodel->deleteArticle($id))
			{
				$this->session->set_flashdata('msg', 'Successfully Delete Your Article');
				$this->session->set_flashdata('msg_class', 'alert-success');
			}
			else
			{
				$this->session->set_flashdata('msg', 'Faild Try Again...');
				$this->session->set_flashdata('msg_class', 'alert-danger');
			}
			return redirect('Arjun/welcomeuser');
		}
		public function gallary()
		{
			$this->load->model('cimodel');
			$image['pic'] = $this->cimodel->fetchGallary();
			$this->load->view('gallary', $image);
		}
		public function editPost($id)
		{
			//echo $id;
			
			$this->load->model('cimodel');
			$data['articledata'] = $this->cimodel->articleEdit($id);
			$this->load->view('editArticle', $data);
		}
		public function updateArt($id)
		{
			//echo $id;
			$config = array(
				'allowed_types' => 'gif|jpeg|jpg',
				'upload_path' => './articleImage/'
			);
			$this->load->library('upload', $config);
			$this->form_validation->set_rules('articletitle', 'Article Title', 'trim|required');
			$this->form_validation->set_rules('articlebody', 'Article Body', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if($this->form_validation->run() && $this->upload->do_upload())
			{	
				$post = $this->input->post();
				$data = $this->upload->data();
				$image_path = base_url("articleImage/". $data['raw_name'] . $data['file_ext']);
				$post['articleimage'] = $image_path;
				//print_r($post);
				//exit;
				$this->load->model('cimodel');
				if($this->cimodel->editpost($post, $id))
				{
					$this->session->set_flashdata('msg', 'Your Article Has Been Successfully Update');
					$this->session->set_flashdata('msg_class', 'alert-success');
				}
				else
				{
					$this->session->set_flashdata('msg', 'Updation Faild...Try Again');
					$this->session->set_flashdata('msg_class', 'alert-danger');
				}
				return redirect('Arjun/welcomeuser');
			}
			else if($this->form_validation->run())
			{
					$post = $this->input->post();
					//print_r($post);
					//exit;
					$this->load->model('cimodel');
					if($this->cimodel->editpost($post, $id))
					{
						$this->session->set_flashdata('msg', 'Your Article Has Been Successfully Update');
						$this->session->set_flashdata('msg_class', 'alert-success');
					}
					else
					{
						$this->session->set_flashdata('msg', 'Updation Fild....Try Again');
						$this->session->set_flashdata('msg_class', 'alert-danger');
					}
					return redirect('Arjun/welcomeuser');
			}
			else
			{
				$this->editPost($id);
				//echo validation_errors();
			}
		}
	}
?>